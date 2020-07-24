<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Application - Show Video</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="/videos" class="navbar-brand">CRUD APPLICATION</a>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Show Video</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ asset('/videos')}}" class="btn btn-success offset-md-8 mt-2"><i class="fa fa-video-camera" aria-hidden="true"></i> Show All Videos</a>
            </div>
        </div>
        
        <hr>

        <h2>{{ 'Video URL: '.$video->url }}</h2>
        <h4>{{ 'Video Path: '.$video->file_path }}</h4>
        
        <hr>

        <h2>Tags</h2>

        <ul>
            @foreach ($video->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>

        <hr>

        <form action="/videos/{{ $video->id }}/tags" method="POST">

            @csrf

            <div class="form-group">
                <label for="tags">Select Tags</label>
                <select class="form-control" name="tags[]" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @foreach ($video->tags as $selected)
                                
                        @if($tag->id==$selected->id) selected @endif @endforeach >{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            
            <button type="submit" class="btn btn-primary">Update Tags</button>

        </form>

    </div>


</body>
</html>