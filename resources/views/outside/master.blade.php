<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

    <title>Vision Courses</title>
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="{{route('website.index')}}">Vision Courses</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('website.index')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('website.contact')}}">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    @yield('content')

    <footer class="py-4 text-center bg-dark text-white">
      <p class="m-0">All Copyright reserved to <a href="#">Mohammed Naji</a> <i class="far fa-copyright"></i> 2021</p>
    </footer>

    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/js/script.js')}}"></script>
  </body>
</html>
