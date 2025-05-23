@extends('layout')

@section('title', 'HOME PAGE')


@section('logoutbtn')
  <div class="col-lg-3 text-right">
    <a href="{{ route('profile') }}" class="small btn btn-primary px-4 py-2 rounded-1"><span class="icon-user"></span></a>
    <form action="{{ url('/logout') }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="small btn btn-danger px-4 py2"><span class="icon-sign-out"></span></button>
    </form>
  </div>
@endsection


@section('navbar')
  <div class="mr-auto">
    <nav class="site-navigation position-relative text-right" role="navigation">
    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
      <li>
      <a href="{{ route('home')}}" class="nav-link text-left">Home</a>
      </li>
      <li>
      <a href="{{ route('studentform') }}" class="nav-link text-left">Add Student Data</a>
      </li>
      <li>
      <a href="{{ route('readrecords')}}" class="nav-link text-left">Read Students Records</a>
      </li>
      <li>
      <a href="{{ route('dashboard') }}" class="nav-link text-left">Dashboard</a>
      </li>
      <li class="has-children">
      <a class="nav-link text-left">Others</a>
      <ul class="dropdown">
        <li><a href="{{ route('student.kanban') }}">KanBan View</a></li>
        <li><a href="{{ route('marksentryform') }}">Marks Entry</a></li>
        <li><a href="{{ route('customchatbot') }}">Custom ChatBot</a></li>
      </ul>
      </li>
    </ul>
    </nav>
  </div>
@endsection


@section('main')

  <div class="hero-slide owl-carousel site-blocks-cover">
    <div class="intro-section" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
      <div class="row align-items-center">
      <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
        <h1>EduVault</h1>
      </div>
      </div>
    </div>
    </div>

    <div class="intro-section" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
      <div class="row align-items-center">
      <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
        <h1> Student Data Management</h1>
      </div>
      </div>
    </div>
    </div>

    <div class="intro-section" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
      <div class="row align-items-center">
      <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
        <h1> For Educational Institutions</h1>
      </div>
      </div>
    </div>
    </div>

  </div>

  <div class="site-section">
    <div class="container">
    <div class="row mb-5 justify-content-center text-center">
      <div class="col-lg-4 mb-5">
      <h2 class="section-title-underline mb-5">
        <span>Why Academics Works</span>
      </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">

      <div class="feature-1 border">
        <div class="icon-wrapper bg-primary">
        <span class="flaticon-mortarboard text-white"></span>
        </div>
        <div class="feature-1-content">
        <h2>Robust Security</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
        <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p>
        </div>
      </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
      <div class="feature-1 border">
        <div class="icon-wrapper bg-primary">
        <span class="flaticon-school-material text-white"></span>
        </div>
        <div class="feature-1-content">
        <h2>Trusted Services</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
        <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p>
        </div>
      </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
      <div class="feature-1 border">
        <div class="icon-wrapper bg-primary">
        <span class="flaticon-library text-white"></span>
        </div>
        <div class="feature-1-content">
        <h2>Tools For Institutions</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
        <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>


  <div class="site-section">
    <div class="container">



    <div class="row mb-5 justify-content-center text-center">
      <div class="col-lg-6 mb-5">
      <h2 class="section-title-underline mb-3">
        <span>Popular Services</span>
      </h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, id?</p>
      </div>
    </div>

    <!-- <div class="row">
      <div class="col-12">
      <div class="owl-slide-3 owl-carousel">
        <div class="course-1-item">
        <figure class="thumnail">
          <a href="course-single.html"><img src="images/course_1.jpg" alt="Image" class="img-fluid"></a>
          <div class="price">$99.00</div>
          <div class="category">
          <h3>Mobile Application</h3>
          </div>
        </figure>
        <div class="course-1-content pb-4">
          <h2>How To Create Mobile Apps Using Ionic</h2>
          <div class="rating text-center mb-3">
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          </div>
          <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium
          ipsam.</p>
          <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
        </div>
        </div>

        <div class="course-1-item">
        <figure class="thumnail">
          <a href="course-single.html"><img src="images/course_2.jpg" alt="Image" class="img-fluid"></a>
          <div class="price">$99.00</div>
          <div class="category">
          <h3>Web Design</h3>
          </div>
        </figure>
        <div class="course-1-content pb-4">
          <h2>How To Create Mobile Apps Using Ionic</h2>
          <div class="rating text-center mb-3">
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          </div>
          <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium
          ipsam.</p>
          <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
        </div>
        </div>

        <div class="course-1-item">
        <figure class="thumnail">
          <a href="course-single.html"><img src="images/course_3.jpg" alt="Image" class="img-fluid"></a>
          <div class="price">$99.00</div>
          <div class="category">
          <h3>Arithmetic</h3>
          </div>
        </figure>
        <div class="course-1-content pb-4">
          <h2>How To Create Mobile Apps Using Ionic</h2>
          <div class="rating text-center mb-3">
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          </div>
          <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium
          ipsam.</p>
          <p><a href="courses-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
        </div>
        </div>

        <div class="course-1-item">
        <figure class="thumnail">
          <a href="course-single.html"><img src="images/course_4.jpg" alt="Image" class="img-fluid"></a>
          <div class="price">$99.00</div>
          <div class="category">
          <h3>Mobile Application</h3>
          </div>
        </figure>
        <div class="course-1-content pb-4">
          <h2>How To Create Mobile Apps Using Ionic</h2>
          <div class="rating text-center mb-3">
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          </div>
          <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium
          ipsam.</p>
          <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
        </div>
        </div>

        <div class="course-1-item">
        <figure class="thumnail">
          <a href="course-single.html"><img src="images/course_5.jpg" alt="Image" class="img-fluid"></a>
          <div class="price">$99.00</div>
          <div class="category">
          <h3>Web Design</h3>
          </div>
        </figure>
        <div class="course-1-content pb-4">
          <h2>How To Create Mobile Apps Using Ionic</h2>
          <div class="rating text-center mb-3">
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          </div>
          <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium
          ipsam.</p>
          <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
        </div>
        </div>

        <div class="course-1-item">
        <figure class="thumnail">
          <a href="course-single.html"><img src="images/course_6.jpg" alt="Image" class="img-fluid"></a>
          <div class="price">$99.00</div>
          <div class="category">
          <h3>Mobile Application</h3>
          </div>
        </figure>
        <div class="course-1-content pb-4">
          <h2>How To Create Mobile Apps Using Ionic</h2>
          <div class="rating text-center mb-3">
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          <span class="icon-star2 text-warning"></span>
          </div>
          <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium
          ipsam.</p>
          <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
        </div>
        </div>

      </div>

      </div>
    </div> -->


    
    </div>
  </div>


  <div class="section-bg style-1" style="background-image: url('images/about_1.jpg');">
    <div class="container">
    <div class="row">
      <div class="col-lg-4">
      <h2 class="section-title-underline style-2">
        <span>About Our University</span>
      </h2>
      </div>
      <div class="col-lg-8">
      <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem nesciunt quaerat ad reiciendis
        perferendis voluptate fugiat sunt fuga error totam.</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus assumenda omnis tempora ullam alias
        amet eveniet voluptas, incidunt quasi aut officiis porro ad, expedita saepe necessitatibus rem debitis
        architecto dolore? Nam omnis sapiente placeat blanditiis voluptas dignissimos, itaque fugit a laudantium
        adipisci dolorem enim ipsum cum molestias? Quod quae molestias modi fugiat quisquam. Eligendi recusandae
        officiis debitis quas beatae aliquam?</p>
      <p><a href="#">Read more</a></p>
      </div>
    </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
    <div class="row mb-5">
      <div class="col-lg-4">
      <h2 class="section-title-underline">
        <span>Testimonials</span>
      </h2>
      </div>
    </div>


    <div class="owl-slide owl-carousel">

      <div class="ftco-testimonial-1">
      <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
        <img src="images/person_1.jpg" alt="Image" class="img-fluid mr-3">
        <div>
        <h3>Allison Holmes</h3>
        <span>Designer</span>
        </div>
      </div>
      <div>
        <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis
        libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet
        necessitatibus. A, provident aperiam!&rdquo;</p>
      </div>
      </div>

      <div class="ftco-testimonial-1">
      <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
        <img src="images/person_2.jpg" alt="Image" class="img-fluid mr-3">
        <div>
        <h3>Allison Holmes</h3>
        <span>Designer</span>
        </div>
      </div>
      <div>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero
        quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A,
        provident aperiam!</p>
      </div>
      </div>

      <div class="ftco-testimonial-1">
      <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
        <img src="images/person_4.jpg" alt="Image" class="img-fluid mr-3">
        <div>
        <h3>Allison Holmes</h3>
        <span>Designer</span>
        </div>
      </div>
      <div>
        <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis
        libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet
        necessitatibus. A, provident aperiam!&rdquo;</p>
      </div>
      </div>

      <div class="ftco-testimonial-1">
      <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
        <img src="images/person_3.jpg" alt="Image" class="img-fluid mr-3">
        <div>
        <h3>Allison Holmes</h3>
        <span>Designer</span>
        </div>
      </div>
      <div>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero
        quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A,
        provident aperiam!</p>
      </div>
      </div>

      <div class="ftco-testimonial-1">
      <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
        <img src="images/person_2.jpg" alt="Image" class="img-fluid mr-3">
        <div>
        <h3>Allison Holmes</h3>
        <span>Designer</span>
        </div>
      </div>
      <div>
        <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis
        libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet
        necessitatibus. A, provident aperiam!&rdquo;</p>
      </div>
      </div>

      <div class="ftco-testimonial-1">
      <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
        <img src="images/person_4.jpg" alt="Image" class="img-fluid mr-3">
        <div>
        <h3>Allison Holmes</h3>
        <span>Designer</span>
        </div>
      </div>
      <div>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero
        quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A,
        provident aperiam!</p>
      </div>
      </div>

    </div>

    </div>
  </div>


  <div class="section-bg style-1" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
      <span class="icon flaticon-mortarboard"></span>
      <h3>Our Philosphy</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus
        ea? Dolore, amet reprehenderit.</p>
      </div>
      <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
      <span class="icon flaticon-school-material"></span>
      <h3>Academics Principle</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus
        ea?
        Dolore, amet reprehenderit.</p>
      </div>
      <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
      <span class="icon flaticon-library"></span>
      <h3>Key of Success</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus
        ea?
        Dolore, amet reprehenderit.</p>
      </div>
    </div>
    </div>
  </div>

  <!-- <div class="news-updates">
    <div class="container">

    <div class="row">
      <div class="col-lg-9">
      <div class="section-heading">
      <h2 class="text-black">News &amp; Updates</h2>
      <a href="#">Read All News</a>
      </div>
      <div class="row">
      <div class="col-lg-6">
      <div class="post-entry-big">
        <a href="news-single.html" class="img-link"><img src="images/blog_large_1.jpg" alt="Image"
        class="img-fluid"></a>
        <div class="post-content">
        <div class="post-meta">
        <a href="#">June 6, 2019</a>
        <span class="mx-1">/</span>
        <a href="#">Admission</a>, <a href="#">Updates</a>
        </div>
        <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
        </div>
      </div>
      </div>
      <div class="col-lg-6">
      <div class="post-entry-big horizontal d-flex mb-4">
        <a href="news-single.html" class="img-link mr-4"><img src="images/blog_1.jpg" alt="Image"
        class="img-fluid"></a>
        <div class="post-content">
        <div class="post-meta">
        <a href="#">June 6, 2019</a>
        <span class="mx-1">/</span>
        <a href="#">Admission</a>, <a href="#">Updates</a>
        </div>
        <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
        </div>
      </div>

      <div class="post-entry-big horizontal d-flex mb-4">
        <a href="news-single.html" class="img-link mr-4"><img src="images/blog_2.jpg" alt="Image"
        class="img-fluid"></a>
        <div class="post-content">
        <div class="post-meta">
        <a href="#">June 6, 2019</a>
        <span class="mx-1">/</span>
        <a href="#">Admission</a>, <a href="#">Updates</a>
        </div>
        <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
        </div>
      </div>

      <div class="post-entry-big horizontal d-flex mb-4">
        <a href="news-single.html" class="img-link mr-4"><img src="images/blog_1.jpg" alt="Image"
        class="img-fluid"></a>
        <div class="post-content">
        <div class="post-meta">
        <a href="#">June 6, 2019</a>
        <span class="mx-1">/</span>
        <a href="#">Admission</a>, <a href="#">Updates</a>
        </div>
        <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
        </div>
      </div>
      </div>
      </div>
      </div>
      <div class="col-lg-3">
      <div class="section-heading">
      <h2 class="text-black">Campus Videos</h2>
      <a href="#">View All Videos</a>
      </div>
      <a href="https://vimeo.com/45830194" class="video-1 mb-4" data-fancybox="" data-ratio="2">
      <span class="play">
      <span class="icon-play"></span>
      </span>
      <img src="images/course_5.jpg" alt="Image" class="img-fluid">
      </a>
      <a href="https://vimeo.com/45830194" class="video-1 mb-4" data-fancybox="" data-ratio="2">
      <span class="play">
      <span class="icon-play"></span>
      </span>
      <img src="images/course_5.jpg" alt="Image" class="img-fluid">
      </a>
      </div>
    </div>
    </div>
    </div> -->

  <div class="site-section ftco-subscribe-1" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7">
      <h2>Subscribe to us!</h2>
      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,</p>
      </div>
    </div>
    </div>
  </div>

@endsection

<!-- <a href="{{ url('/studentform') }}" class="btn btn-outline-success btn-lg " role="button">Create Student Record</a> -->

<!-- <a href="{{ url('/readrecords') }}" class="btn btn-outline-info btn-lg " role="button">Read Student Record</a> -->

<!-- <a href="{{ url('/logout') }}" class="btn btn-outline-info btn-lg " role="button"> LOGOUT </a> -->