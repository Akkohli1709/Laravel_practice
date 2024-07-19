<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form</title>
</head>
<body>
    <h1>Registration</h1>
 
    {{-- <h2>
        @php
            if($errors) 
            print_r($errors->all());
        @endphp
    </h2> --}}
    
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <h2>{{ $error }}</h2> 
        @endforeach
    @endif
    <form action="{{route('user.store')}}" method="POST">
        @csrf
        <label for="">Name</label>
        <input type="text" value="{{old('name')}}" name="name" id="name"><br><br>
        <label for="">username</label>
        <input type="text" value="{{old('username')}}" name="username" id="username"><br><br>
        <label for="">email</label>
        <input type="text" value="{{old('email')}}" name="email" id="email"><br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>