@extends('subscriber.dashboard.candidate-dashboard')

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

        <form method="POST" action="{{ route('updateProfileExecute') }}" enctype="multipart/form-data">
        @csrf
            <!-- Basic Info -->
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-desktop"></i> {{__('dashboard/user/profile.title')}}</h4>
                </div>
                <div class="tr-single-body">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/user/profile.name')}}</label>
                                <input class="form-control" name="name" required type="text" value="{{$user->name}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('name'))
                                <p class="color--error mb-2"><strong>{{$errors->first('name')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/user/profile.surname')}}</label>
                                <input class="form-control" name="surname" required type="text" value="{{$user->surname}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('surname'))
                                <p class="color--error mb-2"><strong>{{$errors->first('surname')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/user/profile.jobPosition')}}</label>
                                <input class="form-control" name="jobTitle" type="text" placeholder="{{__('dashboard/user/profile.phJobTitle')}}"  value="{{$user->profile->job_title ?? null}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('jobTitle'))
                                <p class="color--error mb-2"><strong>{{$errors->first('jobTitle')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/user/profile.minSalary')}}</label>
                                <input class="form-control" name="minSalary" type="number" placeholder="0"  value="{{$user->profile->min_salary ?? null}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('minSalary'))
                                <p class="color--error mb-2"><strong>{{$errors->first('minSalary')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/user/profile.overview')}}</label>
                                <textarea id="summernote" name="description">{{$user->profile->overview ?? null}}</textarea>
                            </div>
                            <!-- Error -->
                            @if ($errors->has('description'))
                                <p class="color--error mb-2"><strong>{{$errors->first('description')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/user/profile.avatar')}}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="clogo" name="avatar" accept=".png,.jpg,.jpeg">
                                    <label class="custom-file-label" for="clogo">{{__('dashboard/user/profile.chooseImg')}}</label>
                                </div>
                            </div>
                            <!-- Error -->
                            @if ($errors->has('avatar'))
                                <p class="color--error mb-2"><strong>{{$errors->first('avatar')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/user/profile.birth')}}</label>
                                <input class="form-control" type="date" name="birth" value="{{$user->profile->birth ?? null}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('birth'))
                                <p class="color--error mb-2"><strong>{{$errors->first('birth')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/user/profile.gender')}}</label>
                                <select class="form-control" name="sex" id="sex-select">
                                    @if($user->profile()->exists() && !empty($user->profile->sex))
                                        <option disabled>{{__('dashboard/user/profile.choose')}}</option>
                                        <option {{$user->profile->sex == 'M' ? 'selected' : null}} value="M">M</option>
                                        <option {{$user->profile->sex == 'F' ? 'selected' : null}} value="F">F</option>
                                    @else
                                        <option selected disabled>{{__('dashboard/user/profile.choose')}}</option>
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    @endif
                                </select>
                            </div>
                            <!-- Error -->
                            @if ($errors->has('sex'))
                                <p class="color--error mb-2"><strong>{{$errors->first('sex')}}</strong></p>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
            <!-- /Basic Info -->

            <!-- Contact Info -->
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-headphone"></i> {{__('dashboard/user/profile.contactsTitle')}}</h4>
                </div>

                <div class="tr-single-body">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="social-nfo">{{__('dashboard/user/profile.telephone')}}</label>
                                <input class="form-control" type="text" name="telephone" placeholder="{{__('dashboard/user/profile.phTelephone')}}" value="{{$user->profile->telephone ?? null}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('telephone'))
                                <p class="color--error mb-2"><strong>{{$errors->first('telephone')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="social-nfo">{{__('dashboard/user/profile.email')}}</label>
                                <input class="form-control" type="email" name="email" required value="{{$user->email}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('email'))
                                <p class="color--error mb-2"><strong>{{$errors->first('email')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="social-nfo">{{__('dashboard/user/profile.country')}}</label>
                                <input class="form-control" type="text" name="country" placeholder="{{__('dashboard/user/profile.phCountry')}}" value="{{$user->profile->country ?? null}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('country'))
                                <p class="color--error mb-2"><strong>{{$errors->first('country')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="social-nfo">{{__('dashboard/user/profile.city')}}</label>
                                <input class="form-control" type="text" name="city" placeholder="{{__('dashboard/user/profile.phCity')}}" value="{{$user->profile->city ?? null}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('city'))
                                <p class="color--error mb-2"><strong>{{$errors->first('city')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="social-nfo">{{__('dashboard/user/profile.website')}}</label>
                                <input class="form-control" name="website" type="text" placeholder="{{__('dashboard/user/profile.phWebsite')}}" value="{{$user->profile->website ?? null}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('website'))
                                <p class="color--error mb-2"><strong>{{$errors->first('website')}}</strong></p>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
            <!-- /Contact Info -->

            <button type="submit" class="btn btn-info btn-md full-width">{{__('dashboard/user/profile.buttonSave')}}<i class="ml-2 ti-arrow-right"></i></button>
        </form>

    </div>

    <script>
        $(document).ready(function() {
            $('#sex-select').select2({
                minimumResultsForSearch: -1
            });
        });
    </script>

@endsection
