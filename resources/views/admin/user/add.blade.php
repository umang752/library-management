
@extends('admin')

@section('content')
    @if(session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Add User</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/user/add') }}">
                            @csrf
                            <div class="form-group">
                                <label for="firstname" class="text-secondary">First Name<span class="text-danger">*</span></label>
                                <input id="firstname" type="text" class="form-control" name="firstname" required autofocus autocomplete="off" >
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="text-secondary">Last Name<span class="text-danger">*</span></label>
                                <input id="lastname" type="text" class="form-control" name="lastname" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-secondary">Email<span class="text-danger">*</span></label>
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-secondary">Password<span class="text-danger">*</span></label>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="text-secondary">Confirm Password<span class="text-danger">*</span></label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="text-secondary">Phone No.<span class="text-danger">*</span></label>
                                <input id="phone" type="number" minlength="10" min="1000000000" class="form-control" name="phone" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Add User</button>
                            </div>
                        </form>
                        <a href="{{ url('/admin/user') }}" class="btn btn-secondary btn-block">Back to Manage Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
