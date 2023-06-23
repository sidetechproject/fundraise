<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Integration;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Place;
use QuickBooksOnline\API\DataService\DataService;

class WebhookController extends Controller
{
    /**
     * Handle the Stripe webhook.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function stripe(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $response = \Stripe\OAuth::token([
            'grant_type' => 'authorization_code',
            'code' => $request->code,
        ]);

        $startup = Place::where(['user_id' => Auth::user()->id])->first();

        // $stripe->financialConnections->sessions->create([
        //     'account_holder' => [
        //       'type' => 'customer',
        //       'customer' => $response->stripe_user_id,
        //     ],
        //     'permissions' => ['balances'],
        //     'prefetch' => ['balances'],
        // ]);

        // $stripe->financialConnections->accounts->refresh(
        //     '{{ACCOUNT_ID}}',
        //     ['features' => ['balance']]
        // );

        $integration = new Integration();
        $integration->user_id = Auth::user()->id;
        $integration->startup_id = $startup->id;
        $integration->integration_tool = 'stripe';
        $integration->data = serialize([
            'access_token' => $response->access_token,
            'livemode' => $response->livemode,
            'refresh_token' => $response->refresh_token,
            'token_type' => $response->token_type,
            'stripe_publishable_key' => $response->stripe_publishable_key,
            'stripe_user_id' => $response->stripe_user_id,
            'scope' => $response->scope,
        ]);
        $integration->dd_data = '';
        $integration->save();

        return redirect(route('home'));
    }

       /**
     * Handle the quickbooks webhook.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function quickbooks(Request $request)
    {
        $dataService = DataService::Configure(array(
            'auth_mode' => 'oauth2',
            'ClientID' => env('QUICKBOOKS_CLIENT_ID'),
            'ClientSecret' =>  env('QUICKBOOKS_CLIENT_SECRET'),
            'RedirectURI' => env('QUICKBOOKS_OAUTH_REDIRECT_URI'),
            'scope' => env('QUICKBOOKS_OAUTH_SCOPE'),
            'baseUrl' => "development"
        ));

        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();

        $parseUrl = $this->parseAuthRedirectUrl($_SERVER['QUERY_STRING']);

        /*
        * Update the OAuth2Token
        */
        $accessToken = $OAuth2LoginHelper->exchangeAuthorizationCodeForToken($parseUrl['code'], $parseUrl['realmId']);
        $dataService->updateOAuth2Token($accessToken);

        $startup = Place::where(['user_id' => Auth::user()->id])->first();

        //$companyInfo = $dataService->getCompanyInfo();

        $integration = new Integration();
        $integration->user_id = Auth::user()->id;
        $integration->startup_id = $startup->id;
        $integration->integration_tool = 'quickbooks';
        $integration->data = serialize([
            'access_token' => $accessToken->getAccessToken()
        ]);
        $integration->dd_data = '';
        $integration->save();

        return redirect(route('home'));
    }

    private function parseAuthRedirectUrl($url)
    {
        parse_str($url,$qsArray);
        return array(
            'code' => $qsArray['code'],
            'realmId' => $qsArray['realmId']
        );
    }
}
