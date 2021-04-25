@extends('layouts.outline')

@section('content')

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="Loader"></div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->

<!-- ======================= Start Banner ===================== -->
<section class="page-title-banner" style="background-image:url(https://via.placeholder.com/1920x800);">
    <div class="container">
        <div class="row m-0 align-items-end detail-swap">
            <div class="tr-list-wrap">
                <div class="tr-list-detail">
                    <div class="tr-list-thumb">
                        <img src="{{asset('storage/'.$job->company->user->avatar)}}" class="img-responsive" alt="" />
                    </div>
                    <div class="tr-list-info">
                        <h4 class="mb-1">{{$job->title}}</h4>
                        <h6 class="font-14"><a href="company-detail.html" class="text-warning">{{$job->company->name}}</a></h6>
                        <p class="mb-1"><i class="ti-location-pin mr-2"></i>{{$job->placesOfWork->address.', '.$job->placesOfWork->city.', '.$job->placesOfWork->country}}</p>
                    </div>
                </div>
                <div class="listing-detail_right">
                    <div class="listing-detail-item">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#apply" class="btn btn-list full-width mb-2 text-warning"><i class="ti-email mr-2"></i>{{__('jobs/jobs.applyThisJob')}}</a><br>
                        <!--<a href="#" class="btn btn-list full-width color--linkedin"><i class="ti-linkedin mr-2"></i> Apply With linkedin</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= End Banner ===================== -->

<!-- ============== Job Detail ====================== -->
<section class="tr-single-detail gray-bg">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12 col-sm-12">

                <!-- Job Overview -->
                <div class="tr-single-box">
                    <div class="tr-single-header">
                        <h4><i class="ti-info"></i>{{__('jobs/jobs.jobDescription')}}</h4>
                    </div>
                    <div class="tr-single-body">
                        {!! $job->description !!}
                    </div>
                </div>

                <!-- Job Qualifications -->
                <div class="tr-single-box">
                    <div class="tr-single-header">
                        <h4><i class="ti-book"></i>{{__('jobs/filters.skillsTitle')}}</h4>
                    </div>
                    <div class="tr-single-body">
                        <ul class="jb-detail-list">
                            @foreach($job->tagNames() as $tag)
                                <li>{{$tag}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                <!-- Job Education
                <div class="tr-single-box">
                    <div class="tr-single-header">
                        <h4><i class="ti-cup"></i>{{__('jobs/jobs.education')}}</h4>
                    </div>
                    <div class="tr-single-body">
                        <ul class="jb-detail-list">
                            <li>Higher(10th Pass) (Preferred)</li>
                            <li>Higher Secondary(12th Pass) (Preferred)</li>
                            <li>Any Graduattion Degree(13th Pass) (Preferred)</li>
                        </ul>
                    </div>
                </div>-->

                <a href="javascript:void(0)" data-toggle="modal" data-target="#apply" class="btn btn-info full-width mb-2">{{__('jobs/jobs.applyThisJob')}}</a>

            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4 col-md-12 col-sm-12">

                <div class="offer-btn-wrap mb-4">
                    <a href="#" class="btn btn-info btn-md full-width"><i class="mr-2 ti-bookmark"></i>{{__('jobs/jobs.addBookMark')}}</a>
                </div>

                <!-- Job Overview -->
                <div class="tr-single-box">
                    <div class="tr-single-header">
                        <h4><i class="ti-direction"></i>{{__('jobs/jobs.jobOverview')}}</h4>
                    </div>

                    <div class="tr-single-body">
                        <ul class="extra-service">
                            <li>
                                <div class="icon-box-icon-block">
                                    <div class="icon-box-round">
                                        <i class="ti-money"></i>
                                    </div>
                                    <div class="icon-box-text">
                                        <strong class="d-block">{{__('jobs/jobs.offeredSalary')}}</strong>
                                        $80k - $270k
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <div class="icon-box-round">
                                        <i class="lni-users"></i>
                                    </div>
                                    <div class="icon-box-text">
                                        <strong class="d-block">{{__('jobs/jobs.gender')}}</strong>
                                        Male
                                    </div>
                                </div>
                            </li>

                            <!-- CI SERVE ?
                            <li>
                                <div class="icon-box-icon-block">
                                    <div class="icon-box-round">
                                        <i class="ti-home"></i>
                                    </div>
                                    <div class="icon-box-text">
                                        <strong class="d-block">Industry</strong>
                                        Management
                                    </div>
                                </div>
                            </li>
                            -->
                            <li>
                                <div class="icon-box-icon-block">
                                    <div class="icon-box-round">
                                        <i class="lni-certificate"></i>
                                    </div>
                                    <div class="icon-box-text">
                                        <strong class="d-block">{{__('jobs/jobs.experience')}}</strong>
                                        5 Years
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <div class="icon-box-round">
                                        <i class="lni-graduation"></i>
                                    </div>
                                    <div class="icon-box-text">
                                        <strong class="d-block">{{__('jobs/jobs.qualification')}}</strong>
                                        Master Degree
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>

                <!-- Company Address -->
                <div class="tr-single-box">
                    <div class="tr-single-header">
                        <h4><i class="ti-direction"></i>{{__('jobs/jobs.companyAddress')}}</h4>
                    </div>

                    <div class="tr-single-body">
                        <ul class="extra-service">
                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="lni-map-marker"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            {{$job->company->mainPlaceOfWork()->address.', '.$job->company->mainPlaceOfWork()->city.', '.$job->company->mainPlaceOfWork()->country}}
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="lni-phone-handset"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            {{$job->company->commercialContact->telephone}}
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="lni-envelope"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            {{$job->company->commercialContact->email}}
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="lni-world"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            {{$job->company->website}}
                                        </div>
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>

                <!-- Share this -->
                <div class="tr-single-box">
                    <div class="tr-single-header">
                        <h4><i class="ti-share"></i>{{__('jobs/jobs.shareThisJob')}}</h4>
                    </div>

                    <div class="tr-single-body">
                        <ul class="extra-service half">
                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="lni-facebook"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            Facebook
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="lni-google-plus"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            Google plus
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="lni-twitter"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            Twitter
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="lni-linkedin"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            LinkedIn
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="lni-instagram"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            Instagram
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="fa fa-pinterest"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            Pinterest
                                        </div>
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>

            </div>
            <!-- /col-md-4 -->
        </div>
    </div>
</section>
<!-- ============== Job Detail ====================== -->


@endsection
