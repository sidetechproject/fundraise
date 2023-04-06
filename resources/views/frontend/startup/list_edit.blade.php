<div class="place-item place-hover my-startup layout-02 {{ !$featured ? '' : 'featured'}}" data-maps="">
    <div class="place-inner">
        <div class="place-thumb">
            <a class="entry-thumb" href="{{route('place_detail', $startup->id)}}">
                @if( $startup->thumb )
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
                    <a href="{{route('place_detail', $startup->id)}}">{{$startup->name}}</a>

                    {!! $startup->verified ? '<span class="badge badge-verified ml-2">Verified</span>' : '' !!}
                </h3>

                <p class="place-desc">
                    @php
                        $out = strlen($startup->short_description) > 140 ? substr($startup->short_description, 0, 140)."..." : $startup->short_description;
                        echo $out;
                    @endphp
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

            <div class="fav">
                <span class="golo-add-to-wishlist btn-add-to-wishlist place-action startup-actions">
                    {{-- <a href="{{route('place_detail', $startup->id)}}" class="view mr-3" title="{{__('View')}}">
                        <i class="la la-eye large"></i>
                    </a> --}}
                    {{-- @if($startup->status !== \App\Models\Place::STATUS_DELETE)
                        <a href="{{route('user_my_place_delete')}}" class="delete" title="{{__('Delete')}}" onclick="event.preventDefault(); if (confirm('are you sure?')) {document.getElementById('delete_my_place_form_{{$startup->id}}').submit();}">
                            <i class="la la-trash-alt"></i>
                            <form class="d-none" id="delete_my_place_form_{{$startup->id}}" action="{{route('user_my_place_delete')}}" method="POST">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="place_id" value="{{$startup->id}}">
                            </form>
                        </a>
                    @endif --}}
                </span>
            </div>

            <a class="link share-profile-{{$startup->id}}">
                <i class="las la-share large"></i> Share
            </a>

            <a class="link invite-investor-{{$startup->id}}">
                <i class="las la-envelope large"></i> Invite
            </a>

            @if($startup->status == 2)
                <span class="golo-add-to-wishlist btn-add-to-wishlist mr-4 {{STATUS[$startup->status]}}">
                    <span class="icon-heart large">
                        {{STATUS[$startup->status]}}
                    </span>
                </span>
            @else
                <a href="{{route('place_edit', $startup->id)}}" class="link edit mr-3" title="{{__('Edit')}}">
                    <i class="las la-edit large"></i> Profile
                </a>
            @endif

        </div>
    </div>
</div>

@include('frontend.startup.share', ['startup' => $startup])
@include('frontend.startup.invite_investor', ['startup' => $startup])
