<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>

<body class="dashboard-bg">
    
    @section('content')
    @show
    
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>