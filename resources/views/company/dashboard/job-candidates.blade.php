@extends('company.dashboard.company-dashboard')

@section('content-dashboard')

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

        <!-- @if(Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif -->

        <div class="tr-single-box ">
            <div class="tr-single-header mb-3">
                <h4><i class="ti-layers-alt"></i> {{__('dashboard/company/manage-jobs.titleCandidates') . $jobName}}</h4>
            </div>

            <div class="container">

                @forelse($candidates as $candidate)
                    <!-- Single Candidate List -->
                    <div class="candidate-list-layout p-2">
                        <div class="cll-wrap">
                            <div class="cll-thumb">
                                <a href="#" style="cursor: auto"><img src="{{asset('storage/' . $candidate->avatar)}}" class="img-responsive img-circle" alt="" /></a>
                            </div>
                            <div class="cll-caption">
                                <h4><a href="{{route('profile', ['type' => 'company', 'id' => $candidate->id])}}">{{$candidate->name . ' ' . $candidate->surname}}</a><span><i class="ti-briefcase"></i>{{$candidate->job_title ?? null}}</span></h4>
                                <ul>
                                    <li><i class="ti-location-pin text-danger"></i>{{isset($candidate->city) ? $candidate->city : null}}  {{isset($candidate->country) ? ', ' . $candidate->country : null}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>{{__('dashboard/company/manage-jobs.noContentCandidates' . $jobName)}}</p>
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