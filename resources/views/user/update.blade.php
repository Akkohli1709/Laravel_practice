<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
</head>
<body>
    <h1>Update Details</h1>
    <form action="{{route('user.update',$user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="">Name</label>
        <input type="text" name="name" value="{{$user->name}}" id="name"><br><br>
        <label for="">username</label>
        <input type="text" name="username" value="{{$user->username}}" id="username"><br><br>
        <label for="">email</label>
        <input type="text" name="email" value="{{$user->email}}" id="email"><br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
</body>
</html>