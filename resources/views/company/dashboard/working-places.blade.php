@extends('company.dashboard.company-dashboard')

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

    <!-- Working Places -->
    <div class="tab-pane active container" id="workingPlaces">

        @if(Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Add Skills -->
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h4><i class="ti-light-bulb"></i> {{__('dashboard/user/onlineCV.skillTitle')}}</h4>
            </div>

            <div class="tr-single-body">
                <table id="skill_table" class="table table-striped nowrap">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Città</th>
                        <th scope="col">Nazione</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Principale</th>
                        <th scope="col">Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($workingPlaces as $workingPlace)
                        <tr>
                            <th scope="row">{{$workingPlace->city}}</th>
                            <th scope="row">{{$workingPlace->country}}</th>
                            <th scope="row">{{$workingPlace->address}}</th>
                            <th scope="row">{{$workingPlace->type}}</th>
                            <th scope="row">{{$workingPlace->primary == true ? 'SI' : 'NO'}}</th>
                            <td>
                                <div class="dash-action">
                                    <a href="{{route('onlineCvEdit', ['operationType' => 'skill','id' => $workingPlace->id])}}" class="dg-edit" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.modify')}}"><i class="ti-pencil"></i></a>
                                    <a href="{{route('onlineCvDelete', ['id' => $workingPlace->id, 'operationType' => 'skill'])}}" class="dg-delete" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.delete')}}"><i class="ti-trash"></i></a>
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


    </div>

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

@endsection