@extends('candidate.dashboard.candidate-dashboard')

@section('content-dashboard')

<!-- My Resume and Online CV -->
<div class="tab-pane active container" id="resume">

    <!-- Add Educations -->
    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="lni-graduation"></i> Qualifiche</h4>
        </div>

        <div class="tr-single-body">
            <table class="table table-striped mb-5">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Qualification</th>
                    <th scope="col">Dates</th>
                    <th scope="col">School / Colleges</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Masters In Fine Arts</th>
                    <td>2002 - 2004</td>
                    <td>Virazia University</td>
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
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <table class="price-list-wrap">
                <tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
                    <td>
                        <div class="box-close"><a class="delete" href="#"><i class="ti-close"></i></a></div>
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" type="text" value="Adam Muklarial">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>From</label>
                                    <input placeholder="06.11.2007" type="text" class="form-control datepicker">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>To</label>
                                    <input placeholder="07.17.2010" type="text" class="form-control datepicker">
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>University</label>
                                    <input placeholder="University Name" type="text" class="form-control">
                                </div>
                            </div>

                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <a href="#" class="btn add-pr-item-btn">Add Item</a>
        </div>

    </div>
    <!-- /Education Info -->

    <!-- Add Experience -->
    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="lni-briefcase"></i> Experience</h4>
        </div>

        <div class="tr-single-body">
            <table class="table table-striped mb-5">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Skills @ Company</th>
                    <th scope="col">Dates</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Wordpress Developer at Gio Tech</th>
                    <td>2002 - 2004</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">PHP Developer at Hint Solution</th>
                    <td>2012 - 2015</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Web Designer at Indo Soft</th>
                    <td>2014 - 2015</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <table class="price-list-wrap">
                <tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
                    <td>
                        <div class="box-close"><a class="delete" href="#"><i class="ti-close"></i></a></div>
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" type="text" value="Skill & Company">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>From</label>
                                    <input placeholder="06.11.2007" type="text" class="form-control datepicker">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>To</label>
                                    <input placeholder="07.17.2010" type="text" class="form-control datepicker">
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input placeholder="Company Name" type="text" class="form-control">
                                </div>
                            </div>

                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <a href="#" class="btn add-pr-item-btn">Add Item</a>
        </div>

    </div>
    <!-- /Experience Info -->

    <!-- Add Skills -->
    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="lni-briefcase"></i> Skill Or Expertise</h4>
        </div>

        <div class="tr-single-body">
            <table class="table table-striped mb-5">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Skills @ Company</th>
                    <th scope="col">Lavel</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Graphic Design</th>
                    <td>65</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">PHP Developer</th>
                    <td>75</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Web Designer</th>
                    <td>88</td>
                    <td>
                        <div class="dash-action">
                            <a href="#" class="dg-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="ti-pencil"></i></a>
                            <a href="#" class="dg-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="ti-trash"></i></a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <table class="price-list-wrap">
                <tbody class="ui-sortable"><tr class="pricing-list-item pattern ui-sortable-handle">
                    <td>
                        <div class="box-close"><a class="delete" href="#"><i class="ti-close"></i></a></div>
                        <div class="row">

                            <div class="col-lg-9 col-md-9 col-sm-8">
                                <div class="form-group">
                                    <label>Skills</label>
                                    <input class="form-control" type="text" value="Skills">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-4">
                                <div class="form-group">
                                    <label>Lavel</label>
                                    <input placeholder="68" type="text" class="form-control">
                                </div>
                            </div>

                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <a href="#" class="btn add-pr-item-btn">Add Item</a>
        </div>

    </div>
    <!-- /Skills Info -->

    <a href="#" class="btn btn-info btn-md full-width">Save & Update<i class="ml-2 ti-arrow-right"></i></a>

</div>

@endsection