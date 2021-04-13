@extends('candidate.dashboard.candidate-dashboard')

@section('content-dashboard')

<!-- shortlisted -->
<div class="tab-pane active container" id="shortlisted">

    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="ti-check"></i> Shortlisted Jobs</h4>
        </div>

        <div class="tr-single-body">

            <!-- Single Manage List -->
            <div class="manage-list">

                <div class="mg-list-wrap">
                    <div class="mg-list-thumb">
                        <img src="https://via.placeholder.com/90x90" class="mx-auto" alt="" />
                    </div>
                    <div class="mg-list-caption">
                        <h4 class="mg-title">Web Designer</h4>
                        <span class="mg-subtitle">Google Info</span>
                        <span><em>Last activity</em> 4 weeks ago. <em>Posted</em> 4 weeks ago</span>

                    </div>
                </div>

                <div class="mg-action">
                    <div class="btn-group ml-2">
                        <a href="job-detail.html" class="btn btn-view" data-toggle="tooltip" data-placement="top" title="View Job"><i class="ti-eye"></i></a>
                    </div>
                </div>

            </div>

            <!-- Single Manage List -->
            <div class="manage-list">

                <div class="mg-list-wrap">
                    <div class="mg-list-thumb">
                        <img src="https://via.placeholder.com/90x90" class="mx-auto" alt="" />
                    </div>
                    <div class="mg-list-caption">
                        <h4 class="mg-title">Web Designer</h4>
                        <span class="mg-subtitle">Google Info</span>
                        <span><em>Last activity</em> 4 weeks ago. <em>Posted</em> 4 weeks ago</span>

                    </div>
                </div>

                <div class="mg-action">
                    <div class="btn-group ml-2">
                        <a href="job-detail.html" class="btn btn-view" data-toggle="tooltip" data-placement="top" title="View Job"><i class="ti-eye"></i></a>
                    </div>
                </div>

            </div>

            <!-- Single Manage List -->
            <div class="manage-list">

                <div class="mg-list-wrap">
                    <div class="mg-list-thumb">
                        <img src="https://via.placeholder.com/90x90" class="mx-auto" alt="" />
                    </div>
                    <div class="mg-list-caption">
                        <h4 class="mg-title">Web Designer</h4>
                        <span class="mg-subtitle">Google Info</span>
                        <span><em>Last activity</em> 4 weeks ago. <em>Posted</em> 4 weeks ago</span>

                    </div>
                </div>

                <div class="mg-action">
                    <div class="btn-group ml-2">
                        <a href="job-detail.html" class="btn btn-view" data-toggle="tooltip" data-placement="top" title="View Job"><i class="ti-eye"></i></a>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection