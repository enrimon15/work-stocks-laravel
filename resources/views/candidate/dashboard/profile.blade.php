@extends('candidate.dashboard.candidate-dashboard')

@section('content-dashboard')

    <!-- My Profile -->
    <div class="tab-pane active container" id="profile">

        @if(Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form method="POST" action="{{ route('updateProfileExecute') }}">
        @csrf
            <!-- Basic Info -->
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-desktop"></i> Dettagli Profilo</h4>
                </div>
                <div class="tr-single-body">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Nome</label>
                                <input class="form-control" name="name" required type="text" value="{{$user->name}}">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Cognome</label>
                                <input class="form-control" name="surname" required type="text" value="{{$user->surname}}">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Titolo di lavoro</label>
                                <input class="form-control" name="jobTitle" type="text" placeholder="Titolo di lavoro"  value="{{$user->profile->job_title ?? null}}">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Salario minimo</label>
                                <input class="form-control" name="minSalary" type="number" placeholder="0"  value="{{$user->profile->min_salary ?? null}}">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Descrizione</label>
                                <textarea id="summernote" name="description">{{$user->profile->overview ?? null}}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Avatar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="clogo" name="avatar">
                                    <label class="custom-file-label" for="clogo">Scegli immagine</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Data di nascita</label>
                                <input class="form-control" type="date" name="birth" value="{{$user->profile->birth ?? null}}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Sesso</label>
                                <select class="form-control" name="sex">
                                    @if($user->profile()->exists() && !empty($user->profile->sex))
                                        <option {{$user->profile->sex == 'M' ? 'selected' : null}} value="M">M</option>
                                        <option {{$user->profile->sex == 'F' ? 'selected' : null}} value="F">F</option>
                                    @else
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /Basic Info -->

            <!-- Contact Info -->
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-headphone"></i> Contatti</h4>
                </div>

                <div class="tr-single-body">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="social-nfo">Telefono</label>
                                <input class="form-control" type="text" name="telephone" placeholder="Numero di telefono" value="{{$user->profile->telephone ?? null}}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="social-nfo">Email</label>
                                <input class="form-control" type="email" name="email" required value="{{$user->email}}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="social-nfo">Nazionalità</label>
                                <input class="form-control" type="text" name="country" placeholder="Nazione" value="{{$user->profile->country ?? null}}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="social-nfo">Città</label>
                                <input class="form-control" type="text" name="city" placeholder="Città" value="{{$user->profile->min_salary ?? null}}">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="social-nfo">Sito web</label>
                                <input class="form-control" name="website" type="text" placeholder="www.website.com" value="{{$user->profile->website ?? null}}">
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /Contact Info -->

            <button type="submit" class="btn btn-info btn-md full-width">Salva<i class="ml-2 ti-arrow-right"></i></button>
        </form>

    </div>

@endsection