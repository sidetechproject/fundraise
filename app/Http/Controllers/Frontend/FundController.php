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
use App\Models\Review;
use App\Models\User;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FundController extends Controller
{
    private $place;
    private $country;
    private $city;
    private $category;
    private $amenities;
    private $response;

    public function __construct(Place $place, Country $country, City $city, Category $category, Amenities $amenities, Response $response)
    {
        $this->place = $place;
        $this->country = $country;
        $this->city = $city;
        $this->category = $category;
        $this->amenities = $amenities;
        $this->response = $response;
    }

    public function detail($slug)
    {
        $place = $this->place->where([
            'slug' => $slug,
            'place_type' => 2
        ])->first();

        if (!$place) abort(404);

        $founder = User::find($place->user_id);

        return view("frontend.fund.detail", [
            'startup' => $place,
            'founder' => $founder,
        ]);
    }

    public function funds()
    {
        $funds = $this->place->where([
            'user_id' => Auth::id()
        ])
        ->where('place_type', 2)
        ->get();

        return view("frontend.fund.list", [
            'funds' => $funds,
        ]);
    }

    public function publicProfile($id)
    {
        $place = $this->place->find($id);

        if (!$place) abort(404);

        $founder = User::find($place->user_id);

        $country = Country::query()
            ->where('id', $place->country_id)
            ->first();

        $amenities = Amenities::query()
            ->whereIn('id', $place->amenities ? $place->amenities : [])
            ->get(['id', 'name', 'icon']);

        $categories = Category::query()
            ->whereIn('id', $place->category ? $place->category : [])
            ->get(['id', 'name', 'slug', 'icon_map_marker']);

        $place_types = PlaceType::query()
            ->whereIn('id', $place->place_type ? $place->place_type : [])
            ->get(['id', 'name']);

        $reviews = Review::query()
            ->with('user')
            ->where('place_id', $place->id)
            ->where('status', Review::STATUS_ACTIVE)
            ->get();
        $review_score_avg = Review::query()
            ->where('place_id', $place->id)
            ->where('status', Review::STATUS_ACTIVE)
            ->avg('score');

        $similar_places = Place::query()
            ->with('place_types')
            ->with('avgReview')
            ->withCount('reviews')
            ->withCount('wishList')
            // ->where('city_id', $city->id)
            ->where('id', '<>', $place->id);
        foreach ($place->category as $cat_id):
            $similar_places->where('category', 'like', "%{$cat_id}%");
        endforeach;
        $similar_places = $similar_places->limit(4)->get();

        // SEO Meta
        $title = $place->seo_title ? $place->seo_title : $place->name;
        $description = $place->seo_description ? $place->seo_description : Str::limit($place->description, 165);
        SEOMeta($title, $description, getImageUrl($place->thumb));

        return view("frontend.startup.detail", [
            'startup' => $place,
            'country' => $country,
            'founder' => $founder,
            'amenities' => $amenities,
            'categories' => $categories,
            'place_types' => $place_types,
            'reviews' => $reviews,
            'review_score_avg' => $review_score_avg,
            'similar_places' => $similar_places
        ]);
    }

    public function pageAddNew(Request $request, $id = null)
    {
        $place = Place::find($id);

        if ($place) abort_if($place->user_id !== Auth::id(), 401);

        $country_id = $place ? $place->country_id : false;

        $countries = $this->country->getFullList();
        $cities = $this->city->getListByCountry($country_id);
        $categories = $this->category->getListAll(Category::TYPE_PLACE);

        $place_types = PlaceType::query()
            ->get();

        $amenities = $this->amenities->getListAll();

        $app_name = setting('app_name', 'Golo.');
        SEOMeta("Add new place - {$app_name}");
        return view('frontend.fund.place_addnew', [
            'place' => $place,
            'countries' => $countries,
            'cities' => $cities,
            'categories' => $categories,
            'place_types' => $place_types,
            'amenities' => $amenities,
        ]);
    }

    public function create(Request $request)
    {
        $request['user_id'] = Auth::id();
        $request['slug'] = getSlug($request, 'name');
        $request['status'] = Place::STATUS_PENDING;

        $rule_factory = RuleFactory::make([
            'user_id' => '',
            'category' => '',
            'place_type' => '',
            '%name%' => '',
            'slug' => '',
            '%description%' => '',
            'email' => '',
            'phone_number' => '',
            'website' => '',
            'video' => '',
            'deck' => '',
            'short_description' => '',
            'link_bookingcom' => '',
            'status' => '',
            'stage' => '',
            'opening_hour' => '',
            'terms' => '',
            'valuation' => '',
            'foundation' => '',
            'raising' => '',
            'thumb' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $data = $this->validate($request, $rule_factory);

        $data['place_type'] = 2;

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumb_file = $this->uploadImage($thumb, '');
            $data['thumb'] = $thumb_file;
        }

        $model = new Place();
        $model->fill($data);

        if ($model->save()) {
            return redirect(route('home'))->with('success', 'Startup created successfully. Awaiting admin review!');
        }

        return $request;
    }

    public function update(Request $request)
    {
        $request['slug'] = getSlug($request, 'name');

        $rule_factory = RuleFactory::make([
            'user_id' => '',
            'category' => '',
            'place_type' => '',
            '%name%' => '',
            'slug' => '',
            '%description%' => '',
            'email' => '',
            'phone_number' => '',
            'website' => '',
            'video' => '',
            'deck' => '',
            'short_description' => '',
            'link_bookingcom' => '',
            'status' => '',
            'stage' => '',
            'opening_hour' => '',
            'terms' => '',
            'valuation' => '',
            'foundation' => '',
            'raising' => '',
            'thumb' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $data = $this->validate($request, $rule_factory);

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumb_file = $this->uploadImage($thumb, '');
            $data['thumb'] = $thumb_file;
        }

        $model = Place::find($request->place_id);
        $model->fill($data);

        if ($model->save()) {
            return redirect(route('user_my_place'))->with('success', 'Update startup success!');
        }

        return $request;
    }

    public function startups(Request $request, $slug)
    {
        $fund = $this->place->where(['slug' => $slug])->first();

        if (!$fund) abort(404);

        $keyword = $request->keyword;
        $filter_category = $request->category;
        $filter_amenities = $request->amenities;
        $filter_place_type = $request->place_type;
        $filter_country = $request->country;

        $categories = Category::query()
            ->where('type', Category::TYPE_PLACE)
            ->get();

        $place_types = PlaceType::query()->get();

        $amenities = Amenities::query()->get();

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
            ->whereTranslationLike('name', "%{$keyword}%")
            ->orderBy('id', 'desc')
            ->where('status', Place::STATUS_ACTIVE)
            ->where('parent_id', $fund->id);

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

        SEOMeta(setting('app_name'), setting('home_description'));

        return view("frontend.fund.startups", [
            'fund' => $fund,
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
