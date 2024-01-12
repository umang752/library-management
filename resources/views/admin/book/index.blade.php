<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Custom styles */
        .table th {
            background-color: #343a40;
            color: #ffffff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #bd2130;
            border-color: #bd2130;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .book-image {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>

<body>
@if(session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    <div class="container">
        <a href="{{ url('/admin/book/add') }}" class="btn btn-primary mb-3">Add Book</a>
        <a href="{{ url('/admin') }}" class="btn btn-secondary btn-home">Home</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Total Inventory</th>
                    <th>Issued Copies</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->book_id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->status }}</td>
                        <td>{{ $book->total_inventory }}</td>
                        <td>{{ $book->issued_copies }}</td>
                        <td>{{ $book->price }}</td>
                        <td>
                            @if($book->photo)
                            <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->name }}" class="book-image">

                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a  href="{{ url('admin/book/delete/'.$book->book_id) }}"onclick="return confirm('Are you sure you want to delete this book?')">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                            <a href="{{ url('admin/book/update/'.$book->book_id) }}">
                                <button class="btn btn-success">Update</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
