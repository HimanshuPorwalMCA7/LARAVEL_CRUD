<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
        <h1>Login Form</h1>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <form method="POST" action="{{ url('/') }}/logined">
            @csrf
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
            </div>
            
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <br>
        <button class="btn btn-link"><a href="register">Register Now</a></button>
        <button class="btn btn-link"><a href="/">Home</a></button>

    </div>
  </body>
</html>