<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Form</title>
    <style>
        ::after

        /* style.css */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input,
        select,
        button {
            padding: 10px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        button.submit-btn {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button.cancel-btn {
            background-color: #f44336;
            color: white;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form action="/membership/{{$data['user_id']}}" method="post">
            @csrf
            <h2>Membership Form</h2>

            <button type="submit" class="submit-btn">Membership</button>
            <button type="button" class="cancel-btn" onclick="window.location.href='/manage-user'">Cancel</button>
        </form>
    </div>
</body>

</html>