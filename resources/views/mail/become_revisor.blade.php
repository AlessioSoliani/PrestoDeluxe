<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deluxe</title>
</head>
<body>
    <div>
        <h1>{{__('ui.ThisUserSentaRequestToBecomeAnAuditor')}}</h1>
        <h2>{{__('ui.UserInformation')}}: </h2>
        <p>{{__('ui.Name')}} :{{$user->name}}</p>
        <p>{{__('ui.EmailAdress')}} :{{$user->email}}</p>
        <p>{{__('ui.DoYouWantToAcceptHisRequestToBecomeAnAuditor')}}</p>
        <a href="{{route('make.revisor',compact('user'))}}">{{__('ui.ConfirmRequest')}}</a>
    </div>
        
    
</body>

</html>