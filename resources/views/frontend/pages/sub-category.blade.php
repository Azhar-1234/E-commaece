@extends('frontend.master')
@section('mainContent')
<div class="col-12">
    <!-- Main Content -->
    <main class="row">

        <!-- Category Products -->
        <div class="col-12">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-12 text-center text-uppercase">
                            <h2>{{$sub_category->name}}</h2>
                        </div>
                    </div>
                    <div class="row">                  
                        <!-- Product -->
                        @foreach($products as $product)
                        <div class="col-xl-2 col-lg-3 col-sm-6 my-3">
                            <div class="col-12 bg-white text-center h-100 product-item">
                                <div class="row h-100">
                                    <div class="col-12 p-0 mb-3">
                                        <a href="{{route('product-detail',$product->slug)}}">
                                            <img src="{{asset(data_get($product->images,0))}}" class="img-fluid">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Category Products -->

        
        

    </main>
    <!-- Main Content -->
</div>
@endsection
