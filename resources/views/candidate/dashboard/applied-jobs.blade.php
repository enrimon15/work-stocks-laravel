@extends('candidate.dashboard.candidate-dashboard')

@section('content-dashboard')

<!-- applied job -->
<div class="tab-pane active container" id="applied">

    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="ti-briefcase"></i> Applied job</h4>
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
                        <a href="#" class="mg-delete ml-2" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection