@extends('admin')
<head>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const totalInventoryInput = document.getElementById('total_inventory');
            const issuedCopiesInput = document.getElementById('issued_copies');
            const form = document.getElementById('book_form');

            form.addEventListener('submit', function (event) {
                if (parseInt(totalInventoryInput.value) < parseInt(issuedCopiesInput.value)) {
                    event.preventDefault();
                    alert('Issued Copies cannot be greater than Total Inventory.');
                }
            });
        });
    </script>
</head>
@section('content')
    @if(session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    <div class="container mt-5">
        <h1>Add Book</h1>
        <form method="POST" action="{{ url('admin/book/add') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name<span class="text-danger">*</span></label>
                <input  autocomplete="off" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="author">Author<span class="text-danger">*</span></label>
                <input  autocomplete="off" type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" required>
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description<span class="text-danger">*</span></label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required></textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status<span class="text-danger">*</span></label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="total_inventory">Total Inventory<span class="text-danger">*</span></label>
                <input  autocomplete="off" type="number" min="0" max="100" class="form-control @error('total_inventory') is-invalid @enderror" id="total_inventory" name="total_inventory" required>
                @error('total_inventory')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="issued_copies">Issued Copies<span class="text-danger">*</span></label>
                <input  autocomplete="off" type="number" min="0" max="100"class="form-control @error('issued_copies') is-invalid @enderror" id="issued_copies" name="issued_copies" required>
                @error('issued_copies')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price<span class="text-danger">*</span></label>
                <input  autocomplete="off" type="number" min="100" max="1000" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input  type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
@endsection
