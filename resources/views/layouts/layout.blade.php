<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Users Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ mix('js/app.js') }}"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src='https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js'></script>
        <script src='https://cdn.datatables.net/autofill/2.3.5/js/dataTables.autoFill.min.js'></script>
        <script src='https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js'></script>


    </head>
    <body>
        
        @yield('content')

    </body>
</html>