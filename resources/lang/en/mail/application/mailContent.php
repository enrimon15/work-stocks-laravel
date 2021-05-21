<?php

return [
    'mailSubjectSubscriber' => 'Confirmation correctly Received',
    'mailBodySubscriber' => 'Dear :name :surname, we correctly received your application for the job offer :jobOfferName
        published by the company :companyName',
    'mailSubjectCompany' => 'Job offer application received',
    'mailBodyCompany' => 'Dear Company :companyName, we correctly stored an application from :subscriberName :subscriberSurname
        for your job offer titled :jobOfferName'
];
