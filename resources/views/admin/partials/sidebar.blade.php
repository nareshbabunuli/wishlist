<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link" href="{{ url('/admin') }}">
        <img src="{{ URL::asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="#" class="d-block">{{ ucwords(Auth::guard('admin')->user()->name) }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{route('admin.home')}}"
                       class="nav-link {{ (request()->routeIs('admin.home')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if(Auth::guard('admin')->user()->is_super_admin == 1)
                    <li class="nav-item has-treeview {{ (request()->routeIs('users.*')) ? 'menu-open ' : '' }} ">
                        <a href="#" class="nav-link {{ (request()->routeIs('users.*')) ? 'active ' : '' }} ">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>
                                Customers
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview {{ (request()->routeIs('users.*')) ? 'display ' : '' }}">
                            <li class="nav-item">
                                <a href="{{ route('users.create')}}"
                                   class="nav-link  {{ (request()->routeIs('users.create')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Customers</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users.index')}}"
                                   class="nav-link  {{ (request()->routeIs('users.index')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Customers</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ (request()->routeIs('admin_users.*')) ? 'menu-open ' : '' }} ">
                        <a href="#" class="nav-link {{ (request()->routeIs('admin_users.*')) ? 'active ' : '' }} ">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>
                                Consumers
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview {{ (request()->routeIs('admin_users.*')) ? 'display ' : '' }}">
                            <li class="nav-item">
                                <a href="{{ route('admin_users.create')}}"
                                   class="nav-link  {{ (request()->routeIs('admin_users.create')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Consumer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin_users.index')}}"
                                   class="nav-link  {{ (request()->routeIs('admin_users.index')) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Consumers</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item has-treeview {{ (request()->routeIs('products.*')) ? 'menu-open ' : '' }} ">
                    <a href="#" class="nav-link {{ (request()->routeIs('products.*')) ? 'active ' : '' }} ">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview {{ (request()->routeIs('products.*')) ? 'display ' : '' }}">
                        <li class="nav-item">
                            <a href="{{ route('products.create')}}"
                               class="nav-link  {{ (request()->routeIs('products.create')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.index')}}"
                               class="nav-link  {{ (request()->routeIs('products.index')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Product</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ (request()->routeIs('product_categories.*')) ? 'menu-open ' : '' }} ">
                    <a href="#"
                       class="nav-link {{ (request()->routeIs('product_categories.*')) ? 'active ' : '' }} ">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Product Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview {{ (request()->routeIs('product_categories.*')) ? 'display ' : '' }}">
                        <li class="nav-item">
                            <a href="{{ route('product_categories.create')}}"
                               class="nav-link  {{ (request()->routeIs('product_categories.create')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product_categories.index')}}"
                               class="nav-link  {{ (request()->routeIs('product_categories.index')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Product Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
