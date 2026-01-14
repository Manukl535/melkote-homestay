<?php
// index.php

include 'inc/connection.php';

// Default visitor count if database connection fails
$visitorCount = isset($visitorCount) ? $visitorCount : 1000;
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title>Homestay in Melukote Near Cheluvanarayana Swamy Temple | Shree Niwasa 2BHK</title>

  <meta name="description"
    content="Affordable 2BHK homestay in Melukote near Cheluvanarayana Swamy Temple. Peaceful, clean family rooms starting at ₹999. Book your pilgrim stay today!" />

  <!-- Performance -->
  <link rel="preload" as="image" href="https://melukote.com/img/homestay-melukote-shree-niwasa.png" />

  <link rel="canonical" href="https://melukote.com/" />
  <meta name="robots" content="index, follow, max-image-preview:large" />
  <meta name="author" content="Shree Niwasa" />

  <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />

  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Shree Niwasa Melukote" />
  <meta property="og:url" content="https://melukote.com/" />
  <meta property="og:title" content="Homestay in Melukote Near Cheluvanarayana Swamy Temple | Shree Niwasa" />
  <meta property="og:description"
    content="Clean and comfortable 2BHK family homestay near Cheluvanarayana Swamy Temple, Melukote." />
  <meta property="og:image" content="https://melukote.com/img/homestay-melukote-shree-niwasa.png" />
  <meta property="og:image:alt" content="Clean and spacious rooms at Shree Niwasa Homestay Melukote" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Shree Niwasa Homestay in Melukote" />
  <meta name="twitter:description" content="Affordable 2BHK homestay near Cheluvanarayana Swamy Temple, Melukote." />
  <meta name="twitter:image" content="https://melukote.com/img/homestay-melukote-shree-niwasa.png" />

  <!-- Structured Data -->
  <script type="application/ld+json">
  [
    {
      "@context": "https://schema.org",
      "@type": ["LodgingBusiness", "Hotel"],
      "@id": "https://melukote.com/#business",
      "name": "Shree Niwasa Homestay",
      "alternateName": "Shree Niwasa Melukote",
      "description": "Clean and comfortable 2BHK family and pilgrim accommodation near Cheluvanarayana Swamy Temple in Melukote, Karnataka.",
      "url": "https://melukote.com/",
      "image": "https://melukote.com/img/homestay-melukote-shree-niwasa.png",
      "telephone": "+919008288474",
      "priceRange": "₹999–₹1500",
      "currenciesAccepted": "INR",
      "paymentAccepted": "Cash, UPI",
      "checkinTime": "12:00:00",
      "checkoutTime": "10:00:00",
      "openingHours": "Mo-Su 00:00-23:59",
      "hasMap": "https://maps.google.com/?q=12.6575,76.6586",
      "sameAs": [
        "https://www.google.com/maps/place/?q=12.6575,76.6586"
      ],
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
        { "@type": "LocationFeatureSpecification", "name": "Free Parking", "value": true },
        { "@type": "LocationFeatureSpecification", "name": "Family Rooms", "value": true }
      ],
      "containsPlace": {
        "@type": "Accommodation",
        "name": "2BHK Family Suite",
        "numberOfRooms": 2,
        "occupancy": {
          "@type": "QuantitativeValue",
          "maxValue": 6
        }
      }
    },
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "https://melukote.com/"
      }]
    }
  ]
  </script>

  <!-- Fonts & CSS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css" />
</head>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title>Homestay in Melukote Near Temple | Shree Niwasa 2BHK</title>

  <meta name="description" content="Affordable 2BHK homestay in Melukote near Cheluvanarayana Swamy Temple. Peaceful, clean family rooms starting at ₹999. Ideal for pilgrims and Vairamudi Utsava." />

  <link rel="preload" as="image" href="https://melukote.com/img/homestay-melukote-hilltop-view.png" />

  <link rel="canonical" href="https://melukote.com/" />
  <meta name="robots" content="index, follow, max-image-preview:large" />
  <meta name="author" content="Shree Niwasa" />

  <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />

  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Shree Niwasa Melukote" />
  <meta property="og:url" content="https://melukote.com/" />
  <meta property="og:title" content="Shree Niwasa Homestay Melukote | 2BHK Family Stay" />
  <meta property="og:description" content="Clean and comfortable 2BHK family homestay near Cheluvanarayana Swamy Temple, Melukote." />
  <meta property="og:image" content="https://melukote.com/img/homestay-melukote-shree-niwasa.png" />
  <meta property="og:image:alt" content="Clean rooms at Shree Niwasa Homestay Melukote" />

  <script type="application/ld+json">
  [
    {
      "@context": "https://schema.org",
      "@type": ["LodgingBusiness", "Hotel"],
      "@id": "https://melukote.com/#business",
      "name": "Shree Niwasa Homestay",
      "alternateName": "Shree Niwasa Melukote",
      "description": "Clean and comfortable 2BHK family and pilgrim accommodation near Cheluvanarayana Swamy Temple in Melukote, Karnataka.",
      "url": "https://melukote.com/",
      "image": "https://melukote.com/img/homestay-melukote-shree-niwasa.png",
      "telephone": "+919008288474",
      "priceRange": "₹999–₹1500",
      "currenciesAccepted": "INR",
      "paymentAccepted": "Cash, UPI",
      "checkinTime": "12:00:00",
      "checkoutTime": "10:00:00",
      "openingHours": "Mo-Su 00:00-23:59",
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
        { "@type": "LocationFeatureSpecification", "name": "Free Parking", "value": true },
        { "@type": "LocationFeatureSpecification", "name": "Family Rooms", "value": true }
      ],
      "containsPlace": {
        "@type": "Accommodation",
        "name": "2BHK Family Suite",
        "numberOfRooms": 2,
        "occupancy": {
          "@type": "QuantitativeValue",
          "maxValue": 6
        }
      }
    },
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "https://melukote.com/"
      }]
    }
  ]
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm d-none d-lg-block">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">Shree Niwasa</a>
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
        <img src="img/homestay-melukote-hilltop-view.png" 
             fetchpriority="high" 
             class="d-block w-100 carousel-img"
             alt="Hilltop view of Cheluvanarayana Swamy Temple near Shree Niwasa Homestay">
        <div class="carousel-caption">
          <h1>Shree Niwasa: 2BHK Homestay in Melukote Near Temple</h1>
          <p>Clean, Peaceful & Affordable Pilgrim Accommodation.</p>
          <a href="bookings.php" class="btn btn-primary btn-pulse fw-bold px-4">Check Availability</a>
        </div>
      </div>
    </div>
  </div>

  <main class="mt-5">
    <div class="container">
      <div class="row mb-5 about-quick-facts">
        <div id="about" class="col-lg-6">
          <h2>About Our Melukote Homestay</h2>
          <p>
            Welcome to Shree Niwasa, the preferred <strong>2BHK pilgrim accommodation in Melukote</strong>. 
            Located just minutes from the <strong>Cheluvanarayana Swamy Temple</strong>, we offer a peaceful 
            spiritual environment for families visiting for darshan or the <strong>Vairamudi Utsava</strong>.
          </p>
          <p>
            Unlike expensive hotels, our <strong>homestay contribution is just ₹999/- per day</strong>, 
            providing a clean "home away from home" for devotees.
          </p>
          <p class="address">
            <i class="fa fa-map-marker text-primary"></i>
            <a href="https://maps.google.com/?q=Shree+Niwasa+Homestay+Melukote" target="_blank" rel="noopener">
              <strong>Location:</strong> #379, Megalakere, Near Sabhapathi Mantapa, Melukote, KA 571431
            </a>
          </p>
        </div>
        <div class="col-lg-6 quick-facts">
          <h3>Stay Details</h3>
          <ul class="list-unstyled">
            <li><i class="fa fa-home text-success me-2"></i><strong>Type:</strong> 2BHK House (Hall, Kitchen, 2 Bedrooms)</li>
            <li><i class="fa fa-users text-success me-2"></i><strong>Capacity:</strong> Max 6 guests (Family Friendly)</li>
            <li><i class="fa fa-clock-o text-success me-2"></i><strong>Check-in:</strong> 12:00 PM | <strong>Check-out:</strong> 10:00 AM</li>
            <li><i class="fa fa-whatsapp text-success me-2"></i><strong>Booking:</strong> <a href="tel:+919008288474">+91 90082 88474</a></li>
          </ul>
        </div>
      </div>

      <section id="amenities" class="mb-5">
        <h2 class="text-center mb-4">Facilities & Amenities</h2>
        <div class="row g-4 text-center">
          <div class="col-md-4">
            <div class="facility-card p-4 shadow-sm border rounded">
              <i class="fa fa-bed fa-2x text-primary mb-3"></i>
              <h5>Clean Rooms</h5>
              <p class="small text-muted">Fresh bedding and sanitized rooms for a restful night.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="facility-card p-4 shadow-sm border rounded">
              <i class="fa fa-cutlery fa-2x text-primary mb-3"></i>
              <h5>Kitchen Access</h5>
              <p class="small text-muted">Equipped kitchen for pilgrims to prepare milk or light meals.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="facility-card p-4 shadow-sm border rounded">
              <i class="fa fa-shower fa-2x text-primary mb-3"></i>
              <h5>Hot Water & Hygiene</h5>
              <p class="small text-muted">Sanitized bathrooms with modern western facilities and hot water.</p>
            </div>
          </div>
        </div>
      </section>

      <section id="local-services" class="mb-5 local-services bg-light p-4 rounded">
        <h2 class="text-center mb-3">Food & Local Travel Guide</h2>
        <div class="row align-items-center">
          <div class="col-md-4 text-center">
            <img src="img/homestay-melukote-andnda-mess.png" 
                 alt="Authentic Iyengar Puliyogare at Ananda Mess Melukote"
                 class="service-image img-fluid rounded shadow">
            <p class="hotel-name mt-2 mb-0 fw-bold">Ananda Mess Partner</p>
          </div>
          <div class="col-md-8">
            <p>We ensure your pilgrimage is hassle-free by connecting you with trusted Melukote services:</p>
            <ul class="list-unstyled">
              <li><i class="fa fa-check text-success me-2"></i><strong>Traditional Food:</strong> Authentic Iyengar Puliyogare & Meals delivery.</li>
              <li><i class="fa fa-check text-success me-2"></i><strong>Darshan Guide:</strong> Assistance for visiting Yoga Narasimha Temple.</li>
              <li><i class="fa fa-check text-success me-2"></i><strong>Local Transport:</strong> Reliable auto-rickshaw contacts for sightseeing.</li>
            </ul>
          </div>
        </div>
      </section>

      <section id="feedback" class="mb-5">
        <h2 class="text-center mb-4">Pilgrim Testimonials</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body text-center">
                <div class="mb-3 text-warning">★★★★★</div>
                <p class="card-text italic">"Cleanest 2BHK in Melukote. The host was very helpful with temple timings."</p>
                <h6 class="fw-bold">- Ravi K.</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body text-center">
                <div class="mb-3 text-warning">★★★★★</div>
                <p class="card-text">"Perfect for families. Having a kitchen was a blessing for our elderly parents."</p>
                <h6 class="fw-bold">- Meera S.</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body text-center">
                <div class="mb-3 text-warning">★★★★★</div>
                <p class="card-text">"Very close to Cheluvanarayana Swamy temple. Highly recommended."</p>
                <h6 class="fw-bold">- Anil P.</h6>
              </div>
            </div>
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

<footer class="bg-dark text-light pt-5 pb-3" section id="contact">
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
    <a href="index.php" class="nav-item active-nav">
      <i class="fa fa-home"></i>
      <span>Home</span>
    </a>
    <a href="index.php#amenities" class="nav-item">
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