<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/StyleHome.css')}}">
</head>
@extends('nav')
@section('content')
<div>
    <h1 class="titulo">MaxiBasquet</h1>
  </div>
  <section class="content sau">
<div class="parr">
<h2 class="parrafo"></h2>
        <p>El maxibasquet (nombre con que desde hace más de diez años se denomina a los "veteranos") es la categoría para mas de 30 años en mujeres y mas de 35 en varones, dividido cada cinco años. Esta actividad se practica en muchos países del mundo en forma regular y federada, realizándose desde hace tiempo Campeonatos Regionales (Sudamericano, Panamericano, Europeo, Africano, etc..) y Campeonatos Mundiales. Justamente el año que viene se realiza el 6° Campeonato Mundial de Maxibasquetbol en Ljubljana, Eslovenia del 18 al 26 de Agosto del 2001.</p>
</div>
    </section>

<div id="">

</div>
<div class="caru">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('storage').'/'.'img_Home'.'/'.'img1.jpg'}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('storage').'/'.'img_Home'.'/'.'img2.jpeg'}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('storage').'/'.'img_Home'.'/'.'img3.jpeg'}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>

</div>
</body>
<footer>              
            </div>
            <div class="box-container">

<div class="box">
    <i class="fab fa-angular"></i>
    <h3>Lorem</h3>
    <p>labore molestias consectetur veniam</p>
</div>
<div class="box">
    <i class="fab fa-apple"></i>
    <h3>Lorem</h3>
    <p>labore molestias consectetur veniam</p>
</div>
<div class="box">
    <i class="fab fa-android"></i>
    <h3>Lorem</h3>
    <p>labore molestias consectetur veniam</p>
</div>

</div>
<div class="footers-info mt-3">
                <p>Cras sociis natoque penatibus et magnis Lorem Ipsum tells about the compmany right now the best.</p>
            </div>
            <div class="social-icons"> 
                <a href="https://www.facebook.com/"><i id="social-fb" class="fab fa-facebook-square fa-2x social"></i></a>
                <a href="https://twitter.com/"><i id="social-tw" class="fab fa-twitter-square fa-2x social"></i></a>
              <a href="https://plus.google.com/"><i id="social-gp" class="fab fa-google-plus-square fa-2x social"></i></a>
              <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-2x social"></i></a>
          </div>
        </div>
         <div class="col-xs-12 col-sm-6 col-md-2 footers-two">
            <h5>Essentials </h5>
            <ul class="list-unstyled">
           <li><a href="maintenance.html">Search</a></li>
           <li><a href="contact.html">Sell your Car</a></li>
           <li><a href="about.html">Advertise with us</a></li>
           <li><a href="about.html">Dealers Portal</a></li>
           <li><a href="about.html">Post Requirements</a></li>
          </ul>
        </div>
         <div class="col-xs-12 col-sm-6 col-md-2 footers-three">
            <h5>Information </h5>
            <ul class="list-unstyled">
           <li><a href="maintenance.html">Register Now</a></li>
           <li><a href="contact.html">Advice</a></li>
           <li><a href="about.html">Videos</a></li>
           <li><a href="about.html">Blog</a></li>
           <li><a href="about.html">Services</a></li>
          </ul>
        </div>
         <div class="col-xs-12 col-sm-6 col-md-2 footers-four">
            <h5>Explore </h5>
            <ul class="list-unstyled">
           <li><a href="maintenance.html">News</a></li>
           <li><a href="contact.html">Sitemap</a></li>
           <li><a href="about.html">Testimonials</a></li>
           <li><a href="about.html">Feedbacks</a></li>
           <li><a href="about.html">User Agreement</a></li>
          </ul>
        </div>
         <div class="col-xs-12 col-sm-6 col-md-2 footers-five">
            <h5>Company </h5>
            <ul class="list-unstyled">
           <li><a href="maintenance.html">Career</a></li>
           <li><a href="about.html">For Parters</a></li>
           <li><a href="about.html">Terms</a></li>
           <li><a href="about.html">Policy</a></li>
           <li><a href="contact.html">Contact Us</a></li>
          </ul>
        </div>
        
       </div>
   </div>
</section>
<section class="copyright border">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 pt-3">
                <p class="text-muted">© 2018 xyz Software Pvt. Ltd.</p>
            </div>
        </div>
    </div>
</section>
</footer>
@endsection
  
</html>