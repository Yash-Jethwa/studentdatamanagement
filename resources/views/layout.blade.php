<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    @yield('title')
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @yield('csrftoken')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- W3 TABLE LINK FOR SORTING -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="/fonts/icomoon/style.css">

  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/jquery-ui.css">
  <link rel="stylesheet" href="/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="/css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="/css/aos.css">
  <link href="/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="/css/style.css">

  @yield('stylecss')
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a>
            <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 10 20 123 456</a>
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> info@mydomain.com</a>
          </div>

          @yield('logoutbtn')

          @yield('headerbuttons')

        </div>
      </div>
    </div>
  

  <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">


             <div class="site-logo">
            <a href="{{ route('welcome') }}" class="d-block">
              <img src="/images/logo.png" alt="Image" class="img-fluid">
            </a>
              </div>

          @yield('navbar')

          <div class="ml-auto">
            <div class="social-wrap">
              <a href=""><span class="icon-facebook"></span></a>
              <a href="https://github.com/Yash-Jethwa"><span class="icon-github"></span></a>
              <a href="https://www.linkedin.com/in/yash-jethwa-241592296"><span class="icon-linkedin"></span></a>

              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                  class="icon-menu h3"></span></a>
            </div>
          </div>




        </div>
      </div>

      @if($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" style="text-align:center">
      <strong>
        <h4><i> {{ $message }} </i></h4>
      </strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

      @if($message = Session::get('error'))
      <div class="alert alert-danger alert-dismissible fade show" style="text-align:center">
      <strong>
        <h4><i> {{ $message }} </i></h4>
      </strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

  </header>







    @yield('main')





    
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <p class="mb-4"><img src="/images/logo.png" alt="Image" class="img-fluid"></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>
            <p><a href="#">Learn More</a></p>
          </div>
          <div class="col-lg-3">
            <!-- <h3 class="footer-heading"><span>Our Campus</span></h3>
            <ul class="list-unstyled">
                <li><a href="#">Acedemic</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Our Interns</a></li>
                <li><a href="#">Our Leadership</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Human Resources</a></li>
            </ul> -->
          </div>
          <div class="col-lg-3">
            <h3 class="footer-heading"><span>Our Services</span></h3>
            <ul class="list-unstyled">
              <li><a href="#">Data Management</a></li>
              <li><a href="#"> Store/Save Data In Database </a></li>
              <li><a href="#"> Update Data In Database</a></li>
              <li><a href="#"> Delete Data From Database </a></li>
              <li><a href="#"> Read/View/Fetch Data From Database </a></li>
              <li><a href="#"> Generate &amp; View ICARD </a></li>
              <li><a href="#"> Download ICARD In PDF Format </a></li>
            </ul>
          </div>
          <div class="col-lg-3">
            <h3 class="footer-heading"><span>Contact</span></h3>
            <ul class="list-unstyled">
              <li><a href="#">Help Center</a></li>
              <li><a href="#">Support Community</a></li>
              <li><a href="#">Press</a></li>
              <li><a href="#">Share Your Story</a></li>
              <li><a href="#">Our Supporters</a></li>
            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="copyright">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                This Project Is Built With <i class="icon-heart" aria-hidden="true"></i>
                <!-- <a href="https://colorlib.com" target="_blank" >Colorlib</a> -->
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>

  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#51be78" />
    </svg></div>

  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/jquery.stellar.min.js"></script>
  <script src="/js/jquery.countdown.min.js"></script>
  <script src="/js/bootstrap-datepicker.min.js"></script>
  <script src="/js/jquery.easing.1.3.js"></script>
  <script src="/js/aos.js"></script>
  <script src="/js/jquery.fancybox.min.js"></script>
  <script src="/js/jquery.sticky.js"></script>
  <script src="/js/jquery.mb.YTPlayer.min.js"></script>

  <script src="/js/main.js"></script>

  <script src="https://www.w3schools.com/lib/w3.js"></script>

  <script>
    const clickableImages = document.querySelectorAll('.clickable-image');
    const imageContainer = document.getElementById('imageContainer');
    const fullSizeImage = document.getElementById('fullSizeImage');
    const closeButton = document.getElementById('closeButton');

    clickableImages.forEach(image => {
      image.addEventListener('click', () => {
        fullSizeImage.src = image.getAttribute('data-src');
        imageContainer.style.display = 'flex';
      });
    });

    closeButton.addEventListener('click', () => {
      imageContainer.style.display = 'none';
    });

    imageContainer.addEventListener('click', (event) => {
      if (event.target === imageContainer) {
        imageContainer.style.display = 'none';
      }
    });

  </script>

  @yield('ajaxcode')

</body>

</html>