<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update address</title>
</head>
<body>
    <h1>Update address</h1>
    {{-- Update address form  --}}
    <form action="{{route('user.address.update',['user'=>$user->id,'address'=>$address->id])}}" method="POST">
        @csrf 
        @method('PUT')
        <label for="address">Address</label>
        <input type="text" name="address" value="{{$address->address}}" placeholder="Enter the address"><br><br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>