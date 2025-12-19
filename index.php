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
  
  <link rel="icon" href="img/preview.png" type="image/png" />
  
  <title>Shree Niwasa | Best Pilgrim Stay in Melukote Near Temple | Rooms @ ₹999</title>
  
  <meta name="description" content="Looking for a clean homestay in Melukote? Shree Niwasa offers 2BHK pilgrim accommodation near Cheluvanarayana Swamy Temple. Sleeps 6. Book now at ₹999/day! Call +91-90082-88474." />
  
  <link rel="canonical" href="https://melukote.com/" />
  <meta name="robots" content="index, follow" />

  <meta name="keywords" content="Melukote Room Booking, Melukote Accommodation, Shree Niwasa, Homestay in Melukote, Temple Stay, Cheluvanarayana Swamy Temple Rooms, Vairamudi Utsava Stay, Yatri Nivas Melukote, Dharamshala near Melkote, 2BHK for rent Melukote" />
  <meta name="author" content="Shree Niwasa" />

  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://melukote.com/" />
  <meta property="og:title" content="Shree Niwasa — Affordable Pilgrim Home in Melukote" />
  <meta property="og:description" content="Stay just minutes away from the temple. Full 2BHK home for families. Clean, safe, and spiritual environment. Only ₹999/day." />
  <meta property="og:image" content="https://melukote.com/img/preview.png" />

  <meta property="twitter:card" content="summary_large_image" />
  <meta property="twitter:url" content="https://melukote.com/" />
  <meta property="twitter:title" content="Shree Niwasa — Pilgrim Accommodation in Melukote" />
  <meta property="twitter:description" content="A humble home for pilgrims in Melukote. Stay, pray, and serve near the temple with modern amenities." />
  <meta property="twitter:image" content="https://melukote.com/img/preview.png" />

  <script type="application/ld+json">
    [
      {
        "@context": "https://schema.org",
        "@type": "BedAndBreakfast",
        "name": "Shree Niwasa Pilgrim Stay",
        "description": "Comfortable 2BHK family accommodation for pilgrims near Cheluvanarayana Swamy Temple in Melukote.",
        "url": "https://melukote.com/",
        "logo": "https://melukote.com/img/preview.png",
        "image": "https://melukote.com/img/temple.png",
        "telephone": "+91-90082-88474",
        "priceRange": "₹999 - ₹1500", 
        "checkinTime": "12:00",
        "checkoutTime": "10:00",
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
          { "@type": "LocationFeatureSpecification", "name": "2BHK Full House", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Hot Water", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Walking Distance to Temple", "value": true },
          { "@type": "LocationFeatureSpecification", "name": "Kitchen Access", "value": true }
        ],
        "review": [
          {
            "@type": "Review",
            "author": { "@type": "Person", "name": "Ravi K." },
            "reviewRating": { "@type": "Rating", "ratingValue": "4.5" },
            "reviewBody": "Clean place and helpful hosts. Close to the temple which made our trip easy."
          }
        ],
        "sameAs": [
          "https://www.facebook.com/ShreeNiwasa",
          "https://www.instagram.com/ShreeNiwasa"
        ]
      },
      {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [{
          "@type": "Question",
          "name": "What is the price per day at Shree Niwasa Melukote?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The contribution for staying at Shree Niwasa is affordable at just ₹999 per day for the entire 2BHK home."
          }
        }, {
          "@type": "Question",
          "name": "Is the homestay near Cheluvanarayana Swamy Temple?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes, Shree Niwasa is located near Sabhapathi Mantapa, which is a short distance from the main temple."
          }
        }, {
          "@type": "Question",
          "name": "How many people can stay?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The 2BHK house comfortably accommodates up to 6 guests (4 adults and 2 children recommended)."
          }
        }]
      }
    ]
  </script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
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
          <li class="nav-item"><a class="nav-link" href="#amenities">Facilities</a></li>
          <li class="nav-item"><a class="nav-link" href="#local-services">Food & Travel</a></li>
          <li class="nav-item"><a class="nav-link" href="#feedback">Reviews</a></li>
          <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>

        <div class="d-flex align-items-center">
          <span class="me-3 text-primary small d-none d-lg-inline"><strong>Rooms from ₹999/- Per Day</strong></span>
          <a href="bookings.php" class="btn btn-primary me-2">Book Now</a>
          <a href="https://wa.me/+919008288474" class="btn btn-success d-none d-md-inline"><i
              class="fa fa-whatsapp"></i> WhatsApp</a>
        </div>
      </div>
    </div>
  </nav>

  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/temple.png" class="d-block w-100 carousel-img" alt="View of Cheluvanarayana Swamy Temple Melukote">
        <div class="carousel-caption d-none d-md-block text-start">
          <h1>Shree Niwasa: Pilgrim Home in Melukote</h1>
          <p>Stay close to Cheluvanarayana Swamy Temple. A clean, affordable 2BHK for your family pilgrimage.</p>
          <a href="bookings.php" class="btn btn-lg btn-primary me-2">Check Availability</a>
          <a href="https://wa.me/+919008288474" class="btn btn-lg btn-outline-light"><i class="fa fa-whatsapp"></i>
            WhatsApp</a>
        </div>
      </div>
    </div>
  </div>

  <main class="mt-5">
    <div class="container">
      <div class="row mb-5 about-quick-facts">
        <div id="about" class="col-lg-6">
          <h2>About Shree Niwasa Homestay</h2>
          <p>
            Welcome to Shree Niwasa, a dedicated <strong>pilgrim accommodation in Melukote</strong>. We built this home to serve devotees visiting for darshan, the grand <strong>Vairamudi Utsava</strong>, or quiet spiritual retreats.
          </p>
          <p>
             Unlike expensive hotels, our <strong>homestay contribution is just Rs 999/- per day</strong>, which helps us maintain the cleanliness and sanctity of the space for future pilgrims.
          </p>
          <p class="address">
            <i class="fa fa-map-marker" aria-hidden="true" style="color: #3360f3;"></i>
            <a href="https://www.google.com/maps/search/?api=1&query=Shree+Niwasa+Melukote+Megalakere" target="_blank" rel="noopener noreferrer">
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
        <h2 class="text-center mb-4">Amenities at our Melukote Stay</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="facility-card p-4 text-center h-100 shadow-sm rounded">
              <i class="fa fa-bed fa-2x text-primary mb-3" aria-hidden="true"></i>
              <h5>Comfortable Rooms</h5>
              <p class="small text-muted">Clean bedding and quiet sleeping spaces for a restful night before your temple visit.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="facility-card p-4 text-center h-100 shadow-sm rounded">
              <i class="fa fa-cutlery fa-2x text-primary mb-3" aria-hidden="true"></i>
              <h5>Kitchen Access</h5>
              <p class="small text-muted">Basic facilities for heating milk/water. We also guide you to the best <strong>Ananda Mess</strong> nearby.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="facility-card p-4 text-center h-100 shadow-sm rounded">
              <i class="fa fa-shower fa-2x text-primary mb-3" aria-hidden="true"></i>
              <h5>Hygiene & Hot Water</h5>
              <p class="small text-muted">Sanitized western bathrooms with hot water facility available for all guests.</p>
            </div>
          </div>
        </div>
      </section>

      <section id="local-services" class="mb-5 local-services">
        <h2 class="text-center mb-3">Food & Local Services</h2>
        <div class="row align-items-center">
          <div class="col-md-4 text-center">
            <img src="img/andndamess.png" alt="Ananda Mess Melukote Food" class="service-image img-fluid rounded">
            <p class="hotel-name mt-2 mb-0">Ananda Mess</p>
            <p class="small text-muted">Authentic Melukote Puliyogare, Sweet Pongal & Meals.</p>
          </div>
          <div class="col-md-8">
            <p>We want your pilgrimage to be hassle-free. Shree Niwasa partners with trusted local service providers:</p>
            <ul class="list-unstyled">
              <li><i class="fa fa-check text-success me-2"></i><strong>Vegetarian Food:</strong> Authentic Iyengar Puliyogare and Sweet Pongal delivery.</li>
              <li><i class="fa fa-check text-success me-2"></i><strong>Temple Guides:</strong> Assistance for special darshan and sevas.</li>
              <li><i class="fa fa-check text-success me-2"></i><strong>Transport:</strong> Auto-rickshaws available for Yoga Narasimha Swamy hill temple.</li>
            </ul>
          </div>
        </div>
      </section>

      <section id="feedback" class="mb-5">
        <h2 class="text-center mb-4">What Pilgrims Say</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body text-center">
                <img src="https://picsum.photos/seed/p1/120" alt="Reviewer Ravi" class="rounded-circle mb-3" width="90" height="90">
                <h5 class="card-title mb-1">Ravi K.</h5>
                <p class="text-warning mb-2">★★★★☆</p>
                <p class="card-text">"Clean place and helpful hosts. Close to the temple which made our trip easy."</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body text-center">
                <img src="https://picsum.photos/seed/p2/120" alt="Reviewer Meera" class="rounded-circle mb-3" width="90" height="90">
                <h5 class="card-title mb-1">Meera S.</h5>
                <p class="text-warning mb-2">★★★★★</p>
                <p class="card-text">"Great hospitality and value for money. Highly recommended for families visiting Melukote."</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body text-center">
                <img src="https://picsum.photos/seed/p3/120" alt="Reviewer Anil" class="rounded-circle mb-3" width="90" height="90">
                <h5 class="card-title mb-1">Anil P.</h5>
                <p class="text-warning mb-2">★★★★☆</p>
                <p class="card-text">"Good location and friendly staff. A pleasant stay near the temple."</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="contact" class="mb-5">
        <h2 class="text-center mb-4">Contact Shree Niwasa</h2>
        <div class="row gx-4">
          <div class="col-md-6">
            <h5>For Bookings & Enquiries</h5>
            <p>Planning a visit to Melukote? Reach out to us directly.</p>
            <p><i class="fa fa-phone"></i> <strong><a href="tel:+919008288474" class="text-decoration-none text-dark">+91 90082 88474</a></strong></p>
            <p><a class="btn btn-success" href="https://wa.me/+919008288474"><i class="fa fa-whatsapp"></i> Chat on WhatsApp</a></p>
          </div>
          <div class="col-md-6">
             <h5>Website Support</h5>
             <p>For any technical issues with the website:</p>
             <p><i class="fa fa-envelope"></i> <a href="mailto:webcomplaints@melukote.com">webcomplaints@melukote.com</a></p>
          </div>
        </div>
      </section>
    </div>
  </main>

  <footer class="bg-dark text-light pt-4">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5>Shree Niwasa Melukote</h5>
          <p class="small">Affordable pilgrim accommodation and guest house services. We support the seva of pilgrims visiting Cheluvanarayana Swamy.</p>
          <p>Visitor Count: <span id="visitor-count"><?php echo $visitorCount; ?></span></p>
        </div>
        <div class="col-md-4 mb-3">
          <h6>Quick Links</h6>
          <ul class="list-unstyled small">
            <li><a href="#amenities" class="text-light">Rooms & Amenities</a></li>
            <li><a href="#local-services" class="text-light">Ananda Mess & Food</a></li>
            <li><a href="bookings.php" class="text-light">Book Your Stay</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-3">
          <h6>Address</h6>
          <p class="small mb-1">
            Shree Niwasa #379, Megalakere,<br>
            Near Sabhapathi Mantapa,<br>
            Melukote, Pandavapura Taluk,<br>
            Mandya District, Karnataka – 571431
          </p>
          <p class="small mb-1"><i class="fa fa-phone"></i> +91 90082 88474</p>
        </div>
      </div>
      <div class="text-center small pb-3">© <?php echo date("Y"); ?> Shree Niwasa — Melukote Pilgrim Stay</div>
    </div>
  </footer>

  <a href="https://wa.me/+919008288474" class="whatsapp-float d-inline d-md-none" target="_blank" aria-label="Chat on WhatsApp">
    <i class="fa fa-whatsapp"></i>
  </a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    if(document.getElementById('year')) {
        document.getElementById('year').textContent = new Date().getFullYear();
    }
  </script>
</body>
</html>