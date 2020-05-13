@extends('backend.master')


@section('content')
    <div class="container">

        <div class="container-fluid">


            <div class="col-md-10 offset-1">
                <div class="card-box">
                    <h4 class="header-title mb-4">Add Category</h4>
                    <form action="{{ url('/add-category-post') }}" class="form-horizontal" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="category_name" class="form-control" id="name"
                                       placeholder="Category Name">
                            </div>
                        </div>
                        <div class="form-group row mb-0 justify-content-end row">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>

    </div>





@endsection


