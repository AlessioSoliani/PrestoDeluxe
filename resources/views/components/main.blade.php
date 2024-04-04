<!DOCTYPE html>
<html lang="en" data-bs-theme= "dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Presto Deluxe</title>
</head>
<body>
    <x-nav/>
    {{$slot}}
</body>
</html>