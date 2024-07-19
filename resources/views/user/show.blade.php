<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Details</title>
    <style>
        table,thead,tbody,td,tr,th{
            border: 1px solid black;

        }
    </style>
</head>
<body>
    {{-- getting the status from the route  --}}
    @if (session('status'))
        <h2>
            {{ session('status') }}
        </h2>
    @endif

    <h1>User Details</h1>
    
    {{-- All Details of User --}}
    <table>
        <thead>
            <tr>
                <th>Sr.no.</th>
                <th>Name</th>
                <th>UserName</th>
                <th>email</th>
                <th>Operation</th>
            </tr>
        </thead>

        <tbody>
                {{-- fetching value of Users from database  --}}
                <tr style="font-size: 20px;">
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td><button><a href="{{route('user.edit',$user->id)}}" style="text-decoration: none; color:black;">Update</a></button></td>
                </tr>
        </tbody>
    </table>
    <br><br>
    <h1>Addresses:</h1>
   
    {{-- User Address Details --}}
    <table>
        <thead>
            <th>Address</th>
            <th colspan="2">operation</th>
        </thead>
        <tbody>
            {{-- fetching addresses of User from database  --}}
            @foreach ($user->addresses as $address)
                <tr>
                    <td>{{$address->address}}</td>
                    <td><button><a href="{{route('user.address.edit',['user'=>$user->id,'address'=>$address->id])}}" style="text-decoration: none; color:black;">Update</a></button></td>
                    <td>
                        <form action="{{route('user.address.destroy',['user'=>$user->id,'address'=>$address->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>    
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <button><a href="{{route('user.address.create',$user->id)}}" style="text-decoration: none; color:black;">Add Address</a></button>
</body>
</html>