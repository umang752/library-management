<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <h1 class="text-center">Admin Dashboard</h1>
    <div class="btn-container">
      <div class="btn-group">
        <a href="{{url('/manage-users')}}" class="btn btn-primary btn-lg">Manage Users</a>
      </div>
      <div class="btn-group">
        <a href="{{url('/manage-books')}}" class="btn btn-success btn-lg">Manage Books</a>
      </div>
      <div class="btn-group">
        <a href="{{url('/manage-issued-books')}}" class="btn btn-info btn-lg">Manage Issued Books</a>
      </div>
      <div class="btn-group">
        <a href="/logout" class="btn btn-info btn-lg">Logout</a>
      </div>
    </div>
</div>
</body>
</html>