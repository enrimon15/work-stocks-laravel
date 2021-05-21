@extends('layouts.outline')

@section('content')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="Loader"></div>

    <div class="clearfix"></div>


    <!-- ============================ Search Form Start================================== -->
    <section class="p-0 advance-search b-t">
        <div class="container-fluid p-0">

            <form class="search-big-form no-border p-0">
                <div class="row m-0">
                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <div class="form-group">
                            <i class="ti-search"></i>
                            <input id="topFilterJobTitle" type="text" class="form-control b-r keyPress"
                                   placeholder="{{__('jobs/filters.jobTitleOrKeywords')}}">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <div class="form-group">
                            <i class="ti-location-pin"></i>
                            <input id="topFilterLocation" type="text" class="form-control b-r keyPress"
                                   placeholder="{{__('jobs/filters.location')}}">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <div class="form-group">
                            <i class="ti-briefcase"></i>
                            <input id="topFilterCompanyName" type="text" class="form-control b-r keyPress"
                                   placeholder="{{__('jobs/filters.companyName')}}">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <button type="button" id="searchButton"
                                class="btn btn-primary full-width">{{__('jobs/filters.findJobs')}}</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
    <!-- ============================ Search Form End ================================== -->

    <section class="bg-light">
        <div class="container">


            <div class="row">

                <div class="col-xl-3 col-lg-4">

                    <div class="back-brow">
                        <button type="button" id="resetFilterButton" class="btn btn-primary full-width">
                            <i class="ti-trash"></i> {{__('jobs/filters.resetFilterButton')}}
                        </button>

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
                                        <ul class="no-ul-list" id="checkBoxFilterSkill">

                                            @foreach($tags as $tag)
                                                <li>
                                                    <input id="checkbox-skill-{{$loop->iteration}}"
                                                           class="checkbox-custom"
                                                           name="group0[]" type="checkbox" value="{{$tag->slug}}">
                                                    <label for="checkbox-skill-{{$loop->iteration}}"
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
                                            <input id="checkbox-e0" class="checkbox-custom" name="group1[]"
                                                   type="checkbox" value="0" data-linked="group1">
                                            <label for="checkbox-e0"
                                                   class="checkbox-custom-label">{{__('jobs/filters.noExperience')}}</label>
                                        </li>

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
                                                   type="checkbox" value="3" data-linked="group1">
                                            <label for="checkbox-e3"
                                                   class="checkbox-custom-label">3 {{__('jobs/filters.years')}}</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-e4" class="checkbox-custom" name="group1[]"
                                                   type="checkbox" value="4" data-linked="group1">
                                            <label for="checkbox-e4"
                                                   class="checkbox-custom-label">4 {{__('jobs/filters.years')}} {{__('jobs/filters.orMore')}}</label>
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

                    <!-- Job Type
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
                            -->
                        <!-- Compensation -->
                        <div class="sidebar-widget">
                            <div class="form-group">
                                <h5 class="mb-2">{{__('jobs/filters.expectedSalleryTitle')}}</h5>
                                <div class="side-imbo">
                                    <ul class="no-ul-list" id="checkBoxFilterSalary">
                                        <li>
                                            <input id="checkbox-c0" class="checkbox-custom" name="group2[]"
                                                   type="checkbox" value="0">
                                            <label for="checkbox-c0" class="checkbox-custom-label">0€ -
                                                500</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-c1" class="checkbox-custom" name="group2[]"
                                                   type="checkbox" value="1">
                                            <label for="checkbox-c1" class="checkbox-custom-label">500€ -
                                                1000€</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-c2" class="checkbox-custom" name="group2[]"
                                                   type="checkbox" value="2">
                                            <label for="checkbox-c2" class="checkbox-custom-label">1000€ -
                                                2000€</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-c3" class="checkbox-custom" name="group2[]"
                                                   type="checkbox" value="3">
                                            <label for="checkbox-c3" class="checkbox-custom-label">2000€ -
                                                5000€</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-c4" class="checkbox-custom" name="group2[]"
                                                   type="checkbox" value="4">
                                            <label for="checkbox-c4" class="checkbox-custom-label">5000€ +</label>
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
                                    class="layout-switcher-left"
                                    id="totalResultsInfo">{{$jobs->total().' '.__(trans_choice('jobs/jobs.results',$jobs->total()))}}</div>
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

@endsection

@push('scripts')
    <script src="{{asset('js/custom/jobs/JobsFiltersCriteria.js')}}"></script>

    <script>
        window.skillsFilterTranslation = '{{__('jobs/filters.skillsTitle')}}';
    </script>
@endpush

