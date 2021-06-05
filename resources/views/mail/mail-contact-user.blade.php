@component('mail::message')
# {{__('profile/userProfile.contact') . $data['user']->email }}

{!! $data['message'] !!}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
{{__('profile/userProfile.site')}}
@endcomponent

{{__('profile/userProfile.thanks')}}<br>
WorkStocks STAFF
@endcomponent
