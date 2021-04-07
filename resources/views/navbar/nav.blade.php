<!-- Start Navigation -->
<div class="header header-light">
    <div class="container-fluid">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="#">
                    <img src="{{asset('img/logo.png')}}" class="logo" alt="" />
                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">

                    <li class="active">
                        <a href="{{ route('home') }}">Home<span class="submenu-indicator"></span></a>
                    </li>

                    <li>
                        <a href="#">Offerte<span class="submenu-indicator"></span></a>
                    </li>

                    <li>
                        <a href="#">Candidati<span class="submenu-indicator"></span></a>
                    </li>

                    <li>
                        <a href="#">Aziende<span class="submenu-indicator"></span></a>
                    </li>

                    <li>
                        <a href="#">Blog<span class="submenu-indicator"></span></a>
                    </li>

                    <!--<li><a href="#">Pages<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
                            <li><a href="blog.html">Blogs Page</a></li>
                            <li><a href="blog-detail.html">Blog Detail</a></li>
                            <li><a href="shortcodes.html">Shortcodes</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="employers-full-width.html">Find Employers</a></li>
                            <li><a href="all-jobs.html">Jobs Widgets</a></li>
                            <li><a href="login.html">LogIn</a></li>
                        </ul>
                    </li>-->

                    <!-- <li><a href="contact.html">Contatti</a></li> -->

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">

                    <li class="add-listing theme-bg mb-3 display-mob">
                        <a href="#">
                            <i class="ti-plus"></i> Nuova Offerta
                        </a>
                    </li>

                    @guest
                        @if (Route::has('login') && Route::has('register'))
                            <li>
                                <a href="{{ route('login') }}">
                                    <i class="ti-user mr-1"></i><span class="dn-lg">Login/Registrati</span>
                                </a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="#">
                                <i class="ti-user mr-1"></i>{{ Auth::user()->name }}<span class="submenu-indicator"></span>
                            </a>
                            <ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
                                <li><a href="blog.html">Profilo</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest

                    <li class="add-listing theme-bg display-desk">
                        <a href="#">
                            <i class="ti-plus"></i> Nuova Offerta
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>