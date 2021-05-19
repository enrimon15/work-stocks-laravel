@extends('company.dashboard.company-dashboard')

@section('content-dashboard')

    <style>
        .mg-edit {
            background: #00a94f3b;
            padding: 6px 16px;
            border-radius: 2px;
            transition: all 0.4s;
            color: #00a94f;
        }

        .mg-edit:hover {
            background: #00a94f;
            color: white!important;
        }
    </style>

    <!-- Modal Delete Job -->
    <div class="modal fade" id="delete-job-modal" tabindex="-1" role="dialog" aria-labelledby="delete-job-modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('dashboard/company/manage-jobs.modalTitle')}}</h5>
                </div>
                <div class="modal-body">{{__('dashboard/company/manage-jobs.modalBody')}}</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('dashboard/company/manage-jobs.cancel')}}</button>
                    <a id="buttonDelete" href="#" class="btn btn-danger color--white" style="border-color: transparent!important;">{{__('dashboard/company/manage-jobs.delete')}}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Manage Job Offer -->
    <div class="tab-pane active container" id="postNewJob">

        @if(Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(isset($success))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{$success}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

            <div class="tr-single-box ">
                <div class="tr-single-header mb-3">
                    <h4><i class="ti-layers-alt"></i> {{__('dashboard/company/manage-jobs.title')}}</h4>
                </div>

                <div class="container">

                    @forelse($jobs as $job)
                        <div class="p-1">
                            <div class="manage-list">

                                <div class="mg-list-wrap">
                                    <div class="mg-list-caption">
                                        <h4 class="mg-title title">
                                            <a href="#" style="cursor: pointer">{{$job->title}}</a>
                                            <span class="j-part-time p-2 ml-2" style="font-size: small; font-weight: normal">{{__('dashboard/company/newJob.' . $job->offers_type)}}</span>
                                        </h4>

                                        <span class="mg-subtitle" style="color: #00a94f">{{$job->company->name}}</span>
                                        <div class="mt-1">{{$job->workingPlace->city . ', ' . $job->workingPlace->country}}</div>
                                        @if($job->due_date >= date('Y-m-d'))
                                            <span><em>{{date('d-m-Y', strtotime($job->created_at))}}</em></span>
                                        @else
                                            <span><em>{{date('d-m-Y', strtotime($job->created_at))}}</em> </span>
                                            <div><span class="color--error">{{__('dashboard/company/manage-jobs.expired')}} <i class="ti-na ml-2"></i></span></div>
                                        @endif

                                    </div>
                                </div>

                                <div class="mg-action {{$job->due_date < date('Y-m-d') ? 'd-none' : ''}}">
                                    <div class="btn-group">
                                        <a href="{{route('editJobCompany', ['id' => $job->id])}}" class="mg-edit"><i class="ti-pencil"></i></a>
                                    </div>
                                    <div class="btn-group ml-2">
                                        <a onclick="deleteJobShow({{$job}})" data-toggle="modal" data-target="#delete-job-modal" href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @empty
                        <p>{{__('dashboard/company/manage-jobs.noContent')}}</p>
                    @endforelse

                </div>

            </div>

<script>
    function deleteJobShow(job) {
        let url = '{{route('deleteJob', ['id' => ':id'])}}';
        url = url.replace(':id', job.id);
        document.getElementById("buttonDelete").href = url;
    }
</script>

@endsection