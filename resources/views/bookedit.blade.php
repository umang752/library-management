<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

h2 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #333;
}

input,
select,
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

button:hover {
    background-color: #45a049;
}

#photo {
    margin-top: 8px;
}

select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23333%22%3E%3Cpath d="M7 10l5 5 5-5z"%3E%3C/path%3E%3C/svg%3E') no-repeat right 8px center/10px 10px;
}

textarea {
    resize: vertical;
}
</style>
</head>
<body>
    
    <form action="/editbook/{{$data['book_id']}}" method="post" enctype="multipart/form-data">
        @csrf
        <h2>Edit Book</h2>
        <label for="name">Book Name</label>
        <input type="text" id="name" name="name" required value="{{$data['name']}}">

        <label for="author">Author</label>
        <input type="text" id="author" name="author" required value="{{$data['author']}}">

        <label for="description">Description</label>
        <textarea id="description" name="description" required value="{{$data['description']}}"></textarea>

        <label for="status">Status</label>
        <select id="status" name="status" required value="{{$data['status']}}">
            <option value="available">Available</option>
            <option value="unavailable">Unavailable</option>
        </select>

        <label for="price">Price</label>
        <input  id="price" name="price" required value="{{$data['price']}}">

        <label for="issued_copies">Issued Copies</label>
        <input id="issued_copies" name="issued_copies" value="{{$data['issued_copies']}}">

        <label for="total_inventory">Total Inventory</label>
        <input  id="total_inventory" name="total_inventory" value="{{$data['total_inventory']}}">

        <label for="photo">Photo</label>
        <img src="{{ asset('images/'.$data->photo) }}" width="150px" height="150px" alt="image" title="job image">
        <input type="file" id="photo" name="photo" accept="image/*" >

        <button type="submit">Edit Book</button>
    </form>
</body>
</html>
