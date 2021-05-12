@extends('company.dashboard.company-dashboard')

@section('content-dashboard')

    <div class="container">
        <h3 class="mb-5">{{__('dashboard/user/onlineCV.modifyQualification')}}</h3>
        <form method="POST" action="{{ route('executeWorkingPlacesCompany', ['operationType' => 'update']) }}">
            @csrf
            <input hidden name="id" value="{{$workingPlace->id}}">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/company/workingPlaces.city')}}</label>
                    <input class="form-control" placeholder="{{__('dashboard/company/workingPlaces.city')}}" value="{{$workingPlace->city}}" type="text" name="city" required>
                </div>
                <!-- Error -->
                @if ($errors->has('city'))
                    <p class="color--error mb-2"><strong>{{$errors->first('city')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/company/workingPlaces.country')}}</label>
                    <input class="form-control" placeholder="{{__('dashboard/company/workingPlaces.country')}}" value="{{$workingPlace->country}}" type="text" name="country" required>
                </div>
                <!-- Error -->
                @if ($errors->has('country'))
                    <p class="color--error mb-2"><strong>{{$errors->first('country')}}</strong></p>
                @endif
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>{{__('dashboard/company/workingPlaces.address')}}</label>
                    <input class="form-control" placeholder="{{__('dashboard/company/workingPlaces.address')}}" value="{{$workingPlace->address}}" type="text" name="address" required>
                </div>
                <!-- Error -->
                @if ($errors->has('address'))
                    <p class="color--error mb-2"><strong>{{$errors->first('address')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <label>{{__('dashboard/company/workingPlaces.type')}}</label>
                <select class="form-control" id="working-place-type" name="type" required>
                    <option {{$workingPlace->type == 'legal' ? 'selected' : ''}} value="legal">{{__('dashboard/company/workingPlaces.legal')}}</option>
                    <option {{$workingPlace->type == 'commercial' ? 'selected' : ''}} value="commercial">{{__('dashboard/company/workingPlaces.commercial')}}</option>
                    <option {{$workingPlace->type == 'operative' ? 'selected' : ''}} value="operative">{{__('dashboard/company/workingPlaces.operative')}}</option>
                </select>
                <!-- Error -->
                @if ($errors->has('type'))
                    <p class="color--error mb-2"><strong>{{$errors->first('type')}}</strong></p>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="form-group">
                    <input {{$workingPlace->primary == true ? 'checked' : ''}} type="checkbox" name="primary" id="check-qualification">&nbsp;&nbsp;{{__('dashboard/company/workingPlaces.main')}}
                </div>
                <!-- Error -->
                @if ($errors->has('primary'))
                    <p class="color--error mb-2"><strong>{{$errors->first('primary')}}</strong></p>
                @endif
            </div>

            <button type="submit" class="btn add-pr-item-btn mt-2 ml-1">{{__('dashboard/company/workingPlaces.updateButton')}}</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#working-place-type').select2({
                minimumResultsForSearch: -1
            });
        });
    </script>

@endsection
