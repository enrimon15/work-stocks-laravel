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

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-5">
                                    <label>Che tipologia di utente sei?</label>
                                    <select class="form-control" name="user_type">
                                        <option value="base_user">Utente</option>
                                        <option value="company">Azienda</option>
                                    </select>
                                    <!-- Error -->
                                    @if ($errors->has('user_type'))
                                        <p class="color--error mb-2"><strong>{{ $errors->first('user_type') }}</strong></p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Nome</label>
                                    <div class="input-with-gray">
                                        <input type="text" class="form-control" placeholder="Nome" name="name" value="{{ old('name') }}" required autocomplete="name">
                                        <i class="ti-user"></i>
                                    </div>
                                    <!-- Error -->
                                    @if ($errors->has('name'))
                                        <p class="color--error mb-2"><strong>{{ $errors->first('name') }}</strong></p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Cognome</label>
                                    <div class="input-with-gray">
                                        <input type="text" class="form-control" placeholder="Cognome" name="surname" value="{{ old('surname') }}" required autocomplete="surname">
                                        <i class="ti-user"></i>
                                    </div>
                                    <!-- Error -->
                                    @if ($errors->has('surname'))
                                        <p class="color--error mb-2"><strong>{{ $errors->first('surname') }}</strong></p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-with-gray">
                                        <input type="email" class="form-control" placeholder="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        <i class="ti-user"></i>
                                    </div>
                                    <!-- Error -->
                                    @if ($errors->has('email'))
                                        <p class="color--error mb-2"><strong>{{ $errors->first('email') }}</strong></p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
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
@endsection
