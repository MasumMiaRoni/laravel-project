@extends('backend.dashboard')

@section('content')
{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <title>Bootstrap Example</title>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>--}}
{{--</head>--}}
{{--<body>--}}

<div class="container">
    <div class="container-fluid">

                    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title mb-4">Account Overview</h4>

        <div class="col-10 offset-1">
            <div class="card bg-light mb-3" style="margin-top: 50px;">
                <div class="card-header bg-success text-center">Edit Category </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Oops!</strong> {{session('success')}}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <hr>
                    @endif



                    <form action="{{url('/update-category-post')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $category->id }}" name="category_id">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" value="{{ $category->category_name }}" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="category_name" placeholder="Enter Name" >
                            @error('category_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


        </div>
    </div>
</div>
</div>


@endsection
