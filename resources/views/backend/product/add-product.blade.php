@extends('backend.master')
@section('mainContent')

<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Product</strong> 
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
                    <form action="{{route('store-product')}}" method="post" class="" enctype="multipart/form-data">
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
                                <label for="sub_category" class=" form-control-label">Sub Catgeory</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option value="">Please Sub Catgeory</option>
                                        @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('sub_category')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                                    
                            </div>

                            <div class="form-group">
                                <label for="nf-password" class=" form-control-label">Feature Drescription</label>
                                <textarea id="feature_description" name="feature_description" 
                                    placeholder="Enter feature description.." class="form-control"> </textarea>
                                @error('feature_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-password" class=" form-control-label">Drescription</label>
                                <textarea  id="description" name="description" 
                                    placeholder="Enter feature description.." class="form-control"> </textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-quantity" class=" form-control-label">Quantity</label>
                                <input type="number" id="nf-quantity" name="quantity" placeholder="Enter quantity.." class="form-control">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-price" class=" form-control-label">Price</label>
                                <input type="number" id="nf-price" name="price" placeholder="Enter price.." class="form-control">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-images" class=" form-control-label">Images</label>
                                <input multiple type="file" id="nf-images" name="images[]" class="form-control">
                                @error('image')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Select" class=" form-control-label">Select Status</label>
                                <select name="status" id="select" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Select" class=" form-control-label">Is Featured Product</label>
                                <select name="featured_product" id="featured_product" class="form-control">
                                    <option value="1">Featured Active</option>
                                    <option value="0">Featured Inactive</option>
                                </select>
                                @error('featured_product')
                                    <span class="text-danger">{{ $message }}</span>
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
@section('script')
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('feature_description');
</script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection()