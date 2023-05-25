<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Styles -->
   <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
    @livewireStyles()
</head>
<body>
    {{-- user component --}}
    @livewire('user.user') 
    <script type='text/javascript' src="{{ asset('js/jquery.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/datatables.min.js') }}"></script>        
    <script type='text/javascript' src="{{ asset('js/bootstrap.min.js') }}"></script>
    @livewireScripts()
</body>
</html>