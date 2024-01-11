<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Include your CSS stylesheets or link to external stylesheets here -->
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

    <!-- Include your additional HTML content or scripts here -->

</body>
</html>
