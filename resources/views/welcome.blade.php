<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('resources/images/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('resources/images/favicon-16x16.png') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('resources/css/customs.css') }}">

  <title>YAP Hospital</title>

</head>

<body class="antialiased bg-white font-sans text-gray-900">

  @if(Auth::check())
    <script>
      window.location.href = '/admin/dashboard';
    </script>
  @endif

  <main class="w-full">
    @include('components.header')
    @include('components.hero')
    @include('components.about')
    @include('components.testimonials')
    @include('components.training-calendar')
    @include('components.blog')
    @include('components.cta')
    @include('components.footer')
    @include('components.login-modal') <!-- Add the modal component here -->
  </main>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131505823-4"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-131505823-4');
  </script>
  <script src="{{ asset('resources/js/slider.js') }}"></script>
  <script src="{{ asset('resources/js/login-modal.js') }}"></script>

</body>

</html>