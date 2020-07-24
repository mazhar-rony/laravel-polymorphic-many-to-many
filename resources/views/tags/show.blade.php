<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Application - Tag Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">CRUD APPLICATION</a>
            {{--  <a href="{{ asset('/countries')}}" class="btn btn-primary"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Show Countries</a>  --}}
        </div>
    </div>
    
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <h1>Tag Details</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ asset('/tags')}}" class="btn btn-success offset-md-8 mt-2"><i class="fa fa-tag" aria-hidden="true"></i> Show All Tags</a>
            </div>
        </div>
        <hr>
         
        <dl>
            <dt>{{ $tag->name }}</dt>
            <dd>{{ $tag->description }}</dd>
        </dl>
 
         {{-- video List --}}
 
         <hr>
 
         <h1>Video List</h1>
 
         <table class="table table-bordered table-striped">
                 <thead style="background:powderblue">
                     <tr>
                         <th>@Id</th>
                         <th>Video URL</th>
                         <th>Video Path</th> 
                         <th>Created_at</th>                  
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($tag->videos as $video)
                         <tr>
                             <td>{{ $video->id }}</td>
                             <td>{{ $video->url }}</td>
                             <td>{{ $video->file_path }}</td>  
                             <td>{{ $video->created_at->tz('6.00') }}</td>  
                             {{-- show BD Time --}}
                         </tr>
                     @endforeach
                 </tbody>
             </table>
 
             <hr>
 
         <h1>Post List</h1>
 
         <table class="table table-bordered table-striped">
                 <thead style="background:powderblue">
                     <tr>
                         <th>@Id</th>
                         <th>Post Title</th> 
                         <th>Post Body</th>
                         <th>Created_at</th>     
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($tag->posts as $post)
                         <tr>
                             <td>{{ $post->id }}</td>
                             <td>{{ $post->title }}</td>
                             <td>{{ $post->body }}</td>
                             <td>{{ $post->created_at->tz('6.00') }}</td>   
                             {{-- Time Zone added: show BD Time --}}
                         </tr>
                     @endforeach
                 </tbody>
             </table>
 
     </div>

</body>
</html>