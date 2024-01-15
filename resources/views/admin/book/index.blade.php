@extends('admin')

@section('content')
<h1>Book Management</h1>
    @if(session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    <div class="container">
        <a href="{{ url('/admin/book/add') }}" class="btn btn-primary mb-3">Add Book</a>
        
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
                        <td>
                            <form action="{{ url('/admin/book/change-status/'.$book->book_id) }}" method="post">
                            @csrf
                            <select name="status" onchange="this.form.submit()">
                                <option value="available" {{ $book->status === 'available' ? 'selected' : '' }}>Available</option>
                                <option value="unavailable" {{ $book->status === 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                            </select>
                        </form>
                        </td>
                        <td>{{ $book->total_inventory }}</td>
                        <td>{{ $book->issued_copies }}</td>
                        <td>{{ $book->price }}</td>
                        <td>
                            @if($book->photo)
                                <img src="{{ asset('storage/images/' . $book->image) }}" alt="{{ $book->name }}" class="book-image">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a  href="{{ url('admin/book/delete/'.$book->book_id) }}" onclick="return confirm('Are you sure you want to delete this book?')">
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
    <div class="pagination">
        <span>Page {{ $books->currentPage() }} of {{ $books->lastPage() }}</span>
        
        @if ($books->onFirstPage())
            <span class="disabled">« Previous</span>
        @else
            <a href="{{ $books->previousPageUrl() }}" rel="prev">« Previous</a>
        @endif

        @if ($books->hasMorePages())
            <a href="{{ $books->nextPageUrl() }}" rel="next">Next »</a>
        @else
            <span class="disabled">Next »</span>
        @endif
    </div>
@endsection
