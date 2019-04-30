<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

  {{-- <link href="{{ asset('css/milligram.min.css') }}" rel="stylesheet"> --}}
  <link href="{{ asset('css/back-office.css') }}" rel="stylesheet">
  <link href="{{ asset('css/colors.css') }}" rel="stylesheet">
  <link href="{{ asset('css/theme.css') }}" rel="stylesheet">

  <script type="text/javascript" src={{ asset('js/app.js') }} defer>

  // TODO: move to a different file (mudar para javascipt?)
  <script>
    $(document).ready(function () {
      $("#search-member").on("keyup", function () {
        var value = $(this)
          .val()
          .toLowerCase();
        $("#staffMemberTable tr").filter(function () {
          $(this).toggle(
            $(this)
              .text()
              .toLowerCase()
              .indexOf(value) > -1
          );
        });
      });
    });
  </script>
</head>

<body class="bg-primary">
  <nav class="navbar navbar-expand-lg navbar-dark main-color-bg">
    <a class="navbar-brand mr-lg-4" href="/back-office/admin">
      <span class="sec-color">KEY</span>VALUE
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item mr-lg-3">
          <a class="nav-link active" href="/back-office/admin">Administration</a>
        </li>
        <li class="nav-item mr-lg-2">
          <a class="nav-link" href="moderator.html">
            <span class="notification-container">
              Moderating
              <span class="badge badge-danger badge-counter rounded-lg">9</span>
              <span class="sr-only">tasks to complete</span>
            </span>
          </a>
        </li>
        <li class="nav-item mr-lg-2">
          <a class="nav-link" href="stock.html">
            <span class="notification-container">
              Stock
              <span class="badge badge-danger badge-counter rounded-lg d-none">0</span>
              <span class="sr-only">tasks to complete</span>
            </span>
          </a>
        </li>
        <li class="nav-item mr-lg-2">
          <a class="nav-link" href="accounting.html">
            <span class="notification-container">
              Accounting
              <span class="badge badge-danger badge-counter rounded-lg">3</span>
              <span class="sr-only">tasks to complete</span>
            </span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav user-options">
        <li class="nav-item">
          <a class="nav-link" href="profile.html">{{$username}}</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i></a>
      </li>
      </ul>
    </div>
  </nav>
  <section id="content">
    @yield('content')
    </section>
</body>

</html>