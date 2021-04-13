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
                        <strong>Add Sub Category</strong> 
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
                    <form action="{{route('sub-store-category')}}" method="post" class="">
                        @csrf
                         <div class="card-body">
                            <div class="form-group">
                                <label for="nf-email" class=" form-control-label">Name</label>
                                <input type="name" id="nf-email" name="name" placeholder="Enter name.." class="form-control">
                                @error('name')
                                     <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-password" class=" form-control-label">Slug</label>
                                <input type="slug" id="nf-password" name="slug" placeholder="Enter slug.." class="form-control">
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="select" class=" form-control-label">Category</label>
                                <select name="category" id="select" class="form-control">
                                    <option value="0">Please select</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                         </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection