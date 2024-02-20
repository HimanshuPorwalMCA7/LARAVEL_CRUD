<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
 
<h1>User Available </h1>
@if(isset($users) && count($users) > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Role</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->role_code }}</td>
                        <td>
                            @if($user->status == 0)
                            <form action=" {{ url('/update/' . $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Waiting</button>
                            </form>
                            @elseif($user->status == 1)
                            <form action="{{ url('/update/' . $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Approved</button>
                            </form>
                            @elseif($user->status == 2)
                            <form action="{{ url('/update/' . $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Blocked</button>
                            </form>
                            @elseif($user->status == 3)
                            <form action="{{ url('/update/' . $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">Cancelled</button>
                            </form>
                            @else
                                <span class="badge badge-secondary">Unknown Status</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p>No users found.</p>
@endif

<button class="btn btn-primary"><a href="/dashboard" style="color: white; text-decoration: none;">Home</a></button><br><br>
<form action="{{url('/')}}/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
       
  </body>
</html>