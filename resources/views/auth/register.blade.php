@extends('layouts.outline')

@section('content')
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="page-title-wrap pt-img-wrap" style="background:url({{asset('img/login-banner.jpeg')}}) no-repeat;">
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <div class="pt-caption text-center">
                    <h1>Registrati</h1>
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

                            @error('email')
                            <p class="color--error mb-2"><strong>Credenziali errate, riprova!</strong></p>
                            @enderror

                            @error('password')
                            <p class="color--error mb-2"><strong>Credenziali errate, riprova!</strong></p>
                            @enderror

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Nome</label>
                                    <div class="input-with-gray">
                                        <input type="text" class="form-control" placeholder="Nome" name="name" value="{{ old('name') }}" required autocomplete="name">
                                        <i class="ti-user"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-with-gray">
                                        <input type="email" class="form-control" placeholder="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        <i class="ti-user"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-with-gray">
                                        <input type="password" class="form-control" placeholder="*******" name="password" required autocomplete="new-password">
                                        <i class="ti-unlock"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Conferma Password</label>
                                    <div class="input-with-gray">
                                        <input type="password" class="form-control" placeholder="*******" name="password_confirmation" required autocomplete="new-password">
                                        <i class="ti-unlock"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-md full-width pop-login">Registrati</button>
                                </div>

                                <div class="modal-footer">
                                    <div class="mf-link"><a class="color--dark mf-link-hover" href="{{ route('login') }}"><i class="ti-user"></i>Accedi</a></div>
                                    <div class="mf-forget">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">Hai dimenticato la password?</a>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
