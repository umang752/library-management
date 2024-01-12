<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .delete-form-container {
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #deleteButton {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        #deleteButton:hover {
            background-color: darkred;
        }
    </style>
</head>

<body>
    <div class="delete-form-container">
        <h2>Are you sure you want to delete this item?</h2>
        <form action="/deleteuser/{{$data['user_id']}}" method="POST">
            @csrf
            <button id="deleteButton" type="submit">Delete</button>
            <div style="margin-top: 16px;">
                <button id="deleteButton" type="button" onclick="window.location.href='/manage-user'">Cancel</button>

            </div>
        </form>
    </div>


</body>

</html>