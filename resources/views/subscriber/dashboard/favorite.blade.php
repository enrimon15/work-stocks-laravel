@extends('subscriber.dashboard.candidate-dashboard')

@section('content-dashboard')

<!-- Modal Delete Job -->
<div class="modal fade" id="delete-favorite-modal" tabindex="-1" role="dialog" aria-labelledby="delete-favorite-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('dashboard/user/favorite.modalTitle')}}</h5>
            </div>
            <div class="modal-body">{{__('dashboard/user/favorite.modalBody')}}</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('dashboard/user/favorite.cancel')}}</button>
                <a id="buttonDelete" href="#" class="btn btn-danger color--white" style="border-color: transparent!important;">{{__('dashboard/user/favorite.delete')}}</a>
            </div>
        </div>
    </div>
</div>

<!-- Manage Job Offer -->
<div class="tab-pane active container" id="favorites">

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
            <h4><i class="ti-layers-alt"></i> {{__('dashboard/user/favorite.title')}}</h4>
        </div>

        <div class="container">

            @forelse($jobs as $job)
                <div class="p-1">
                    <div class="manage-list">

                        <div class="mg-list-wrap">
                            <div class="mg-list-caption">
                                <h4 class="mg-title title">
                                    <a href="{{route('jobs/getById', ['id' => $job->id])}}" style="cursor: pointer">{{$job->title}}</a>
                                    <span class="j-part-time p-2 ml-2" style="font-size: small; font-weight: normal">{{__('dashboard/company/newJob.' . $job->offers_type)}}</span>
                                </h4>

                                <span class="mg-subtitle" style="color: #00a94f">{{$job->company_name}}</span>
                                <div class="mt-1">{{$job->city . ', ' . $job->country}}</div>
                                @if($job->due_date >= date('Y-m-d'))
                                    <span><em>{{date('d-m-Y', strtotime($job->created_at))}}</em></span>
                                @else
                                    <span><em>{{date('d-m-Y', strtotime($job->created_at))}}</em> </span>
                                    <div><span class="color--error">{{__('dashboard/user/favorite.expired')}} <i class="ti-na ml-2"></i></span></div>
                                @endif

                            </div>
                        </div>

                        <div class="mg-action">
                            <span class="{{$job->due_date < date('Y-m-d') ? 'd-none' : ''}}">
                                <div class="btn-group" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/favorite.tooltipDelete')}}">
                                    <a onclick="deleteFavorite({{$job->id}})" data-toggle="modal" data-target="#delete-favorite-modal" href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                </div>
                            </span>
                        </div>

                    </div>
                </div>
            @empty
                <p>{{__('dashboard/user/favorite.noContent')}}</p>
            @endforelse
        </div>

    </div>
    {!! $jobs->links('vendor/pagination/bootstrap-4')!!}


    <script>
        function deleteFavorite(jobId) {
            let url = '{{route('deleteFavorite', ['id' => ':id'])}}';
            url = url.replace(':id', jobId);
            document.getElementById("buttonDelete").href = url;
        }
    </script>

    <script>
        window.addEventListener('load', function () {
            // tooltip
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
        });
    </script>

@endsection
