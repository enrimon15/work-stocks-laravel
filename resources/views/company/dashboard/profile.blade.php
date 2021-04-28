@extends('company.dashboard.company-dashboard')

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
        <!-- User Info -->
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-user"></i> {{__('dashboard/company/profile.profileTitle')}}</h4>
                </div>
                <div class="tr-single-body">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.emailProfile')}}</label>
                                <input class="form-control" name="emailAccess" required type="text" value="{{$user->email}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('emailAccess'))
                                <p class="color--error mb-2"><strong>{{$errors->first('emailAccess')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/user/profile.name')}}</label>
                                <input class="form-control" name="name" required type="text" value="{{$user->name}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('name'))
                                <p class="color--error mb-2"><strong>{{$errors->first('name')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/user/profile.surname')}}</label>
                                <input class="form-control" name="surname" required type="text" value="{{$user->surname}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('surname'))
                                <p class="color--error mb-2"><strong>{{$errors->first('surname')}}</strong></p>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
            <!-- /User Info -->

            <!-- Company Info -->
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-home"></i> {{__('dashboard/company/profile.companyTitle')}}</h4>
                </div>

                <div class="tr-single-body">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.companyName')}}</label>
                                <input class="form-control" required name="companyName" type="text"  value="{{$user->company->name}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('companyName'))
                                <p class="color--error mb-2"><strong>{{$errors->first('companyName')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.overview')}}</label>
                                <textarea id="summernote" name="description">{{$user->company->overview ?? null}}</textarea>
                            </div>
                            <!-- Error -->
                            @if ($errors->has('description'))
                                <p class="color--error mb-2"><strong>{{$errors->first('description')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.vatNumber')}}</label>
                                <input class="form-control" required name="vatNumber" type="number"  value="{{$user->company->vat_number}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('vatNumber'))
                                <p class="color--error mb-2"><strong>{{$errors->first('vatNumber')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.companyForm')}}</label>
                                <input class="form-control" required name="companyForm" type="text"  value="{{$user->company->company_form}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('companyForm'))
                                <p class="color--error mb-2"><strong>{{$errors->first('companyForm')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.avatar')}}</label>
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

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.website')}}</label>
                                <input class="form-control" required type="text" name="website" value="{{$user->company->website}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('website'))
                                <p class="color--error mb-2"><strong>{{$errors->first('website')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.slogan')}}</label>
                                <input class="form-control" type="text" name="slogan" placeholder="{{__('dashboard/company/profile.slogan')}}" value="{{$user->company->slogan ?? null}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('slogan'))
                                <p class="color--error mb-2"><strong>{{$errors->first('slogan')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.foundationYear')}}</label>
                                <input class="form-control" required name="foundationYear" type="number"  value="{{$user->company->foundation_year}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('foundationYear'))
                                <p class="color--error mb-2"><strong>{{$errors->first('foundationYear')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.employeesNumber')}}</label>
                                <input class="form-control" required name="employeesNumber" type="number"  value="{{$user->company->employees_number}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('employeesNumber'))
                                <p class="color--error mb-2"><strong>{{$errors->first('employeesNumber')}}</strong></p>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
            <!-- /Company Info -->

            <!-- Contact Info -->
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-id-badge"></i> {{__('dashboard/company/profile.contactTile')}}</h4>
                </div>
                <div class="tr-single-body">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.emailContact')}}</label>
                                <input class="form-control" name="emailContact" required type="text" value="{{$user->company->commercialContact->email}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('emailContact'))
                                <p class="color--error mb-2"><strong>{{$errors->first('emailContact')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.nameContact')}}</label>
                                <input class="form-control" name="nameContact" required type="text" autocomplete="name" value="{{$user->company->commercialContact->name}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('nameContact'))
                                <p class="color--error mb-2"><strong>{{$errors->first('nameContact')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.phoneContact')}}</label>
                                <input class="form-control" name="phoneContact" required type="text" value="{{$user->company->commercialContact->telephone}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('phoneContact'))
                                <p class="color--error mb-2"><strong>{{$errors->first('phoneContact')}}</strong></p>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
            <!-- /Contact Info -->

            <!-- Working Place Info -->
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-location-pin"></i> {{__('dashboard/company/profile.workingPlaceTitle')}}</h4>
                </div>
                <div class="tr-single-body">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.address')}}</label>
                                <input class="form-control" name="address" required type="text" value="{{$user->company->mainPlaceOfWork()->address}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('address'))
                                <p class="color--error mb-2"><strong>{{$errors->first('address')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.city')}}</label>
                                <input class="form-control" name="city" required type="text" value="{{$user->company->mainPlaceOfWork()->city}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('city'))
                                <p class="color--error mb-2"><strong>{{$errors->first('city')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.country')}}</label>
                                <input class="form-control" name="country" required type="text" value="{{$user->company->mainPlaceOfWork()->country}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('country'))
                                <p class="color--error mb-2"><strong>{{$errors->first('country')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/profile.typeWorkingPlace')}}</label>
                                <select required class="form-control" name="typeWorkingPlace">
                                    <option {{$user->company->mainPlaceOfWork()->type == 'legal' ? 'selected' : null}} value="legal">{{__('dashboard/company/profile.legal')}}</option>
                                    <option {{$user->company->mainPlaceOfWork()->type == 'commercial' ? 'selected' : null}} value="commercial">{{__('dashboard/company/profile.commercial')}}</option>
                                    <option {{$user->company->mainPlaceOfWork()->type == 'operative' ? 'selected' : null}} value="operative">{{__('dashboard/company/profile.operative')}}</option>
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
            <!-- /Working Place Info -->

            <button type="submit" class="btn btn-info btn-md full-width">{{__('dashboard/company/profile.buttonSave')}}<i class="ml-2 ti-arrow-right"></i></button>
        </form>

    </div>

@endsection