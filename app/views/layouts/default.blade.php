<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <style>
          body {
          padding-top: 60px;
          }
        </style>
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap-responsive.min.css') }}">
    </head>
    <body>
        <script src="{{ url('assets/js/bootstrap.min.js?ver=1.00') }}"></script>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>

