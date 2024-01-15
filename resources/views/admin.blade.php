<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            margin-top: 0; 
        }

        .sidebar {
            position: fixed;
            width: 200px;
            height: 100%;
            background-color: #343a40;
            padding-top: 20px;
            color: #ffffff;
        }

        .sidebar a {
            padding: 8px;
            text-decoration: none;
            color: #ffffff;
            display: block;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 200px; 
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        
        <nav class="sidebar">
            <a href="{{ url('/admin') }}">Dashboard</a>
            <a href="{{ url('/admin/user') }}">Manage Users</a>
            <a href="{{ url('/admin/book') }}">Manage Books</a>
            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
   
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
        
       
        <div class="content">
            <h1>Welcome to the Admin Panel</h1>
            @yield('content')
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>

</html>
