<!DOCTYPE html>
<head>
  <title>Laravel Multiple File Upload Example</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Upload Multiple Images</h4>
                </div>
 
                <div class="panel-body">
                    <h3>Listing Images</h3>
 
                    @forelse($images as $image)
                        <div class="col-md-4">
                            <img src="{{url($image->image)}}" width="300" height="200" class="img-responsive">
                        </div>
                    @empty
                        No image found
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>