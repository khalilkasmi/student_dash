<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Dash</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@3.x/css/materialdesignicons.min.css" rel="stylesheet">
        <style>
            body,html {
                font-family: roboto;
                background-color: white;
            }
        </style>
    </head>
    <body>
       <div id="app">
            <!-- main component here -->
           <maincomponent></maincomponent>
       </div>
       <script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
       @include('sweet::alert')
    </body>
</html>
