@extends('frontend.layouts.template_02')

<style>
    .archive-filter {
        background-color: rgb(249 250 251 / 1);
        border-color: rgb(229 231 235 / 1);
        padding: 1.25rem;
        border-width: 1px;
        border-radius: 0.75rem;
        border-style: solid;
    }
    .filter-box .field-check label {
        color: rgb(75 85 99 / 1);
        font-size: 14px;
    }
    .filter-box .field-check label:before {
        border-radius: 0.125rem;
        border-width: 2px;
        color: rgb(99 102 241 / 1);
        border-color: rgb(209 213 219 / 1);
        background-color: rgb(255 255 255 / 1);
    }
    .filter-box .more {
        font-weight: 300 !important;
    }
    .area-places .place-item {
        border-color: rgb(229 231 235 / 1);
        border-bottom-width: 1px;
        border-bottom-style: solid;
        padding-bottom: 20px !important;
        margin-bottom: 20px !important;
    }
</style>

@section('main')
    <main id="main" class="site-main">
        <div class="site-banner">
            <div class="container ">
                <div class="site-banner__content">

                    <div class="box-fund">
                        <div class="" style="width: 100px;height: 100px; float: left;position: relative;display: block;">
                            <img src="{{getImageUrl($fund->thumb)}}" alt="{{$fund->name}}">
                        </div>

                        {{-- <div style="display: flex;justify-content: space-between;align-items: center;flex-grow: 1;float: left;"> --}}
                        <div style="">
                            <h1 class="site-banner__title">
                                {{$fund->name}}
                            </h1>

                            <p>
                                {{$fund->description}}
                            </p>
                        </div>
                    </div>

                    {{-- <p>
                        <i>{{$city_count}}</i> {{__('cities')}}, <i>{{$category_count}}</i> {{__('categories')}}, <i>{{$place_count}}</i> {{__('places')}}.
                    </p> --}}

                    {{-- <form action="{{route('page_search_listing')}}" class="site-banner__search layout-02">
                        <div class="field-input">
                            <label for="input_search">{{__('Find')}}</label>
                            <input class="site-banner__search__input open-suggestion" id="input_search" type="text" placeholder="{{__('Ex: fastfood, beer')}}" autocomplete="off">
                            <input type="hidden" name="category[]" id="category_id">
                            <div class="search-suggestions category-suggestion">
                                <ul>
                                    <li><a href="#"><span>{{__('Loading...')}}</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="field-input">
                            <label for="location_search">{{__('Where')}}</label>
                            <input class="site-banner__search__input open-suggestion" id="location_search" type="text" placeholder="{{__('Your city')}}" autocomplete="off">
                            <input type="hidden" id="city_id">
                            <div class="search-suggestions location-suggestion">
                                <ul>
                                    <li><a href="#"><span>{{__('Loading...')}}</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="field-submit">
                            <button><i class="las la-search la-24-black"></i></button>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
        <!-- .site-banner -->

        <div class="archive-city container">
            <div class="col-left">
                <div class="main-primary">
                    {{-- <div class="filter-mobile">
                        <ul>
                            <li><a class="mb-filter mb-open" href="#filterForm">{{__('Filter')}}</a></li>
                        </ul>
                        <div class="mb-maps"><a class="mb-maps" href="#"><i class="las la-map-marked-alt"></i></a></div>
                    </div> --}}
                    {{-- <div class="top-area top-area-filter"> --}}
                        {{-- <span class="result-count"><span class="count">{{$places->total()}}</span> {{__('results')}}</span> --}}
                        {{--<a href="#" class="clear">Clear filter</a>--}}
                        {{-- <div class="select-box">
                        </div> --}}
                        <!-- .select-box -->
                            {{-- <div class="show-map">
                                <span>{{__('Maps')}}</span>
                                <a href="#" class="icon-toggle"></a>
                            </div> --}}
                        <!-- .show-map -->
                    {{-- </div> --}}

                    <div class="area-places">
                        @if($places->total())
                            @foreach($places as $startup)
                                @include('frontend.startup.list', ['startup' => $startup])
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

                <div data-sticky="" data-margin-top="32" data-sticky-for="400" data-sticky-wrap="">
                    <div class="archive-filter">
                        <form action="" class="filterForm" id="filterForm">
                            <div class="filter-head">
                                <h2>{{__('Filter')}}</h2>
                                {{-- <a href="#" class="clear-filter"><i class="fal fa-sync"></i>Clear all</a>--}}
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
                </div> <!-- .sticky -->
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
    <script src="{{asset('assets/js/sticky.min.js')}}"></script>

    <script src="{{asset('assets/js/page_business_category.js')}}"></script>

    @if(setting('map_service', 'google_map') === 'google_map')
        <script src="{{asset('assets/js/page_business_category_googlemap.js')}}"></script>
    @else
        <script src="{{asset('assets/js/page_business_category_mapbox.js')}}"></script>
    @endif

    <script>
        const stickyEls = document.querySelectorAll('[data-sticky]');
        if (stickyEls.length > 0) {
            const sticky = new Sticky('[data-sticky]');
        }
    </script>
@endpush
