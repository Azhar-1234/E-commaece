
<div class="col-12">
    <header class="row">
        <!-- Top Nav -->
        <div class="col-12 bg-dark py-2 d-md-block d-none">
            <div class="row">
                <div class="col-auto mr-auto">
                    <ul class="top-nav">
                     @foreach($header as $headers)
                        <li>
                            <a href="tel:{{$headers->mobile}}"><i class="fa fa-phone-square mr-2"></i>{{$headers->mobile}}</a>
                        </li>
                        <li>
                            <a href="mailto:{{$headers->email}}"><i class="fa fa-envelope mr-2"></i>{{$headers->email}}</a>
                        </li>
                     @endforeach
                    </ul>
                </div>
                <div class="col-auto">
                    <ul class="top-nav">
                        @if(Session::get('customer_id') == "")
                        <li>
                            <a href="{{route('user-login')}}"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                        </li>
                        @else
                        <li>
                            <a href="{{route('user-logout')}}"><i class="fas fa-sign-in-alt mr-2"></i>Logout</a>
                            <a href="{{route('order-list')}}"><i class="fas fa-sign-in-alt mr-2"></i>Order List</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- Top Nav -->

        <!-- Header -->
        <div class="col-12 bg-white pt-4">
            <div class="row">
                <div class="col-lg-auto">
                    <div class="site-logo text-center text-lg-left">
                    @foreach($header as $headers)

                        <a href="{{route('/')}}">{{$headers->logo_name}}</a>
                    @endforeach
                    </div>
                </div>
                <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                    <form action="#">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="search" class="form-control border-dark" placeholder="Search..." required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-auto text-center text-lg-left header-item-holder">
                    <a href="{{route('show-cart')}}" class="header-item">
                        <i class="fas fa-shopping-bag mr-2"></i><span id="header-qty" class="mr-3">{{Cart::count()}}</span>
                        <i class="fas fa-money-bill-wave mr-2"></i><span id="header-price">${{Cart::subtotal()}}</span>
                    </a>
                </div>
            </div>

            <!-- Nav -->
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light bg-white col-12">
                    <button class="navbar-toggler d-lg-none border-0" type="button" data-toggle="collapse" data-target="#mainNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mainNav">
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{'/'}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            @foreach($categories as $category)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="electronics" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false">{{$category->name}}</a>
                                <div class="dropdown-menu" aria-labelledby="electronics">
                                    @foreach($category->subcategories as $sub_category)
                                        <a class="dropdown-item" href="{{route('sub-category',$sub_category->slug)}}">
                                            {{$sub_category->name}}</a>
                                    @endforeach
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- Nav -->

        </div>
        <!-- Header -->

    </header>
</div>
