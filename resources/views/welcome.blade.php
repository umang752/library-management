<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
@if(session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
@endif

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Welcome</h2>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <p class="lead">Choose an option:</p>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="{{ url('/login') }}" class="btn btn-primary btn-lg">Login</a>
                        <a href="{{ url('/register') }}" class="btn btn-success btn-lg">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>
