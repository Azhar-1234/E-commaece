<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-bar-chart"></i>Header</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-line-chart"></i><a href="{{route('add-header')}}">Add Header</a></li>
                        <li><i class="fa fa-line-chart"></i><a href="{{route('manage-header')}}">Manage Header</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-bar-chart"></i>category</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-line-chart"></i><a href="{{route('add-category')}}">Add Category</a></li>
                        <li><i class="fa fa-line-chart"></i><a href="{{route('manage-category')}}">Manage Category</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-bar-chart"></i>Sub category</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-line-chart"></i><a href="{{route('add-sub-category')}}">Add Sub Category</a></li>
                        <li><i class="fa fa-line-chart"></i><a href="{{route('sub-manage-category')}}">Manage Sub Category</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-bar-chart"></i>Product</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-line-chart"></i><a href="{{route('add-product')}}">Add Product</a></li>
                        <li><i class="fa fa-line-chart"></i><a href="{{route('manage-product')}}">Manage Product</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-bar-chart"></i>Slider</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-line-chart"></i><a href="{{route('add-slider')}}">Add slider</a></li>
                        <li><i class="fa fa-line-chart"></i><a href="{{route('manage-slider')}}">Manage slider</a></li>
                    </ul>
                </li>
            </ul> 
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>