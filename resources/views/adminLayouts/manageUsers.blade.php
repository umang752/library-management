<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<a href="/manage-users/addUser"><button class="btn btn-info" >Add User</button> </a><br><br>

    <table class="table">
        <thead>
            <tr>
                <th>User_id</th>
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
                <td scope="row">{{$user->user_id}}</td>
                <td>{{$user->fname}}</td>
                <td>{{$user->lname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->status}}</td>
                <td>
                    <a href="/manage-users/delete/{{$user->user_id}}"><button class="btn btn-danger ">Delete</button></a>
                    <a href="{{route('edit.user',['id'=>$user->user_id])}}"><button class="btn btn-success">Update</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>