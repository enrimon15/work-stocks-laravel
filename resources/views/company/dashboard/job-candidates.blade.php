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

        .mg-candidate {
            background: #d2e8ff;
            padding: 6px 16px;
            border-radius: 2px;
            transition: all 0.4s;
            color: dodgerblue;
        }

        .mg-candidate:hover {
            background: dodgerblue;
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
        @endif

        <div class="tr-single-box ">
            <div class="tr-single-header mb-3">
                <h4><i class="ti-layers-alt"></i> {{__('dashboard/company/manage-jobs.title')}}</h4>
            </div>

            <div class="container">

                @forelse($candidates as $candidate)
                    <!-- Single Candidate List -->
                    <div class="candidate-list-layout p-2">
                        <div class="cll-wrap">
                            <div class="cll-thumb">
                                <a href="{{route('profile', ['id' => $candidate->id])}}"><img src="{{asset('storage/' . $candidate->avatar)}}" class="img-responsive img-circle" alt="" /></a>
                            </div>
                            <div class="cll-caption">
                                <h4><a href="resume-detail.html">{{$candidate->name . ' ' . $candidate->surname}}</a><span><i class="ti-briefcase"></i>{{$candidate->profile->job_title ?? null}}</span></h4>
                                <ul>
                                    <li><i class="ti-location-pin text-danger"></i>{{isset($candidate->profile->city) ? $candidate->profile->city . ', ' : null}}  {{isset($candidate->profile->country) ? ' ' . $candidate->profile->country : null}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>{{__('dashboard/company/manage-jobs.noContent')}}</p>
                @endforelse

            </div>

        </div>
        {!! $candidates->links('vendor/pagination/bootstrap-4')!!}

        <script>
            window.addEventListener('load', function () {
                // tooltip
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });
            });
        </script>

@endsection