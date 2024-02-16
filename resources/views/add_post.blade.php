<!doctype html>
<html lang="en">
  <head>
    <title>Add_Post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
        <h1>Add Post</h1>
        <form method="POST" action="{{url('/')}}/add_post">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" type="text" name="title" class="form-control">
                <span class="text-danger">
                    @error('title')
                        {{$message}}
                    @enderror
                </span>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <input id="description" type="text" name="description" class="form-control">
                <span class="text-danger">
                    @error('description')
                        {{$message}}
                    @enderror
                </span>
            </div>

            <button type="submit" class="btn btn-primary">Submit Post</button>
        <button class="btn btn-primary"><a href="/dashboard" style="color: white; text-decoration: none;">Home</a></button>

        </form>

    </div>
  
  </body>
</html>