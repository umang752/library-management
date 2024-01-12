<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles here if needed */
    </style>
</head>

<body>
@if(session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Update Book</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('admin/book/update') }}">

                            @csrf
                            <!-- Input fields for book details -->
                            <div class="form-group d-none">
                                <label for="id">Book ID</label>
                                <input type="text" class="form-control" id="id" name="id" value="{{ $book->book_id }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Book Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}">
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ $book->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="available" {{ $book->status === 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="unavailable" {{ $book->status === 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="total_inventory">Total Inventory</label>
                                <input type="number" min="0" class="form-control" id="total_inventory" name="total_inventory" value="{{ $book->total_inventory }}">
                            </div>
                            <div class="form-group">
                                <label for="issued_copies">Issued Copies</label>
                                <input type="number" min="0" class="form-control" id="issued_copies" name="issued_copies" value="{{ $book->issued_copies }}">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" min="0" class="form-control" id="price" name="price" value="{{ $book->price }}">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
