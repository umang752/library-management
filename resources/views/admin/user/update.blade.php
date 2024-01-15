@extends('admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Update User</h2>
                    </div>
                    <div class="card-body">
                        @if(session('alert'))
                            <div class="alert alert-danger">
                                {{ session('alert') }}
                            </div>
                        @endif

                        <form method="post" action="{{ url('admin/user/update') }}">
                            @csrf
                            
                            <div class="form-group d-none">
                                <label for="id">User Id</label>
                                <input type="text" class="form-control" id="id" name="id" value="{{ $user->user_id }}">
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="text-secondary">First Name<span class="text-danger">*</span></label>
                                <input id="firstname" value="{{ $user->fname }}" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" required autofocus autocomplete="off">
                                @error('firstname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="text-secondary">Last Name<span class="text-danger">*</span></label>
                                <input id="lastname" value="{{ $user->lname }}" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" required autocomplete="off">
                                @error('lastname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-secondary">Email<span class="text-danger">*</span></label>
                                <input id="email" type="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="off">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="phone" class="text-secondary">Phone No.<span class="text-danger">*</span></label>
                                <input id="phone" type="number" value="{{ $user->phone }}" minlength="10" min="1000000000" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="off">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Update User</button>
                            </div>
                        </form>
                        <a href="{{ url('/admin/user') }}" class="btn btn-secondary btn-block">Back to Manage Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
