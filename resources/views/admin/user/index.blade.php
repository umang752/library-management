
@extends('admin')

@section('content')
    <h1>User Management</h1>
    
    @if(session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif

    <a href="{{ url('/admin/user/add') }}" class="btn btn-primary mb-3">Add User</a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>


<tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->user_id }}</td>
            <td>{{ $user->fname }}</td>
            <td>{{ $user->lname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>
               
                <form action="{{ url('/admin/user/change-status/'.$user->user_id) }}" method="post">
                    @csrf
                    <select name="status" onchange="this.form.submit()">
                        <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $user->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </form>
            </td>
            <td>
                        <a href="{{ url('admin/user/delete/'.$user->user_id) }}"><button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button></a>
                        <a href="{{ url('admin/user/update/'.$user->user_id) }}"><button class="btn btn-success">Update</button></a>
                    </td>
        </tr>
    @endforeach
</tbody>
    </table>

   
    <div class="pagination">
        <span>Page {{ $users->currentPage() }} of {{ $users->lastPage() }}</span>
        
        @if ($users->onFirstPage())
            <span class="disabled">« Previous</span>
        @else
            <a href="{{ $users->previousPageUrl() }}" rel="prev">« Previous</a>
        @endif

        @if ($users->hasMorePages())
            <a href="{{ $users->nextPageUrl() }}" rel="next">Next »</a>
        @else
            <span class="disabled">Next »</span>
        @endif
    </div>
@endsection
