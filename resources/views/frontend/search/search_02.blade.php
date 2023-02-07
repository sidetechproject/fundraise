@extends('frontend.layouts.template_02')
@section('main')
    <main id="main" class="site-main">
        <div class="archive-city container">
            <div class="col-left">
                <div class="archive-filter">
                    <form action="" class="filterForm" id="filterForm">
                        <div class="filter-head">
                            <h2>{{__('Filter')}}</h2>
{{--                            <a href="#" class="clear-filter"><i class="fal fa-sync"></i>Clear all</a>--}}
                            <a href="#" class="close-filter"><i class="las la-times"></i></a>
                        </div>
                        <div class="filter-box">
                            <h3>Countries</h3>
                            <div class="filter-list">
                                <div class="filter-group">
                                    @foreach($countries as $country)
                                        <div class="field-check">
                                            <label class="bc_filter" for="country_{{$country->id}}">
                                                <input type="checkbox" id="country_{{$country->id}}" name="country[]" value="{{$country->id}}" {{isChecked($country->id, $filter_country)}}>
                                                {{$country->name}} 

                                                ({{$country->places_count}})
                                                <span class="checkmark"><i class="la la-check"></i></span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <a href="#" class="more open-more" data-close="Close" data-more="More">More</a>
                            </div>
                        </div>

                        <div class="filter-box">
                            <h3>Categories</h3>
                            <div class="filter-list">
                                <div class="filter-group">
                                    @foreach($categories as $cat)
                                        <div class="field-check">
                                            <label class="bc_filter" for="cat_{{$cat->id}}">
                                                <input type="checkbox" id="cat_{{$cat->id}}" name="category[]" value="{{$cat->id}}" {{isChecked($cat->id, $filter_category)}}>
                                                
                                                {{$cat->name}}

                                                {{-- ({{$cat->places_count}}) --}}

                                                <span class="checkmark"><i class="la la-check"></i></span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <a href="#" class="more open-more" data-close="Close" data-more="More">{{__('More')}}</a>
                            </div>
                        </div>

                        <div class="filter-box">
                            <h3>{{__('Stage')}}</h3>
                            <div class="filter-list">
                                <div class="filter-group">
                                    @foreach($place_types as $place_type)
                                        <div class="field-check">
                                            <label class="bc_filter" for="place_type_{{$place_type->id}}">
                                                <input type="checkbox" id="place_type_{{$place_type->id}}" name="place_type[]" value="{{$place_type->id}}" {{isChecked($place_type->id, $filter_place_type)}}>
                                                
                                                {{$place_type->name}}

                                                {{-- ({{$place_type->places_count}}) --}}

                                                <span class="checkmark"><i class="la la-check"></i></span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <a href="#" class="more open-more" data-close="Close" data-more="More">{{__('More')}}</a>
                            </div>
                        </div>

                        <div class="filter-box hidden">
                            <h3>{{__('Business Model')}}</h3>
                            <div class="filter-list">
                                <div class="filter-group">
                                    @foreach($amenities as $item)
                                        <div class="field-check">
                                            <label class="bc_filter" for="amenities_{{$item->id}}">
                                                <input type="checkbox" id="amenities_{{$item->id}}" name="amenities[]" value="{{$item->id}}" {{isChecked($item->id, $filter_amenities)}}>
                                                {{$item->name}}
                                                <span class="checkmark"><i class="la la-check"></i></span>
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                                <a href="#" class="more open-more" data-close="Close" data-more="More">More</a>
                            </div>
                        </div>
                        <div class="form-button align-center">
                            <input type="hidden" name="keyword" value="{{$keyword}}">
                            <a href="#" class="btn">{{__('Apply')}}</a>
                        </div>
                    </form>
                </div><!-- .archive-fillter -->

                <div class="main-primary">
                    {{-- <div class="filter-mobile">
                        <ul>
                            <li><a class="mb-filter mb-open" href="#filterForm">{{__('Filter')}}</a></li>
                        </ul>
                        <div class="mb-maps"><a class="mb-maps" href="#"><i class="las la-map-marked-alt"></i></a></div>
                    </div> --}}
                    <div class="top-area top-area-filter">
                        <span class="result-count"><span class="count">{{$places->total()}}</span> {{__('results')}}</span>
{{--                        <a href="#" class="clear">Clear filter</a>--}}
                        <div class="select-box">
                        </div><!-- .select-box -->
                            {{-- <div class="show-map">
                                <span>{{__('Maps')}}</span>
                                <a href="#" class="icon-toggle"></a>
                            </div> --}}
                        <!-- .show-map -->
                    </div>

                    <div class="area-places">
                        @if($places->total())
                            @foreach($places as $place)
                                <div class="place-item place-hover layout-02" data-maps="">
                                    <div class="place-inner">
                                        <div class="place-thumb">
                                            <a class="entry-thumb" href="{{route('place_detail', $place->slug)}}">
                                                @if($place->thumb)
                                                    <img src="{{getImageUrl($place->thumb)}}" alt="{{$place->name}}">
                                                @else
                                                    <img src="{{ asset('assets/images/favicon.png') }}" alt="Logo">
                                                @endif
                                            </a>

                                            <a href="#" class="golo-add-to-wishlist btn-add-to-wishlist @if($place->wish_list_count) remove_wishlist active @else @guest open-login @else add_wishlist @endguest @endif" data-id="{{$place->id}}">
                                                <span class="icon-heart">
                                                    <i class="la la-bookmark large"></i>
                                                </span>
                                            </a>

                                            {{-- <a class="entry-category rosy-pink" href="{{route('page_search_listing', ['category[]' => $place['categories'][0]['id']])}}" style="background-color:{{$place['categories'][0]['color_code']}};">
                                                <span>{{$place['categories'][0]['name']}}</span>
                                            </a> --}}
                                        </div>
                                        <div class="entry-detail">
                                            <div class="entry-head">
                                                <div class="place-type list-item">
                                                    @foreach($place['place_types'] as $type)
                                                        <span>{{$type->name}}</span>
                                                    @endforeach
                                                </div>
                                                {{-- <div class="place-city">
                                                    <a href="{{route('page_search_listing', ['city[]' => $place['city']['id']])}}">{{$place['city']['name']}}</a>
                                                </div> --}}
                                            </div>
                                            <h3 class="place-title">
                                                <a href="{{route('place_detail', $place->slug)}}">{{$place->name}}</a>
                                            </h3>

                                            <p class="mb-3">
                                                {{$place->short_description}}
                                            </p>

                                            <div class="entry-head">

                                                @foreach($place['place_types'] as $type)
                                                    <div class="place-type list-item">
                                                        <span>{{$type->name}}</span>
                                                    </div>
                                                @endforeach

                                                @if(isset($place['categories'][0]))
                                                    <div class="place-type list-item">
                                                        <span>{{$place['categories'][0]['name']}}</span>
                                                    </div>
                                                @endif

                                                <div class="place-city">
                                                    <span>{{ $place['stage'] }}</span>
                                                </div>

                                                <div class="place-city">
                                                    <span>{{ $place['address'] }}</span>
                                                </div>

                                                <div class="place-city">
                                                    <span>{{ $place['foundation'] }}</span>
                                                </div>
                                            </div>

                                            {{-- <div class="entry-bottom">
                                                <div class="place-preview hidden">
                                                    <div class="place-rating">
                                                        @if($place->reviews_count)
                                                            <span>{{number_format($place->avgReview, 1)}}</span>
                                                            <i class="la la-star"></i>
                                                        @endif
                                                    </div>
                                                    <span class="count-reviews">({{$place->reviews_count}} {{__('reviews')}})</span>
                                                </div>
                                                <div class="place-price">
                                                    <span>{{PRICE_RANGE[$place['price_range']]}}</span>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="p-3">
                                <p>{{__('Nothing found!')}}</p>
                                <p>{{__("We're sorry but we do not have any listings matching your search, try to change you search settings")}}</p>
                            </div>
                        @endif
                    </div>
                    <div class="pagination">
                        {{$places->render('frontend.common.pagination')}}
                    </div>
                </div><!-- .main-primary -->
            </div><!-- .col-left -->

            {{-- <div class="col-right">
                <div class="filter-head">
                    <h2>{{__('Maps')}}</h2>
                    <a href="#" class="close-maps">{{__('Close')}}</a>
                </div>
                <div class="entry-map">
                    <div id="place-map-filter"></div>
                </div>
            </div> --}}
            <!-- .col-right -->
        </div><!-- .archive-city -->
    </main><!-- .site-main -->
@stop

@push('scripts')
    <script src="{{asset('assets/js/page_business_category.js')}}"></script>
    @if(setting('map_service', 'google_map') === 'google_map')
        <script src="{{asset('assets/js/page_business_category_googlemap.js')}}"></script>
    @else
        <script src="{{asset('assets/js/page_business_category_mapbox.js')}}"></script>
    @endif
@endpush
