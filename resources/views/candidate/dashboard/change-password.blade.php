@extends('candidate.dashboard.candidate-dashboard')

@section('content-dashboard')

<!-- change-password -->
<div class="tab-pane active container" id="change-password">

    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="tr-single-box">
        <div class="tr-single-header">
            <h4><i class="lni-lock"></i> Cambia Password</h4>
        </div>

        <form method="POST" action="{{ route('changePasswordExecute') }}">
            @csrf
            <div class="tr-single-body">
                <div class="form-group">
                    <label>Password Attuale</label>
                    <input class="form-control" type="text" name="old_password" value="{{old('old_password')}}" required>
                    <!-- Error -->
                    @if ($errors->has('old_pass'))
                        <p class="color--error mb-2"><strong>{{ $errors->first('old_pass') }}</strong></p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Nuova Password</label>
                    <input class="form-control" type="text" name="new_password" value="{{old('new_password')}}" required>
                    <!-- Error -->
                    @if ($errors->has('new_password') || $errors->has('confirm_password'))
                        <p class="color--error mb-2"><strong>La password non rispetta il formato, controlla che la lunghezza sia almeno di 8 caratteri</strong></p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Conferma Password</label>
                    <input class="form-control" type="text" name="confirm_password" value="{{old('confirm_password')}}" required>
                </div>
            </div>

            <button type="submit" class="btn btn-info btn-md full-width">Salva<i class="ml-2 ti-arrow-right"></i></button>
        </form>

    </div>

</div>

@endsection