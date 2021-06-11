
@foreach($subscribers as $subscriber)
<!-- Single Candidate List -->
<div class="candidate-list-layout">
    <div class="cll-wrap">
        <div class="cll-thumb">
            <a href="resume-detail.html"><img src="{{asset('storage/'.$subscriber->avatar)}}" class="img-responsive img-circle" alt="" /></a>
        </div>
        <div class="cll-caption">
            <h4><a href="{{route('subscribers/getById',['id'=>$subscriber->id])}}">{{$subscriber->name.' '.$subscriber->surname}}</a>
                @if($subscriber->profile)
                    <span><i class="ti-briefcase"></i>{{$subscriber->profile->job_title}}</span>
                @endif
            </h4>
            @if($subscriber->profile)
            <ul>
                <li><i class="ti-location-pin text-danger"></i>{{$subscriber->profile->country.' '.$subscriber->profile->city}}</li>
                <li><i class="ti-time text-success"></i>
                    {{\App\Http\Controllers\SubscriberController::getLastLoginInDays($subscriber)}}
                </li>
            </ul>
            @endif
        </div>
    </div>

    <div class="cll-right">
        <a href="{{route('subscribers/getById',['id'=>$subscriber->id])}}" class="btn btn-primary btn-shortlist"><i class="ti-plus"></i>@lang('subcribers/subscribersList.showProfile')</a>
    </div>
</div>

@endforeach

{!! $subscribers->links('vendor/pagination/bootstrap-4')!!}

<script>
    window.totalResults = {{$subscribers->total()}};
    window.totalResultI18nString = '{{__(trans_choice('subcribers/subscribersList.results',$subscribers->total()))}}';
</script>



