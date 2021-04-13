@extends('frontend.master')
@section('mainContent')

<main class="row">
    <div class="col-12 bg-white py-3 my-3">
        <div class="row">

            <!-- Product Images -->
            <div class="col-lg-5 col-md-12 mb-3">
                <div class="col-12 mb-3">
                    <div class="img-large border" style="background-image: url('{{asset(data_get($product->images,0))}}')"></div>
                </div>
                <div class="col-12">
                    <div class="row">
                        @foreach($product->images as $image)
                        <div class="col-sm-2 col-3">
                            <div class="img-small border" style="background-image: url('{{asset($image)}}')" 
                                data-src="{{asset($image)}}"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Product Images -->

            <!-- Product Info -->
            <div class="col-lg-5 col-md-9">
                <div class="col-12 product-name large">
                   {{$product->name}}
                </div>
                <div class="col-12 px-0">
                    <hr>
                </div>
                <div class="col-12">
                    <ul>
                        <li>{!! $product->feature_description !!}</li>
                    </ul>
                </div>
            </div>
            <!-- Product Info -->

            <!-- Sidebar -->
            <div class="col-lg-2 col-md-3 text-center">
                <div class="col-12 border-left border-top sidebar h-100">
                
                    <div class="row">
                        <div class="col-12">
                        <span class="detail-price">
                            ${{$product->price}}
                        </span>
                        </div>
                        <form action="{{route('add-to-cart')}}" method="post">
                             @csrf
                             <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="col-xl-5 col-md-9 col-sm-3 col-5 mx-auto mt-3">
                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="number" name="quantity" id="qty" min="1" value="1" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn btn-outline-dark" type="submit"><i class="fas fa-cart-plus mr-2"></i>Add to cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->

        </div>
    </div>

    <div class="col-12 mb-3 py-3 bg-white text-justify">
        <div class="row">

            <!-- Details -->
            <div class="col-md-7">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 text-uppercase">
                            <h2><u>Details</u></h2>
                        </div>
                        <div class="col-12" id="details">
                            {!!$product->description!!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Details -->

            <!-- Ratings & Reviews -->
            <!-- Ratings & Reviews -->

        </div>
    </div>

    <!-- Similar Product -->
    <div class="col-12">
        <div class="row">
            <div class="col-12 py-3">
                <div class="row">
                    <div class="col-12 text-center text-uppercase">
                        <h2>Similar Products</h2>
                    </div>
                </div>
                <div class="row">
                @foreach($products as $product)
                    <!-- Product -->
                    <div class="col-xl-2 col-lg-3 col-sm-6 my-3">
                        <div class="col-12 bg-white text-center h-100 product-item">
                            <div class="row h-100">
                                <div class="col-12 p-0 mb-3">
                                    <a href="product.html">
                                        <img src="{{asset(data_get($product->images,0))}}" class="img-fluid" height="40%">
                                    </a>
                                </div>
                                <div class="col-12 mb-3">
                                    <a href="{{route('product-detail',$product->slug)}}" class="product-name">{{$product->name}}</a>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="product-price">
                                        ${{$product->price}}
                                    </div>
                                </div>
                                <div class="col-12 mb-3 align-self-end">
                                    <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus mr-2"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product -->
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Similar Products -->

</main>
@endsection