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
.required {
      color: red;
      margin-left: 3px;
    }
    .error-message {
      color: red;
      font-size: smaller;
    }
</style>
</head>
<body>
    
    <form action="/editbook/{{$data['book_id']}}" method="post" enctype="multipart/form-data">
        @csrf
        <h2>Edit Book</h2>
        <label for="name">Book Name<span class="required">*</span></label>
        <input type="text" id="name" name="name" required value="{{$data['name']}}">
        <div class="error-message" class="alert alert-danger">
        @error('name')
        <span>{{ $message }}</span>
        @enderror
      </div>
        <label for="author">Author<span class="required">*</span></label>
        <input type="text" id="author" name="author" required value="{{$data['author']}}">
        <div class="error-message" class="alert alert-danger">
        @error('author')
        <span>{{ $message }}</span>
        @enderror
      </div>
        <label for="description">Description<span class="required">*</span></label>
        <input id="description" name="description" required value="{{$data['description']}}"></input>
        <div class="error-message" class="alert alert-danger">
        @error('description')
        <span>{{ $message }}</span>
        @enderror
      </div>
        <label for="status">Status<span class="required">*</span></label>
        <select id="status" name="status" required value="{{$data['status']}}">
            <option value="available">Available</option>
            <option value="unavailable">Unavailable</option>
        </select>

        <label for="price">Price<span class="required">*</span></label>
        <input  id="price" name="price" required value="{{$data['price']}}">
        <div class="error-message" class="alert alert-danger">
        @error('price')
        <span>{{ $message }}</span>
        @enderror
      </div>
        <label for="issued_copies">Issued Copies</label>
        <input id="issued_copies" name="issued_copies" value="{{$data['issued_copies']}}">
        <div class="error-message" class="alert alert-danger">
        @error('issued_copies')
        <span>{{ $message }}</span>
        @enderror
      </div>
        <label for="total_inventory">Total Inventory</label>
        <input  id="total_inventory" name="total_inventory" value="{{$data['total_inventory']}}">
        <div class="error-message" class="alert alert-danger">
        @error('total_inventory')
        <span>{{ $message }}</span>
        @enderror
      </div>
        <label for="photo">Photo<span class="required">*</span></label>
        <img src="{{ asset($data->photo) }}" width="150px" height="150px" alt="image" title="job image">
        <input type="file" id="photo" name="photo" accept="image/*" value="{{$data['photo']}}">
        <div class="error-message" class="alert alert-danger">
        @error('photo')
        <span>{{ $message }}</span>
        @enderror
      </div>
        <button type="submit">Edit Book</button>
        <button id="deleteButton" type="button" onclick="window.location.href='/manage-book'" style="float: right;">Cancel</button>

    </form>
</body>
</html>
