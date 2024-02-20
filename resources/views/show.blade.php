<!doctype html>
<html lang="en">
<head>
    <title>Show</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
      <h1>Your Available Post </h1>
        @foreach ($posts as $post)
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Post Title</h2>
                        <p class="card-text">{{ $post->title }}</p>
                        <h2 class="card-title">Post Description</h2>
                        <p class="card-text">{{ $post->content_text }}</p>
                        <div class="btn-group">
                            <form action="{{ url('/edit_post/' . $post->id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                            &nbsp; &nbsp; &nbsp;


                            @if($post->status == 1)
                            
                            <form action="{{ url('/update_status/' . $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Approved</button>
                            </form>
                            @elseif($post->status == 2)
                            <form action="{{ url('/update_status/' . $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Not Approved</button>
                            </form>
                            @endif

                            &nbsp; &nbsp; &nbsp;
                            <form action="{{ url('/delete_post/' . $post->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            &nbsp; &nbsp; &nbsp;
                        </div>
                        <button class="btn btn-primary"><a href="/dashboard" style="color: white; text-decoration: none;">Home</a></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>

