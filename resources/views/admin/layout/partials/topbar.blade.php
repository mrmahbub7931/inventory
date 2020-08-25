<!-- Top Bar Start -->
<div class="topbar">
    <div class="topbar-main">
        <div class="container-fluid">
            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo">
                    <span>
                    <img src="{{ asset('assets/backend/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                    <img src="{{ asset('assets/backend/images/logo.png') }}" alt="logo-large" class="logo-lg">
                    </span>
                </a>
            </div>

            <!-- Navbar -->
            <nav class="navbar-custom">

                <!-- Search input -->
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <input class="search-input" type="search" placeholder="Search here.." />
                        <a href="javascript:void(0);" class="close-search search-btn" data-target="#search-wrap">
                            <i class="mdi mdi-close-circle"></i>
                        </a>
                    </div>
                </div>
    
                <ul class="list-unstyled topbar-nav float-right mb-0">   
                    <li>
                        <a class="nav-link waves-effect waves-light search-btn" href="javascript:void(0);" data-target="#search-wrap">
                            <i class="mdi mdi-magnify nav-icon"></i>
                        </a>
                    </li>                 
                    <li class="hidden-sm">
                        <a class="nav-link waves-effect waves-light" href="javascript:void(0);" id="btn-fullscreen">
                            <i class="mdi mdi-fullscreen nav-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('assets/backend/images/users/user-1.jpg') }}" alt="profile-user" class="rounded-circle" /> 
                            <span class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="dripicons-user text-muted mr-2"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="dripicons-exit text-muted mr-2"></i> <span>{{ __('Logout') }}</span></a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link" id="mobileToggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>    
                </ul>
    
                

            </nav>
            <!-- end navbar-->
        </div>
    </div>
    

    <!-- MENU Start -->
    <div class="navbar-custom-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    @if(Request::is( 'admin*' ))
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="mdi mdi-view-dashboard"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-account-multiple"></i>Employee</a>
                        <ul class="submenu">
                            <li><a href=" {{ route('admin.employee.index') }} ">List Employees</a></li>
                            <li><a href=" {{ route('admin.employee.create') }} ">New Employee</a></li>
                        </ul>
                    </li>
                    
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-account-multiple"></i>Customers</a>
                        <ul class="submenu">
                            <li><a href=" {{ route('admin.customers.index') }} ">List Customers</a></li>
                            <li><a href=" {{ route('admin.customers.create') }} ">New Customer</a></li>
                        </ul>
                    </li>
                    
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-account-multiple"></i>Suppliers</a>
                        <ul class="submenu">
                            <li><a href=" {{ route('admin.suppliers.index') }} ">List Suppliers</a></li>
                            <li><a href=" {{ route('admin.suppliers.create') }} ">New Supplier</a></li>
                        </ul>
                    </li>

                    @endif
                    {{-- <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-book-open-page-variant"></i>Pages</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="page-tour.html">Tour</a></li>
                                    <li><a href="page-timeline.html">Timeline</a></li>
                                    <li><a href="page-invoice.html">Invoice</a></li>
                                    <li><a href="page-treeview.html">Treeview</a></li>
                                    <li><a href="page-profile.html">Profile</a></li>                                            
                                    <li><a href="page-pricing.html">Pricing</a></li>
                                    <li><a href="page-faq.html">FAQs</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><a href="page-starter.html">Starter Page</a></li>
                                    <li><a href="auth-login.html">Login</a></li>
                                    <li><a href="auth-register.html">Register</a></li>
                                    <li><a href="auth-recoverpw.html">Recover Password</a></li>
                                    <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                                    <li><a href="auth-404.html">Error 404</a></li>
                                    <li><a href="auth-500.html">Error 500</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
                <!-- End navigation menu -->
            </div> <!-- end navigation -->
        </div> <!-- end container-fluid -->
    </div> <!-- end navbar-custom -->
</div>
<!-- Top Bar End -->