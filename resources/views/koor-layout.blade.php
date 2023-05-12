<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Admin | Dashboard Testing</title>
</head>
<body class="bg-[#F4F4F4]">
  <section>
    @include('components.navbar2')
  </section>
  @yield('content')
</body>
</html>