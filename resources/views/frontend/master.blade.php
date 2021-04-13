<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce Template</title>
    <link href="//fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
</head>
<body>
    <div class="container-fluid">

        <div class="row min-vh-100">
            @include('frontend.layouts.header')
            <div class="col-12">
                <!-- Main Content -->
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <span class="text-success">{{ $message }}</span>
                    </div>
                    
                    <div class="card-body card-block">
                        @elseif ($message = Session::get('danger'))
                            <span class="text-danger">{{ $message }}</span>
                    </div>
                        @endif
                @yield('mainContent')
                <!-- Main Content -->
            </div>
            @include('frontend.layouts.footer')
        </div>

    </div>


    <script type="text/javascript" src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/script.js')}}"></script>
    @yield('script')
    
</body>
</html>