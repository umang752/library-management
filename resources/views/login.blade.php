<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
   
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
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input  autocomplete="off" id="email" type="email" class="form-control" name="email" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                            
                        </form>
                        <a href="{{ url('/forgotpass') }}" class="btn btn-link">forgot password?</a>
                        <br><br>
                        <a href="{{ url('/register') }}" class="btn btn-link">dont have an account? signup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
