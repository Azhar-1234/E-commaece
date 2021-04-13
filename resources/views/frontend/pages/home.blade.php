@extends('frontend.master')
@section('mainContent')

<main class="row">

         
         
    <div class="col-12 px-0">
        <div id="slider" class="carousel slide w-100" data-ride="carousel">
            <ol class="carousel-indicators">
            @foreach(App\Models\BackEnd\Slider::get() as $key=> $img)
                <li data-target="#slider" data-slide-to="{{$key}}" class="{{(@$key==0)?'active':''}}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
            @foreach(App\Models\BackEnd\Slider::get() as $key=> $img)
                <div class="carousel-item {{(@$key==0)?'active':''}}">
                    <img src="{{(@$img->image)?url('uploads/slider/'.$img->image):''}}" class="slider-img">
                </div>
               @endforeach
                
            </div>

                <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    </div>
    <!-- Featured Products -->
    <div class="col-12">
        <div class="row">
            <div class="col-12 py-3">
                <div class="row">
                    <div class="col-12 text-center text-uppercase">
                        <h2>Featured Products</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($featured_products as $product)
                    <!-- Product -->
                    <div class="col-xl-2 col-lg-3 col-sm-6 my-3">
                        <div class="col-12 bg-white text-center h-100 product-item">
                            <div class="row h-100">
                                <div class="col-12 p-0 mb-3">
                                    <a href="{{route('product-detail',$product->slug)}}">
                                        <img src="{{asset(data_get($product->images,0))}}" class="img-fluid" size="40%">
                                    </a>
                                </div>
                                <div class="col-12 mb-3">
                                    <a href="{{route('product-detail',$product->slug)}}" class="product-name">{{$product->name}}</a>
                                </div>
                                <div class="col-12 mb-3">
                                    <span class="product-price">
                                        ${{$product->price}}
                                    </span>
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
    <!-- Featured Products -->

    <div class="col-12">
        <hr>
    </div>

    <!-- Latest Product -->
    <div class="col-12">
        <div class="row">
            <div class="col-12 py-3">
                <div class="row">
                    <div class="col-12 text-center text-uppercase">
                        <h2>Latest Products</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($latest_products as $latest_product)
                    <!-- Product -->
                    <div class="col-xl-2 col-lg-3 col-sm-6 my-3">
                        <div class="col-12 bg-white text-center h-100 product-item">
                            <span class="new">New</span>
                            <div class="row h-100">
                                <div class="col-12 p-0 mb-3">
                                    <a href="{{route('product-detail',$latest_product->slug)}}">
                                        <img src="{{asset(data_get($latest_product->images,0))}}" class="img-fluid" height="40%" >
                                    </a>
                                </div>
                                <div class="col-12 mb-3">
                                    <a href="product.html" class="product-name">{{$latest_product->name}}</a>
                                </div>
                                <div class="col-12 mb-3">
                                    <span class="product-price">
                                        ${{$latest_product->price}}
                                    </span>
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
    <!-- Latest Products -->

    <div class="col-12">
        <hr>
    </div>


    <div class="col-12 py-3 bg-light d-sm-block d-none">
        <div class="row">
            <div class="col-lg-3 col ml-auto large-holder">
                <div class="row">
                    <div class="col-auto ml-auto large-icon">
                        <i class="fas fa-money-bill"></i>
                    </div>
                    <div class="col-auto mr-auto large-text">
                        Best Price
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col large-holder">
                <div class="row">
                    <div class="col-auto ml-auto large-icon">
                        <i class="fas fa-truck-moving"></i>
                    </div>
                    <div class="col-auto mr-auto large-text">
                        Fast Delivery
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col mr-auto large-holder">
                <div class="row">
                    <div class="col-auto ml-auto large-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="col-auto mr-auto large-text">
                        Genuine Products
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection