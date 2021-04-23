@extends('layouts.outline')

@section('content')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="Loader"></div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <div class="clearfix"></div>


        <!-- ============================ Search Form Start================================== -->
        <section class="p-0 advance-search b-t">
            <div class="container-fluid p-0">

                <form class="search-big-form no-border p-0">
                    <div class="row m-0">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <div class="form-group">
                                <i class="ti-search"></i>
                                <input type="text" class="form-control b-r" placeholder="Job Title or Keywords">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <div class="form-group">
                                <i class="ti-location-pin"></i>
                                <input type="text" class="form-control b-r" placeholder="Location">
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                            <div class="form-group">
                                <i class="ti-briefcase"></i>
                                <input type="text" class="form-control b-r" placeholder="Job Type">
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                            <div class="form-group">
                                <select id="category" class="js-states form-control">
                                    <option value="">&nbsp;</option>
                                    <option value="1">SEO & Web Design</option>
                                    <option value="2">Wealth & Healthcare</option>
                                    <option value="3">Account / Finance</option>
                                    <option value="4">Education</option>
                                    <option value="5">Banking Jobs</option>
                                </select>
                                <i class="ti-layers"></i>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                            <button type="button" class="btn btn-primary full-width">Find Jobs</button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
        <!-- ============================ Search Form End ================================== -->

        <section>
            <div class="container">


                <div class="row">

                    <div class="col-xl-3 col-lg-4">

                        <div class="back-brow">
                            <a href="index.html" class="back-btn"><i class="ti-back-left"></i>Back</a>
                        </div>

                        <div class="d-block d-none d-sm-block d-md-none mb-3">
                            <a href="javascript:void(0)" onclick="openNav()" class="btn btn-info full-width btn-md"><i
                                    class="ti-filter mrg-r-5"></i>Filter Search</a>
                        </div>

                        <div class="sidebar-container d-sm-none d-md-block d-none">

                        @if(!empty($tags))
                            <!-- Experince -->
                                <div class="sidebar-widget">
                                    <div class="form-group">
                                        <h5 class="mb-2">{{__('jobs/filters.skillsTitle')}}</h5>
                                        <div class="side-imbo">
                                            <ul class="no-ul-list">

                                                @foreach($tags as $tag)
                                                    <li>
                                                        <input id="checkbox-ep1" class="checkbox-custom"
                                                               name="checkbox-skill{{$loop->iteration}}"
                                                               type="checkbox">
                                                        <label for="checkbox-ep1"
                                                               class="checkbox-custom-label">{{$tag->name}}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        @endif
                        <!-- Experince -->
                            <div class="sidebar-widget">
                                <div class="form-group">
                                    <h5 class="mb-2">{{__('jobs/filters.experienceTitle')}}</h5>
                                    <div class="side-imbo">
                                        <ul class="no-ul-list">
                                            <li>
                                                <input id="checkbox-e1" class="checkbox-custom" name="checkbox-e1"
                                                       type="checkbox">
                                                <label for="checkbox-e1"
                                                       class="checkbox-custom-label">1 {{__('jobs/filters.year')}}</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-e2" class="checkbox-custom" name="checkbox-e2"
                                                       type="checkbox">
                                                <label for="checkbox-e2"
                                                       class="checkbox-custom-label">2 {{__('jobs/filters.years')}}</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-e3" class="checkbox-custom" name="checkbox-e3"
                                                       type="checkbox">
                                                <label for="checkbox-e3"
                                                       class="checkbox-custom-label">3 {{__('jobs/filters.years')}}</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-e4" class="checkbox-custom" name="checkbox-e4"
                                                       type="checkbox">
                                                <label for="checkbox-e4"
                                                       class="checkbox-custom-label">4+ {{__('jobs/filters.years')}}</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Type -->
                            <div class="sidebar-widget">
                                <div class="form-group">
                                    <h5 class="mb-2">{{__('jobs/filters.jobTypeTitle')}}</h5>
                                    <div class="side-imbo">
                                        <ul class="no-ul-list">
                                            <li>
                                                <input id="checkbox-j1" class="checkbox-custom" name="checkbox-j1"
                                                       type="checkbox">
                                                <label for="checkbox-j1"
                                                       class="checkbox-custom-label">{{__('jobs/filters.fullTime')}}</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-j2" class="checkbox-custom" name="checkbox-j2"
                                                       type="checkbox">
                                                <label for="checkbox-j2"
                                                       class="checkbox-custom-label">{{__('jobs/filters.partTime')}}</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-j3" class="checkbox-custom" name="checkbox-j3"
                                                       type="checkbox">
                                                <label for="checkbox-j3"
                                                       class="checkbox-custom-label">{{__('jobs/filters.constructionBase')}}</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-j4" class="checkbox-custom" name="checkbox-j4"
                                                       type="checkbox">
                                                <label for="checkbox-j4"
                                                       class="checkbox-custom-label">{{__('jobs/filters.Internship')}}</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Type -->
                            <div class="sidebar-widget">
                                <div class="form-group">
                                    <h5 class="mb-2">{{__('jobs/filters.jobLevelTitle')}}</h5>
                                    <div class="side-imbo">
                                        <ul class="no-ul-list">
                                            <li>
                                                <input id="checkbox-jf1" class="checkbox-custom" name="checkbox-jf1"
                                                       type="checkbox">
                                                <label for="checkbox-jf1" class="checkbox-custom-label">Manager</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-jf2" class="checkbox-custom" name="checkbox-jf2"
                                                       type="checkbox">
                                                <label for="checkbox-jf2" class="checkbox-custom-label">Junior</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-jf3" class="checkbox-custom" name="checkbox-jf3"
                                                       type="checkbox">
                                                <label for="checkbox-jf3" class="checkbox-custom-label">Senior</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Compensation -->
                            <div class="sidebar-widget">
                                <div class="form-group">
                                    <h5 class="mb-2">{{__('jobs/filters.expectedSalleryTitle')}}</h5>
                                    <div class="side-imbo">
                                        <ul class="no-ul-list">
                                            <li>
                                                <input id="checkbox-c1" class="checkbox-custom" name="checkbox-c1"
                                                       type="checkbox">
                                                <label for="checkbox-c1" class="checkbox-custom-label">500€ -
                                                    1000€</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-c2" class="checkbox-custom" name="checkbox-c2"
                                                       type="checkbox">
                                                <label for="checkbox-c2" class="checkbox-custom-label">1000€ -
                                                    2000€</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-c03" class="checkbox-custom" name="checkbox-c03"
                                                       type="checkbox">
                                                <label for="checkbox-c03" class="checkbox-custom-label">2000€ -
                                                    5000€</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-c4" class="checkbox-custom" name="checkbox-c4"
                                                       type="checkbox">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-8">

                        <div class="row">
                            <!-- layout Wrapper -->
                            <div class="col-md-12 mb-3">
                                <div class="layout-switcher-wrap">
                                    <div
                                        class="layout-switcher-left">{{$jobs->total().' '.__(trans_choice('jobs/jobs.results',$jobs->total()))}}</div>
                                    <div class="layout-switcher">
                                        <ul>
                                            <li><a href="search-with-sidebar.html"><i class="ti-layout-grid3"></i></a>
                                            </li>
                                            <li class="active"><a href="search-with-sidebar-list.html"><i
                                                        class="ti-view-list"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">

                            @foreach($jobs as $job)
                                <!-- Single Large Job List -->
                                    <div class="job-new-list">
                                        <div class="vc-thumb">
                                            <img class="img-fluid rounded-circle"
                                                 src="https://via.placeholder.com/90x90" alt="c2.jpg">
                                        </div>
                                        <div class="vc-content">
                                            <h5 class="title"><a href="job-detail.html">{{$job->title}}</a><span
                                                    class="j-full-time">Full Time</span></h5>
                                            <p>Google Inc</p>
                                            <ul class="vc-info-list">
                                                <li class="list-inline-item">
                                                    <h5>{{__('jobs/filters.expectedSalleryTitle')}}</h5> <i
                                                        class="ti-credit-card"></i>$3.5k-$5k P.A
                                                </li>
                                                <li class="list-inline-item"><h5>{{__('jobs/filters.skillsTitle')}}</h5>
                                                    <div class="skills">
                                                        @if(!empty($job->tagNames()))
                                                            @foreach($job->tagNames() as $tag)
                                                                @if($loop->iteration > 3)
                                                                    <span>+ {{' '.
                                                                            (count($job->tagNames())-3)
                                                                            .' '.
                                                                            trans_choice('jobs/jobs.others',(count($job->tagNames())-3))
                                                                            }}
                                                                    </span>
                                                                    @break
                                                                @endif
                                                                <span>{{$tag}}</span>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <a class="btn btn-black bn-det" href="job-detail.html">{{__('jobs/jobs.apply')}}
                                            <i class="ti-arrow-right ml-1"></i></a>
                                    </div>
                                @endforeach
                                {{$jobs->links('vendor/pagination/bootstrap-4')}}
                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </section>
        <div class="clearfix"></div>

        <!-- ============================ Newsletter Start ================================== -->
        <section class="alert-wrap pt-5 pb-5" style="background: #00a94f url(assets/img/bg2.png);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="jobalert-sec">
                            <h3 class="mb-1 text-light">Get New Jobs Notification!</h3>
                            <p class="text-light">Subscribe & get all related jobs notification.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Your Email">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-black black">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ============================ Newsletter Start ================================== -->

        <!-- ============================ Footer Start ================================== -->
        <footer class="dark-footer skin-dark-footer">
            <div>
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                <img src="assets/img/logo-light.png" class="img-footer" alt=""/>
                                <div class="footer-add">
                                    <p>Collins Street West, Victoria,</br> Australia (AU4578).</p>
                                    <p><strong>Email:</strong></br><a href="#">hello@workstock.com</a></p>
                                    <p><strong>Call:</strong></br>91 855 742 62548</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <div class="footer-widget">
                                <h4 class="widget-title">Navigations</h4>
                                <ul class="footer-menu">
                                    <li><a href="#">New Home Design</a></li>
                                    <li><a href="#">Browse Candidates</a></li>
                                    <li><a href="#">Browse Employers</a></li>
                                    <li><a href="#">Advance Search</a></li>
                                    <li><a href="#">Job With Map</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2">
                            <div class="footer-widget">
                                <h4 class="widget-title">The Highlights</h4>
                                <ul class="footer-menu">
                                    <li><a href="#">Home Page 2</a></li>
                                    <li><a href="#">Home Page 3</a></li>
                                    <li><a href="#">Home Page 4</a></li>
                                    <li><a href="#">Home Page 5</a></li>
                                    <li><a href="#">LogIn</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2">
                            <div class="footer-widget">
                                <h4 class="widget-title">My Account</h4>
                                <ul class="footer-menu">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Applications</a></li>
                                    <li><a href="#">Packages</a></li>
                                    <li><a href="#">resume.html</a></li>
                                    <li><a href="#">SignUp Page</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                <h4 class="widget-title">Download Apps</h4>
                                <a href="#" class="other-store-link">
                                    <div class="other-store-app">
                                        <div class="os-app-icon">
                                            <i class="ti-android theme-cl"></i>
                                        </div>
                                        <div class="os-app-caps">
                                            Google Play
                                            <span>Get It Now</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="other-store-link">
                                    <div class="other-store-app">
                                        <div class="os-app-icon">
                                            <i class="ti-apple theme-cl"></i>
                                        </div>
                                        <div class="os-app-caps">
                                            App Store
                                            <span>Now it Available</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6 col-md-6">
                            <p class="mb-0">© 2020 Work Stocks. Designd By PixelExperts All Rights Reserved</p>
                        </div>

                        <div class="col-lg-6 col-md-6 text-right">
                            <ul class="footer-bottom-social">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
        <!-- ============================ Footer End ================================== -->

        <!-- Log In Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
                <div class="modal-content" id="registermodal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="ti-close"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="modal-header-title">SignIn</h4>
                        <div class="social-login">
                            <ul>
                                <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Login with
                                        Facebook</a></li>
                                <li><a href="#" class="btn connect-gplus"><i class="ti-google"></i>Login with Gmail</a>
                                </li>
                            </ul>
                        </div>

                        <div class="devide-wrap"><span>OR</span></div>

                        <div class="login-form">
                            <form>

                                <div class="form-group">
                                    <label>User Name</label>
                                    <div class="input-with-gray">
                                        <input type="text" class="form-control" placeholder="Username">
                                        <i class="ti-user theme-cl"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-with-gray">
                                        <input type="password" class="form-control" placeholder="*******">
                                        <i class="ti-unlock theme-cl"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-md full-width pop-login">Login
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="mf-link"><i class="ti-user"></i>Haven't An Account?<a href="javascript:void(0)"
                                                                                          data-toggle="modal"
                                                                                          data-target="#signup"
                                                                                          data-dismiss="modal"> Sign
                                Up</a></div>
                        <div class="mf-forget"><a href="#"><i class="ti-help"></i>Forget Password</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Sign Up Modal -->
        <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
                <div class="modal-content" id="sign-up">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="ti-close"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="modal-header-title">Sign Up</h4>
                        <div class="social-login">
                            <ul>
                                <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Login with
                                        Facebook</a></li>
                                <li><a href="#" class="btn connect-gplus"><i class="ti-google"></i>Login with Gmail</a>
                                </li>
                            </ul>
                        </div>

                        <div class="devide-wrap"><span>OR</span></div>

                        <div class="login-form">
                            <form>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <div class="input-with-gray">
                                                <input type="text" class="form-control" placeholder="Your Name">
                                                <i class="ti-user theme-cl"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-with-gray">
                                                <input type="email" class="form-control" placeholder="Email ID">
                                                <i class="ti-user theme-cl"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <div class="input-with-gray">
                                                <input type="text" class="form-control" placeholder="Username">
                                                <i class="ti-user theme-cl"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <div class="input-with-gray">
                                                <input type="password" class="form-control" placeholder="*******">
                                                <i class="ti-unlock theme-cl"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-md full-width pop-login">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="mf-link"><i class="ti-user"></i>Already Have Account? Sign In</a></div>
                        <div class="mf-forget"><a href="#"><i class="ti-help"></i>Need Help</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Filter Job Option -->
        <div id="filter-sidebar" class="filter-sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="ti-close"></i></a>
            <div class="show-hide-sidebar">

                <!-- Keyword -->
                <div class="sidebar-widget">
                    <div class="form-group">
                        <h5 class="mb-3">Keyword</h5>
                        <div class="input-with-icon">
                            <input type="text" class="form-control" placeholder="Keyword...">
                            <i class="ti-key"></i>
                        </div>
                    </div>
                </div>

                <!-- Location -->
                <div class="sidebar-widget">
                    <div class="form-group">
                        <h5 class="mb-3">Location</h5>
                        <div class="input-with-icon">
                            <input type="text" class="form-control" placeholder="Location..">
                            <i class="ti-target"></i>
                        </div>
                    </div>
                </div>

                <!-- Category -->
                <div class="sidebar-widget">
                    <div class="form-group">
                        <h5 class="mb-3">Category</h5>
                        <div class="input-with-shadow">
                            <select id="category-side" class="js-states form-control">
                                <option value="">&nbsp;</option>
                                <option value="1">SEO & Web Design</option>
                                <option value="2">Wealth & Healthcare</option>
                                <option value="3">Account / Finance</option>
                                <option value="4">Education</option>
                                <option value="5">Banking Jobs</option>
                            </select>
                            <i class="ti-layers"></i>
                        </div>
                    </div>
                </div>

                <!-- Experince -->
                <div class="sidebar-widget">
                    <div class="form-group">
                        <h5 class="mb-2">Experince</h5>
                        <div class="side-imbo">
                            <ul class="no-ul-list">
                                <li>
                                    <input id="checkbox-se1" class="checkbox-custom" name="checkbox-se1"
                                           type="checkbox">
                                    <label for="checkbox-se1" class="checkbox-custom-label">1 Year</label>
                                </li>

                                <li>
                                    <input id="checkbox-se2" class="checkbox-custom" name="checkbox-se2"
                                           type="checkbox">
                                    <label for="checkbox-se2" class="checkbox-custom-label">2 Year</label>
                                </li>

                                <li>
                                    <input id="checkbox-se3" class="checkbox-custom" name="checkbox-se3"
                                           type="checkbox">
                                    <label for="checkbox-se3" class="checkbox-custom-label">3 Year</label>
                                </li>

                                <li>
                                    <input id="checkbox-se4" class="checkbox-custom" name="checkbox-se4"
                                           type="checkbox">
                                    <label for="checkbox-se4" class="checkbox-custom-label">4+ Year</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Job Type -->
                <div class="sidebar-widget">
                    <div class="form-group">
                        <h5 class="mb-2">Job Type</h5>
                        <div class="side-imbo">
                            <ul class="no-ul-list">
                                <li>
                                    <input id="checkbox-sj1" class="checkbox-custom" name="checkbox-sj1"
                                           type="checkbox">
                                    <label for="checkbox-sj1" class="checkbox-custom-label">Full Time</label>
                                </li>

                                <li>
                                    <input id="checkbox-sj2" class="checkbox-custom" name="checkbox-sj2"
                                           type="checkbox">
                                    <label for="checkbox-sj2" class="checkbox-custom-label">Part Time</label>
                                </li>

                                <li>
                                    <input id="checkbox-sj3" class="checkbox-custom" name="checkbox-sj3"
                                           type="checkbox">
                                    <label for="checkbox-sj3" class="checkbox-custom-label">Construction Base</label>
                                </li>

                                <li>
                                    <input id="checkbox-sj4" class="checkbox-custom" name="checkbox-sj4"
                                           type="checkbox">
                                    <label for="checkbox-sj4" class="checkbox-custom-label">Internship</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Compensation -->
                <div class="sidebar-widget">
                    <div class="form-group">
                        <h5 class="mb-2">Compensation</h5>
                        <div class="side-imbo">
                            <ul class="no-ul-list">
                                <li>
                                    <input id="checkbox-sc1" class="checkbox-custom" name="checkbox-sc1"
                                           type="checkbox">
                                    <label for="checkbox-sc1" class="checkbox-custom-label">$500 - $1000</label>
                                </li>

                                <li>
                                    <input id="checkbox-sc2" class="checkbox-custom" name="checkbox-sc2"
                                           type="checkbox">
                                    <label for="checkbox-sc2" class="checkbox-custom-label">$1000 - $2000</label>
                                </li>

                                <li>
                                    <input id="checkbox-c3" class="checkbox-custom" name="checkbox-sc3" type="checkbox">
                                    <label for="checkbox-c3" class="checkbox-custom-label">$2000 - $5000</label>
                                </li>

                                <li>
                                    <input id="checkbox-sc4" class="checkbox-custom" name="checkbox-sc4"
                                           type="checkbox">
                                    <label for="checkbox-sc4" class="checkbox-custom-label">$5000 - $10000</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Filter Job Option -->

    </div>

@endsection

