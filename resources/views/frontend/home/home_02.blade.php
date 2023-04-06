@php
    $img_home_banner = getImageUrl(setting('home_banner'));
    if (setting('home_banner')) {
        $home_banner = "style=background-image:url({$img_home_banner})";
    } else {
        $home_banner = "style=background-image:url(/assets/images/home-bsn-banner.jpg)";
    }
@endphp

@extends('frontend.layouts.template_02')

@section('main')
    @if(isUserInvestor())
        @include('frontend.investor.home');
    @else
        @include('frontend.startup.home');
    @endif
@stop

@push('scripts')
    <script>
        $('#grid').click(function(){
            $('.place-item').addClass('grid');
        });

        $('#list').click(function(){
            $('.place-item').removeClass('grid');
        });
    </script>
@endpush
