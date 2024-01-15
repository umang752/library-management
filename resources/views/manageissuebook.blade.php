@extends('back.layout.pages-layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
@section('content')
    <div class="contain">
        <div class="text">
            <h1>Manage Issue Book</h1><br>
            <div>
                <div>
                    <button id="add" type="button" onclick="window.location.href='/adduserbookissue'">Issue</button>
                   <div>

                    </div>
                    <form id="form" action="/edit" method="post">

                        <table style="width: 100%">
                            @csrf


                            <tr>
                                <th>issue id</th>
                                <th>user id</th>
                                <th>book id</th>
                                <th>status</th>
                                <th>reneu date</th>
                                <th>action</th>
                                <!-- <button type="submit" id="bt">edit</button> -->
                            </tr>

                            @foreach ($query as $q)
                            <tr>
                                <td>{{$q->issue_id}}</td>
                                <td>{{$q->user_id}}</td>
                                <td>{{$q->book_id}}</td>
                                <td>{{$q->status}}</td>
                                <td>{{$q->reneu_date}}</td>
                                <td>
                                    <a href="/editbook/{{$q->book_id}}" class="edit-button">Edit</a>
                                    <a href="/issuebook" class="delete-button">lost</a>
                                    <a href="/editbook/{{$q->book_id}}" class="edit-button">return</a>
                                    
                                </td>
                            </tr>
                            @endforeach
                            <div class="d-flex justify-content-center" id="page">
                            {{$query ->links()}}
</div>
                        </table>
                    </form>

                </div>

            </div>
            @stop
</body>
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });
</script>

</html>





<style>
    #page{
        margin-top: 20px;
    }
    .cls table,
    th,
    td {
        border: 1px solid black;
    }

    .box-body {
        overflow-y: auto;
        /* Add vertical scrollbar if content overflows vertically */
        max-height: 800px;
        /* Set a maximum height for the container to enable scrolling */
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
        color: whitesmoke;
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