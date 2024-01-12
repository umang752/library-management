<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issued Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styles if needed */
        .btn-issue {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Issued Books</h2>
        <a href="{{ url('/admin/issue/issuebook') }}" class="btn btn-primary btn-issue">Issue Book</a>
        
        <a href="#" class="btn btn-info btn-membership">Membership</a>
        <a href="{{ url('/admin') }}" class="btn btn-secondary btn-home">Home</a>

        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th>Issue ID</th>
                    <th>User ID</th>
                    <th>Book ID</th>
                    <th>Status</th>
                    <th>Renew Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>
</body>

</html>
