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
                            <input id="topFilterNameSurname" type="text" class="form-control b-r keyPress"
                                   placeholder="{{__('subcribers/subscribersList.nameSurnameTopFilter')}}">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <div class="form-group">
                            <i class="ti-location-pin"></i>
                            <input id="topFilterLocation" type="text" class="form-control b-r keyPress"
                                   placeholder="{{__('subcribers/subscribersList.placeTopFilter')}}">
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                        <div class="form-group">
                            <i class="ti-briefcase"></i>
                            <input id="topFilterJobTitle" type="text" class="form-control b-r keyPress"
                                   placeholder="{{__('subcribers/subscribersList.jobTitleTopFilter')}}"
                            >
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                        <div class="form-group">
                            <i class="ti-briefcase"></i>
                            <input id="topFilterSkills" type="text" class="form-control b-r keyPress"
                                   placeholder="{{__('subcribers/subscribersList.jobSkillsTopFilter')}}"
                            >
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                        <button type="button" id="searchButton"
                                class="btn btn-primary full-width">{{__('subcribers/subscribersList.findSubscriberTopFilterButtom')}}</button>
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
                                            <label for="checkbox-c1" class="checkbox-custom-label">@lang('jobs/filters.filterSalaryUpTo', ['numero'=> '10K', 'valuta'=> '€'])</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-c2" class="checkbox-custom" name="group2[]"
                                                   type="checkbox" value="2">
                                            <label for="checkbox-c2" class="checkbox-custom-label">@lang('jobs/filters.filterSalaryUpTo', ['numero'=> '20K', 'valuta'=> '€'])</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-c3" class="checkbox-custom" name="group2[]"
                                                   type="checkbox" value="3">
                                            <label for="checkbox-c3" class="checkbox-custom-label">@lang('jobs/filters.filterSalaryUpTo', ['numero'=> '30K', 'valuta'=> '€'])</label>
                                        </li>

                                        <li>
                                            <input id="checkbox-c4" class="checkbox-custom" name="group2[]"
                                                   type="checkbox" value="4">
                                            <label for="checkbox-c4" class="checkbox-custom-label">@lang('jobs/filters.filterSalaryFrom', ['numero'=> '30K', 'valuta'=> '€'])</label>
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
                                    id="totalResultsInfo">{{$subscribers->total().' '.__(trans_choice('jobs/jobs.results',$subscribers->total()))}}</div>
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
    <div class="clearfix"></div>

@endsection

@push('scripts')
    <script src="{{asset('js/custom/subsribers/SubscriberFiltersCriteria.js')}}"></script>

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
        const urlParams = new URLSearchParams(window.location.search);
        const myParam = urlParams.get('filter[company.name]');

        if (myParam != null) {
            document.getElementById('topFilterCompanyName').value = myParam;
        }
    </script>
@endpush

