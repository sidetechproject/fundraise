<?php

namespace App\Http\Controllers\Auth;

use App\Commons\APICode;
use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Redirect;
use App\Commons\Message;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $user;
    protected $response;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Response $response)
    {
        $this->middleware('guest');
        $this->user = $user;
        $this->response = $response;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'name' => ['required', 'string', 'max:255'],
            'profile' => ['required', 'string', 'max:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            //'name' => $data['name'],
            'email' => $data['email'],
            'profile' => $data['profile'],
            'fund' => $data['fund'],
            // 'ticket' => $data['ticket'],
            // 'stage' => $data['stage'],
            // 'type_investor' => $data['type_investor'],
            // 'bio' => $data['bio'],
            // 'linkedin' => $data['linkedin'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $validator = $this->user->validateRegister($request);

        $user = null;
        if ($validator->code == APICode::SUCCESS) {
            $user = $this->user->create($request);
            $this->guard()->login($user);
            //return $this->response->formatResponse($validator->code, $user, $validator->message);
            return redirect()->route('onboarding');
        }

        $messageObj = new Message();

        return Redirect::back()->withErrors([
            "message" => (!$validator->message) ? $messageObj->getMessage($validator->code) : (Message::genErrorMessage($validator->message)),
        ]);
    }
}
