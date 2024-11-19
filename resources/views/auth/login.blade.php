<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card w-50">
            <form class="p-5" action="{{ route('login') }}" method="POST">
                @csrf
                <h1 class="text-center">Login</h1>
                
                <div class="mb-4">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Login</button>

                <!-- Link menuju halaman registrasi -->
                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
