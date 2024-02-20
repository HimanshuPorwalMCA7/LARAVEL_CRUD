<!doctype html>
<html lang="en">
  <head>
    <title>HOME</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
        <h1>Welcome To Dashboard</h1>
        <form action="{{url('/')}}/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        <br>
        <button class="btn btn-primary"><a href="add_post" style="color: white; text-decoration: none;">Add Post</a></button>
        <button class="btn btn-primary"><a href="show_post" style="color: white; text-decoration: none;">Show Post</a></button>
        <button class="btn btn-primary"><a href="user_status" style="color: white; text-decoration: none;">User Updation</a></button>
    </div>
  </body>
</html>