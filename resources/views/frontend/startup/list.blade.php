<div class="place-item place-hover layout-02 {{ !$startup->featured ? '' : 'featured'}}" data-maps="">
    <div class="place-inner">
        <div class="place-thumb">
            <a class="entry-thumb" href="{{route('place_detail', $startup->id)}}">
                @if($startup->thumb && hasAccessToSeeStartup($startup) )
                    <img src="{{getImageUrl($startup->thumb)}}" alt="{{$startup->name}}">
                @else
                    <img src="{{ asset('assets/images/favicon.png') }}" alt="Logo">
                @endif
            </a>

            {{-- <a class="entry-category rosy-pink" href="{{route('page_search_listing', ['category[]' => $startup['categories'][0]['id']])}}" style="background-color:{{$startup['categories'][0]['color_code']}};">
                <span>{{$startup['categories'][0]['name']}}</span>
            </a> --}}
        </div>

        <div class="entry-detail">
            {{-- <div class="entry-head"> --}}
                {{-- <div class="place-type list-item">
                    @foreach($startup['place_types'] as $type)
                        <span>{{$type->name}}</span>
                    @endforeach
                </div> --}}
                {{-- <div class="place-city">
                    <a href="{{route('page_search_listing', ['city[]' => $startup['city']['id']])}}">{{$startup['city']['name']}}</a>
                </div> --}}
            {{-- </div> --}}

           <div class="desc">
                <h3 class="place-title">
                    @if(hasAccessToSeeStartup($startup))
                        <a href="{{route('place_detail', $startup->id)}}">{{$startup->name}}</a>
                    @else
                        <a href="{{route('place_detail', $startup->id)}}">
                            {{-- {{$startup['categories'][0]['name']}} raising {{ $startup->stage }} --}}
                            {{$startup->name}} raising {{ $startup->stage }}
                        </a>
                    @endif

                    @if($startup->featured)
                        <svg class="star" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" >
                            <path d="M11.143 5.143A4.29 4.29 0 0 1 6.857.857a.857.857 0 0 0-1.714 0A4.29 4.29 0 0 1 .857 5.143a.857.857 0 0 0 0 1.714 4.29 4.29 0 0 1 4.286 4.286.857.857 0 0 0 1.714 0 4.29 4.29 0 0 1 4.286-4.286.857.857 0 0 0 0-1.714Z"></path>
                        </svg>
                    @endif

                    {!! $startup->verified ? '<span class="badge badge-verified ml-2">Verified</span>' : '' !!}

                </h3>

                <p class="place-desc">
                    @if(hasAccessToSeeStartup($startup))
                        @php
                            $out = strlen($startup->short_description) > 140 ? substr($startup->short_description, 0, 140)."..." : $startup->short_description;
                            echo $out;
                        @endphp
                    @else
                        Startup from <span>{{ $startup['address'] }}</span> funded in {{ $startup['foundation'] }}
                    @endif
                </p>

                <div class="entry-head">
                    @foreach($startup['place_types'] as $type)
                        <div class="place-type list-item">
                            <span>{{$type->name}}</span>
                        </div>
                    @endforeach

                    @if(isset($startup['categories'][0]))
                        <div class="place-type list-item">
                            <span>{{$startup['categories'][0]['name']}}</span>
                        </div>
                    @endif

                    <div class="place-city">
                        <span>{{ $startup['stage'] }}</span>
                    </div>

                    <div class="place-city">
                        <span>{{ $startup['address'] }}</span>
                    </div>

                    <div class="place-city">
                        <span>{{ $startup['foundation'] }}</span>
                    </div>
                </div>
           </div>

            {{-- <div class="fav">
                <a href="#" class="golo-add-to-wishlist btn-add-to-wishlist @if($startup->wish_list_count) remove_wishlist active @else @guest open-login @else add_wishlist @endguest @endif" data-id="{{$startup->id}}">
                    <span class="icon-heart">
                        <i class="la la-bookmark large"></i>
                    </span>
                </a>
            </div> --}}
        </div>
    </div>
</div>
