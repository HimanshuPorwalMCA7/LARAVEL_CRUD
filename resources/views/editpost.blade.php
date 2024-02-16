<!doctype html>
<html lang="en">
  <head>
    <title>Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
  <div class="container">
        <h1>Update Post</h1>
        <form action="{{ url('/edit_post/' . $post->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="content_text">Post Description</label>
                <input type="text" name="content_text" value="{{ $post->content_text }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        <button class="btn btn-primary"><a href="/dashboard" style="color: white; text-decoration: none;">Home</a></button>

        </form>
    </div>
  </body>
</html>