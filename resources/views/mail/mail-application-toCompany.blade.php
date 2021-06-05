@component('mail::message')

    @lang('mail/application/mailContent.mailBodyCompany',['subscriberName'=>$details['name'],'subscriberSurname'=>$details['surname'], 'jobOfferName'=>$details['jobOfferName'],'companyName'=> $details['companyName']])

    @component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
        {{__('profile/userProfile.site')}}
    @endcomponent

    {{__('profile/userProfile.thanks')}}
    WorkStocks STAFF
@endcomponent
