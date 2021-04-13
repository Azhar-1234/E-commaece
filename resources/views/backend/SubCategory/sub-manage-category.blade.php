@extends('backend.master')
@section('mainContent')
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Manage Sub Category</strong> 
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <span class="text-success">{{ $message }}</span>
                    </div>
                    
                    <div class="card-body card-block">
                        @elseif ($message = Session::get('danger'))
                            <span class="text-danger">{{ $message }}</span>
                    </div>
                        @endif
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subCategories as $key => $subCategory)
                                    <tr>
                                        <td class="serial">{{++$key}}</td>
                                        <td> <span class="name">{{$subCategory->name}}</span> </td>
                                        <td> <span class="name">{{$subCategory->slug}}</span> </td>
                                        <td> <span class="name">{{$subCategory->category->name}}</span> </td>
                                        <td>
                                            <a href="{{route('sub-edit-category',[$subCategory->id])}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('sub-delete-category',[$subCategory->id])}}" onclick="return confirm('are you sure?')"
                                             class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>    <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection