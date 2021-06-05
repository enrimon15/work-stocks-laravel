@component('mail::message')
# {{__('mail/application/mailContent.mailSubjectDeleteApplication')}}

@lang('mail/application/mailContent.mailBodyDeleteApplication',['subscriberName'=>$details['name'],'subscriberSurname'=>$details['surname'], 'jobOfferName'=>$details['jobOfferName'],'companyName'=> $details['companyName'],'subscriberEmail'=> $details['subscriberEmail']])

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
    {{__('profile/userProfile.site')}}
@endcomponent

{{__('profile/userProfile.thanks')}}<br>
WorkStocks STAFF
@endcomponent