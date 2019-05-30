<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('layouts.header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('layouts.nav')
@yield('apps')
@include('layouts.footer')
</div>
</body>
@include('layouts.scripts')
</html>
