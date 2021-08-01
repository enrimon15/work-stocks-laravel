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
                    <div class="col-lg-5 col-md-5 col-sm-12 p-0">
                        <div class="form-group">
                            <i class="ti-search"></i>
                            <input id="topFilterCompanyName" type="text" class="form-control b-r keyPress"
                                   placeholder="{{__('company/company.companyName')}}"
                            >
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 col-sm-12 p-0">
                        <div class="form-group">
                            <i class="ti-location-pin"></i>
                            <input id="topFilterLocation" type="text" class="form-control b-r keyPress"
                                   placeholder="{{__('jobs/filters.location')}}">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
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
                    <!-- Foundation Year -->
                        <div class="sidebar-widget">
                            <div class="form-group">
                                <h5 class="mb-2">{{__('company/company.foundation')}}</h5>
                                <div class="side-imbo">
                                    <ul class="no-ul-list" id="checkBoxFoundationYear">
                                        <li>
                                            <input id="checkbox-e0" class="checkbox-custom" name="group1[]"
                                                   type="checkbox" value="0" data-linked="group1">
                                            <label for="checkbox-e0"
                                                   class="checkbox-custom-label">{{__('company/company.before').' 1980'}}</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-e1" class="checkbox-custom" name="group1[]"
                                                   type="checkbox" value="1" data-linked="group1">
                                            <label for="checkbox-e1"
                                                   class="checkbox-custom-label">{{'1980 - 2000'}}</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-e2" class="checkbox-custom" name="group1[]"
                                                   type="checkbox" value="2" data-linked="group1">
                                            <label for="checkbox-e2"
                                                   class="checkbox-custom-label">{{'2000 - 2010'}}</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-e3" class="checkbox-custom" name="group1[]"
                                                   type="checkbox" value="3" data-linked="group1">
                                            <label for="checkbox-e3"
                                                   class="checkbox-custom-label">{{'2010 - 2020'}}</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-e4" class="checkbox-custom" name="group1[]"
                                                   type="checkbox" value="4" data-linked="group1">
                                            <label for="checkbox-e4"
                                                   class="checkbox-custom-label">{{'2021 '.__('company/company.after')}}</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Foundation Year -->
                        <div class="sidebar-widget">
                            <div class="form-group">
                                <h5 class="mb-2">{{__('company/company.employees')}}</h5>
                                <div class="side-imbo">
                                    <ul class="no-ul-list" id="checkBoxFilterEmployees">
                                        <li>
                                            <input id="checkbox-f0" class="checkbox-custom" name="group3[]"
                                                   type="checkbox" value="0" data-linked="group1">
                                            <label for="checkbox-f0"
                                                   class="checkbox-custom-label">{{__('company/company.less').' 100'}}</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-f1" class="checkbox-custom" name="group3[]"
                                                   type="checkbox" value="1" data-linked="group1">
                                            <label for="checkbox-f1"
                                                   class="checkbox-custom-label">{{'100 - 500'}}</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-f2" class="checkbox-custom" name="group3[]"
                                                   type="checkbox" value="2" data-linked="group1">
                                            <label for="checkbox-f2"
                                                   class="checkbox-custom-label">{{'500 - 1000'}}</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-f3" class="checkbox-custom" name="group3[]"
                                                   type="checkbox" value="3" data-linked="group1">
                                            <label for="checkbox-f3"
                                                   class="checkbox-custom-label">{{'1000 - 2000'}}</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-f4" class="checkbox-custom" name="group3[]"
                                                   type="checkbox" value="4" data-linked="group1">
                                            <label for="checkbox-f4"
                                                   class="checkbox-custom-label">{{__('company/company.greater').' 2000'}}</label>
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
                                    id="totalResultsInfo">{{$companies->total().' '.__(trans_choice('jobs/jobs.results',$companies->total()))}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12" id="table_data">

                            @include('company.company-search-data')
                        </div>


                    </div>
                </div>

            </div>



        </div>
    </section>
    <div class="clearfix"></div>

@endsection

@push('scripts')
    <script src="{{asset('js/custom/company/CompanyFiltersCriteria.js')}}"></script>

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

        console.log(companyName, title, locations);

        if (companyName != null) {
            document.getElementById('topFilterCompanyName').value = companyName;
        }

        if (title != null) {
            document.getElementById('topFilterJobTitle').value = title;
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

