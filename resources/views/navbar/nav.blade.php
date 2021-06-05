<?php
use TCG\Voyager\Models\Menu;
?>
<!-- Start Navigation -->
<div class="header header-light">
    <div class="container-fluid">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{route('home')}}">
                    <img src="{{asset('img/logo.png')}}" class="logo" alt="" />
                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">


                    @if(!Auth::guest())
                        @if(Auth::user()->hasRole('company'))
                            <?=Menu::display('company', '/navbar/menu')?>
                        @elseif(Auth::user()->hasRole('user'))
                            <?=Menu::display('user', '/navbar/menu')?>
                        @elseif(Auth::user()->isAdmin())
                            <?=Menu::display('guest', '/navbar/menu')?>
                        @endif
                    @else
                        <!-- Menu recuperato da voyager e poi renderizzato tramite menu.blade.php -->
                        <?=Menu::display('guest', '/navbar/menu')?>
                    @endif
                    <li>
                        @if(Lang::locale() == 'it')
                            <a href="#">
                                <img src="{{asset('img/flag-it.png')}}" style="height: 22px"/><span class="submenu-indicator"></span>
                            </a>
                            <ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
                                <li>
                                    <a href="{{Request::url() . '?language=en'}}">
                                        <img src="{{asset('img/flag-uk.png')}}" class="mr-2" style="height: 22px">
                                        &nbsp;Inglese
                                    </a>
                                </li>
                            </ul>
                        @elseif(Lang::locale() == 'en')
                            <a href="#">
                                <img src="{{asset('img/flag-uk.png')}}" style="height: 22px"><span class="submenu-indicator"></span>
                            </a>
                            <ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
                                <li>
                                    <a href="{{Request::url() . '?language=it'}}">
                                        <img src="{{asset('img/flag-it.png')}}" class="mr-2" style="height: 22px"/>
                                        &nbsp;Italian
                                    </a>
                                </li>
                            </ul>
                        @endif
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
                        <a href="{{route('postNewJobCompany')}}">
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
                                @elseif(Auth::user()->hasRole('company'))
                                    <li><a href="{{route('dashboardCompany')}}">{{__('nav.profile')}}</a></li>
                                @elseif(Auth::user()->hasRole('user'))
                                    <li><a href="{{route('dashboardUser')}}">{{__('nav.profile')}}</a></li>
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
                        <a href="{{route('postNewJobCompany')}}">
                             <i class="ti-plus"></i> {{__('nav.newOffer')}}
                        </a>
                        <!--<a href="#">
                            <img src="{{asset('img/flag-it.png')}}" style="height: 28px">
                        </a>
                        <a href="#">
                            <img src="{{asset('img/flag-uk.png')}}" style="height: 18px">
                        </a>-->
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>
