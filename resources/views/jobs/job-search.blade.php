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
                                   placeholder="{{__('jobs/filters.companyName')}}"
                            >
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

                    <!-- <div class="d-block d-none d-sm-block d-md-none mb-3">
                        <a href="javascript:void(0)" onclick="openNav()" class="btn btn-info full-width btn-md"><i
                                class="ti-filter mrg-r-5"></i>Filter Search</a>
                    </div> -->

                    <div class="sidebar-container d-sm-block d-md-block">

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
                                    <ul class="no-ul-list" id="checkBoxFilterOfferType">
                                        <li>
                                            <input id="checkbox-j1" class="checkbox-custom" name="group3[]"
                                                   type="checkbox" value="full_time">
                                            <label for="checkbox-j1"
                                                   class="checkbox-custom-label">{{__('jobs/filters.full_time')}}</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-j2" class="checkbox-custom" name="group3[]"
                                                   type="checkbox" value="part_time">
                                            <label for="checkbox-j2"
                                                   class="checkbox-custom-label">{{__('jobs/filters.part_time')}}</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-j3" class="checkbox-custom" name="group3[]"
                                                   type="checkbox" value="construction_base">
                                            <label for="checkbox-j3"
                                                   class="checkbox-custom-label">{{__('jobs/filters.construction_base')}}</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-j4" class="checkbox-custom" name="group3[]"
                                                   type="checkbox" value="internship">
                                            <label for="checkbox-j4"
                                                   class="checkbox-custom-label">{{__('jobs/filters.internship')}}</label>
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
                                    <ul class="no-ul-list" id="checkBoxFilterSalary">
                                        <li>
                                            <input id="checkbox-c0" class="checkbox-custom" name="group2[]"
                                                   type="checkbox" value="0">
                                            <label for="checkbox-c0" class="checkbox-custom-label">@lang('jobs/filters.filterSalaryUpTo', ['numero'=> '5K', 'valuta'=> '€'])</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-c1" class="checkbox-custom" name="group2[]"
                                                   type="checkbox" value="1">
                                            <label for="checkbox-c1" class="checkbox-custom-label">@lang('jobs/filters.filterSalaryBetween', ['numeroMin'=>'5K','numeroMax'=> '10K', 'valuta'=> '€'])</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-c2" class="checkbox-custom" name="group2[]"
                                                   type="checkbox" value="2">
                                            <label for="checkbox-c2" class="checkbox-custom-label">@lang('jobs/filters.filterSalaryBetween', ['numeroMin'=>'10K','numeroMax'=> '20K', 'valuta'=> '€'])</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-c3" class="checkbox-custom" name="group2[]"
                                                   type="checkbox" value="3">
                                            <label for="checkbox-c3" class="checkbox-custom-label">@lang('jobs/filters.filterSalaryBetween', ['numeroMin'=>'20K','numeroMax'=> '50K', 'valuta'=> '€'])</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-c4" class="checkbox-custom" name="group2[]"
                                                   type="checkbox" value="4">
                                            <label for="checkbox-c4" class="checkbox-custom-label">@lang('jobs/filters.filterSalaryFrom', ['numero'=> '50K', 'valuta'=> '€'])</label>
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

    <script>
        $(window).on('scroll',function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 450) {
                $(".advance-search").addClass("advn-fixed");
            } else {
                $(".advance-search").removeClass("advn-fixed");
            }
        });
    </script>

    <script>
        let getParameterByName = function() {
            let queries = location.search.substring(1).split('&'),
                processed = {};
            for (let query of queries) {
                let [name, value] = query.split('=');
                processed[decodeURIComponent(name)] = value? decodeURIComponent(value) : '';
            }

            return function(name) {
                if (typeof processed[name] !== 'undefined')
                    return processed[name];
                else
                    return null;
            };
        }();

        const companyName = getParameterByName('filter[company.name]');
        const title = getParameterByName('filter[title]');
        const locations = getParameterByName('filter[location]');

        console.log(companyName, title, locations);

        if (companyName != null) {
            document.getElementById('topFilterCompanyName').value = companyName;
        }

        if (title != null) {
            document.getElementById('topFilterJobTitle').value = title;
        }

        if (locations != null) {
            document.getElementById('topFilterLocation').value = locations;
        }
    </script>

    <!--<script>
        const urlParams = new URLSearchParams(window.location.search);
        const companyName = urlParams.get('filter[company.name]');

        if (companyName != null) {
            document.getElementById('topFilterCompanyName').value = companyName;
        }
    </script>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const title = urlParams.get('filter[title]');

        if (title != null) {
            document.getElementById('topFilterJobTitle').value = title;
        }
    </script>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const locations = urlParams.get('filter[location]');

        if (locations != null) {
            document.getElementById('topFilterLocation').value = locations;
        }
    </script> -->



@endpush

