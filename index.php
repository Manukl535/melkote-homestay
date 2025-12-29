<?php
// index.php
session_start();
include 'inc/connection.php';

// Default visitor count if database connection fails
$visitorCount = isset($visitorCount) ? $visitorCount : 1000; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title>Homestay in Melukote Near Cheluvanarayana Swamy Temple | Shree Niwasa 2BHK</title>

  <meta name="description" content="Shree Niwasa Homestay in Melukote, Karnataka offers a peaceful and clean 2BHK family stay near Cheluvanarayana Swamy Temple. Ideal for pilgrims and Vairamudi Utsava visitors." />

  <link rel="canonical" href="https://melukote.com/" />
  <meta name="robots" content="index, follow, max-image-preview:large" />
  <meta name="author" content="Shree Niwasa" />

  <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />

  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://melukote.com/" />
  <meta property="og:title" content="Homestay Near Cheluvanarayana Swamy Temple, Melukote | Shree Niwasa" />
  <meta property="og:description" content="Comfortable 2BHK homestay for families and pilgrims near Cheluvanarayana Swamy Temple in Melukote, Karnataka." />
  <meta property="og:image" content="https://melukote.com/img/homestay-melukote-shree-niwasa.png" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Shree Niwasa Homestay in Melukote" />
  <meta name="twitter:description" content="Peaceful 2BHK pilgrim homestay near Cheluvanarayana Swamy Temple, Melukote." />
  <meta name="twitter:image" content="https://melukote.com/img/homestay-melukote-shree-niwasa.png" />

  <!-- Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LodgingBusiness",
    "name": "Shree Niwasa Homestay",
    "alternateName": "Shree Niwasa Melukote",
    "description": "2BHK family and pilgrim accommodation near Cheluvanarayana Swamy Temple in Melukote, Karnataka.",
    "url": "https://melukote.com/",
    "image": "https://melukote.com/img/homestay-melukote-shree-niwasa.png",
    "logo": "https://melukote.com/img/homestay-melukote-hilltop-view.png",
    "telephone": "+91-90082-88474",
    "priceRange": "Rs 999/- per day",
    "checkinTime": "12:00 pm",
    "checkoutTime": "10:00 am",
    "hasMap": "https://maps.google.com/?q=12.6575,76.6586",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "#379, Megalakere, Near Sabhapathi Mantapa",
      "addressLocality": "Melukote",
      "addressRegion": "Karnataka",
      "postalCode": "571431",
      "addressCountry": "IN"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": 12.6575,
      "longitude": 76.6586
    },
    "amenityFeature": [
      { "@type": "LocationFeatureSpecification", "name": "Kitchen", "value": true },
      { "@type": "LocationFeatureSpecification", "name": "Family Rooms", "value": true }
    ]
  }
  </script>

  <!-- Performance -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm d-none d-lg-block">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Shree Niwasa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
        aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
          <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#amenities">Facilities</a></li>
          <li class="nav-item"><a class="nav-link" href="#local-services">Food & Travel</a></li>
          <li class="nav-item"><a class="nav-link" href="#feedback">Reviews</a></li>
          <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>

        <div class="d-flex align-items-center">
          <span class="me-3 text-primary small d-none d-lg-inline"><strong>Rooms from ₹999/- Per Day</strong></span>
          <a href="bookings.php" class="btn btn-primary me-2"><i class="fa fa-calendar"></i> Book Now</a>
          <a href="https://wa.me/+919008288474?text=Hello!%20I%20am%20interested%20in%20booking%20a%20homestay%20at%20Shree%20Niwasa%20in%20Melukote."
              class="btn btn-success d-none d-md-inline"><i
              class="fa fa-whatsapp"></i> WhatsApp</a>
        </div>
      </div>
    </div>
  </nav>
  
  <nav class="navbar navbar-light bg-light sticky-top shadow-sm d-lg-none">
      <div class="container-fluid justify-content-center">
          <a class="navbar-brand fw-bold" href="#">Shree Niwasa - Pilgrim Homestay</a>
      </div>
  </nav>

  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/homestay-melukote-hilltop-view.png" class="d-block w-100 carousel-img" alt="View of Cheluvanarayana Swamy Temple Melukote">
        
        <div class="carousel-caption">
          <h1>Shree Niwasa: Pilgrim Home</h1>
          <p>Stay close to the Temple. Clean & Affordable 2BHK.</p>
          <a href="bookings.php" class="btn btn-primary btn-pulse fw-bold px-4">Check Availability</a>
        </div>
      </div>
    </div>
  </div>

  <main class="mt-5">
    <div class="container">
      <div class="row mb-5 about-quick-facts">
        <div id="about" class="col-lg-6">
          <h2>About Shree Niwasa</h2>
          <p>
            Welcome to Shree Niwasa, a dedicated <strong>pilgrim accommodation in Melukote</strong>. We built this home to serve devotees visiting for darshan, the grand <strong>Vairamudi Utsava</strong>, or quiet spiritual retreats.
          </p>
          <p>
             Unlike expensive hotels, our <strong>homestay contribution is just Rs 999/- per day</strong>, which helps us maintain the cleanliness and sanctity of the space for future pilgrims.
          </p>
          <p class="address">
            <i class="fa fa-map-marker" aria-hidden="true" style="color: #3360f3;"></i>
            <a href="https://www.google.com/maps/search/?api=1&query=Shree+Niwasa+Melukote" target="_blank" rel="noopener noreferrer">
              <strong>Location:</strong> #379, Megalakere, Near Sabhapathi Mantapa, Melukote, Karnataka 571431
            </a>
          </p>
        </div>
        <div class="col-lg-6 quick-facts">
          <h2>Stay Details</h2>
          <ul>
            <li><strong>Property Type:</strong> 2BHK House (Hall, Kitchen, 2 Bedrooms)</li>
            <li><strong>Capacity:</strong> Max 6 guests (Ideal for families)</li>
            <li><strong>Timings:</strong> Check-in: 12:00 PM | Check-out: 10:00 AM</li>
            <li><strong>Price:</strong> Affordable contribution of Rs 999/day</li>
            <li><strong>Booking:</strong> Call/WhatsApp <a href="tel:+919008288474">+91 90082 88474</a></li>
          </ul>
        </div>
      </div>

      <section id="amenities" class="mb-5">
        <h2 class="text-center mb-4">Amenities</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="facility-card p-4 text-center">
              <i class="fa fa-bed"></i>
              <h5>Comfortable Rooms</h5>
              <p class="small text-muted">Clean bedding and quiet sleeping spaces for a restful night.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="facility-card p-4 text-center">
              <i class="fa fa-cutlery"></i>
              <h5>Kitchen Access</h5>
              <p class="small text-muted">Basic facilities for heating milk/water. Guide to nearby Mess available.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="facility-card p-4 text-center">
              <i class="fa fa-shower"></i>
              <h5>Hygiene & Hot Water</h5>
              <p class="small text-muted">Sanitized western bathrooms with hot water facility.</p>
            </div>
          </div>
        </div>
      </section>

      <section id="local-services" class="mb-5 local-services">
        <h2 class="text-center mb-3">Food & Local Services</h2>
        <div class="row align-items-center">
          <div class="col-md-4 text-center">
            <img src="img/homestay-melukote-andnda-mess.png" alt="Ananda Mess Melukote Food" class="service-image img-fluid">
            <p class="hotel-name mt-2 mb-0">Ananda Mess</p>
            <p class="small text-muted">Authentic Melukote Puliyogare, Pongal & Meals.</p>
          </div>
          <div class="col-md-8">
            <p>We want your pilgrimage to be hassle-free. Shree Niwasa partners with trusted local service providers:</p>
            <ul class="list-unstyled">
              <li><i class="fa fa-check text-success me-2"></i><strong>Vegetarian Food:</strong> Authentic Iyengar Puliyogare, Pongal & Meals delivery.</li>
              <li><i class="fa fa-check text-success me-2"></i><strong>Temple Guides:</strong> Assistance for special darshan.</li>
              <li><i class="fa fa-check text-success me-2"></i><strong>Transport:</strong> Auto-rickshaws available on request.</li>
            </ul>
          </div>
        </div>
      </section>

      <section id="feedback" class="mb-5">
        <h2 class="text-center mb-4">What Pilgrims Say</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-body text-center">
                <img src="https://picsum.photos/seed/p1/120" alt="Reviewer" class="rounded-circle mb-3" width="90" height="90">
                <h5 class="card-title mb-1">Ravi K.</h5>
                <p class="text-warning mb-2">★★★★☆</p>
                <p class="card-text">"Clean place and helpful hosts. Close to the temple which made our trip easy."</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-body text-center">
                <img src="https://picsum.photos/seed/p2/120" alt="Reviewer" class="rounded-circle mb-3" width="90" height="90">
                <h5 class="card-title mb-1">Meera S.</h5>
                <p class="text-warning mb-2">★★★★★</p>
                <p class="card-text">"Great hospitality. Highly recommended for families visiting Melukote."</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-body text-center">
                <img src="https://picsum.photos/seed/p3/120" alt="Reviewer" class="rounded-circle mb-3" width="90" height="90">
                <h5 class="card-title mb-1">Anil P.</h5>
                <p class="text-warning mb-2">★★★★☆</p>
                <p class="card-text">"Good location and friendly staff. A pleasant stay near the temple."</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="contact" class="mb-5">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row gx-4">
          <div class="col-md-6">
            <h5>Bookings</h5>
            <p>Planning a visit? Reach out directly.</p>
            <p><i class="fa fa-phone"></i> <strong><a href="tel:+919008288474" class="text-decoration-none text-dark">+91 90082 88474</a></strong></p>
          </div>
          <div class="col-md-6">
             <h5>Support</h5>
             <p>For technical issues:</p>
             <p><i class="fa fa-envelope"></i> <a href="mailto:webcomplaints@melukote.com">webcomplaints@melukote.com</a></p>
          </div>
        </div>
      </section>
    </div>
  </main>
<!-- Whatsapp Button start -->
<a href="https://wa.me/+919008288474?text=Hello!%20I%20am%20interested%20in%20booking%20a%20homestay%20at%20Shree%20Niwasa%20in%20Melukote."
    style="position:fixed;width:60px;height:60px;bottom:90px;right:30px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 2px 2px 3px #999;z-index:1000;"
    target="_blank">
    <i style="margin-top:16px" class="fa fa-whatsapp"></i>
</a>
<!-- Whatsapp Button end -->

<footer class="bg-dark text-light pt-5 pb-3">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold text-white">Shree Niwasa Homestay</h5>
        <p class="small text-secondary">
          The preferred <strong>2BHK homestay in Melukote</strong> for families and pilgrims. Located in the heart of the temple town, providing clean and affordable accommodation near Cheluvanarayana Swamy Temple.
        </p>
        <div class="mt-3">
            <p class="small mb-0">Trusted by <span id="visitor-count" class="text-white fw-bold"><?php echo $visitorCount; ?></span> Visitors</p>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <h6 class="text-white mb-3">Location & Contact</h6>
        <a href="https://www.google.com/maps/search/?api=1&query=Shree+Niwasa+Melukote" 
          target="_blank" rel="noopener noreferrer" class="text-decoration-none">
        <address class="small text-secondary mb-3">
          <i class="fa fa-map-marker me-2 text-primary"></i>
          <strong>Shree Niwasa Melukote</strong><br>
          #379, Megalakere, Near Sabhapathi Mantapa,<br>
          Melukote, Pandavapura Taluk,<br>
          Mandya District, Karnataka – 571431
        </address>
        </a>
        <p class="small mb-2">
            <a href="tel:+919008288474" class="text-secondary text-decoration-none">
                <i class="fa fa-phone me-2 text-success"></i>+91 90082 88474
            </a>
        </p>
        <p class="small">
            <a href="mailto:info@melukote.com" class="text-secondary text-decoration-none">
                <i class="fa fa-envelope me-2 text-info"></i>info@melukote.com
            </a>
        </p>
      </div>

      <div class="col-md-4 mb-4">
        <h6 class="text-white mb-3">Explore Melukote</h6>
        <ul class="list-unstyled small">
          <li class="mb-2"><a href="index.php" class="text-secondary text-decoration-none">Home</a></li>
          <li class="mb-2"><a href="gallery.php" class="text-secondary text-decoration-none">Home Gallery</a></li>
          <li class="mb-2"><a href="bookings.php" class="text-secondary text-decoration-none">Check Availability</a></li>
          <li class="mb-2"><a href="index.php#local-services" class="text-secondary text-decoration-none">Food & Travel Guide</a></li>
        </ul>
      </div>
    </div>

    <hr class="border-secondary my-4">

    <div class="row align-items-center">
      <div class="col-md-6 text-center text-md-start">
        <div class="small text-secondary">
            © <?php echo date("Y"); ?> <strong>Melukote.com</strong> | Shree Niwasa. All Rights Reserved.
        </div>
      </div>
      <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
        <span class="small text-secondary">Best Pilgrim Stay in Melukote, Pandavapura Taluk, Mandya District, Karnataka</span>
      </div>
    </div>
  </div>
</footer>
  
  <nav class="mobile-bottom-nav d-lg-none">
    <a href="#" class="nav-item active-nav">
      <i class="fa fa-home"></i>
      <span>Home</span>
    </a>
    <a href="#amenities" class="nav-item">
      <i class="fa fa-bed"></i>
      <span>Facilities</span>
    </a>
    <a href="bookings.php" class="nav-item">
      <i class="fa fa-calendar-check-o"></i>
      <span>Book</span>
    </a>
    <a href="gallery.php" class="nav-item">
      <i class="fa fa-image"></i>
      <span>Gallery</span>
    </a>
    <a href="tel:+919008288474" class="nav-item">
      <i class="fa fa-phone"></i>
      <span>Call</span>
    </a>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>