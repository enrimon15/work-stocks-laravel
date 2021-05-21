<!DOCTYPE html>
<html>
<head>
    <!--<title>ItsolutionStuff.com</title>-->
</head>
<body>
<h1>
    @lang('mail/application/mailContent.mailBodySubscriber',['name'=>$details['name'],'surname'=>$details['surname'], 'jobOfferName'=>$details['jobOfferName'],'companyName'=> $details['companyName']])
</h1>
</body>
</html>
