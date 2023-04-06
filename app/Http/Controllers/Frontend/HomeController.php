<?php

namespace App\Http\Controllers\Frontend;


use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Place;
use App\Models\PlaceType;
use App\Models\Booking;
use App\Models\Post;
use App\Models\User;
use App\Models\Invite;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function onboarding()
    {
        return view('frontend.auth.onboarding');
    }

    public function index()
    {
        if (is_null(Auth::user()) || !Auth::user()->onboarding) {
            return redirect('onboarding');
        }

        $amounts = ['invites' => 0, 'views' => 0, 'intros' => 0, 'raising' => 0];

        $categories = Category::query()
            ->where('categories.status', Category::STATUS_ACTIVE)
            ->where('categories.type', Category::TYPE_PLACE)
            ->join('places', 'places.category', 'like', DB::raw("CONCAT('%', categories.id, '%')"))
            ->select('categories.id as id', 'categories.name as name', 'categories.priority as priority', 'categories.slug as slug', 'categories.color_code as color_code', 'categories.icon_map_marker as icon_map_marker', DB::raw("count(places.category) as place_count"))
            ->groupBy('categories.id')
            ->orderBy('categories.priority')
            ->limit(10)
            ->get();

        if(isUserInvestor()){
            $startups = Place::query()
            ->with('categories')
            ->with('city')
            ->with('place_types')
            ->withCount('reviews')
            ->with('avgReview')
            ->withCount('wishList')
            ->where('status', Place::STATUS_ACTIVE)
            ->limit(6)
            ->orderBy('featured', 'desc')
            ->orderBy('created_at', 'desc')
            //->where('featured', 1)
            ->get();

            $investors = User::query()
            ->where('profile', 2)
            //->where('onboarding', 1)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        } else {
            $startups = Place::query()
            ->with('categories')
            ->with('city')
            ->with('place_types')
            ->with('intros')
            ->with('invites')
            ->withCount('reviews')
            ->with('avgReview')
            ->withCount('wishList')
            ->orderBy('created_at', 'desc')
            ->where('user_id', Auth::user()->id)
            ->get();

            $investors = User::query()
            ->where('profile', 2)
            //->where('onboarding', 1)
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

            // $intros = Booking::query()
            // ->where('user_id', Auth::user()->id)
            // ->count();

            foreach ($startups as $startup) {
                $amounts['invites'] += $startup->invites->count();
                //$amounts['views'] += 1;
                $amounts['intros'] += $startup->intros->count();
                $amounts['raising'] += preg_replace('/\D/', '', $startup->raising);
            }
        }

        $featured_startup = Place::query()
            ->with('categories')
            ->with('city')
            ->with('place_types')
            ->withCount('reviews')
            ->with('avgReview')
            ->withCount('wishList')
            ->where('status', Place::STATUS_ACTIVE)
            ->where('id', '70')
            ->first();

        // $testimonials = Testimonial::query()
        //     ->where('status', Testimonial::STATUS_ACTIVE)
        //     ->get();

//        return $startups;

        $template = setting('template', '01');

        return view("frontend.home.home_{$template}", [
            // 'popular_cities' => $popular_cities,
            // 'blog_posts' => $blog_posts,
            'categories' => $categories,
            'startups' => $startups,
            'investors' => $investors,
            'featured_startup' => $featured_startup,
            'amounts' => $amounts,
            //'testimonials' => $testimonials
        ]);
    }

    public function pageFaqs()
    {
        return view('frontend.page.faqs');
    }

    public function pageContact()
    {
        return view('frontend.page.contact');
    }

    public function pageLanding($page_number)
    {
        return view("frontend.page.landing_{$page_number}");
    }

    public function sendContact(Request $request)
    {
        Mail::send('frontend.mail.contact_form', [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'note' => $request->note
        ], function ($message) use ($request) {
            $message->to(setting('email_system'), "{$request->first_name}")->subject('Contact from ' . $request->first_name);
        });

        return back()->with('success', 'Contact has been send!');
    }


    public function sendInvite(Request $request)
    {
        // $rule_factory = RuleFactory::make([
        //     '%name%' => '',
        //     'icon' => 'mimes:jpeg,jpg,png,gif|max:10000'
        // ]);
        // $data = $this->validate($request, $rule_factory);

        $startup = Place::where(['user_id' => Auth::user()->id, 'id' => $request->input('startup_id')])->first();

        if(!$startup || empty($request->input('emails'))){
            return back()->with('error', 'Invite not sent!');
        }

        $emails = explode(';', $request->input('emails'));
        foreach($emails as $invited_email) {

            $alreadyHasInvite = Invite::where([
                'user_id' => Auth::user()->id,
                'startup_id' => $request->input('startup_id'),
                'invited_email' => $invited_email
            ])->first();

            if($alreadyHasInvite) {
                return back()->with('error', 'Invite not sent!');
            }

            $invite = new Invite();

            $invite->invited_email = $invited_email;
            $invite->user_id = Auth::user()->id;
            $invite->startup_id = $request->input('startup_id');
            $invite->status = 1;

            $invite->save();

            Mail::send('frontend.mail.invite', [
                'startup' => $startup,
                'invited_email' => $invited_email,
            ], function ($message) use ($request, $startup, $invited_email) {
                $message->to($invited_email, "{$invited_email}")
                ->subject('Invite from ' . $startup->name)
                ->replyTo($startup->email, $startup->name);
            });
        }

        return back()->with('success', 'Invite sent!');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->keyword;
        $category_id = $request->category_id;
        $city_id = $request->city_id;

        $places = Place::query()
            ->with(['city' => function ($query) {
                return $query->select('id', 'name', 'slug');
            }])
            ->whereTranslationLike('name', "%{$keyword}%")
            ->orWhere('address', 'like', "%{$keyword}%")
            ->where('status', Place::STATUS_ACTIVE);

        if ($category_id) {
            $places->where('category', 'like', "%{$category_id}%");
        }

        if ($city_id) {
            $places->where('city_id', $city_id);
        }

        $places = $places->get(['id', 'city_id', 'name', 'slug', 'address']);

        $html = '<ul class="custom-scrollbar">';
        foreach ($places as $place):
            if (isset($place['city'])):
                $place_url = route('place_detail', $place->slug);
                $city_url = route('city_detail', $place['city']['slug']);
                $html .= "
                <li>
                    <a href=\"{$place_url}\">{$place->name}</a>
                    <a href=\"{$city_url}\"><i class=\"la la-city\"></i>{$place['city']['name']}</a>
                </li>
                ";
            endif;
        endforeach;
        $html .= '</ul>';

        $html_notfound = "<div class=\"golo-ajax-result\">No place found</div>";

        count($places) ?: $html = $html_notfound;

        return response($html, 200);
    }

    public function searchListing(Request $request)
    {
        $keyword = $request->keyword;

        $places = Place::query()
            ->with(['city' => function ($query) {
                return $query->select('id', 'name', 'slug');
            }])
            ->whereTranslationLike('name', "%{$keyword}%")
            ->orWhere('address', 'like', "%{$keyword}%")
            ->where('status', Place::STATUS_ACTIVE);

        $places = $places->get(['id', 'city_id', 'name', 'slug', 'address']);

        $html = '<ul class="listing_items">';
        foreach ($places as $place):
            if (isset($place['city'])):
                $place_url = route('place_detail', $place->slug);
                $html .= "
                <li>
                    <a href=\"{$place_url}\">{$place->name}</a>
                </li>
                ";
            endif;
        endforeach;
        $html .= '</ul>';

        $html_notfound = "<ul><li><a href='#'><span>No listing found!</span></a></li></ul>";

        count($places) ?: $html = $html_notfound;

        return response($html, 200);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $category_id = $request->category_id;
        $city_id = $request->city_id;

        $places = Place::query()
            ->with(['city' => function ($query) {
                return $query->select('id', 'name', 'slug');
            }])
            ->with('place_types')
            ->withCount('reviews')
            ->with('avgReview')
            ->withCount('wishList')
            ->orWhere('address', 'like', "%{$keyword}%")
            ->whereTranslationLike('name', "%{$keyword}%")
            ->where('status', Place::STATUS_ACTIVE);

        if ($category_id) {
            $places->where('category', 'like', "%{$category_id}%");
        }

        if ($city_id) {
            $places->where('city_id', $city_id);
        }

        $places = $places->paginate(20);

        // SEO Meta
        SEOMeta(setting('app_name'), setting('home_description'));

        return view('frontend.search.search', [
            'places' => $places,
            'keyword' => $keyword
        ]);
    }

    public function changeLanguage($locale)
    {
        Session::put('language_code', $locale);
        $language = Session::get('language_code');

        return redirect()->back();
    }

    public function pageSearchListing(Request $request)
    {
        $keyword = $request->keyword;
        $filter_category = $request->category;
        $filter_amenities = $request->amenities;
        $filter_place_type = $request->place_type;
        $filter_country = $request->country;

        $categories = Category::query()
            //->with('places')
            ->where('type', Category::TYPE_PLACE)
            // ->orderBy('places_count', 'desc')
            // ->orderBy('id', 'asc')
            ->get();

        $place_types = PlaceType::query()
            // ->orderBy('places_count', 'desc')
            // ->orderBy('id', 'asc')
            ->get();

        $amenities = Amenities::query()
            ->get();

        $countries = Country::withCount('places')
                            ->orderBy('places_count', 'desc')
                            ->orderBy('id', 'asc')
                            ->get();

        $places = Place::query()
            ->with(['country' => function ($query) {
                return $query->select('id', 'name');
            }])
            ->with('categories')
            ->with('place_types')
            ->withCount('reviews')
            ->with('avgReview')
            ->withCount('wishList')
            //->orWhere('address', 'like', "%{$keyword}%")
            ->whereTranslationLike('name', "%{$keyword}%")
            ->orderBy('id', 'desc')
            ->where('status', Place::STATUS_ACTIVE);

        if ($filter_category) {
            foreach ($filter_category as $key => $item) {
                if ($key === 0) {
                    $places->where('category', 'like', "%$item%");
                } else {
                    $places->orWhere('category', 'like', "%$item%");
                }
            }
        }

        if ($filter_amenities) {
            foreach ($filter_amenities as $key => $item) {
                if ($key === 0) {
                    $places->where('amenities', 'like', "%$item%");
                } else {
                    $places->orWhere('amenities', 'like', "%$item%");
                }
            }
        }

        if ($filter_place_type) {
            foreach ($filter_place_type as $key => $item) {
                if ($key === 0) {
                    $places->where('place_type', 'like', "%$item%");
                } else {
                    $places->orWhere('place_type', 'like', "%$item%");
                }
            }
        }

        if ($filter_country) {
            $places->where('country_id', $filter_country);
        }

        if ($request->ajax == '1') {
            $places = $places->get();

            $country = null;
            if (isset($filter_country)) {
                $country = Country::query()
                    ->whereIn('id', $filter_country)
                    ->first();
            }

            $data = [
                'country' => $country,
                'places' => $places
            ];

            return $this->response->formatResponse(200, $data, 'success');
        }

        $places = $places->paginate();

//        return $places;

        $template = setting('template', '01');

        // SEO Meta
        SEOMeta(setting('app_name'), setting('home_description'));

        return view("frontend.search.search_{$template}", [
            'keyword' => $keyword,
            'places' => $places,
            'categories' => $categories,
            'place_types' => $place_types,
            'amenities' => $amenities,
            'countries' => $countries,
            'filter_category' => $filter_category,
            'filter_amenities' => $filter_amenities,
            'filter_place_type' => $filter_place_type,
            'filter_country' => $request->country,
        ]);
    }

}
