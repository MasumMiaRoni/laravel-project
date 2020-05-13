@extends('backend.master')


@section('content')
    <div class="container">

        <div class="container-fluid">


            <div class="col-md-10 offset-1">
                <div class="card-box">
                    <h4 class="header-title mb-4">Add Sub Category</h4>
                    <form action="{{ url('/add-subcategory-post') }}" class="form-horizontal" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="subcategory_name" class="col-sm-3 col-form-label">Add Sub Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="subcategory_name" class="form-control" id="subcategory_name"
                                       placeholder=" Sub Category Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-control" id="category_id">
                                    <option value="">Select One</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
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


