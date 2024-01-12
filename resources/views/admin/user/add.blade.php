<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Add User</div>
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/user/add') }}">
                            @csrf
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input id="firstname" type="text" class="form-control" name="firstname" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input id="lastname" type="text" class="form-control" name="lastname" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone No.</label>
                                <input id="phone" type="tel" class="form-control" name="phone" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Add User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
