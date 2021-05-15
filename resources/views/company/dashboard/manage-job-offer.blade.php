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

                    <div class="p-1">
                        <div class="manage-list">

                            <div class="mg-list-wrap">
                                <div class="mg-list-caption">
                                    <h4 class="mg-title title"> <a href="#" style="cursor: pointer">Java Developer</a> <span class="j-part-time p-2 ml-2" style="font-size: small; font-weight: normal">Part Time</span></h4>
                                    <span class="mg-subtitle" style="color: #00a94f">IBM</span>
                                    <div class="mt-1">Pescara, Italia</div>
                                    <span><em>20/04/2021</em></span>
                                </div>
                            </div>

                            <div class="mg-action">
                                <div class="btn-group">
                                    <a href="#" class="mg-edit"><i class="ti-pencil"></i></a>
                                </div>
                                <div class="btn-group ml-2">
                                    <a href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="p-1">
                        <div class="manage-list">

                            <div class="mg-list-wrap">
                                <div class="mg-list-caption">
                                    <h4 class="mg-title title"> <a href="#" style="cursor: pointer">Java Developer</a> <span class="j-part-time p-2 ml-2" style="font-size: small; font-weight: normal">Part Time</span></h4>
                                    <span class="mg-subtitle" style="color: #00a94f">IBM</span>
                                    <div class="mt-1">Pescara, Italia</div>
                                    <span><em>20/04/2021</em></span>
                                </div>
                            </div>

                            <div class="mg-action">
                                <div class="btn-group">
                                    <a href="#" class="mg-edit"><i class="ti-pencil"></i></a>
                                </div>
                                <div class="btn-group ml-2">
                                    <a href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="p-1">
                        <div class="manage-list">

                            <div class="mg-list-wrap">
                                <div class="mg-list-caption">
                                    <h4 class="mg-title title"> <a href="#" style="cursor: pointer">Java Developer</a> <span class="j-part-time p-2 ml-2" style="font-size: small; font-weight: normal">Part Time</span></h4>
                                    <span class="mg-subtitle" style="color: #00a94f">IBM</span>
                                    <div class="mt-1">Pescara, Italia</div>
                                    <span><em>20/04/2021</em></span>
                                </div>
                            </div>

                            <div class="mg-action">
                                <div class="btn-group">
                                    <a href="#" class="mg-edit"><i class="ti-pencil"></i></a>
                                </div>
                                <div class="btn-group ml-2">
                                    <a href="#" class="mg-delete"><i class="ti-trash"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </div>

@endsection