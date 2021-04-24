@extends('candidate.dashboard.candidate-dashboard')

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
           Operazione non riuscita, controlla che tutti i campi siano corretti!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <!-- Add Educations -->
    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="lni-graduation"></i> Istruzione</h4>
        </div>

        <div class="tr-single-body">
            <table id="qualification_table" class="table table-striped nowrap">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Data</th>
                    <th scope="col">Istituto</th>
                    <th scope="col">Valutazione</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Azioni</th>
                </tr>
                </thead>
                <tbody>
                @foreach($qualifications as $qualification)
                    <tr>
                        <th scope="row">{{$qualification->name}}</th>
                        <td>{{date('Y',strtotime($qualification->start_date))}} - {{$qualification->end_date != null ? date('Y',strtotime($qualification->end_date)) : 'in corso'}}</td>
                        <td>{{$qualification->institute}}</td>
                        <td>{{$qualification->valuation ?? null}}</td>
                        <td>
                            @if($qualification->description != null)
                                <span data-toggle="modal" data-target="#qualification-description-modal">
                                <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Leggi Descrizione">
                                    <i class="ti-eye"></i>
                                </a>
                                </span>
                            @else
                                {{null}}
                            @endif
                        </td>
                        <td>
                            <div class="dash-action">
                                <a href="{{route('onlineCvEdit', ['operationType' => 'qualification','id' => $qualification->id])}}" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Modifica"><i class="ti-pencil"></i></a>
                                <a href="{{route('onlineCvDelete', ['id' => $qualification->id, 'operationType' => 'qualification'])}}" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Elimina"><i class="ti-trash"></i></a>
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
                                        <label>Nome</label>
                                        <input class="form-control" name="name" placeholder="Nome" type="text" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group mt-1 float-right">
                                        <input type="checkbox" name="inProgress" id="check-qualification">&nbsp;&nbsp;In corso
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Data di inizio</label>
                                        <input type="date" class="form-control" name="startDate" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Data di fine</label>
                                        <input id="end-qualification" type="date" class="form-control" name="endDate">
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Istituto</label>
                                        <input placeholder="Nome istituto" name="institute" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Descrizione</label>
                                        <textarea placeholder="Descrizione" name="description" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Valutazione</label>
                                        <input placeholder="Valutazione" name="valuation" type="text" class="form-control">
                                    </div>
                                </div>

                                <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">Aggiungi</button>
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
                    <h5 class="modal-title">Descrizione Qualifica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{$qualification->description ?? null}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Experience -->
    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="lni-briefcase"></i> Esperienze</h4>
        </div>

        <div class="tr-single-body">
            <table id="experience_table" class="table table-striped nowrap">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Titolo @ Azienda</th>
                    <th scope="col">Date</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Azioni</th>
                </tr>
                </thead>
                <tbody>
                @foreach($experiences as $experience)
                    <tr>
                        <th scope="row">{{$experience->job_position}} @ {{$experience->company}}</th>
                        <td>{{date('Y',strtotime($experience->start_date))}} - {{$experience->end_date != null ? date('Y',strtotime($experience->end_date)) : 'in corso'}}</td>
                        <td>
                            @if($experience->description != null)
                                <span data-toggle="modal" data-target="#experience-description-modal">
                                <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Leggi Descrizione">
                                    <i class="ti-eye"></i>
                                </a>
                                </span>
                            @else
                                {{null}}
                            @endif
                        </td>
                        <td>
                            <div class="dash-action">
                                <a href="{{route('onlineCvEdit', ['operationType' => 'experience','id' => $experience->id])}}" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Modifica"><i class="ti-pencil"></i></a>
                                <a href="{{route('onlineCvDelete', ['id' => $experience->id, 'operationType' => 'experience'])}}" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Elimina"><i class="ti-trash"></i></a>
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
                                        <label>Posizione Lavorativa</label>
                                        <input class="form-control" type="text" placeholder="Posizione lavorativa" name="jobPosition" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Azienda</label>
                                        <input placeholder="Nome azienda" type="text" class="form-control" name="companyName" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group mt-1 float-right">
                                        <input type="checkbox" name="inProgress" id="check-experience">&nbsp;&nbsp;In corso
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Data di inizio</label>
                                        <input type="date" class="form-control" name="startDate" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Data di fine</label>
                                        <input id="end-experience" type="date" class="form-control" name="endDate">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Descrizione</label>
                                        <textarea placeholder="Descrizione" name="description" class="form-control" required></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">Aggiungi</button>

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
                        <h5 class="modal-title">Descrizione Esperienza</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{$experience->description ?? null}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Chiudi</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Add Certificates -->
    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="ti-cup"></i> Certificati</h4>
        </div>

        <div class="tr-single-body">
            <table id="certificate_table" class="table table-striped nowrap">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col">Date</th>
                    <th scope="col">Credenziale</th>
                    <th scope="col">Ente</th>
                    <th scope="col">Azioni</th>
                </tr>
                </thead>
                <tbody>
                @foreach($certificates as $certificate)
                    <tr>
                        <th scope="row">{{$certificate->name}}</th>
                        <td>{{date('Y',strtotime($certificate->date))}} - {{$certificate->end_date != null ? date('Y',strtotime($certificate->end_date)) : null}}</td>
                        <td><a href="{{$certificate->link}}">{{$certificate->credential}}</a></td>
                        <td>{{$certificate->society}}</td>
                        <td>
                            <div class="dash-action">
                                <a href="{{route('onlineCvEdit', ['operationType' => 'certificate','id' => $certificate->id])}}" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Modifica"><i class="ti-pencil"></i></a>
                                <a href="{{route('onlineCvDelete', ['id' => $certificate->id, 'operationType' => 'certificate'])}}" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Elimina"><i class="ti-trash"></i></a>
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
                                        <label>Nome</label>
                                        <input class="form-control" type="text" placeholder="Nome certificato" name="certificateName" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Ente Rilasciante</label>
                                        <input placeholder="Nome ente rilasciante" type="text" class="form-control" name="certificateSociety" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Data di ottenimento</label>
                                        <input type="date" class="form-control" name="date" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Data di scadenza</label>
                                        <input type="date" class="form-control" name="endDate">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Credenziale</label>
                                        <input type="text" placeholder="ID credenziale" class="form-control" name="credential" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Link</label>
                                        <input type="text" placeholder="URL" class="form-control" name="link">
                                    </div>
                                </div>

                                <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">Aggiungi</button>

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
            <h4><i class="ti-light-bulb"></i> Competenze</h4>
        </div>

        <div class="tr-single-body">
            <table id="skill_table" class="table table-striped nowrap">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Competenza</th>
                    <th scope="col">Livello</th>
                    <th scope="col">Azioni</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                        <tr>
                            <th scope="row">{{$skill->name}}</th>
                            <td>{{$skill->assestment}}</td>
                            <td>
                                <div class="dash-action">
                                    <a href="{{route('onlineCvEdit', ['operationType' => 'skill','id' => $skill->id])}}" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Modifica"><i class="ti-pencil"></i></a>
                                    <a href="{{route('onlineCvDelete', ['id' => $skill->id, 'operationType' => 'skill'])}}" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Elimina"><i class="ti-trash"></i></a>
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
                                        <label>Competenza</label>
                                        <input class="form-control" placeholder="Nome competenza" type="text" name="skillName" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Livello</label>
                                        <select class="form-control" name="skillLevel">
                                            <option value="beginner">Principiante</option>
                                            <option value="intermediate">Intermedio</option>
                                            <option value="advanced">Avanzato</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">Aggiungi</button>

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
            <h4><i class="ti-file"></i> Curriculum Vitae</h4>
        </div>

        <div class="tr-single-body">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group float-right">
                        <button disabled type="button" class="btn btn-primary p-15" data-toggle="tooltip" data-placement="top" title="Scarica CV"><i class="ti-download"></i></button>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>CV (pdf, doc, docx)</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="ccv" name="cv">
                            <label class="custom-file-label" for="ccv">Scegli file</label>
                        </div>
                    </div>
                </div>

                <a href="#" class="btn add-pr-item-btn mt-2 ml-1">Carica</a>

            </div>
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
                    "emptyTable": 'Non sono presenti dati, clicca su "+" per aggiungerne',
                    "sSearch": "Cerca:"
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