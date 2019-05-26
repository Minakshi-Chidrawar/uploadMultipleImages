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
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            Please correct following errors:
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="folderName">Name:</label> 
                                    <input name="folderName" type="text" class="form-control" placeholder="Name"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file-upload" class="btn btn-outline-primary">
                                <i class="glyphicon glyphicon-folder-open"></i> &nbsp;Upload Image/s
                            </label>
                            <input type="file" name="filename[]" id="file-upload" multiple>
                        </div>
                        <!-- <div class="form-group">
                            <input type="file" name="image[]" class="form-control-file" multiple="true">
                        </div> -->
 
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
 
                    <hr>
                    <h3>Listing Images</h3>
 
                    @forelse($photos as $photo)
                        <div class="col-md-4">
                            <img src="{{ $photo->thumbnail }}" class="img-responsive">
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