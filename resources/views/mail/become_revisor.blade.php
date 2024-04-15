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
        <h1>Thank you for contacting us</h1>
        <h2>Your information: </h2>
        <p>Name : {{$user->name}}</p>
        <p>Email :{{$user->email}}</p>
        <p>do you want to make it revising? click here</p>
        <a href="{{route('make.revisor',compact('user'))}}">Confirm request</a>
    </div>
        
    
</body>

</html>