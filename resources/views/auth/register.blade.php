@extends('layouts.outline')

@section('content')

    <!-- ============================ Hero Banner  Start================================== -->
    <div class="page-title-wrap pt-img-wrap" style="background:url({{asset('img/login-banner.jpeg')}}) no-repeat;">
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <div class="pt-caption text-center">
                    <h1>{{__('loginAndRegister.registerTitle')}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Who We Are Start ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="modal-body">

                        <div class="login-form">

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-5">
                                    <label>{{__('loginAndRegister.userTypeQuestion')}}</label>
                                    <select class="form-control" name="user_type" onchange="changeRole()" id="select-role" required>
                                        <option {{ old("user_type") == 'user' ? "selected" : "" }} value="user">{{__('loginAndRegister.userTypeUser')}}</option>
                                        <option {{ old("user_type") == 'company' ? "selected" : "" }} value="company">{{__('loginAndRegister.userTypeCompany')}}</option>
                                    </select>
                                    <!-- Error -->
                                    @if ($errors->has('user_type'))
                                        <p class="color--error mb-2"><strong>{{ $errors->first('user_type') }}</strong></p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{__('loginAndRegister.nameLabel')}}</label>
                                    <div class="input-with-gray">
                                        <input type="text" class="form-control" placeholder="{{__('loginAndRegister.nameLabel')}}" name="name" value="{{ old('name') }}" required autocomplete="given-name">
                                        <i class="ti-user"></i>
                                    </div>
                                    <!-- Error -->
                                    @if ($errors->has('name'))
                                        <p class="color--error mb-2"><strong>{{ $errors->first('name') }}</strong></p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{__('loginAndRegister.surnameLabel')}}</label>
                                    <div class="input-with-gray">
                                        <input id="surname-field" type="text" class="form-control" placeholder="{{__('loginAndRegister.surnameLabel')}}" name="surname" value="{{ old('surname') }}" required autocomplete="family-name">
                                        <i class="ti-user"></i>
                                    </div>
                                    <!-- Error -->
                                    @if ($errors->has('surname'))
                                        <p class="color--error mb-2"><strong>{{ $errors->first('surname') }}</strong></p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{__('loginAndRegister.emailLabel')}}</label>
                                    <div class="input-with-gray">
                                        <input type="email" class="form-control" placeholder="{{__('loginAndRegister.emailLabel')}}" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        <i class="ti-email"></i>
                                    </div>
                                    <!-- Error -->
                                    @if ($errors->has('email'))
                                        <p class="color--error mb-2"><strong>{{ $errors->first('email') }}</strong></p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{__('loginAndRegister.passwordLabel')}}</label>
                                    <div class="input-with-gray">
                                        <input type="password" class="form-control" placeholder="*******" name="password" required autocomplete="new-password">
                                        <i class="ti-unlock"></i>
                                    </div>
                                    <!-- Error -->
                                    @if ($errors->has('password'))
                                        <p class="color--error mb-2"><strong>{{ $errors->first('password') }}</strong></p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>{{__('loginAndRegister.passwordConfirmationLabel')}}</label>
                                    <div class="input-with-gray">
                                        <input type="password" class="form-control" placeholder="*******" name="password_confirmation" required autocomplete="new-password">
                                        <i class="ti-unlock"></i>
                                    </div>
                                    <!-- Error -->
                                    @if ($errors->has('password_confirmation'))
                                        <p class="color--error mb-2"><strong>{{ $errors->first('password_confirmation') }}</strong></p>
                                    @endif
                                </div>
                                
                                <div id="company-fields" style="display: none;">
                                    <!-- Company Information -->
                                    <div class="tr-single-header mt-5 mb-3 pt-5 pb-0 pl-0 pr-0">
                                        <h4><i class="ti-home"></i> {{__('loginAndRegister.companyTitle')}}</h4>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('loginAndRegister.companyName')}}</label>
                                        <div class="input-with-gray">
                                            <input type="text" class="form-control companyfield" placeholder="{{__('loginAndRegister.companyNameM')}}" name="companyName" value="{{ old('companyName') }}" required>
                                            <i class="ti-home"></i>
                                        </div>
                                        <!-- Error -->
                                        @if ($errors->has('companyName'))
                                            <p class="color--error mb-2"><strong>{{ $errors->first('companyName') }}</strong></p>
                                        @endif
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label>{{__('loginAndRegister.vatNumber')}}</label>
                                            <div class="input-with-gray">
                                                <input type="number" class="form-control companyfield" placeholder="{{__('loginAndRegister.vatNumber')}}" name="vatNumber" value="{{ old('vatNumber') }}" required>
                                                <i class="ti-receipt"></i>
                                            </div>
                                            <!-- Error -->
                                            @if ($errors->has('vatNumber'))
                                                <p class="color--error mb-2"><strong>{{ $errors->first('vatNumber') }}</strong></p>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label>{{__('loginAndRegister.companyForm')}}</label>
                                            <div class="input-with-gray">
                                                <input type="text" class="form-control companyfield" placeholder="{{__('loginAndRegister.companyFormM')}}" name="companyForm" value="{{ old('companyForm') }}" required>
                                                <i class="ti-tag"></i>
                                            </div>
                                            <!-- Error -->
                                            @if ($errors->has('companyForm'))
                                                <p class="color--error mb-2"><strong>{{ $errors->first('companyForm') }}</strong></p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label>{{__('loginAndRegister.foundationYear')}}</label>
                                            <div class="input-with-gray">
                                                <input type="number" class="form-control companyfield" placeholder="{{__('loginAndRegister.foundationYearM')}}" name="foundationYear" value="{{ old('foundationYear') }}" required>
                                                <i class="ti-time"></i>
                                            </div>
                                            <!-- Error -->
                                            @if ($errors->has('foundationYear'))
                                                <p class="color--error mb-2"><strong>{{ $errors->first('foundationYear') }}</strong></p>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label>{{__('loginAndRegister.employeesNumber')}}</label>
                                            <div class="input-with-gray">
                                                <input type="number" class="form-control companyfield" placeholder="{{__('loginAndRegister.employeesNumberM')}}" name="employeesNumber" value="{{ old('employeesNumber') }}" required>
                                                <i class="ti-user"></i>
                                            </div>
                                            <!-- Error -->
                                            @if ($errors->has('employeesNumber'))
                                                <p class="color--error mb-2"><strong>{{ $errors->first('employeesNumber') }}</strong></p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('loginAndRegister.website')}}</label>
                                        <div class="input-with-gray">
                                            <input id="website" type="text" class="form-control companyfield" placeholder="{{__('loginAndRegister.websiteM')}}" name="website" value="{{ old('website') }}" required>
                                            <i class="ti-world"></i>
                                        </div>
                                        <!-- Error -->
                                        @if ($errors->has('website'))
                                            <p class="color--error mb-2"><strong>{{ $errors->first('website') }}</strong></p>
                                        @endif
                                    </div>

                                    <!-- Commercial Contact -->
                                    <div class="tr-single-header mt-5 mb-3 pt-5 pb-0 pl-0 pr-0">
                                        <h4><i class="ti-id-badge"></i> {{__('loginAndRegister.contactTile')}}</h4>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('loginAndRegister.emailContact')}}</label>
                                        <div class="input-with-gray">
                                            <input type="email" class="form-control companyfield" placeholder="{{__('loginAndRegister.emailContactM')}}" name="contactEmail" value="{{ old('contactEmail') }}" required>
                                            <i class="ti-email"></i>
                                        </div>
                                        <!-- Error -->
                                        @if ($errors->has('contactEmail'))
                                            <p class="color--error mb-2"><strong>{{ $errors->first('contactEmail') }}</strong></p>
                                        @endif
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label>{{__('loginAndRegister.nameContact')}}o</label>
                                            <div class="input-with-gray">
                                                <input type="text" class="form-control companyfield" placeholder="{{__('loginAndRegister.nameContactM')}}" name="contactName" value="{{ old('contactName') }}" required autocomplete="name">
                                                <i class="ti-user"></i>
                                            </div>
                                            <!-- Error -->
                                            @if ($errors->has('contactName'))
                                                <p class="color--error mb-2"><strong>{{ $errors->first('contactName') }}</strong></p>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label>{{__('loginAndRegister.phoneContact')}}</label>
                                            <div class="input-with-gray">
                                                <input type="text" class="form-control companyfield" placeholder="{{__('loginAndRegister.phoneContactM')}}" name="contactPhone" value="{{ old('contactPhone') }}" required>
                                                <i class="ti-headphone-alt"></i>
                                            </div>
                                            <!-- Error -->
                                            @if ($errors->has('contactPhone'))
                                                <p class="color--error mb-2"><strong>{{ $errors->first('contactPhone') }}</strong></p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Main Working Place -->
                                    <div class="tr-single-header mt-5 mb-3 pt-5 pb-0 pl-0 pr-0">
                                        <h4><i class="ti-location-pin"></i> {{__('loginAndRegister.workingPlaceTitle')}}</h4>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('loginAndRegister.address')}}</label>
                                        <div class="input-with-gray">
                                            <input type="text" class="form-control companyfield" placeholder="{{__('loginAndRegister.addressM')}}" name="address" value="{{ old('address') }}" required>
                                            <i class="ti-pin"></i>
                                        </div>
                                        <!-- Error -->
                                        @if ($errors->has('address'))
                                            <p class="color--error mb-2"><strong>{{ $errors->first('address') }}</strong></p>
                                        @endif
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label>{{__('loginAndRegister.city')}}</label>
                                            <div class="input-with-gray">
                                                <input type="text" class="form-control companyfield" placeholder="{{__('loginAndRegister.city')}}" name="city" value="{{ old('city') }}" required>
                                                <i class="ti-home"></i>
                                            </div>
                                            <!-- Error -->
                                            @if ($errors->has('city'))
                                                <p class="color--error mb-2"><strong>{{ $errors->first('city') }}</strong></p>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label>{{__('loginAndRegister.country')}}</label>
                                            <div class="input-with-gray">
                                                <input type="text" class="form-control companyfield" placeholder="{{__('loginAndRegister.country')}}" name="country" value="{{ old('country') }}" required>
                                                <i class="ti-map-alt"></i>
                                            </div>
                                            <!-- Error -->
                                            @if ($errors->has('country'))
                                                <p class="color--error mb-2"><strong>{{ $errors->first('country') }}</strong></p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group mb-5 input-with-gray">
                                        <label>{{__('loginAndRegister.typeWorkingPlace')}}</label>
                                        <select class="form-control companyfield" name="workingPlaceType" required>
                                            <option value="legal">{{__('loginAndRegister.legal')}}</option>
                                            <option value="commercial">{{__('loginAndRegister.commercial')}}</option>
                                            <option value="operative">{{__('loginAndRegister.operative')}}</option>
                                        </select>
                                        <!-- Error -->
                                        @if ($errors->has('workingPlaceType'))
                                            <p class="color--error mb-2"><strong>{{ $errors->first('workingPlaceType') }}</strong></p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-md full-width pop-login">{{__('loginAndRegister.registrationButtonLabel')}}</button>
                                </div>

                                <div class="modal-footer">
                                    <div class="mf-link"><a class="color--dark mf-link-hover" href="{{ route('login') }}"><i class="ti-user"></i>{{__('loginAndRegister.loginButtonLabel')}}</a></div>
                                    <div class="mf-forget">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">{{__('loginAndRegister.passwordForgotLinkLabel')}}</a>
                                        @endif
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <div class="clearfix"></div>
    <!-- ============================ Who We Are End ================================== -->

    <script>

        changeRole();

        function changeRole() {
            let role = document.getElementById("select-role").value;
            if (role === 'company') {
                document.getElementById('company-fields').style.display = 'block';
                document.querySelectorAll('input.companyfield').forEach(function(item) {
                    item.required = true;
                });
            } else if (role === 'user') {
                document.getElementById('company-fields').style.display = 'none';
                document.querySelectorAll('input.companyfield').forEach(function(item) {
                    item.required = false;
                });
            }
        }

    </script>
@endsection
