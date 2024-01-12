<!DOCTYPE html>
<html>
<head>
    <title>Admin Homepage</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <form class="form-inline" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center">
            <h2>Welcome, Admin {{Auth::user()->fname}}!</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <a href="{{url('admin/user')}}" class="btn btn-primary btn-lg btn-block">Manage Users</a>
                </div>
                <div class="col-md-4">
                    <a href="{{url('admin/book')}}"  class="btn btn-success btn-lg btn-block">Manage Books</a>
                </div>
                <div class="col-md-4">
                    <a  href="{{url('admin/issue')}}"  class="btn btn-info btn-lg btn-block">Manage Issued Books</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
