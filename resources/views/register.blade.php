<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@if(session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Sign Up</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input id="firstname" type="text" class="form-control" name="firstname" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input id="lastname" type="text" class="form-control" name="lastname" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone No.</label>
                                <input id="phone" type="number" minlength="10" min="1000000000" class="form-control" name="phone" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </form>
                        <a href="{{ url('/login') }}" class="btn btn-link">Already have an account? Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
