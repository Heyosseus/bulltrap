<!doctype html>
<html lang="en" data-theme="{{ session('theme', 'dark') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bulltrap</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>
<body>
<div id="app">
    <dashboard-view></dashboard-view>
</div>
</body>
</html>
