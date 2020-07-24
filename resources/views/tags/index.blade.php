<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Application - Tag List</title>
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
    
    <div class="container" style="padding-top: 10px;">
        
        <div class="row">
            <div class="col-md-12">
                <a href="{{ asset('/posts')}}" class="btn btn-secondary pull-right mx-2"><i class="fa fa-pencil" aria-hidden="true"></i> Show All Posts</a>
                <a href="{{ asset('/videos')}}" class="btn btn-primary pull-right"><i class="fa fa-video-camera" aria-hidden="true"></i> Show All Videos</a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Tag List</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ asset('/tags/create')}}" class="btn btn-success pull-right"><i class="fa fa-tag" aria-hidden="true"></i> Add New Tag</a>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Tag Name</th>
                        <th>Description</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                        <th colspan="3" style="text-align: center">Action</th>
                    </tr>
                     
                    @forelse ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->description }}</td>
                            <td>{{ $tag->created_at->format('d-m-Y') }}</td>
                            <td>{{ $tag->updated_at->diffForHumans() }}</td>
                            
                            <td><a href="{{url('/tags/'.$tag->name)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Show</a></td>
                            {{--  <td><a href="/users/{{$user->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a></td>  --}}
                            <td><a href="{{url('/tags/'.$tag->id.'/edit')}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a></td>
                            <td>
                                <form action="/tags/{{$tag->id}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> 
                            </td>        
                                </form>        
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Record not found.</td>
                        </tr
                    @endforelse
                                       
                </table>
            </div>
        </div>
        
    </div>

</body>
</html>