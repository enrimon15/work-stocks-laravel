@foreach($jobs as $job)
    <!-- Single Large Job List -->
    <div class="job-new-list">
        <div class="vc-thumb">
            <img class="img-fluid rounded-circle"
                 src="{{asset('storage/'.$job->company->user->avatar)}}">
        </div>
        <div class="vc-content">
            <h5 class="title"><a href="{!! route('jobs/getById',['id'=>$job->id]) !!}">{{$job->title}}</a><span
                    class="j-full-time">{{__('jobs/filters.'.$job->offers_type)}}</span></h5>
            <p>{{$job->company->name}}</p>

            <ul class="vc-info-list">
                <li class="list-inline-item">
                    <h5>{{__('jobs/filters.expectedSalleryTitle')}}</h5> <i
                        class="ti-credit-card"></i>{{$job->min_salary.'€ - '.$job->max_salary.'€'}}
                </li>
                <li class="list-inline-item"><h5>{{__('jobs/filters.skillsTitle')}}</h5>
                    <div class="skills">
                        @if(!empty($job->tagNames()))
                            @foreach($job->tagNames() as $tag)
                                @if($loop->iteration > 3)
                                    <span>+ {{' '.
                                                                            (count($job->tagNames())-3)
                                                                            .' '.
                                                                            trans_choice('jobs/jobs.others',(count($job->tagNames())-3))
                                                                            }}
                                                                    </span>
                                    @break
                                @endif
                                <span>{{$tag}}</span>
                            @endforeach
                        @endif

                    </div>
                </li>
            </ul>
        </div>
        <a class="btn btn-black bn-det" href="{{route('jobs/getById', ['id'=>$job->id])}}">{{__('jobs/jobs.apply')}}
            <i class="ti-arrow-right ml-1"></i></a>
    </div>
@endforeach
{!! $jobs->links('vendor/pagination/bootstrap-4')!!}

<script>
    window.totalResults = {{$jobs->total()}};
    window.totalResultI18nString = '{{__(trans_choice('jobs/jobs.results',$jobs->total()))}}';
</script>
