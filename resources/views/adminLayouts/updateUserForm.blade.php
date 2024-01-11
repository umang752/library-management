<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Update User
      </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>


<!-- Your regular content here -->

<body>
    <!-- <pre>
        @php
        print_r($errors->all());
        @endphp
    </pre> -->
<form action="/manage-users/updateHandler" method="post">
  @csrf
  
  <x-Heading headingName="Update User" />

  <input type="number" class="d-none" name="id" value="{{$id}}">
  <div class="form-group">
    <label for="exampleInputEmail1">First_Name</label>
    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Enter First_Name" name="First_Name" value="{{$user->fname}}">
    <span id="emailHelp" class="text-danger">
        @error('First_Name')
            {{ $message }}  
        @enderror
    </span>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Last_Name</label>
    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Enter Last_Name" name="Last_Name" value="{{ $user->lname }}">
    <span id="emailHelp" class="text-danger">
        @error('Last_Name')
            {{ $message }}  
        @enderror
    </span>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Enter Email" name="Email" value="{{ $user->email }}">
    <span id="emailHelp" class="text-danger">
        @error('Email')
            {{ $message }}  
        @enderror
    </span>
</div>
<!-- <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Enter Password" name="Password" value="">
    <span id="emailHelp" class="text-danger">
        @error('Password')
            {{ $message }}  
        @enderror
    </span>
</div> -->
<div class="form-group">
    <label for="exampleInputEmail1">Phone_Number</label>
    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Enter Phone_Number" name="Phone_Number" value="{{ $user->phone }}">
    <span id="emailHelp" class="text-danger">
        @error('Phone_Number')
            {{ $message }}  
        @enderror
    </span>
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</div>
</form>
</body>
</html>