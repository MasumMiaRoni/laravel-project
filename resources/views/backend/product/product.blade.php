@extends('backend.master')


@section('content')
    <div class="container">

        <div class="container-fluid">


            <div class="col-md-10 offset-1">
                <div class="card-box">
                    <h4 class="header-title mb-4">Add Product</h4>
                    <form action="{{ url('/add-product-post') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="product_name" class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="product_name" class="form-control" id="product_name"
                                       placeholder=" Enter Product Name">
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

                        <div class="form-group row">
                            <label for="subcategory_id" class="col-sm-3 col-form-label">Sub Category Name</label>
                            <div class="col-sm-9">
                                <select name="subcategory_id" class="form-control" id="subcategory_id">
                                    <option value="">Select One</option>
                                    @foreach($subcategory as $scat)
                                        <option value="{{ $scat->id }}">{{ $scat->subcategory_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_summary" class="col-sm-3 col-form-label">Product Summary</label>
                            <div class="col-sm-9">
                                <textarea name="product_summary" id="product_summary" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_description" class="col-sm-3 col-form-label">Product Description </label>
                            <div class="col-sm-9">
                                <textarea name="product_description" id="product_description" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_price" class="col-sm-3 col-form-label">Product Price </label>
                            <div class="col-sm-9">
                                <input type="text" name="product_price" class="form-control" id="product_price"
                                       placeholder="Ex: 50">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_quantity" class="col-sm-3 col-form-label">Product Quantity</label>
                            <div class="col-sm-9">
                                <input type="text" name="product_quantity" class="form-control" id="product_quantity"
                                       placeholder=" Ex: 10">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_thumbnail" class="col-sm-3 col-form-label">Product Thumbnail</label>
                            <div class="col-sm-9">
                                <input type="file" name="product_thumbnail" class="form-control" id="product_thumbnail" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_thumbnail" class="col-sm-3 col-form-label">Product Preview</label>
                            <div class="col-sm-9">
                                <img id="blah" alt="your image" width="150" height="150" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_thumbnail" class="col-sm-3 col-form-label">Image Gallery</label>
                            <div class="col-sm-9">
                                <input type="file" multiple name="product_gallery[]" class="form-control" id="product_thumbnail" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
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


