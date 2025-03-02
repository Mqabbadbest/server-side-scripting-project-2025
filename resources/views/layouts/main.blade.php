<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student and College Management System</title>
    <link rel="icon" href="{{ asset('college.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <!-- Custom CSS -->
    <link href="{{asset('css/custom.css')  }}" rel="stylesheet">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">

            <!-- <a class="navbar-brand text-uppercase" href="index.html">
                Student and College Management System
            </a> -->
            <a href="{{ route('home') }}">
                <img src="{{ asset('college.ico') }}" alt="logo" style="width: 40px; height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- /.navbar-header -->
            <div class="collapse navbar-collapse" id="navbar-toggler">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="/students" class="nav-link">Students</a></li>
                    <li class="nav-item"><a href="{{route('colleges.index')}}" class="nav-link">Colleges</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @stack('scripts')
</body>

</html>