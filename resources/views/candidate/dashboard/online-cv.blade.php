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
                <tr>
                    <th scope="row">Masters In Fine Arts</th>
                    <td>2002 - 2004</td>
                    <td>Virazia University</td>
                    <td>100</td>
                    <td>Desc</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Tommers College</th>
                    <td>2012 - 2015</td>
                    <td>Bachlors in Fine Arts</td>
                    <td>100</td>
                    <td>Desc</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Diploma In Fine Arts</th>
                    <td>2014 - 2015</td>
                    <td>Imperieal of Art Direction</td>
                    <td>100</td>
                    <td>Desc</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <table class="price-list-wrap mb-4 mt-5">
                <tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
                    <td>
                        <div class="box-close"><a style="cursor: pointer" id="add-qualification-butt" class="delete"><i id="add-qualification-icon" class="ti-plus"></i></a></div>
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
                                    <textarea placeholder="Descrizione" name="description" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Valutazione</label>
                                    <input placeholder="Valutazione" name="valuation" type="text" class="form-control" required>
                                </div>
                            </div>

                            <a href="#" class="btn add-pr-item-btn mt-2 ml-1">Aggiungi</a>

                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
    <!-- /Education Info -->

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
                <tr>
                    <th scope="row">Software Developer presso Gio Tech</th>
                    <td>2002 - 2004</td>
                    <td>Desc</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">PHP Developer presso Hint Solution</th>
                    <td>2012 - 2015</td>
                    <td>Desc</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Web Designer presso Indo Soft</th>
                    <td>2014 - 2015</td>
                    <td>Desc</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <table class="price-list-wrap mb-3 mt-5">
                <tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
                    <td>
                        <div class="box-close"><a style="cursor: pointer" id="add-experience-butt" class="delete"><i id="add-experience-icon" class="ti-plus"></i></a></div>
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

                            <a href="#" class="btn add-pr-item-btn mt-2 ml-1">Aggiungi</a>

                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
    <!-- /Experience Info -->

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
                <tr>
                    <th scope="row">Angular Developer</th>
                    <td>2002 - 2004</td>
                    <td>dfghs</td>
                    <td>Udemy</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">PHP Developer</th>
                    <td>2012 - 2015</td>
                    <td>djfkklf</td>
                    <td>Udemy</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Web Designer</th>
                    <td>2014 - 2015</td>
                    <td>fjgjg</td>
                    <td>Udemy</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <table class="price-list-wrap mb-3 mt-5">
                <tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
                    <td>
                        <div class="box-close"><a style="cursor: pointer" id="add-certificate-butt" class="delete"><i id="add-certificate-icon" class="ti-plus"></i></a></div>
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

                            <a href="#" class="btn add-pr-item-btn mt-2 ml-1">Aggiungi</a>

                        </div>
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
                <tr>
                    <th scope="row">Graphic Design</th>
                    <td>Principiante</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">PHP Developer</th>
                    <td>Intermedio</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Web Designer</th>
                    <td>Avanzato</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <table class="price-list-wrap mb-3 mt-5">
                <tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
                    <td>
                        <div class="box-close"><a style="cursor: pointer" id="add-skill-butt" class="delete"><i id="add-skill-icon" class="ti-plus"></i></a></div>
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

                            <a href="#" class="btn add-pr-item-btn mt-2 ml-1">Aggiungi</a>

                        </div>
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

<script>
    jQuery(function($) {
        $(document).ready( function () {
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
                "paging": false
            };

            $('#qualification_table').DataTable(options);
            $('#skill_table').DataTable(options);
            $('#experience_table').DataTable(options);
        } );
    });
</script>

@endsection