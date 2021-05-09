@extends('layouts.outline')

@section('content')
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ============================ Search Form Start================================== -->
    <section class="light-search banncer-cent bg-theme" data-overlay="0">
        <div class="container">

            <form class="search-big-form no-border search-shadow">
                <div class="row m-0">
                    <div class="col-lg-4 col-md-4 col-sm-12 p-0">
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

                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
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
                        <button type="button" class="btn btn-black black full-width">Find Jobs</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
    <!-- ============================ Search Form End ================================== -->

    <!-- ============================ Breadcrums Start================================== -->
    <div class="container-fluid breadcrumbs breadcrumbs-light">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="index.html">
                        Home
                    </a>
                    <a href="javascript:void(0)">
								<span>
									<i class="ti-arrow-right"></i>
								</span>
                        Search With Sidebar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- ============================ Breadcrums End ================================== -->

    <!-- ============================ Main Wrap Start ================================== -->
    <section>
        <div class="container">


            <div class="row">

                <div class="col-xl-3 col-lg-4">

                    <div class="d-block d-none d-sm-block d-md-none mb-3">
                        <a href="javascript:void(0)" onclick="openNav()" class="btn btn-info full-width btn-md"><i class="ti-filter mrg-r-5"></i>Filter Search</a>
                    </div>

                    <div class="sidebar-container d-sm-none d-md-block d-none">

                        <!-- Category -->
                        <div class="sidebar-widget">
                            <div class="form-group">
                                <h5 class="mb-2">Job Category</h5>
                                <div class="side-imbo">
                                    <ul class="no-ul-list">
                                        <li>
                                            <input id="checkbox-ei1" class="checkbox-custom" name="checkbox-ei1" type="checkbox">
                                            <label for="checkbox-ei1" class="checkbox-custom-label">IT Computers</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-ei2" class="checkbox-custom" name="checkbox-ei2" type="checkbox">
                                            <label for="checkbox-ei2" class="checkbox-custom-label">Financial Service</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-ei3" class="checkbox-custom" name="checkbox-ei3" type="checkbox">
                                            <label for="checkbox-ei3" class="checkbox-custom-label">Art, Design, Media</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-ei4" class="checkbox-custom" name="checkbox-ei4" type="checkbox">
                                            <label for="checkbox-ei4" class="checkbox-custom-label">Coach & Education</label>
                                        </li>
                                        <li>
                                            <input id="checkbox-ei5" class="checkbox-custom" name="checkbox-ei5" type="checkbox">
                                            <label for="checkbox-ei5" class="checkbox-custom-label">Banking</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Experince -->
                        <div class="sidebar-widget">
                            <div class="form-group">
                                <h5 class="mb-2">Skills</h5>
                                <div class="side-imbo">
                                    <ul class="no-ul-list">
                                        <li>
                                            <input id="checkbox-ep1" class="checkbox-custom" name="checkbox-ep1" type="checkbox">
                                            <label for="checkbox-ep1" class="checkbox-custom-label">Administrative</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-ep2" class="checkbox-custom" name="checkbox-ep2" type="checkbox">
                                            <label for="checkbox-ep2" class="checkbox-custom-label">iPhone & Android</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-ep3" class="checkbox-custom" name="checkbox-ep3" type="checkbox">
                                            <label for="checkbox-ep3" class="checkbox-custom-label">Java & AJAX</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-ep4" class="checkbox-custom" name="checkbox-ep4" type="checkbox">
                                            <label for="checkbox-ep4" class="checkbox-custom-label">Account Manager</label>
                                        </li>
                                        <li>
                                            <input id="checkbox-ep5" class="checkbox-custom" name="checkbox-ep5" type="checkbox">
                                            <label for="checkbox-ep5" class="checkbox-custom-label">WordPress</label>
                                        </li>
                                    </ul>
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
                                            <input id="checkbox-e1" class="checkbox-custom" name="checkbox-e1" type="checkbox">
                                            <label for="checkbox-e1" class="checkbox-custom-label">1 Year</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-e2" class="checkbox-custom" name="checkbox-e2" type="checkbox">
                                            <label for="checkbox-e2" class="checkbox-custom-label">2 Year</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-e3" class="checkbox-custom" name="checkbox-e3" type="checkbox">
                                            <label for="checkbox-e3" class="checkbox-custom-label">3 Year</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-e4" class="checkbox-custom" name="checkbox-e4" type="checkbox">
                                            <label for="checkbox-e4" class="checkbox-custom-label">4+ Year</label>
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
                                            <input id="checkbox-j1" class="checkbox-custom" name="checkbox-j1" type="checkbox">
                                            <label for="checkbox-j1" class="checkbox-custom-label">Full Time</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-j2" class="checkbox-custom" name="checkbox-j2" type="checkbox">
                                            <label for="checkbox-j2" class="checkbox-custom-label">Part Time</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-j3" class="checkbox-custom" name="checkbox-j3" type="checkbox">
                                            <label for="checkbox-j3" class="checkbox-custom-label">Construction Base</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-j4" class="checkbox-custom" name="checkbox-j4" type="checkbox">
                                            <label for="checkbox-j4" class="checkbox-custom-label">Internship</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Job Type -->
                        <div class="sidebar-widget">
                            <div class="form-group">
                                <h5 class="mb-2">Job Level</h5>
                                <div class="side-imbo">
                                    <ul class="no-ul-list">
                                        <li>
                                            <input id="checkbox-jf1" class="checkbox-custom" name="checkbox-jf1" type="checkbox">
                                            <label for="checkbox-jf1" class="checkbox-custom-label">Manager</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-jf2" class="checkbox-custom" name="checkbox-jf2" type="checkbox">
                                            <label for="checkbox-jf2" class="checkbox-custom-label">Junior</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-jf3" class="checkbox-custom" name="checkbox-jf3" type="checkbox">
                                            <label for="checkbox-jf3" class="checkbox-custom-label">Senior</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-9 col-lg-8">

                    <!-- Row -->
                    <div class="row">

                        <!-- layout Wrapper -->
                        <div class="col-md-12 mb-1">
                            <div class="layout-switcher-wrap">
                                <div class="layout-switcher-left">702 Result Found</div>
                                <div class="layout-switcher">
                                    <ul>
                                        <li><a href="candidate-grid.html"><i class="ti-layout-grid3"></i></a></li>
                                        <li class="active"><a href="candidate-list.html"><i class="ti-view-list"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12" id="table_data">
                            @include('subscriber.subscribers-search-data')
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
