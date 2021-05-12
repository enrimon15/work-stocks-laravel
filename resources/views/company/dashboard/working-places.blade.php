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

        .paginate_button.current {
            background-color: #00a94f!important;
            background: #00a94f!important;
            border: unset!important;
            color: white!important;
        }

        .paginate_button:hover {
            background-color: #00a94f!important;
            background: #00a94f!important;
            border: unset!important;
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

        <!-- Error -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{__('dashboard/company/workingPlaces.error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Working Places -->
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h4><i class="ti-light-bulb"></i> {{__('dashboard/company/workingPlaces.title')}}</h4>
            </div>

            <div class="tr-single-body">
                <table id="work_table" class="table table-striped nowrap">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{__('dashboard/company/workingPlaces.city')}}</th>
                        <th scope="col">{{__('dashboard/company/workingPlaces.country')}}</th>
                        <th scope="col">{{__('dashboard/company/workingPlaces.address')}}</th>
                        <th scope="col">{{__('dashboard/company/workingPlaces.type')}}</th>
                        <th scope="col">{{__('dashboard/company/workingPlaces.main')}}</th>
                        <th scope="col">{{__('dashboard/company/workingPlaces.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($workingPlaces as $workingPlace)
                        <tr>
                            <th scope="row">{{$workingPlace->city}}</th>
                            <th scope="row">{{$workingPlace->country}}</th>
                            <th scope="row">{{$workingPlace->address}}</th>
                            <th scope="row">{{__('dashboard/company/workingPlaces.' . $workingPlace->type)}}</th>
                            <th scope="row">{{$workingPlace->primary == true ? 'SI' : 'NO'}}</th>
                            <td>
                                <div class="dash-action">
                                    <a href="{{route('editWorkingPlacesCompany', ['id' => $workingPlace->id])}}" class="dg-edit" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.modify')}}"><i class="ti-pencil"></i></a>
                                    <a href="{{route('deleteWorkingPlacesCompany', ['id' => $workingPlace->id])}}" class="dg-delete" data-toggle="tooltip" data-placement="top" title="{{__('dashboard/user/onlineCV.delete')}}"><i class="ti-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <table class="price-list-wrap mb-3 mt-5">
                    <tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
                        <td>
                            <div class="box-close"><a style="cursor: pointer" id="add-workingplaces-butt" class="delete"><i id="add-workingplaces-icon" class="ti-plus"></i></a></div>
                            <form method="POST" action="{{ route('executeWorkingPlacesCompany', ['operationType' => 'add']) }}">
                                @csrf
                                <div class="row" id="add-workingplaces" style="display:none;">

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>{{__('dashboard/company/workingPlaces.city')}}</label>
                                            <input class="form-control" placeholder="{{__('dashboard/company/workingPlaces.city')}}" type="text" name="city" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>{{__('dashboard/company/workingPlaces.country')}}</label>
                                            <input class="form-control" placeholder="{{__('dashboard/company/workingPlaces.country')}}" type="text" name="country" required>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>{{__('dashboard/company/workingPlaces.address')}}</label>
                                            <input class="form-control" placeholder="{{__('dashboard/company/workingPlaces.address')}}" type="text" name="address" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>{{__('dashboard/company/workingPlaces.type')}}</label>
                                        <select class="form-control" id="working-place-type" name="type" required>
                                            <option value="legal">{{__('dashboard/company/workingPlaces.legal')}}</option>
                                            <option value="commercial">{{__('dashboard/company/workingPlaces.commercial')}}</option>
                                            <option value="operative">{{__('dashboard/company/workingPlaces.operative')}}</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                                        <div class="form-group">
                                            <input type="checkbox" name="primary" id="check-qualification">&nbsp;&nbsp;{{__('dashboard/company/workingPlaces.main')}}
                                        </div>
                                    </div>

                                    <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">{{__('dashboard/company/workingPlaces.addButton')}}</button>

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

                let options = {
                    "scrollX": true,
                    //"scrollY": '280px',
                    "scrollCollapse": true,
                    "order": false,
                    "targets": 'no-sort',
                    "bSort": false,
                    "bInfo": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bAutoWidth": false,
                    "paging": true,
                    "pageLength": 10,
                    "pagingType": "numbers",
                    "language": {
                        "emptyTable": "{{__('dashboard/user/onlineCV.noData')}}",
                        "sSearch": "{{__('dashboard/user/onlineCV.search')}}",
                        "paginate": {
                            "previous":   "{{__('dashboard/company/workingPlaces.previous')}}",
                            "next":       "{{__('dashboard/company/workingPlaces.next')}}",
                        },
                    }
                };

                $('#work_table').DataTable(options);
            } );
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#working-place-type').select2({
                minimumResultsForSearch: -1
            });
        });
    </script>

    <script>
        window.addEventListener('load', function () {
            document.querySelectorAll('ul.pagination > li').forEach(function(item) {
                item.classList.remove("paginate_button");
            });

            // tooltip
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });

            // add working place
            let $workButt = document.getElementById('add-workingplaces-butt');
            $workButt.addEventListener('click', function (e) {
                let $work = document.getElementById('add-workingplaces');
                $work.style.display = $work.style.display === 'none' ? 'flex' : 'none';
                let $workIcon = document.getElementById('add-workingplaces-icon');
                if ($workIcon.classList.contains('ti-close')) {
                    $workIcon.classList.remove('ti-close');
                    $workIcon.classList.add('ti-plus');
                } else {
                    $workIcon.classList.remove('ti-plus');
                    $workIcon.classList.add('ti-close');
                }
            });
            ////////////////
        });
    </script>

@endsection