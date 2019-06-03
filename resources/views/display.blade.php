<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
    <body> 
        <div class="container py-2">
            <div class="row">
                <div class="col-lg-8 offset-lg-2" id="slider">
                    <div id="myCarousel" class="carousel slide">        
                        <ol class="carousel-indicators">
                            @foreach( $images as $image )
                                <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}" 
                                    class="{{ $loop->first ? 'active' : '' }}">
                                </li>
                            @endforeach
                        </ol>
                        
                        <div class="carousel-inner">
                            @foreach( $images as $image )
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img class="img-responsive w-100" src="{{ $image->image }}" alt="Test">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
