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
<section class="page-title-banner" style="background-image:url({{asset('img/joboffer-details-banner.jpeg')}});">
    <div class="container">
        <div class="row m-0 align-items-end detail-swap">
            <div class="tr-list-wrap">
                <div class="tr-list-detail">
                    <div class="tr-list-thumb">
                        <img src="{{asset('storage/'.$job->company->user->avatar)}}" class="img-responsive" alt="" />
                    </div>
                    <div class="tr-list-info">
                        <h4 class="mb-1">{{$job->title}}</h4>
                        <h6 class="font-14"><a href="{{route('profile', ['type' => 'company', 'id' => $job->company->id])}}" class="text-warning">{{$job->company->name}}</a></h6>
                        <p class="mb-1"><i class="ti-location-pin mr-2"></i>{{$job->workingPlace->address.', '.$job->workingPlace->city.', '.$job->workingPlace->country}}</p>
                    </div>
                </div>
                <div class="listing-detail_right">
                    <div class="listing-detail-item">
                        @if($job->applicants->contains(Auth::user()))
                            <a style="cursor: not-allowed" href="#" class="btn btn-list full-width mb-2 text-warning"><i class="ti-email mr-2"></i>{{__('jobs/jobs.alreadyApplied')}}</a><br>
                        @else
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#apply" class="btn btn-list full-width mb-2 text-warning"><i class="ti-email mr-2"></i>{{__('jobs/jobs.applyThisJob')}}</a><br>
                        @endif
                        <!--<a href="#" class="btn btn-list full-width color--linkedin"><i class="ti-linkedin mr-2"></i> Apply With linkedin</a>-->

                        <!-- Modal -->
                        <div class="modal fade" id="apply" tabindex="-1" role="dialog" aria-labelledby="apply" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{__('jobs/jobs.applyThisJob')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @lang('jobs/jobs.applyMessage',['company'=>$job->company->name,'offersName'=>$job->title])
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('jobs/jobs.cancelButton')</button>
                                        @if(Auth::id())
                                        <button type="button" id="confirmationButton" class="btn btn-primary" onclick="sendApplication('{{route('subscribers/apply',['idJobOffer'=>$job->id])}}')">@lang('jobs/jobs.confirmButton')</button>
                                        @else

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

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

        @if(Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="alert alert-dismissible fade show d-none" id="confirmApplication" role="alert">
            <span id="confirmApplicationSpan"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="row">

            <div class="col-lg-8 col-md-12 col-sm-12">

                <!-- Default Style -->
                <div class="single-job-head head-light" style="border: 1px solid #00a94f!important;">
                    <div class="single-job-info pl-0">
                        <ul class="tags-jobs row">
                            <li class="col mx-auto text-left"><i class="ti-file float-none"></i> <strong>{{__('jobs/jobs.applications')}}</strong> {{count($job->applicants)}}</li>
                            <li class="col mx-auto text-center"><i class="ti-calendar float-none"></i> <strong>{{__('jobs/jobs.postDate')}}</strong> {{date('d-m-Y', strtotime($job->created_at))}}</li>
                            <li class="col mx-auto text-right"><i class="ti-alarm-clock float-none"></i> <strong>{{__('jobs/jobs.dueDate')}}</strong> {{date('d-m-Y', strtotime($job->due_date))}}</li>
                        </ul>
                    </div>
                </div>

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

                @if(!$job->applicants->contains(Auth::user()))
                <a href="javascript:void(0)" data-toggle="modal" data-target="#apply" class="btn btn-info full-width mb-2">{{__('jobs/jobs.applyThisJob')}}</a>
                @endif
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4 col-md-12 col-sm-12">

                <div class="offer-btn-wrap mb-4">
                    @if($job->favoriteUsers->contains(Auth::user()))
                        <a href="{{route('deleteFavorite', ['id' => $job->id])}}" class="btn btn-info btn-md full-width"><i class="mr-2 ti-trash"></i>{{__('jobs/jobs.alreadyFavorite')}}</a>
                    @else
                        <a href="{{route('favoriteExecute', ['idJobOffer' => $job->id])}}" class="btn btn-info btn-md full-width"><i class="mr-2 ti-bookmark"></i>{{__('jobs/jobs.addBookMark')}}</a>
                    @endif
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
                                        {{$job->min_salary . 'k - ' . $job->max_salary . 'k'}}
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
                                        {{__('jobs/jobs.' . $job->sex)}}
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
                                        {{$job->experience . ' ' . __('jobs/jobs.year')}}
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <div class="icon-box-round">
                                        <i class="lni lni-briefcase"></i>
                                    </div>
                                    <div class="icon-box-text">
                                        <strong class="d-block">{{__('jobs/jobs.offerType')}}</strong>
                                        {{__('jobs/jobs.' . $job->offers_type)}}
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
                                    <a href="https://www.google.com/maps/search/?api=1&query={{str_replace(' ','%20',$job->company->mainPlaceOfWork()->address).'%20'.
                                                                                                str_replace(' ','%20',$job->company->mainPlaceOfWork()->city).'%20'.
                                                                                                str_replace(' ','%20',$job->company->mainPlaceOfWork()->country)}}">
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
                                    <a href="tel:{{$job->company->telephone}}">
                                        <div class="icon-box-round">
                                            <i class="lni-phone-handset"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            {{$job->company->telephone}}
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="mailto:{{$job->company->user->email}}">
                                        <div class="icon-box-round">
                                            <i class="lni-envelope"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            {{$job->company->user->email}}
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="{{'//'.$job->company->website}}">
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
                <!-- <div class="tr-single-box">
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

                </div> -->

            </div>
            <!-- /col-md-4 -->
        </div>
    </div>
</section>
<!-- ============== Job Detail ====================== -->


@endsection

@push('scripts')
    <script src="{{asset('js/custom/jobs/JobApplication.js')}}"></script>
@endpush
