<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> @yield('title') </title>

        @stack('prepend-style')

        @include('includes.home.style')

        @stack('addon-style')

    </head>
    <body>
        <!-- navbar -->
        @include('includes.checkout.navbar-checkout')

        <!-- Header -->
        @yield('content')

       @stack('prepend-script') 

       @include('includes.home.script')
       
       @stack('addon-script')
    </body>
</html>
