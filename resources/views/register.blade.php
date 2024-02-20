<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
  <div class="container">
        <h1>Registration Form</h1>

        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <form method="POST" action="{{url('/')}}/registered">
            @csrf
            <x-input type="text" name="name" label="Enter Your Name"/>
            <x-input type="email" name="email" label="Enter Your Email"/>
            <x-input type="password" name="password" label="Enter Your Password"/>





















            
             <!-- <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" class="form-control">
                <span class="text-danger">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
            </div>
            
           <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control">
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" class="form-control">
                <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
            </div> -->

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role_code" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="cw">Content Writer</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <br>
        <button class="btn btn-link"><a href="login">Login Now</a></button>
    </div>
  </body>
</html>