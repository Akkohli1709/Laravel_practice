<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>address</title>
</head>
<body>
    <h1>Add address</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <h2>{{ $error }}</h2> 
        @endforeach
    @endif
    {{-- Add new Address form  --}}
    <form action="{{route('user.address.store',$user->id)}}" method="POST">
        @csrf
        <label for="address">Address</label>
        <input type="text" name="address" placeholder="Enter the address"><br><br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>