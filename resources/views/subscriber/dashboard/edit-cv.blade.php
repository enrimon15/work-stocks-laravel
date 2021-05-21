@extends('subscriber.dashboard.candidate-dashboard')

@section('content-dashboard')

@if($operationType == 'qualification')
<div class="container">
    <h3 class="mb-5">{{__('dashboard/user/onlineCV.modifyQualification')}}</h3>
    <form method="POST" action="{{ route('onlineCvExecute', ['operationType' => 'qualification']) }}">
        @csrf
        <div class="row">

            <input hidden name="id" value="{{$qualification->id}}">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.qualName')}}</label>
                    <input class="form-control" name="name" placeholder="{{__('dashboard/user/onlineCV.qualName')}}" type="text" value="{{$qualification->name}}" required>
                </div>
                <!-- Error -->
                @if ($errors->has('name'))
                    <p class="color--error mb-2"><strong>{{$errors->first('name')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group mt-1 float-right">
                    @if($qualification->in_progress == true)
                        <input type="checkbox" name="inProgress" id="check-qualification" checked>&nbsp;&nbsp;{{__('dashboard/user/onlineCV.inProgress')}}
                    @else
                        <input type="checkbox" name="inProgress" id="check-qualification">&nbsp;&nbsp;{{__('dashboard/user/onlineCV.inProgress')}}
                    @endif
                    <!-- Error -->
                    @if ($errors->has('inProgress'))
                        <p class="color--error mb-2"><strong>{{$errors->first('inProgress')}}</strong></p>
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.startDate')}}</label>
                    <input type="date" class="form-control" name="startDate" required value="{{$qualification->start_date}}">
                </div>
                <!-- Error -->
                @if ($errors->has('startDate'))
                    <p class="color--error mb-2"><strong>{{$errors->first('startDate')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.endDate')}}</label>
                    <input id="end-qualification" type="date" class="form-control" name="endDate" value="{{$qualification->end_date ?? null}}">
                </div>
                <!-- Error -->
                @if ($errors->has('endDate'))
                    <p class="color--error mb-2"><strong>{{$errors->first('endDate')}}</strong></p>
                @endif
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.qualInstitute')}}</label>
                    <input placeholder="{{__('dashboard/user/onlineCV.phInstitute')}}" name="institute" type="text" class="form-control" value="{{$qualification->institute ?? null}}" required>
                </div>
                <!-- Error -->
                @if ($errors->has('institute'))
                    <p class="color--error mb-2"><strong>{{$errors->first('institute')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.qualDescription')}}</label>
                    <textarea placeholder="{{__('dashboard/user/onlineCV.qualDescription')}}" name="description" class="form-control">{{$qualification->description ?? null}}</textarea>
                </div>
                <!-- Error -->
                @if ($errors->has('description'))
                    <p class="color--error mb-2"><strong>{{$errors->first('description')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.qualValuation')}}</label>
                    <input placeholder="{{__('dashboard/user/onlineCV.qualValuation')}}" name="valuation" type="text" class="form-control" value="{{$qualification->valuation ?? null}}">
                </div>
                <!-- Error -->
                @if ($errors->has('valuation'))
                    <p class="color--error mb-2"><strong>{{$errors->first('valuation')}}</strong></p>
                @endif
            </div>

            <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">{{__('dashboard/user/onlineCV.update')}}</button>
        </div>
    </form>
</div>
@elseif($operationType == 'experience')
<div class="container">
    <h3 class="mb-5">{{__('dashboard/user/onlineCV.modifyExperience')}}</h3>
    <form method="POST" action="{{ route('onlineCvExecute', ['operationType' => 'experience']) }}">
        @csrf
        <div class="row">

            <input hidden name="id" value="{{$experience->id}}">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.expJob')}}</label>
                    <input class="form-control" type="text" placeholder="{{__('dashboard/user/onlineCV.expJob')}}" name="jobPosition" value="{{$experience->job_position}}" required>
                </div>
                <!-- Error -->
                @if ($errors->has('jobPosition'))
                    <p class="color--error mb-2"><strong>{{$errors->first('jobPosition')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.expCompany')}}</label>
                    <input placeholder="{{__('dashboard/user/onlineCV.phCompany')}}" type="text" class="form-control" name="companyName" value="{{$experience->company}}" required>
                </div>
                <!-- Error -->
                @if ($errors->has('companyName'))
                    <p class="color--error mb-2"><strong>{{$errors->first('companyName')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group mt-1 float-right">
                    @if($experience->in_progress == true)
                        <input type="checkbox" name="inProgress" id="check-qualification" checked>&nbsp;&nbsp;{{__('dashboard/user/onlineCV.inProgress')}}
                    @else
                        <input type="checkbox" name="inProgress" id="check-qualification">&nbsp;&nbsp;{{__('dashboard/user/onlineCV.inProgress')}}
                    @endif
                    <!-- Error -->
                    @if ($errors->has('inProgress'))
                        <p class="color--error mb-2"><strong>{{$errors->first('inProgress')}}</strong></p>
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.startDate')}}</label>
                    <input type="date" class="form-control" name="startDate" required value="{{$experience->start_date}}">
                </div>
                <!-- Error -->
                @if ($errors->has('startDate'))
                    <p class="color--error mb-2"><strong>{{$errors->first('startDate')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.endDate')}}</label>
                    <input id="end-qualification" type="date" class="form-control" name="endDate" value="{{$experience->end_date ?? null}}">
                </div>
                <!-- Error -->
                @if ($errors->has('endDate'))
                    <p class="color--error mb-2"><strong>{{$errors->first('endDate')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.expDescription')}}</label>
                    <textarea placeholder="{{__('dashboard/user/onlineCV.expDescription')}}" name="description" class="form-control">{{$experience->description}}</textarea>
                </div>
                <!-- Error -->
                @if ($errors->has('description'))
                    <p class="color--error mb-2"><strong>{{$errors->first('description')}}</strong></p>
                @endif
            </div>

            <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">{{__('dashboard/user/onlineCV.update')}}</button>
        </div>
    </form>
</div>
@elseif($operationType == 'certificate')
<div class="container">
    <h3 class="mb-5">{{__('dashboard/user/onlineCV.modifyCertificate')}}</h3>
    <form method="POST" action="{{ route('onlineCvExecute', ['operationType' => 'certificate']) }}">
        @csrf
        <div class="row">

            <input hidden name="id" value="{{$certificate->id}}">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.certName')}}</label>
                    <input class="form-control" type="text" placeholder="{{__('dashboard/user/onlineCV.phCertificate')}}" name="certificateName" value="{{$certificate->name}}" required>
                </div>
                <!-- Error -->
                @if ($errors->has('certificateName'))
                    <p class="color--error mb-2"><strong>{{$errors->first('certificateName')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.certSociety')}}</label>
                    <input placeholder="{{__('dashboard/user/onlineCV.phSociety')}}" type="text" class="form-control" name="certificateSociety" value="{{$certificate->society}}" required>
                </div>
                <!-- Error -->
                @if ($errors->has('certificateSociety'))
                    <p class="color--error mb-2"><strong>{{$errors->first('certificateSociety')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group mt-1 float-right">
                    @if($certificate->end_date == null)
                        <input type="checkbox" name="noEnd" id="no-end-certification" checked>&nbsp;&nbsp;{{__('dashboard/user/onlineCV.certNoExp')}}
                    @else
                        <input type="checkbox" name="noEnd" id="no-end-certification">&nbsp;&nbsp;{{__('dashboard/user/onlineCV.certNoExp')}}
                    @endif
                    <!-- Error -->
                    @if ($errors->has('noEnd'))
                        <p class="color--error mb-2"><strong>{{$errors->first('noEnd')}}</strong></p>
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.certGet')}}</label>
                    <input type="date" class="form-control" name="date" required value="{{$certificate->date}}">
                </div>
                <!-- Error -->
                @if ($errors->has('date'))
                    <p class="color--error mb-2"><strong>{{$errors->first('date')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.certExpired')}}</label>
                    <input id="end-certification" type="date" class="form-control" name="endDate" value="{{$certificate->end_date ?? null}}">
                </div>
                <!-- Error -->
                @if ($errors->has('endDate'))
                    <p class="color--error mb-2"><strong>{{$errors->first('endDate')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.certCredential')}}</label>
                    <input type="text" placeholder="{{__('dashboard/user/onlineCV.phCredential')}}" class="form-control" name="credential" required value="{{$certificate->credential}}">
                </div>
                <!-- Error -->
                @if ($errors->has('credential'))
                    <p class="color--error mb-2"><strong>{{$errors->first('credential')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.certLink')}}</label>
                    <input type="text" placeholder="{{__('dashboard/user/onlineCV.phLink')}}" class="form-control" name="link" value="{{$certificate->link ?? null}}">
                </div>
                <!-- Error -->
                @if ($errors->has('link'))
                    <p class="color--error mb-2"><strong>{{$errors->first('link')}}</strong></p>
                @endif
            </div>

            <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">{{__('dashboard/user/onlineCV.update')}}</button>
        </div>
    </form>
</div>
@elseif($operationType == 'skill')
<div class="container">
    <h3 class="mb-5">{{__('dashboard/user/onlineCV.modifySkill')}}</h3>
    <form method="POST" action="{{ route('onlineCvExecute', ['operationType' => 'skill']) }}">
        @csrf
        <div class="row">

            <input hidden name="id" value="{{$skill->id}}">

            <div class="ccol-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.skillName')}}</label>
                    <input class="form-control" placeholder="{{__('dashboard/user/onlineCV.phSkill')}}" type="text" name="skillName" required value="{{$skill->name}}">
                </div>
                <!-- Error -->
                @if ($errors->has('skillName'))
                    <p class="color--error mb-2"><strong>{{$errors->first('skillName')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/user/onlineCV.skillLevel')}}</label>
                    <select class="form-control" name="skillLevel" required id="level-skill-select">
                        @if($skill->assestment == 'beginner')
                            <option selected value="beginner">{{__('dashboard/user/onlineCV.beginner')}}</option>
                            <option value="intermediate">{{__('dashboard/user/onlineCV.intermediate')}}</option>
                            <option value="advanced">{{__('dashboard/user/onlineCV.advanced')}}</option>
                        @elseif($skill->assestment == 'intermediate')
                            <option value="beginner">{{__('dashboard/user/onlineCV.beginner')}}</option>
                            <option selected value="intermediate">{{__('dashboard/user/onlineCV.intermediate')}}</option>
                            <option value="advanced">{{__('dashboard/user/onlineCV.advanced')}}</option>
                        @elseif($skill->assestment == 'advanced')
                            <option value="beginner">{{__('dashboard/user/onlineCV.beginner')}}</option>
                            <option value="intermediate">{{__('dashboard/user/onlineCV.intermediate')}}</option>
                            <option selected value="advanced">{{__('dashboard/user/onlineCV.advanced')}}</option>
                        @endif
                        <!-- Error -->
                        @if ($errors->has('skillLevel'))
                            <p class="color--error mb-2"><strong>{{$errors->first('skillLevel')}}</strong></p>
                        @endif
                    </select>
                </div>
            </div>

            <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">{{__('dashboard/user/onlineCV.update')}}</button>
        </div>
    </form>
</div>
@endif

<script src="{{asset('js/dashboard-in-progress.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#level-skill-select').select2({
            minimumResultsForSearch: -1
        });
    });
</script>

@endsection
