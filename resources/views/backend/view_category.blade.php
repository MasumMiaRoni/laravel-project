@extends('backend.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Account Overview</h4>

                        <div class="col-10 offset-1">
                            <div class="card bg-light mb-3" style="margin-top: 50px;">
                                <div class="card-header bg-success text-center"> Category List</div>
                                <div class="card-body">
                                    @if(session('delete'))
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Oops!</strong> {{session('delete')}}.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <hr>
                                    @endif

                                    @if(session('update'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Oops!</strong> {{session('update')}}.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <hr>
                                    @endif

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Created_at</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($category as $key=> $cat)

                                            <tr>
                                                <th scope="row">{{$category->firstItem() + $key}}</th>
                                                <td>{{$cat->category_name ? $cat->category_name : 'N/A'}}</td>
                                                <td>{{$cat->category_name == ''? 'N/A':$cat->created_at->diffForHumans().'('.$cat->created_at->format('y-m-d').')'}}</td>
                                                <td>
                                                    <a href="{{url('/edit-category')}}/{{$cat->id}}"
                                                       class="btn btn-outline-primary">Edit</a>
                                                    <a href="{{url('/delete-category')}}/{{$cat->id}}"
                                                       class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$category->links()}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

