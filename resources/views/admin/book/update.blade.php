@extends('admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
           
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Update Book</div>
                    <div class="card-body">
                        @if(session('alert'))
                            <div class="alert alert-danger">
                                {{ session('alert') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ url('admin/book/update') }}" enctype="multipart/form-data">

                            @csrf
                            
                            <div class="form-group d-none">
                                <label for="id">Book ID</label>
                                <input type="text" class="form-control" id="id" name="id" value="{{ $book->book_id }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Book Name<span class="text-danger">*</span></label>
                                <input  autocomplete="off" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $book->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="author">Author<span class="text-danger">*</span></label>
                                <input  autocomplete="off" type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ $book->author }}">
                                @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description<span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $book->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status<span class="text-danger">*</span></label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="available" {{ $book->status === 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="unavailable" {{ $book->status === 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="total_inventory">Total Inventory<span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control @error('total_inventory') is-invalid @enderror" id="total_inventory" name="total_inventory" value="{{ $book->total_inventory }}">
                                @error('total_inventory')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="issued_copies">Issued Copies<span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control @error('issued_copies') is-invalid @enderror" id="issued_copies" name="issued_copies" value="{{ $book->issued_copies }}">
                                @error('issued_copies')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price<span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $book->price }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
