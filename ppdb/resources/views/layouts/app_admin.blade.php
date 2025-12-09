<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>@yield('title', 'Admin - PPDB')</title>
</head>

<body class="bg-gray-50">
       <!-- ================== NAVBAR ================== -->
       @include('components.navbar_admin')
       <!-- ================== END NAVBAR ================== -->

       <!-- ================== MAIN CONTENT ================== -->
       @yield('content')
       <!-- ================== END MAIN CONTENT ================== -->

       @stack('scripts')
</body>
</html>