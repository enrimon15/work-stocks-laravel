<!DOCTYPE html>
<html>
<head>
    <!--<title>ItsolutionStuff.com</title>-->
</head>
<body>

<h1>
    @lang('mail/application/mailContent.mailBodySubscriber',['subscriberName'=>$details['name'],'subscriberSurname'=>$details['surname'], 'jobOfferName'=>$details['jobOfferName'],'companyName'=> $details['companyName']])
</h1>

</body>
</html>
