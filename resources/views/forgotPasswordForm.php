<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container" >
<div class="card text-center" style="width: 300px;">
    <div class="card-header h5 text-white bg-primary">Password Reset</div>
    <div class="card-body px-5">
        <p class="card-text py-2">
            Enter your email address and we'll send you an email with instructions to reset your password.
        </p>
        <div class="form-outline">
            <input type="email" id="typeEmail" class="form-control my-3" name="email" />
            <label class="form-label" for="typeEmail">Email input</label>
        </div>
        <a href="{{url('/)}}/forgotPassword" class="btn btn-primary w-100">Reset password</a>
        <div class="d-flex justify-content-between mt-4">
            <a class="" href="/login">Login</a>
            <a class="" href="/register">Register</a>
        </div>
    </div>
</div>
</div>
</body>
</html>