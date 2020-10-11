<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Laravel Pagination Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
      @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
      <div class="container">
        <form action="{{url('/searchfiles')}}" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="searchquery"
                    placeholder="Search files"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
    
        <div class="container mt-5">
         <button><a href="{{ url('/uploadfiles') }}">Upload Files</a></button>
         <button><a href="{{ url('/deletedfiles') }}">Deleted History</a></button>
         @if(!empty($files))
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">File name</th>
                        <th scope="col">File size</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                   @foreach($files as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->filename }}</td>
                    <td>{{ $data->filesize }} MB</td>
                    <td>{{ $data->created_at }}</td>
                    <td><a href="{{ url('/deletefile/') }}/{{$data->id}}"><button  class="btn btn-default">
                        <i class="fa fa-trash"></i>
                    </button></a></td>
                </tr>
                @endforeach
                </tbody>
                
            </table>
            @else
                 <p>No data</p>
                @endif
<div class="d-flex justify-content-center">
            {!! $files->links() !!}
        </div>
        </div>
    </body>
</html>