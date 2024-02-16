<!doctype html>
<html lang="en">
  <head>
    <title>Show</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
  @foreach ($posts as $post)
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Post Title</h2>
            <p class="card-text">{{ $post->title }}</p>
            <h2 class="card-title">Post Description</h2>
            <p class="card-text">{{ $post->content_text }}</p>
            <form action="{{ url('/edit_post/' . $post->id) }}" method="get">
                @csrf
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            <br>
            <form action="{{ url('/delete_post/' . $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
        <button class="btn btn-primary"><a href="/dashboard" style="color: white; text-decoration: none;">Home</a></button>

            </form>
        </div>
    </div>
@endforeach
  </body>
</html>