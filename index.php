<?php
// index.php
session_start();
include 'inc/connection.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shree Niwasa — Melukote Seva Home</title>
  <!-- SEO Meta Tags Start -->
  <meta name="description"
    content="Shree Niwasa is a thoughtfully maintained 2BHK home for pilgrims in Melukote. Stay, pray, and serve near the temple with modern amenities and local services." />
  <meta name="keywords"
    content="Melukote, Seva Home, Pilgrims, Accommodation, Shree Niwasa, 2BHK, Karnataka, Temple Stay, Vairamudi Utsava, Guest House, Spiritual Retreat, Pilgrimage Accommodation, Home Stay, Temple Pilgrimage, Family Stay, Religious Tourism, Budget Stay, Sacred Stay, Karnataka Homestay, Pilgrim Retreat, Affordable Accommodation in Melukote, Homestay Near Temple, Melukote Guesthouse, Cultural Experience, Religious Lodging" />
  <meta name="author" content="Shree Niwasa" />
  <meta property="og:title" content="Shree Niwasa — Melukote Seva Home" />
  <meta property="og:description"
    content="A humble home for pilgrims in Melukote. Stay, pray, and serve near the temple with modern amenities." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://melukote.com/" />
  <meta property="og:image" content="https://melukote.com/preview.png" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Shree Niwasa — Melukote Seva Home" />
  <meta name="twitter:description"
    content="A humble home for pilgrims in Melukote. Stay, pray, and serve near the temple with modern amenities." />
  <meta name="twitter:image" content="https://melukote.com/preview.png" />
  <!-- SEO Meta Tags End -->

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Shree Niwasa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
        aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#amenities">Amenities</a></li>
          <li class="nav-item"><a class="nav-link" href="#local-services">Local Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#feedback">Reviews</a></li>
          <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>

        <div class="d-flex align-items-center">
          <span class="me-3 text-primary small d-none d-lg-inline"><strong>Check-in only @ Rs 999/- Per
              Day</strong></span>
          <a href="bookings.php" class="btn btn-primary me-2">Book Now</a>
          <a href="https://wa.me/+919008288474" class="btn btn-success d-none d-md-inline"><i
              class="fa fa-whatsapp"></i>
            WhatsApp</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Carousel -->
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/temple.png" class="d-block w-100 carousel-img" alt="Temple">
        <div class="carousel-caption d-none d-md-block text-start">
          <h1>A humble home for pilgrims in Melukote</h1>
          <p>Thoughtfully maintained 2BHK — stay, pray, and serve close to the temple.</p>
          <a href="bookings.php" class="btn btn-lg btn-primary me-2">Book Now</a>
          <a href="https://wa.me/+919008288474" class="btn btn-lg btn-outline-light"><i class="fa fa-whatsapp"></i>
            WhatsApp</a>
        </div>
      </div>
      <!-- Add more carousel items here -->


    </div>
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button> -->
  </div>

  <main class="mt-5">
    <div class="container">
      <!-- About & Quick Facts -->
      <div class="row mb-5 about-quick-facts">
        <div id="about" class="col-lg-6">
          <h2>Our Seva Intent</h2>
          <p>
            We built this home for relatives and pilgrims visiting Melukote for darshan, Vairamudi Utsava, marriages and
            other sacred occasions. Your Rs 999/- per day contribution helps us clean, maintain and keep the place tidy
            for
            all.
          </p>
          <p class="address">
            <i class="fa fa-map-marker" aria-hidden="true" style="color: #3360f3;"></i>
            <a href="https://www.google.com/maps/place/SHREE+NIWASA/@12.659807,76.6484909,765m/data=!3m1!1e3!4m14!1m7!3m6!1s0x3baf915b58ad4465:0xb2f08beb3b1e1556!2sSHREE+NIWASA!8m2!3d12.659807!4d76.6484909!16s%2Fg%2F11x_zfzhj9!3m5!1s0x3baf915b58ad4465:0xb2f08beb3b1e1556!8m2!3d12.659807!4d76.6484909!16s%2Fg%2F11x_zfzhj9?hl=en&entry=ttu&g_ep=EgoyMDI1MDkxNy4wIKXMDSoASAFQAw%3D%3D"
              target="_blank">
              Shree Niwasa, #379, Megalakere, Near Sabhapathi Mantapa, Melukote, Karnataka 571431
            </a>
          </p>
        </div>
        <div class="col-lg-6 quick-facts">
          <h2>Quick Facts</h2>
          <ul>
            <li>Type: 2BHK • Hall • Kitchen</li>
            <li>Check-in: 12:00 PM • Check-out: 10:00 AM</li>
            <li>Max 6 guests (4 adults + 2 children recommended)</li>
            <li>Contribution: Rs 999/- per day</li>
            <li>Contact: +91 90082 88474 (WhatsApp preferred)</li>
          </ul>
        </div>
      </div>

      <!-- Facilities -->
      <section id="amenities" class="mb-5">
        <h2 class="text-center mb-4">Amenities</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="facility-card p-4 text-center h-100 shadow-sm rounded">
              <i class="fa fa-bed fa-2x text-primary mb-3" aria-hidden="true"></i>
              <h5>Comfortable Rooms</h5>
              <p class="small text-muted">Clean bedding and quiet sleeping spaces for restful nights.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="facility-card p-4 text-center h-100 shadow-sm rounded">
              <i class="fa fa-cutlery fa-2x text-primary mb-3" aria-hidden="true"></i>
              <h5>Kitchen Access</h5>
              <p class="small text-muted">Basic cooking facilities available; we also partner with local messes.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="facility-card p-4 text-center h-100 shadow-sm rounded">
              <i class="fa fa-shower fa-2x text-primary mb-3" aria-hidden="true"></i>
              <h5>Hot Water & Clean Bathrooms</h5>
              <p class="small text-muted">Daily cleaning and hot water for guest comfort.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Local Services -->
      <section id="local-services" class="mb-5 local-services">
        <h2 class="text-center mb-3">Local Services</h2>
        <div class="row align-items-center">
          <div class="col-md-4 text-center">
            <img src="img/andndamess.png" alt="Ananda Mess" class="service-image img-fluid rounded">
            <p class="hotel-name mt-2 mb-0">Ananda Mess</p>
            <p class="small text-muted">Popular local veg mess — phone orders accepted.</p>
          </div>
          <div class="col-md-8">
            <p>We are officially partnered with local food delivery services and messes to ensure you have access to
              delicious, affordable meals during your stay. Ask the host for daily menu recommendations.</p>
            <ul class="list-unstyled">
              <li><i class="fa fa-check text-success me-2"></i>Local veg & tiffin options</li>
              <li><i class="fa fa-check text-success me-2"></i>Nearby temple services and guides</li>
              <li><i class="fa fa-check text-success me-2"></i>Transport and auto arrangements on request</li>
            </ul>
          </div>
        </div>
      </section>

      <!-- Reviews -->
      <section id="feedback" class="mb-5">
        <h2 class="text-center mb-4">Guest Reviews</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body text-center">
                <img src="https://picsum.photos/seed/p1/120" alt="User" class="rounded-circle mb-3" width="90"
                  height="90">
                <h5 class="card-title mb-1">Ravi K.</h5>
                <p class="text-warning mb-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                    class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i></p>
                <p class="card-text">Clean place and helpful hosts. Close to the temple which made our trip easy.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body text-center">
                <img src="https://picsum.photos/seed/p2/120" alt="User" class="rounded-circle mb-3" width="90"
                  height="90">
                <h5 class="card-title mb-1">Meera S.</h5>
                <p class="text-warning mb-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                    class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                <p class="card-text">Great hospitality and value for money. Will recommend to visiting relatives.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body text-center">
                <img src="https://picsum.photos/seed/p3/120" alt="User" class="rounded-circle mb-3" width="90"
                  height="90">
                <h5 class="card-title mb-1">Anil P.</h5>
                <p class="text-warning mb-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                    class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i></p>
                <p class="card-text">Good location and friendly staff. A couple of things could be improved but overall
                  pleasant.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Contact -->
      <section id="contact" class="mb-5">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row gx-4">
          <div class="col-md-6">
            <h5>Web Complaints</h5>
            <p>If you have any issues with the website, please contact us.</p>
            <p><i class="fa fa-envelope"></i> <a href="mailto:webcomplaints@melukote.com">webcomplaints@melukote.com</a>
            </p>
          </div>
          <div class="col-md-6">
            <h5>Stay Complaints & General</h5>
            <p>If you have any issues with your stay, please contact us.</p>
            <p><i class="fa fa-phone"></i> +91 90082 88474</p>
            <p><a class="btn btn-success" href="https://wa.me/+919008288474"><i class="fa fa-whatsapp"></i>
                Message on WhatsApp</a></p>
          </div>
        </div>
      </section>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-light pt-4">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5>Shree Niwasa</h5>
          <p class="small">A humble home for pilgrims in Melukote. Support our seva by contributing during your stay.
          </p>
          <p>Visitor Count: <span id="visitor-count"><?php echo $visitorCount; ?></span></p>
        </div>
        <div class="col-md-4 mb-3">
          <h6>Quick Links</h6>
          <ul class="list-unstyled small">
            <li><a href="#amenities" class="text-light">Facilities</a></li>
            <li><a href="#local-services" class="text-light">Local Services</a></li>
            <li><a href="#contact" class="text-light">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-3">
          <h6>Contact</h6>
          <p class="small mb-1"><i class="fa fa-whatsapp fa-lg"></i> +91 90082 88474</p>
          <p class="small mb-1"><a href="mailto:webcomplaints@melukote.com"
              class="text-light">webcomplaints@melukote.com</a></p>
        </div>

      </div>
      <div class="text-center small pb-3">&copy; Shree Niwasa — Melukote <span id="year"></span></div>
    </div>
  </footer>

  <!-- WhatsApp floating button -->
  <a href="https://wa.me/+919008288474" class="whatsapp-float d-inline d-md-none" target="_blank" aria-label="WhatsApp">
    <i class="fa fa-whatsapp"></i>
  </a>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Set current year in footer
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
</body>

</html>