<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style>
            /* Make the image fully responsive */
            .carousel-inner img {
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body> 
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">        
                    <ol class="carousel-indicators">
                        @foreach( $images as $image )
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" 
                            class="{{ $loop->first ? 'active' : '' }}">
                                <img src="{{ $image->thumbnail }}" alt="Images">
                            </li>
                        @endforeach
                    </ol>
                    
                    <div class="carousel-inner" role="listbox">
                        @foreach( $images as $image )
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img class="img-responsive w-100" src="{{ $image->image }}" height="300" alt="Test">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
