@extends('candidate.dashboard.candidate-dashboard')

@section('content-dashboard')

@if($operationType == 'qualification')
<div class="container">
    <h3 class="mb-5">Modifica Qualifica</h3>
    <form method="POST" action="{{ route('onlineCvExecute', ['operationType' => 'qualification']) }}">
        @csrf
        <div class="row">

            <input hidden name="id" value="{{$qualification->id}}">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" name="name" placeholder="Nome" type="text" value="{{$qualification->name}}" required>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group mt-1 float-right">
                    @if($qualification->in_progress == true)
                        <input type="checkbox" name="inProgress" id="check-qualification" checked>&nbsp;&nbsp;In corso
                    @else
                        <input type="checkbox" name="inProgress" id="check-qualification">&nbsp;&nbsp;In corso
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Data di inizio</label>
                    <input type="date" class="form-control" name="startDate" required value="{{$qualification->start_date}}">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Data di fine</label>
                    <input id="end-qualification" type="date" class="form-control" name="endDate" value="{{$qualification->end_date ?? null}}">
                </div>
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Istituto</label>
                    <input placeholder="Nome istituto" name="institute" type="text" class="form-control" value="{{$qualification->institute ?? null}}" required>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Descrizione</label>
                    <textarea placeholder="Descrizione" name="description" class="form-control">{{$qualification->description ?? null}}</textarea>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Valutazione</label>
                    <input placeholder="Valutazione" name="valuation" type="text" class="form-control" value="{{$qualification->valuation ?? null}}">
                </div>
            </div>

            <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">Aggiorna</button>
        </div>
    </form>
</div>
@elseif($operationType == 'experience')
<div class="container">
    <h3 class="mb-5">Modifica Esperienza</h3>
    <form method="POST" action="{{ route('onlineCvExecute', ['operationType' => 'experience']) }}">
        @csrf
        <div class="row">

            <input hidden name="id" value="{{$experience->id}}">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Posizione Lavorativa</label>
                    <input class="form-control" type="text" placeholder="Posizione lavorativa" name="jobPosition" value="{{$experience->job_position}}" required>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Azienda</label>
                    <input placeholder="Nome azienda" type="text" class="form-control" name="companyName" value="{{$experience->company}}" required>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group mt-1 float-right">
                    @if($experience->in_progress == true)
                        <input type="checkbox" name="inProgress" id="check-qualification" checked>&nbsp;&nbsp;In corso
                    @else
                        <input type="checkbox" name="inProgress" id="check-qualification">&nbsp;&nbsp;In corso
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Data di inizio</label>
                    <input type="date" class="form-control" name="startDate" required value="{{$experience->start_date}}">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Data di fine</label>
                    <input id="end-qualification" type="date" class="form-control" name="endDate" value="{{$experience->end_date ?? null}}">
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Descrizione</label>
                    <textarea placeholder="Descrizione" name="description" class="form-control">{{$experience->description}}</textarea>
                </div>
            </div>

            <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">Aggiorna</button>
        </div>
    </form>
</div>
@elseif($operationType == 'certificate')
<div class="container">
    <h3 class="mb-5">Modifica Esperienza</h3>
    <form method="POST" action="{{ route('onlineCvExecute', ['operationType' => 'experience']) }}">
        @csrf
        <div class="row">

            <input hidden name="id" value="{{$experience->id}}">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Posizione Lavorativa</label>
                    <input class="form-control" type="text" placeholder="Posizione lavorativa" name="jobPosition" value="{{$experience->job_position}}" required>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Azienda</label>
                    <input placeholder="Nome azienda" type="text" class="form-control" name="companyName" value="{{$experience->company}}" required>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group mt-1 float-right">
                    @if($experience->in_progress == true)
                        <input type="checkbox" name="inProgress" id="check-qualification" checked>&nbsp;&nbsp;In corso
                    @else
                        <input type="checkbox" name="inProgress" id="check-qualification">&nbsp;&nbsp;In corso
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Data di inizio</label>
                    <input type="date" class="form-control" name="startDate" required value="{{$experience->start_date}}">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Data di fine</label>
                    <input id="end-qualification" type="date" class="form-control" name="endDate" value="{{$experience->end_date ?? null}}">
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Descrizione</label>
                    <textarea placeholder="Descrizione" name="description" class="form-control">{{$experience->description}}</textarea>
                </div>
            </div>

            <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">Aggiorna</button>
        </div>
    </form>
</div>
@elseif($operationType == 'skill')
<div class="container">
    <h3 class="mb-5">Modifica Esperienza</h3>
    <form method="POST" action="{{ route('onlineCvExecute', ['operationType' => 'experience']) }}">
        @csrf
        <div class="row">

            <input hidden name="id" value="{{$experience->id}}">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Posizione Lavorativa</label>
                    <input class="form-control" type="text" placeholder="Posizione lavorativa" name="jobPosition" value="{{$experience->job_position}}" required>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Azienda</label>
                    <input placeholder="Nome azienda" type="text" class="form-control" name="companyName" value="{{$experience->company}}" required>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group mt-1 float-right">
                    @if($experience->in_progress == true)
                        <input type="checkbox" name="inProgress" id="check-qualification" checked>&nbsp;&nbsp;In corso
                    @else
                        <input type="checkbox" name="inProgress" id="check-qualification">&nbsp;&nbsp;In corso
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Data di inizio</label>
                    <input type="date" class="form-control" name="startDate" required value="{{$experience->start_date}}">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Data di fine</label>
                    <input id="end-qualification" type="date" class="form-control" name="endDate" value="{{$experience->end_date ?? null}}">
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Descrizione</label>
                    <textarea placeholder="Descrizione" name="description" class="form-control">{{$experience->description}}</textarea>
                </div>
            </div>

            <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">Aggiorna</button>
        </div>
    </form>
</div>
@endif

<script src="{{asset('js/dashboard-in-progress.js')}}"></script>

@endsection