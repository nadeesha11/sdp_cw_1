    <!-- resources/views/login.blade.php -->
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login - Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      
    </head>
    <body class="text-center">
        <style>
            /* public/css/styles.css */
    
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        </style>
        <main class="form-signin">
         @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

            <form action="{{ route('admin.check') }}" method="POST" >
                @csrf
                <img class="mb-4" src="https://i.ibb.co/PNRpqbp/pngegg.png" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Admin Panel Login</h1>
    
                <div class="form-floating m-1">
                    <input type="email" class="form-control" id="inputEmail" required name="email" placeholder="name@example.com">
                    <label for="inputEmail">Email address</label>
                </div>
    
                <div class="form-floating m-1">
                    <input type="password" class="form-control" id="inputPassword" required name="password" placeholder="Password">
                    <label for="inputPassword">Password</label>
                </div>
    
                <button class="w-100 btn btn-lg btn-success" type="submit">LOGIN</button>
            </form>
        </main>
        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
