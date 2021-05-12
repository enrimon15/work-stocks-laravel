@extends('company.dashboard.company-dashboard')

@section('content-dashboard')

    <!-- Post Job Offer -->
    <div class="tab-pane active container" id="postNewJob">

        @if(Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form method="POST" action="{{ route('updateProfileCompanyExecute') }}" enctype="multipart/form-data">
        @csrf
        <!-- User Info -->
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-id-badge"></i> {{__('dashboard/company/profile.profileTitle')}}</h4>
                </div>
                <div class="tr-single-body">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Sede Di Lavoro</label>
                                <select required class="form-control" name="workingPlace" id="working-place">
                                    <option value="legal">Test1</option>
                                    <option value="commercial">Test2</option>
                                    <option value="operative">Test3</option>
                                </select>
                            </div>
                            <!-- Error -->
                            @if ($errors->has('workingPlace'))
                                <p class="color--error mb-2"><strong>{{$errors->first('workingPlace')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Titolo</label>
                                <input class="form-control" name="title" required type="text" placeholder="Titolo">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('title'))
                                <p class="color--error mb-2"><strong>{{$errors->first('title')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Descrizione</label>
                                <textarea id="summernote" name="description"></textarea>
                            </div>
                            <!-- Error -->
                            @if ($errors->has('description'))
                                <p class="color--error mb-2"><strong>{{$errors->first('description')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Data Di Scadenza</label>
                                <input class="form-control" name="dueDate" required type="date">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('dueDate'))
                                <p class="color--error mb-2"><strong>{{$errors->first('dueDate')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Tipologia Contratto</label>
                                <select required class="form-control" name="offerType" id="offer-type">
                                    <option value="legal">Test1</option>
                                    <option value="commercial">Test2</option>
                                    <option value="operative">Test3</option>
                                </select>
                            </div>
                            <!-- Error -->
                            @if ($errors->has('offerType'))
                                <p class="color--error mb-2"><strong>{{$errors->first('offerType')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Esperienza Minina</label>
                                <input class="form-control" name="experience" required type="number" min="0" placeholder="Esperienza minima (Anni)">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('experience'))
                                <p class="color--error mb-2"><strong>{{$errors->first('experience')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Genere</label>
                                <select required class="form-control" name="gender" id="gender">
                                    <option value="legal">Indifferente</option>
                                    <option value="commercial">M</option>
                                    <option value="operative">F</option>
                                </select>
                            </div>
                            <!-- Error -->
                            @if ($errors->has('gender'))
                                <p class="color--error mb-2"><strong>{{$errors->first('gender')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Salario Minimo</label>
                                <input class="form-control" name="minSalary" type="number" min="0" placeholder="Salario Minimo (k)">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('minSalary'))
                                <p class="color--error mb-2"><strong>{{$errors->first('minSalary')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Salario Massimo</label>
                                <input class="form-control" name="maxSalary" type="number" min="0" placeholder="Salario Massimo (k)">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('maxSalary'))
                                <p class="color--error mb-2"><strong>{{$errors->first('maxSalary')}}</strong></p>
                            @endif
                        </div>

                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-info btn-md full-width">{{__('dashboard/company/profile.buttonSave')}}<i class="ml-2 ti-arrow-right"></i></button>
        </form>

    </div>

    <script>
        $(document).ready(function() {
            $('#working-place').select2();

            $('#offer-type').select2({
                minimumResultsForSearch: -1
            });

            $('#gender').select2({
                minimumResultsForSearch: -1
            });
        });
    </script>

@endsection