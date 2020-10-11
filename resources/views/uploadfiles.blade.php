<Html>  
<Head>  
<title> File Upload </title>  
</Head>  
<Body>  
	@if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
<form method="Post" action="{{url('/uploadfiles')}}" enctype="multipart/form-data">  
@csrf  
<div><input type="file" name="image"> </div><br/>  
<div><button type="submit">Upload </button><button type="submit"><a href="{{url('/viewuploadfiles')}}">View Files </a></button></div>
  
</form>  
</body> 