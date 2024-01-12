<!DOCTYPE html>
<html>

<head>
    <title>Issue Book Form</title>
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

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            /* Makes sure the padding doesn't affect the overall width */
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
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

    <form action="/userbookissue/{{$data['book_id']}}" method="post">
        <h2>Issue Book Form</h2>
        @csrf
        <label for="user_id">User ID:</label><br>
        <input type="text" id="user_id" name="user_id"><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="issue">Issue</option>
            <option value="lost">Lost</option>
            <option value="returned">Returned</option>
        </select><br>


        <button id="deleteButton" type="submit">Issue</button>
        <div style="margin-top: 16px;">
            <button id="deleteButton" type="button" onclick="window.location.href='/manage-book'">Cancel</button>

        </div>

    </form>

</body>

</html>