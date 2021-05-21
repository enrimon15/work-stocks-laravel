@extends('subscriber.dashboard.candidate-dashboard')

@section('content-dashboard')

<style>
    table {
        border-bottom: 0 !important;
    }

    .dataTables_scrollBody {
        border-bottom: 0 !important;
    }

    td {
        height: 35px;
    }
</style>

<!-- My Resume and Online CV -->
<div class="tab-pane active container" id="resume">

    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Error -->
     @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{__('dashboard/user/onlineCV.error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <!-- Add Educations -->
    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="lni-graduation"></i> {{__('dashboard/user/onlineCV.qualTitle')}}</h4>
        </div>

        <div class="tr-single-body">
            <table id="qualification_table" class="table table-striped nowrap">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">{{__('dashboard/user/onlineCV.qualName')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.date')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.qualInstitute')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.qualValuation')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.qualDescription')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($qualifications as $qualification)
                    <tr>
                        <th scope="row">{{$qualification->name}}</th>
                        <td>{{date('Y',strtotime($qualification->start_date))}} - {{$qualification->end_date != null ? date('Y',strtotime($qualification->end_date)) : __('dashboard/user/onlineCV.inProgress')}}</td>
                        <td>{{$qualification->institute}}</td>
                        <td>{{$qualification->valuation ?? null}}</td>
                        <td>
                            @if($qualification->description != null)
                                <span data-toggle="modal" data-target="#qualification-description-modal">
                                <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.readDesc')}}" onclick="qualificationDescription({{$qualification}})">
                                    <i class="ti-eye"></i>
                                </a>
                                </span>
                            @else
                                {{null}}
                            @endif
                        </td>
                        <td>
                            <div class="dash-action">
                                <a href="{{route('onlineCvEdit', ['operationType' => 'qualification','id' => $qualification->id])}}" class="dg-edit" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.modify')}}"><i class="ti-pencil"></i></a>
                                <a href="{{route('onlineCvDelete', ['id' => $qualification->id, 'operationType' => 'qualification'])}}" class="dg-delete" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.delete')}}"><i class="ti-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <table class="price-list-wrap mb-4 mt-5">
                <tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
                    <td>
                        <div class="box-close"><a style="cursor: pointer" id="add-qualification-butt" class="delete"><i id="add-qualification-icon" class="ti-plus"></i></a></div>

                        <form method="POST" action="{{ route('onlineCvExecute', ['operationType' => 'qualification']) }}">
                            @csrf
                            <div id="add-qualification" class="row" style="display: none">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.qualName')}}</label>
                                        <input class="form-control" name="name" placeholder="{{__('dashboard/user/onlineCV.qualName')}}" type="text" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group mt-1 float-right">
                                        <input type="checkbox" name="inProgress" id="check-qualification">&nbsp;&nbsp;{{__('dashboard/user/onlineCV.inProgress')}}
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.startDate')}}</label>
                                        <input type="date" class="form-control" name="startDate" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.endDate')}}</label>
                                        <input id="end-qualification" type="date" class="form-control" name="endDate">
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.qualInstitute')}}</label>
                                        <input placeholder="{{__('dashboard/user/onlineCV.phInstitute')}}" name="institute" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.qualDescription')}}</label>
                                        <textarea placeholder="{{__('dashboard/user/onlineCV.qualDescription')}}" name="description" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.qualValuation')}}</label>
                                        <input placeholder="{{__('dashboard/user/onlineCV.qualValuation')}}" name="valuation" type="text" class="form-control">
                                    </div>
                                </div>

                                <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">{{__('dashboard/user/onlineCV.addButton')}}</button>
                            </div>
                        </form>

                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
    <!-- /Education Info -->

    <!-- Modal Qualification Description -->
    <div class="modal fade" id="qualification-description-modal" tabindex="-1" role="dialog" aria-labelledby="qualification-description-modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('dashboard/user/onlineCV.qualModalTitle')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-qualification"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('dashboard/user/onlineCV.close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Experience -->
    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="lni-briefcase"></i> {{__('dashboard/user/onlineCV.expTitle')}}</h4>
        </div>

        <div class="tr-single-body">
            <table id="experience_table" class="table table-striped nowrap">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">{{__('dashboard/user/onlineCV.titleExp')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.date')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.expDescription')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($experiences as $experience)
                    <tr>
                        <th scope="row">{{$experience->job_position}} @ {{$experience->company}}</th>
                        <td>{{date('Y',strtotime($experience->start_date))}} - {{$experience->end_date != null ? date('Y',strtotime($experience->end_date)) : __('dashboard/user/onlineCV.inProgress')}}</td>
                        <td>
                            @if($experience->description != null)
                                <span data-toggle="modal" data-target="#experience-description-modal">
                                <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.readDesc')}}" onclick="experienceDescription({{$experience}})">
                                    <i class="ti-eye"></i>
                                </a>
                                </span>
                            @else
                                {{null}}
                            @endif
                        </td>
                        <td>
                            <div class="dash-action">
                                <a href="{{route('onlineCvEdit', ['operationType' => 'experience','id' => $experience->id])}}" class="dg-edit" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.modify')}}"><i class="ti-pencil"></i></a>
                                <a href="{{route('onlineCvDelete', ['id' => $experience->id, 'operationType' => 'experience'])}}" class="dg-delete" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.delete')}}"><i class="ti-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <table class="price-list-wrap mb-3 mt-5">
                <tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
                    <td>
                        <div class="box-close"><a style="cursor: pointer" id="add-experience-butt" class="delete"><i id="add-experience-icon" class="ti-plus"></i></a></div>
                        <form method="POST" action="{{ route('onlineCvExecute', ['operationType' => 'experience']) }}">
                            @csrf
                            <div class="row" id="add-experience" style="display: none">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.expJob')}}</label>
                                        <input class="form-control" type="text" placeholder="{{__('dashboard/user/onlineCV.expJob')}}" name="jobPosition" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.expCompany')}}</label>
                                        <input placeholder="{{__('dashboard/user/onlineCV.phCompany')}}" type="text" class="form-control" name="companyName" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group mt-1 float-right">
                                        <input type="checkbox" name="inProgress" id="check-experience">&nbsp;&nbsp;{{__('dashboard/user/onlineCV.inProgress')}}
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.startDate')}}</label>
                                        <input type="date" class="form-control" name="startDate" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.endDate')}}</label>
                                        <input id="end-experience" type="date" class="form-control" name="endDate">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.expDescription')}}</label>
                                        <textarea placeholder="{{__('dashboard/user/onlineCV.expDescription')}}" name="description" class="form-control" required></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">{{__('dashboard/user/onlineCV.addButton')}}</button>

                            </div>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
    <!-- /Experience Info -->

        <!-- Modal Qualification Description -->
        <div class="modal fade" id="experience-description-modal" tabindex="-1" role="dialog" aria-labelledby="xperience-description-modal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('dashboard/user/onlineCV.expModalTitle')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-experience"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('dashboard/user/onlineCV.close')}}</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Add Certificates -->
    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="ti-cup"></i> {{__('dashboard/user/onlineCV.certTitle')}}</h4>
        </div>

        <div class="tr-single-body">
            <table id="certificate_table" class="table table-striped nowrap">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">{{__('dashboard/user/onlineCV.titleCert')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.date')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.certCredential')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.societyCert')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($certificates as $certificate)
                    <tr>
                        <th scope="row">{{$certificate->name}}</th>
                        <td>{{date('Y',strtotime($certificate->date))}} {{$certificate->end_date != null ? ('-' . date('Y',strtotime($certificate->end_date))) : null}}</td>
                        <td><a style="text-decoration-line: underline;" href="{{$certificate->link}}" target="_blank">{{$certificate->credential}}</a></td>
                        <td>{{$certificate->society}}</td>
                        <td>
                            <div class="dash-action">
                                <a href="{{route('onlineCvEdit', ['operationType' => 'certificate','id' => $certificate->id])}}" class="dg-edit" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.modify')}}"><i class="ti-pencil"></i></a>
                                <a href="{{route('onlineCvDelete', ['id' => $certificate->id, 'operationType' => 'certificate'])}}" class="dg-delete" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.delete')}}"><i class="ti-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <table class="price-list-wrap mb-3 mt-5">
                <tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
                    <td>
                        <div class="box-close"><a style="cursor: pointer" id="add-certificate-butt" class="delete"><i id="add-certificate-icon" class="ti-plus"></i></a></div>
                        <form method="POST" action="{{ route('onlineCvExecute', ['operationType' => 'certificate']) }}">
                            @csrf
                            <div class="row" id="add-certificate" style="display: none">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.certName')}}</label>
                                        <input class="form-control" type="text" placeholder="{{__('dashboard/user/onlineCV.phCertificate')}}" name="certificateName" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.certSociety')}}</label>
                                        <input placeholder="{{__('dashboard/user/onlineCV.phSociety')}}" type="text" class="form-control" name="certificateSociety" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group mt-1 float-right">
                                        <input type="checkbox" name="noEnd" id="no-end-certification">&nbsp;&nbsp;{{__('dashboard/user/onlineCV.certNoExp')}}
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.certGet')}}</label>
                                        <input type="date" class="form-control" name="date" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.certExpired')}}</label>
                                        <input id="end-certification" type="date" class="form-control" name="endDate">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.certCredential')}}</label>
                                        <input type="text" placeholder="{{__('dashboard/user/onlineCV.phCredential')}}" class="form-control" name="credential" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.certLink')}}</label>
                                        <input type="text" placeholder="{{__('dashboard/user/onlineCV.phLink')}}" class="form-control" name="link">
                                    </div>
                                </div>

                                <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">{{__('dashboard/user/onlineCV.addButton')}}</button>

                            </div>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
    <!-- /Certificates Info -->

    <!-- Add Skills -->
    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="ti-light-bulb"></i> {{__('dashboard/user/onlineCV.skillTitle')}}</h4>
        </div>

        <div class="tr-single-body">
            <table id="skill_table" class="table table-striped nowrap">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">{{__('dashboard/user/onlineCV.skillName')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.skillLevel')}}</th>
                    <th scope="col">{{__('dashboard/user/onlineCV.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                        <tr>
                            <th scope="row">{{$skill->name}}</th>
                            <td>{{__('dashboard/user/onlineCV.' . $skill->assestment)}}</td>
                            <td>
                                <div class="dash-action">
                                    <a href="{{route('onlineCvEdit', ['operationType' => 'skill','id' => $skill->id])}}" class="dg-edit" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.modify')}}"><i class="ti-pencil"></i></a>
                                    <a href="{{route('onlineCvDelete', ['id' => $skill->id, 'operationType' => 'skill'])}}" class="dg-delete" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.delete')}}"><i class="ti-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="price-list-wrap mb-3 mt-5">
                <tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
                    <td>
                        <div class="box-close"><a style="cursor: pointer" id="add-skill-butt" class="delete"><i id="add-skill-icon" class="ti-plus"></i></a></div>
                        <form method="POST" action="{{ route('onlineCvExecute', ['operationType' => 'skill']) }}">
                            @csrf
                            <div class="row" id="add-skill" style="display:none;">

                                <div class="ccol-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.skillName')}}</label>
                                        <input class="form-control" placeholder="{{__('dashboard/user/onlineCV.phSkill')}}" type="text" name="skillName" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>{{__('dashboard/user/onlineCV.skillLevel')}}</label>
                                        <select class="form-control" name="skillLevel" required id="level-skill-select">
                                            <option value="beginner">{{__('dashboard/user/onlineCV.beginner')}}</option>
                                            <option value="intermediate">{{__('dashboard/user/onlineCV.intermediate')}}</option>
                                            <option value="advanced">{{__('dashboard/user/onlineCV.advanced')}}</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">{{__('dashboard/user/onlineCV.addButton')}}</button>

                            </div>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
    <!-- /Skills Info -->

    <!-- Add Skills -->
    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="ti-file"></i> {{__('dashboard/user/onlineCV.cvTitle')}}</h4>
        </div>

        <div class="tr-single-body">
            <form method="POST" action="{{ route('onlineCvExecute', ['operationType' => 'cv']) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row float-right">
                            @if(Auth::user()->profile != null && uth::user()->profile->cv_path != null)
                                <p class="mr-3">{{'CV' . '-' . Auth::user()->name . '-' . Auth::user()->surname . '.pdf'}}</p>
                            @endif
                            <div class="form-group mr-2">
                                <a href="{{route('downloadCv')}}">
                                    <button {{Auth::user()->profile == null || Auth::user()->profile->cv_path == null ? 'disabled' : null}} type="button" class="btn btn-primary p-15" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.downloadCv')}}"><i class="ti-download"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>{{__('dashboard/user/onlineCV.cv')}}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="ccv" name="cv" accept=".pdf" required>
                                <label class="custom-file-label" for="ccv">{{__('dashboard/user/onlineCV.chooseCv')}}</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">{{__('dashboard/user/onlineCV.loadCvFile')}}</button>

                </div>
            </form>
        </div>

</div>

<script src="{{asset('js/dashboard.js')}}"></script>
<script src="{{asset('js/dashboard-in-progress.js')}}"></script>

<script>
    jQuery(function($) {
        $(document).ready( function () {

            /*$("#datepicker").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });*/

            let options = {
                "scrollX": true,
                "scrollY": '280px',
                "scrollCollapse": true,
                "order": false,
                "targets": 'no-sort',
                "bSort": false,
                "bInfo": false,
                "bLengthChange": false,
                "bFilter": true,
                "bAutoWidth": false,
                "paging": false,
                "language": {
                    "emptyTable": "{{__('dashboard/user/onlineCV.noData')}}",
                    "sSearch": "{{__('dashboard/user/onlineCV.search')}}"
                }
            };

            $('#qualification_table').DataTable(options);
            $('#skill_table').DataTable(options);
            $('#experience_table').DataTable(options);
            $('#certificate_table').DataTable(options);
        } );
    });
</script>

<script>
    function qualificationDescription(qualification) {
        document.getElementById("modal-qualification").innerHTML = qualification.description;
    }

    function experienceDescription(experience) {
        document.getElementById("modal-experience").innerHTML = experience.description;
    }
</script>

        <script>
            $(document).ready(function() {
                $('#level-skill-select').select2({
                    minimumResultsForSearch: -1
                });
            });
        </script>

@endsection
