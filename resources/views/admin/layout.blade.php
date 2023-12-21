<!-- resources/views/admin.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> <!-- Add this line for custom CSS -->
</head>
<body>
    <style>
        /* public/css/styles.css */

    #sidebar {
        height: 100vh; /* 100% of the viewport height */
        color: white; /* Text color for sidebar links */
    }
    
    .nav-link {
        padding: 15px; /* Increase padding for sidebar links */
    }
    
    .bg-primary {
        background-color: #008000 !important; /* Change the primary color */
    }
    
    /* Add more custom styling as needed */

    </style>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                       @if(session('adminPanelLogin')->dep_id == 1)
                            <li class="nav-item">
                                <a class="nav-link active" href="#">
                                    <i class="bi bi-house-door"></i> Dashboard
                                </a>
                            </li>
                        @else

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.officerComplains') }}">
                                <i class="bi bi-person"></i> My Complains
                            </a>
                        </li>
                        
                        @endif
                     
                        <!-- Add more sidebar links as needed -->
                    </ul>
                </div>
            </nav>

            <!-- Main content area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Admin Dashboard</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                              
                                <li class="nav-item">
                                    <a href="{{ route('admin.LogOut') }}" class="nav-link" href="#">LogOut</a>
                                </li>
                                <!-- Add more navigation items as needed -->
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Content Area -->
                <div class="mt-3">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Icons from Bootstrap Icons -->
    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/bootstrap-icons@1.19.0/font/bootstrap-icons.css"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>
</html>


