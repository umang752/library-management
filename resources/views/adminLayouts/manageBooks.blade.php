<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<h1 class="text-center" >Books</h1>
<a href="/manage-books/addBook"><button class="btn btn-info" >Add Book</button> </a><br><br>
  
    <table class="table">
        <thead>
            <tr>
                <th>Book_id</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Description</th>
                <th>Status</th>
                <th>Photo</th>
                <th>Total Inventory</th>
                <th>Issued Copies</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td scope="row">{{$book->book_id}}</td>
                <td>{{$book->name}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->description}}</td>
                <td>{{$book->status}}</td>
                <td>{{$book->photo}}</td>
                <td>{{$book->total_inventory}}</td>
                <td>{{$book->issued_copies}}</td>
                <td>{{$book->price}}</td>
                <td>
                    <a href="/manage-books/deleteBook/{{$book->name}}"><button class="btn btn-danger ">Delete</button></a>
                    <a href="/manage-books/update/{{$book->book_id}}"><button class="btn btn-success">Update</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>