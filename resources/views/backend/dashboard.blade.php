@extends('backend.master')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Account Overview</h4>
                        {!! $chart->container() !!}

                        {!! $chart->script() !!}

                    </div>
                </div>
            </div>
        </div> <!-- container -->
        </div> <!-- container -->

@endsection
