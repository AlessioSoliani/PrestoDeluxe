<!DOCTYPE html>
<html lang="en" data-bs-theme= "dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
    <title>Presto Deluxe</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

    <x-nav/>
   

    
    {{$slot}}

    <script src="https://kit.fontawesome.com/e67ed88741.js" crossorigin="anonymous"></script>
</body>
</html>