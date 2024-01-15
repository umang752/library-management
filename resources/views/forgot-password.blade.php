<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>

    <div>
        <h2>Forgot Password</h2>

        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="/sendotp">
            @csrf

            <label for="email">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            @error('email')
                <div>
                    
                {{ $message }}
                </div>
            @enderror

            <button type="submit">Send OTP</button>
        </form>
    </div>

   

</body>
</html> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .reset-password-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button{
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
#back-btn{
    padding: 10px 30px;
}
        #error-message {
            color: red;
            font-size: smaller;
        }
    </style>
</head>

<body>
    <div class="reset-password-container">
        <form action="/reset-password" method="POST" autocomplete="off">
            @csrf
            <h2>Reset Password</h2>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <div class="error-message" class="alert alert-danger">
                    @error('email')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" required>
                <div class="error-message" class="alert alert-danger">
                    @error('password')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <button type="submit">Reset Password</button>
                <button type="button" id="back-btn" onclick="window.location.href='/login'" style="float: right;">Back</button>
            </div>
        </form>
    </div>
</body>

</html>