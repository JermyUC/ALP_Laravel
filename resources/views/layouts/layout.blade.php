<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Carnivlora</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
  </head>

  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
      <a class="navbar-brand brand" href="{{ url('/') }}">My Carnivlora</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item '' }}"><a class="nav-link" href="{{ url('/store') }}">Store</a></li>
          <li class="nav-item '' }}"><a class="nav-link" href="{{ url('/guide') }}">Guide</a></li>
          <li class="nav-item "><a class="nav-link" href="{{ url('/about') }}">About Us</a></li>
        </ul>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="grow">
      @yield('content')
    </main>

    <!-- Footer -->
    <section class="bg-light py-4 mt-5 mb-0">
      <div class="container text-center">
        <h5>Join the Carnivlora Community</h5>
        <form class="form-inline justify-content-center mt-3">
          <input class="form-control mr-2" type="email" placeholder="Your email" aria-label="email">
          <button class="btn btn-success" type="submit">Subscribe</button>
        </form>
      </div>
    </section>

    <footer class="py-3 text-center mb-0">
      <small>© 2025 My Carnivlora</small>
    </footer>

    
  </body>
</html>
