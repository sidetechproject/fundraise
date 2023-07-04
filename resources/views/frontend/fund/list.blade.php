@extends('frontend.layouts.template')
@section('main')
    <main id="main" class="site-main">
        <div class="site-content">
            <div class="member-menu">
                <div class="container">
                    @include('frontend.user.user_menu')
                </div>
            </div>
            <div class="container">
                <div class="member-wishlist-wrap">
                    <h1>{{__('My Funds')}}</h1>
                    <div class="mw-box">
                        <div class="mw-grid golo-grid grid-4 ">
                            @foreach($funds as $place)
                                <div class="grid-item">
                                    @include('frontend.fund.item')
                                </div>
                            @endforeach
                        </div>
                    </div><!-- .mw-box -->
                </div><!-- .member-wrap -->
            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->
@stop
