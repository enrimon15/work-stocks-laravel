<?php
use TCG\Voyager\Models\Menu;
?>
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

                    <!-- Menu recuperato da voyager e poi renderizzato tramite menu.blade.php -->
                    <?=Menu::display('MainMenu', '/navbar/menu')?>

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
                            <i class="ti-plus"></i> {{__('nav.newOffer')}}
                        </a>
                    </li>

                    @guest
                        @if (Route::has('login') && Route::has('register'))
                            <li>
                                <a href="{{ route('login') }}">
                                    <i class="ti-user mr-1"></i><span class="dn-lg">{{__('loginAndRegister.accountActions')}}</span>
                                </a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="#">
                                <i class="ti-user mr-1"></i>{{ Auth::user()->hasRole('company') ? Auth::user()->company->name : Auth::user()->name }}<span class="submenu-indicator"></span>
                            </a>
                            <ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
                                @if(Auth::user()->isAdmin())
                                    <li><a href="{{route('voyager.dashboard')}}">{{__('nav.dashboard')}}</a></li>
                                @else
                                    <li><a href="{{route('dashboard')}}">{{__('nav.profile')}}</a></li>
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('nav.logout') }}
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
                            <i class="ti-plus"></i> {{__('nav.newOffer')}}
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>
