<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Git User Search</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-findcond">
            <div class="container">
                <div class="navbar-header navbar-brand">
                    Git User Search
                </div>
                
            </div>
        </nav>
        <div class="container" id="search">
            <gitsearch></gitsearch>
        </div>
        @yield('content')
    </div>
    <script src="{{ url(mix('js/app.js')) }}"></script>
</body>
</html>