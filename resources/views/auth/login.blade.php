@extends('layouts.outline')

@section('content')
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="page-title-wrap pt-img-wrap" style="background:url({{asset('img/login-banner.jpeg')}}) no-repeat;">
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <div class="pt-caption text-center">
                    <h1>{{{__('loginAndRegister.loginTitle')}}}</h1>
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

                            @if ($errors->any())
                                <p class="color--error mb-2"><strong>{{__('auth.failed')}}</strong></p>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>{{__('loginAndRegister.emailLabel')}}</label>
                                    <div class="input-with-gray">
                                        <input type="email" class="form-control" placeholder="{{__('loginAndRegister.emailLabel')}}" name="email" value="{{old('email')}}" required autocomplete="email">
                                        <i class="ti-user"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{__('loginAndRegister.passwordLabel')}}</label>
                                    <div class="input-with-gray">
                                        <input type="password" class="form-control" placeholder="*******" name="password" required autocomplete="current-password">
                                        <i class="ti-unlock"></i>
                                    </div>
                                </div>

                                <div class="form-group mt-5">
                                    <span class="form-check-label">
                                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                {{ __('loginAndRegister.remember') }}
                                            </span>

                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-md full-width pop-login">Login</button>
                                </div>

                                <div class="modal-footer">
                                    <div class="mf-link"><a class="color--dark mf-link-hover" href="{{ route('register') }}"><i class="ti-user"></i>{{__('loginAndRegister.registrationButtonLabel')}}</a></div>
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
        $(document).ready(function() {
            document.querySelectorAll(".input-with-gray").forEach(function (item) {
                item.setAttribute("style", "z-index: 0!important;");
            });
        });
    </script>
@endsection
