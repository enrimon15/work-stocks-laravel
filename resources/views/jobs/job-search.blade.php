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
                                <input id="topFilterJobTitle" type="text" class="form-control b-r" placeholder="{{__('jobs/filters.jobTitleOrKeywords')}}">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <div class="form-group">
                                <i class="ti-location-pin"></i>
                                <input id="topFilterLocation" type="text" class="form-control b-r" placeholder="{{__('jobs/filters.location')}}">
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                            <div class="form-group">
                                <i class="ti-briefcase"></i>
                                <input type="text" class="form-control b-r" placeholder="NOME AZIENDA">
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
                            <button type="button" onclick="filtersByAjaxCall()" class="btn btn-primary full-width">{{__('jobs/filters.findJobs')}}</button>
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
                                        <ul class="no-ul-list" id="checkBoxFilterExperience">
                                            <li>
                                                <input id="checkbox-e1" class="checkbox-custom" name="group1[]"
                                                       type="checkbox" value="1" data-linked="group1">
                                                <label for="checkbox-e1"
                                                       class="checkbox-custom-label">1 {{__('jobs/filters.year')}}</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-e2" class="checkbox-custom" name="group1[]"
                                                       type="checkbox" value="2" data-linked="group1">
                                                <label for="checkbox-e2"
                                                       class="checkbox-custom-label">2 {{__('jobs/filters.years')}}</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-e3" class="checkbox-custom" name="group1[]"
                                                       type="checkbox" value="3" data-linked="group1" >
                                                <label for="checkbox-e3"
                                                       class="checkbox-custom-label">3 {{__('jobs/filters.years')}}</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-e4" class="checkbox-custom" name="group1[]"
                                                       type="checkbox" value="4" data-linked="group1">
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
                                                       class="checkbox-custom-label">{{__('jobs/filters.full_time')}}</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-j2" class="checkbox-custom" name="checkbox-j2"
                                                       type="checkbox">
                                                <label for="checkbox-j2"
                                                       class="checkbox-custom-label">{{__('jobs/filters.part_time')}}</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-j3" class="checkbox-custom" name="checkbox-j3"
                                                       type="checkbox">
                                                <label for="checkbox-j3"
                                                       class="checkbox-custom-label">{{__('jobs/filters.costruction_base')}}</label>
                                            </li>

                                            <li>
                                                <input id="checkbox-j4" class="checkbox-custom" name="checkbox-j4"
                                                       type="checkbox">
                                                <label for="checkbox-j4"
                                                       class="checkbox-custom-label">{{__('jobs/filters.internship')}}</label>
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

                            <div class="col-md-12" id="table_data">

                            @include('jobs.job-search-data')
                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </section>
        <div class="clearfix"></div>

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

@push('scripts')
    <script src="{{asset('js/custom/jobs/JobsFiltersCriteria.js')}}"></script>
@endpush

