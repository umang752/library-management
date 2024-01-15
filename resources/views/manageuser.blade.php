@extends('back.layout.pages-layout')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <meta http-equiv="refresh" content="2"> -->
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
@section('content')
    <div class="contain">
        <div class="text">
            <h1>Manage User</h1><br>
            <div>
                <button id="add" type="button" onclick="window.location.href='/adduser'">AddUser</button>
               </div>
            <form id="form" method="post">

                <table style="width: 100%">
                    @csrf


                    <tr>
                        <th>user id</th>
                        <th>first name</th>
                        <th>last name</th>
                        <th>email</th>
                        <th>status</th>
                        <th>phone</th>
                        <th>action</th>
                    </tr>

                    @foreach ($query as $q)
                    <tr>
                        <td>{{$q->user_id}}</td>
                        <td>{{$q->first_name}}</td>

                        <td>{{$q->last_name}}</td>
                        <td>{{$q->email}}</td>
                        <td>{{$q->status}}</td>
                        <td>{{$q->phone_number}}</td>
                        <td>
                            <a href="/edituser/{{$q->user_id}}" class="edit-button">Edit</a>
                            <!-- <a href="/deleteuser/{{$q->user_id}}" id="dlt-btn"  class="delete-button">Delete</a> -->
                            <a href="#" class="delete-button" data-itemid="{{$q->user_id}}">Delete</a>


                            <a href="/membership/{{$q->user_id}}" class="edit-button">membership</a>
                        </td>
                    </tr>
                    @endforeach
                    <div class="d-flex justify-content-center" id="page">
                    {{$query ->links()}}
</div>
                </table>

            </form>
            <div id="deleteModal" class="delete-form-container">
                <div class="modal-content">

                    <h2>Are you sure you want to delete this item?</h2>

                    <button id="deleteButton" type="submit">Delete</button>
                    <div style="margin-top: 16px;">
                        <button id="cancelButton" type="button" onclick="window.location.href='/manage-user'">Cancel</button>

                    </div>

                </div>

                <!-- </div>
            <div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Are you sure you want to delete this item?</h2>
        <button id="confirmDelete">Delete</button>
        <button id="cancelDelete">Cancel</button>
    </div>
</div> -->
                <br>
                <br>
                @if (session('success'))
                <div id="successMessage" class="alert alert-success">
                    {{ session('success') }}
                </div>

                <script>
                    setTimeout(function() {
                        document.getElementById('successMessage').style.display = 'none';
                    }, 5000);
                </script>
                @endif
            </div>

        </div>
        <script>
            $(document).ready(function() {
              var csrf_token = "{{ csrf_token() }}";
            var modal = $("#deleteModal");
            var deleteButton = $(".delete-button");
            deleteButton.click(function(e) {
                    e.preventDefault();
                    var itemId = $(this).data("itemid");
                    // alert("hii");
                    $("#deleteButton").attr("data-itemid", itemId);
                    modal.css("display", "block");
                });
              $("#deleteButton").click(function() {
             var itemId = $(this).data("itemid");
                       $.ajax({
                        url: "/deleteuser",
                    method: "POST",
                        data: {
                            itemId : itemId
                        },
                        headers: {
                            'X-CSRF-TOKEN': csrf_token
                        },
                        success: function(response) {
                            console.log("Item deleted successfully");
                        },
                        error: function(error) {
                            console.error("Error deleting item", error);
                        }
                    });
                    modal.css("display", "none");
                });
                $("#cancelButton, .close").click(function() {});
            });
        </script>
      @stop
</body>

<!-- <script>
 
var modal = document.getElementById("deleteModal");

// Get the button that opens the modal
var btn = document.getElementById("dlt-btn");

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


    $(document).ready(function() {
        $('.table').DataTable();
    });
</script> -->



</html>





<style>
    #page{
        margin-top: 20px;
    }
    .delete-form-container {
        display: none;

        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        /* width: 50%;
        height: 50%; */
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);

        justify-content: center;
        align-items: center;

        text-align: center;
        padding: 50px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 30%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 10px;

    }


    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }


    #deleteButton {
        background-color: red;
        color: white;
        border: none;
        padding: 25px 20px;
        text-align: center;
        cursor: pointer;
        border-radius: 5px;
    }

    #deleteButton:hover {
        background-color: darkred;
    }

    #cancelButton {
        background-color: red;
        text-align: center;
        color: white;
        border: none;
        padding: 25px 20px;
        cursor: pointer;
        border-radius: 5px;
    }

    #cancelButton:hover {
        background-color: darkred;
    }

    #successMessage {
        color: green;
        font-size: large;
        text-align: center;
    }

    .cls table,
    th,
    td {
        border: 1px solid black;
    }

    .box-body {
        overflow-y: auto;
        max-height: 800px;
    }

    #alert-success {
        color: green;
        font-size: small;
    }


    * {
        margin: 0%;
        padding: 0%;
    }

    h1 {
        color: black;
    }

    body {
        background-color: whitesmoke;
        background-size: 100% 740px;
    }

    tr {
        padding-top: 10px;
        padding-left: 40%;
        width: 20px;
        height: 30px;
        text-align: center;
        color: black;



    }

    .contain.text {
        position: relative;
        top: 7%;
    }

    .cls {

        border: 3px solid black;
        background-color: whitesmoke;

        width: 250px;
        font-size: 20px;
        margin-top: 30px;
        color: black;
        height: 40px;
        padding-left: 10px;
    }


    .text button {
        width: 100px;
        height: 10px;
        background-color: blue;
        color: white;
        border: black;
        font-size: 22px;
        /* border-radius: 25px; */
        margin-top: 20px;


    }

    button:hover {

        color: white;
        font-size: 20px;
        background-color: black;
        cursor: pointer;
    }

    p span {
        border: 3px solid black;
        align-content: right;
        color: white;
    }

    .edit-button,
    .delete-button {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 5px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 12px;
        text-decoration: none;
        cursor: pointer;
    }

    .delete-button {
        background-color: #FF3547;
    }

    #add {

        background-color: blue;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px;
        margin: 4px 2px;
        cursor: pointer;

    }
</style>