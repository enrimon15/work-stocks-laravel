@extends('company.dashboard.company-dashboard')

@section('content-dashboard')

    <!-- Post Job Offer -->
    <div class="tab-pane active container" id="postNewJob">

        @if(Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(isset($jobOffer))
        <div class="p-3">
            <a href="{{route('postNewJobCompany')}}" class="full-width btn btn-info btn-md"><i class="ti-arrow-left"></i> {{__('dashboard/company/newJob.refCreate')}}</a>
        </div>
        @endif


        <form method="POST" action="{{ isset($jobOffer) ? route('postNewJobCompanyExecute', ['operationType' => 'edit']) : route('postNewJobCompanyExecute', ['operationType' => 'create']) }}" enctype="multipart/form-data">
        @csrf
        <!-- User Info -->
            <div class="tr-single-box">
                <div class="tr-single-header">
                    <h4><i class="ti-plus"></i> {{ isset($jobOffer) ? __('dashboard/company/newJob.titleUpdate') : __('dashboard/company/newJob.title')}}</h4>
                </div>
                <div class="tr-single-body">

                    <div class="row">

                        @if(isset($jobOffer))
                            <input hidden name="id" value="{{$jobOffer->id}}">
                        @endif

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/newJob.workingPlace')}}</label>
                                <select required class="form-control" name="workingPlace" id="working-place">
                                    @foreach($workingPlaces as $workingPlace)
                                        <option {{ (isset($jobOffer) && $workingPlace->id == $jobOffer->workingPlace->id) ? 'selected' : ''}} value="{{$workingPlace->id}}">{{$workingPlace->city . ", " . $workingPlace->address . " (" . $workingPlace->country . ")"}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Error -->
                            @if ($errors->has('workingPlace'))
                                <p class="color--error mb-2"><strong>{{$errors->first('workingPlace')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/newJob.jobTitle')}}</label>
                                <input class="form-control" name="title" required type="text" placeholder="{{__('dashboard/company/newJob.jobTitle')}}" value="{{$jobOffer->title ?? null}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('title'))
                                <p class="color--error mb-2"><strong>{{$errors->first('title')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/newJob.description')}}</label>
                                <textarea id="summernote" name="description">{{$jobOffer->description ?? null}}</textarea>
                            </div>
                            <!-- Error -->
                            @if ($errors->has('description'))
                                <p class="color--error mb-2"><strong>{{$errors->first('description')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/newJob.dueDate')}}</label>
                                <input class="form-control" name="dueDate" required type="date" value="{{$jobOffer->due_date ?? null}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('dueDate'))
                                <p class="color--error mb-2"><strong>{{$errors->first('dueDate')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/newJob.contractType')}}</label>
                                <select required class="form-control" name="offerType" id="offer-type">
                                    <option {{ (isset($jobOffer) && $jobOffer->offers_type == 'full_time') ? 'selected' : ''}} value="full_time">{{__('dashboard/company/newJob.full_time')}}</option>
                                    <option {{ (isset($jobOffer) && $jobOffer->offers_type == 'part_time') ? 'selected' : ''}} value="part_time">{{__('dashboard/company/newJob.part_time')}}</option>
                                    <option {{ (isset($jobOffer) && $jobOffer->offers_type == 'construction_base') ? 'selected' : ''}} value="construction_base">{{__('dashboard/company/newJob.construction_base')}}</option>
                                    <option {{ (isset($jobOffer) && $jobOffer->offers_type == 'internship') ? 'selected' : ''}} value="internship">{{__('dashboard/company/newJob.internship')}}</option>
                                </select>
                            </div>
                            <!-- Error -->
                            @if ($errors->has('offerType'))
                                <p class="color--error mb-2"><strong>{{$errors->first('offerType')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/newJob.experience')}}</label>
                                <input class="form-control" name="experience" required type="number" min="0" placeholder="{{__('dashboard/company/newJob.experiencePh')}}" value="{{$jobOffer->experience ?? null}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('experience'))
                                <p class="color--error mb-2"><strong>{{$errors->first('experience')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/newJob.gender')}}</label>
                                <select required class="form-control" name="gender" id="gender">
                                    <option {{ (isset($jobOffer) && $jobOffer->sex == 'not_specified') ? 'selected' : ''}} value="not_specified">{{__('dashboard/company/newJob.notSpecified')}}</option>
                                    <option {{ (isset($jobOffer) && $jobOffer->sex == 'male') ? 'selected' : ''}} value="male">M</option>
                                    <option {{ (isset($jobOffer) && $jobOffer->sex == 'female') ? 'selected' : ''}} value="female">F</option>
                                </select>
                            </div>
                            <!-- Error -->
                            @if ($errors->has('gender'))
                                <p class="color--error mb-2"><strong>{{$errors->first('gender')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/newJob.minSalary')}}</label>
                                <input class="form-control" name="minSalary" type="number" min="0" placeholder="{{__('dashboard/company/newJob.minSalary') . " (K)"}}" value="{{$jobOffer->min_salary ?? null}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('minSalary'))
                                <p class="color--error mb-2"><strong>{{$errors->first('minSalary')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/newJob.maxSalary')}}</label>
                                <input class="form-control" name="maxSalary" type="number" min="0" placeholder="{{__('dashboard/company/newJob.maxSalary') . " (K)"}}" value="{{$jobOffer->max_salary ?? null}}">
                            </div>
                            <!-- Error -->
                            @if ($errors->has('maxSalary'))
                                <p class="color--error mb-2"><strong>{{$errors->first('maxSalary')}}</strong></p>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>{{__('dashboard/company/newJob.skills')}}</label>
                                <select required class="form-control" name="skills[]" multiple="multiple" id="skill">
                                    @if(isset($jobOffer))
                                        @foreach($jobOffer->tagNames() as $skill)
                                            <option selected value="{{$skill}}">{{$skill}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <!-- Error -->
                            @if ($errors->has('skills'))
                                <p class="color--error mb-2"><strong>{{$errors->first('skills')}}</strong></p>
                            @endif
                        </div>

                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-info btn-md full-width">{{ isset($jobOffer) ? __('dashboard/company/newJob.buttonUpdate') : __('dashboard/company/newJob.buttonSave')}}<i class="ml-2 ti-arrow-right"></i></button>
        </form>

    </div>

    <script>
        $(document).ready(function() {
            $('#working-place').select2();

            $('#offer-type').select2({
                minimumResultsForSearch: -1
            });

            $('#gender').select2({
                minimumResultsForSearch: -1
            });

            $('#skill').select2({
                minimumResultsForSearch: -1,
                placeholder: "{{__('dashboard/company/newJob.skillsPh')}}",
                allowClear: true,
                tags: true
            });
        });
    </script>

@endsection