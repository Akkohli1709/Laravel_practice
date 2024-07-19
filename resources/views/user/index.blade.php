<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All User</title>
    <style>
        table,thead,tbody,td,tr,th{
            border: 1px solid black;

        }
    </style>
</head>
<body>
    <h1>All Users </h1>
    @if (session('status'))
        <h2>
            {{ session('status') }}
        </h2>
    @endif
    <table>
        <thead>
            <tr>
                <th>Sr. no.</th>
                <th>Name</th>
                <th>UserName</th>
                <th>Email</th>
                <th colspan="2">Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td><button><a href="{{route('user.show',$user->id)}}" style="text-decoration: none; color:black;"> View</a></button></td>
                    <td>
                        <form action="{{route('user.destroy',$user->id)}}" method="POST">
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
    <button><a href="{{route('user.create')}}" style="text-decoration: none; color:black;">Add User</a></button>
</body>
</html>