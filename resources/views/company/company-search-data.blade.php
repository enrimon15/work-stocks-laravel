@foreach($companies as $comp)
    <!-- Single Large Job List -->
    <div class="job-new-list">
        <div class="vc-thumb">
            <img class="img-fluid rounded-circle"
                 src="{{asset('storage/'.$comp->user->avatar)}}">
        </div>
        <div class="vc-content">
            <h5 class="title"><a href="{!! route('profile',['type'=>'company','id'=>$comp->id]) !!}">{{$comp->name}}</a></h5>
            <p>{{$comp->company_form}}</p>

            <ul class="vc-info-list">
                <li class="list-inline-item">
                    <h5>{{__('company/company.webSite')}}</h5> <i
                        class="ti-world"></i>{{$comp->website}}
                </li>
                <li class="list-inline-item">
                    <h5>{{__('company/company.employees')}}</h5> <i
                        class="ti-user"></i>{{$comp->employees_number}}
                </li>
            </ul>
        </div>

        <a class="btn btn-black bn-det" href="{{route('profile', ['type'=>'company','id'=>$comp->id])}}">{{__('company/company.more')}}
            <i class="ti-arrow-right ml-1"></i></a>
    </div>
@endforeach
{!! $companies->links('vendor/pagination/bootstrap-4')!!}

<script>
    window.totalResults = {{$companies->total()}};
    window.totalResultI18nString = '{{__(trans_choice('jobs/jobs.results',$companies->total()))}}';
</script>
