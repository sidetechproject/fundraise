@extends('admin.layouts.template')

@section('main')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Dashboard</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <div class="dashboard-intro">
                        <div class="dashboard-intro__content">
                            <h2>FUNDRAISE.VC</h2>

                            <a class="btn btn-primary" href="{{route('admin_place_create_view')}}">{{ __('Add new startup')  }}</a>
                            <p> </p>
                            <p><strong>Staticts:</strong></p>

                            <p>Startups: {{$count_places}}</p>

                            <p>Users: {{$count_users}}</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@stop
