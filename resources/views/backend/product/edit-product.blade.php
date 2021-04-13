@extends('backend.master')
@section('mainContent')

<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Category</strong> 
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
                    <form action="{{route('update-product')}}" method="post" class="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                         <div class="card-body">
                            <div class="form-group">
                                <label for="nf-email" class=" form-control-label">Name</label>
                                <input type="name" id="nf-email" name="name" placeholder="Enter name.." class="form-control"
                                 value="{{$product->name}}">
                                @error('name')
                                     <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-email" class=" form-control-label">Slug</label>
                                <input type="name" id="nf-email" name="slug" placeholder="Enter name.." class="form-control"
                                 value="{{$product->slug}}">
                                @error('name')
                                     <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-images" class=" form-control-label">Images(<span>If you upload then remove previous all images.</span>)</label>
                                <input multiple type="file" id="nf-images" name="images[]" class="form-control">
                                @error('image')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-password" class=" form-control-label">quantity</label>
                                <input type="number" id="nf-password" name="quantity" placeholder="Enter slug.."
                                 value="{{$product->quantity}}" class="form-control">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-password" class=" form-control-label">price</label>
                                <input type="number" id="nf-price" name="price" placeholder="Enter slug.."
                                 value="{{$product->price}}" class="form-control">
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="select" class=" form-control-label">Subcategory</label>
                                <select name="sub_category" id="sub_category" class="form-control">
                                    <option value="">Please select</option>
                                    @foreach ($sub_categories as $sub_category)
                                    <option value="{{$sub_category->id}}" {{$product->sub_category_id == 
                                    $sub_category->id? 'selected':''}}>{{$sub_category->name}}</option>
                                    @endforeach
                                </select>
                                @error('sub_category')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nf-password" class="form-control-label">Features description</label>
                                <textarea id="feature_description" id="feature_description" name="feature_description" 
                                    placeholder="Enter feature description.." class="form-control feature_description">{{$product->feature_description}} </textarea>
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-password" class=" form-control-label">Description</label>
                                <textarea  name="description" 
                                    placeholder="Enter feature description.." class="form-control description" id="description">{{$product->description}} </textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-password" class=" form-control-label">select status</label>
                                <select name="status" id="select" class="form-control">
                                    <option value="1"{{$product->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$product->status == 0 ? 'selected' : ''}}>InActive</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nf-password" class=" form-control-label">is Featured Product?</label>
                                <select name="featured_product" id="featured_product" class="form-control">
                                    <option value="1"{{$product->featured_product == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$product->featured_product == 0 ? 'selected' : ''}}>InActive</option>
                                </select>
                                @error('sub_category')
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
@endsection;