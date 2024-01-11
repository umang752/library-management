<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card text-center" style="width: 300px;">
            <div class="card-header h5 text-white bg-primary">Password Reset</div>
            <div class="card-body px-5">
                <p class="card-text py-2">
                    Enter your email address and your new password.
                </p>

                <form action="/forgotPassword" method="POST">
                    @csrf

                    <div class="form-outline">
                        <label class="form-label" for="typeEmail">Email:</label>
                        <input type="email" id="typeEmail" class="form-control my-3" name="email" placeholder="Enter your email"/>
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-outline">
                        <label class="form-label" for="typePassword">Password:</label>
                        <input type="password" id="typePassword" class="form-control my-3" name="password" placeholder="Enter your new password"/>
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </form>

                <div class="d-flex justify-content-between mt-4">
                    <a class="" href="/login">Login</a>
                    <a class="" href="/register">Register</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
