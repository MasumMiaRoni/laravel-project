@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card bg-light mb-3" style="margin-top: 50px;">
                    <div class="card-header bg-success text-center"> Deleted Sub Category Data(Total {{ $delete_sub_count }})</div>
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
                                <th scope="col">Sub Category Name</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($subcategories as $key=> $subcategory)

                                <tr>
                                    <th scope="row">{{$subcategories->firstItem() + $key}}</th>
                                    <td>{{$subcategory->subcategory_name ? $subcategory->subcategory_name : 'N/A'}}</td>
                                    <td>{{$subcategory->category_id ?? 'N/A'}}</td>
                                    <td>{{$subcategory->subcategory_name == ''? 'N/A':$subcategory->created_at->diffForHumans().'('.$subcategory->created_at->format('y-m-d').')'}}</td>
                                    <td>
                                        <a href="{{url('/restore-subcategory')}}/{{$subcategory->id}}" class="btn btn-outline-primary">Restore</a>
                                        <a href="{{url('/permanent-deleted-subcategory')}}/{{$subcategory->id}}" class="btn btn-outline-danger">Permanent Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center text-info">
                                    <td colspan="50"><strong>No Data Available</strong></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{$subcategories->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

