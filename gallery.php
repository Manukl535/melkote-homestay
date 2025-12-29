<?php
// gallery.php
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

  <title>Rooms & Interiors Gallery | Shree Niwasa Homestay Near Temple, Melukote</title>

  <meta name="description"
    content="View the photo gallery of Shree Niwasa Homestay in Melukote, Karnataka. Explore our clean 2BHK hall, bedrooms, kitchen, and pilgrim-friendly facilities near Cheluvanarayana Swamy Temple." />

  <meta name="author" content="Shree Niwasa" />
  <link rel="canonical" href="https://melukote.com/gallery.php" />
  <meta name="robots" content="index, follow, max-image-preview:large" />

  <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />

  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://melukote.com/gallery.php" />
  <meta property="og:title" content="Photo Gallery: 2BHK Rooms at Shree Niwasa Homestay, Melukote" />
  <meta property="og:description"
    content="Take a virtual tour of our spacious 2BHK homestay near Cheluvanarayana Swamy Temple in Melukote." />
  <meta property="og:image" content="https://melukote.com/img/homestay-melukote-hall.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/styles.css" />

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ImageGallery",
    "name": "Shree Niwasa Homestay Room Gallery",
    "description": "High-quality images of the 2BHK interiors, bedrooms, hall, kitchen, and exterior of Shree Niwasa Homestay near Cheluvanarayana Swamy Temple in Melukote.",
    "url": "https://melukote.com/gallery.php",
    "contentLocation": {
      "@type": "Place",
      "name": "Cheluvanarayana Swamy Temple, Melukote",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Melukote",
        "addressRegion": "Karnataka",
        "addressCountry": "IN"
      }
    },
    "mainEntity": {
      "@type": "LodgingBusiness",
      "name": "Shree Niwasa Homestay",
      "url": "https://melukote.com/"
    },
    "image": [
      {
        "@type": "ImageObject",
        "url": "https://melukote.com/img/homestay-melukote-shree-niwasa.png",
        "name": "Exterior of Shree Niwasa Homestay Melukote",
        "caption": "Exterior view of Shree Niwasa Homestay near Cheluvanarayana Swamy Temple, Melukote"
      },
      {
        "@type": "ImageObject",
        "url": "https://melukote.com/img/homestay-melukote-hall.png",
        "name": "2BHK Living Hall at Shree Niwasa Homestay",
        "caption": "Spacious living hall inside Shree Niwasa 2BHK homestay in Melukote"
      },
      {
        "@type": "ImageObject",
        "url": "https://melukote.com/img/homestay-melukote-bedroom.png",
        "name": "Bedroom at Shree Niwasa Homestay Melukote",
        "caption": "Clean and comfortable bedroom for pilgrims near Cheluvanarayana Swamy Temple"
      },
      {
        "@type": "ImageObject",
        "url": "https://melukote.com/img/homestay-melukote-kitchen.png",
        "name": "Kitchen Facility at Shree Niwasa Homestay",
        "caption": "Well-maintained kitchen available for family stays at Shree Niwasa Homestay"
      },
      {
        "@type": "ImageObject",
        "url": "https://melukote.com/img/homestay-melukote-washroom.png",
        "name": "Washroom at Shree Niwasa Homestay",
        "caption": "Clean and well-maintained washroom for pilgrims near Cheluvanarayana Swamy Temple"
      },
      {
        "@type": "ImageObject",
        "url": "https://melukote.com/img/homestay-melukote-utility.png",
        "name": "Utility Area at Shree Niwasa Homestay",
        "caption": "Open utility area for relaxation and washing clothes at Shree Niwasa Homestay"
      },
      {
        "@type": "ImageObject",
        "url": "https://melukote.com/img/homestay-melukote-parking-passage.png",
        "name": "Proximity to Cheluvanarayana Swamy Temple",
        "caption": "Parking and safe passage at Shree Niwasa Homestay near Cheluvanarayana Swamy Temple"
      }
    ]
  }
  </script>

  <style>
    /* 🌿 Gallery Specific Styles */
    body {
      background-color: #fcfcfc;
    }

    .page-title {
      text-align: center;
      margin-top: 30px;
      margin-bottom: 10px;
    }

    .page-title h1 {
      font-size: 2.5rem;
      color: var(--primary-color);
    }

    .gallery-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 30px;
      padding: 30px;
      max-width: 1200px;
      margin: 0 auto 60px auto;
    }

    .gallery-card {
      background: #fff;
      border: none;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
      border-radius: 16px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
      display: flex;
      flex-direction: column;
    }

    .gallery-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .gallery-card img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .gallery-card:hover img {
      transform: scale(1.03);
    }

    .gallery-card .card-body {
      padding: 20px;
      text-align: center;
    }

    .gallery-card .card-body p {
      font-family: 'Poppins', sans-serif;
      font-weight: bold;
      color: #555;
      margin: 0;
    }

    .modal-content {
      border-radius: 16px;
      border: none;
      overflow: hidden;
    }

    .modal-header {
      border-bottom: none;
      padding-bottom: 0;
    }

    .modal-footer {
      border-top: none;
    }

    .modal-image img {
      width: 100%;
      height: auto;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    #modal-features-list {
      padding-left: 20px;
      margin-top: 10px;
    }

    #modal-features-list li {
      margin-bottom: 5px;
      color: #555;
    }

    @media (max-width: 768px) {
      .gallery-container {
        padding: 15px;
        gap: 20px;
        grid-template-columns: 1fr;
      }

      .modal-body.d-flex {
        flex-direction: column-reverse;
      }

      .modal-text,
      .modal-image {
        width: 100% !important;
        padding: 10px !important;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm d-none d-lg-block">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">Shree Niwasa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
        aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php#amenities">Facilities</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php#local-services">Food & Travel</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php#feedback">Reviews</a></li>
          <li class="nav-item"><a class="nav-link active" href="gallery.php">Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
        </ul>
        <div class="d-flex align-items-center">
          <span class="me-3 text-primary small d-none d-lg-inline"><strong>Rooms from ₹999/- Per Day</strong></span>
          <a href="bookings.php" class="btn btn-primary me-2"><i class="fa fa-calendar"></i> Book Now</a>
          <a href="https://wa.me/+919008288474?text=Hello!%20I%20am%20interested%20in%20booking%20a%20homestay%20at%20Shree%20Niwasa%20in%20Melukote."
            class="btn btn-success d-none d-md-inline"><i class="fa fa-whatsapp"></i> WhatsApp</a>
        </div>
      </div>
    </div>
  </nav>

  <nav class="navbar navbar-light bg-light sticky-top shadow-sm d-lg-none">
    <div class="container-fluid justify-content-center">
      <a class="navbar-brand fw-bold" href="index.php">Shree Niwasa - Pilgrim Homestay</a>
    </div>
  </nav>

  <div class="container page-title">
    <h1>Our Home</h1>
    <p class="text-muted small">Tap on any image to see details</p>
  </div>

  <div class="gallery-container">

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal"
      data-bs-img="img/homestay-melukote-exterior.png"
      data-bs-description="A welcoming front elevation of Shree Niwasa. Secure and homely."
      data-bs-features="Secure Gated Entry • Private Parking Space • Quiet Neighborhood">
      <img src="img/homestay-melukote-exterior.png" alt="Shree Niwasa Melukote Front View">
      <div class="card-body">
        <p>Front Elevation</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal"
      data-bs-img="img/homestay-melukote-hall.png" data-bs-description="Spacious hall perfect for family gatherings."
      data-bs-features="Seating for 10 people • Sofa & Mats Available • Ideal for Bhajans/Events">
      <img src="img/homestay-melukote-hall.png" alt="Spacious Hall for Pilgrims">
      <div class="card-body">
        <p>Spacious Main Hall</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal"
      data-bs-img="img/homestay-melukote-kitchen.png" data-bs-description="Functional kitchen for basic pilgrim needs."
      data-bs-features="Basic Utensils • Hot Water Kettle • Counter Space">
      <img src="img/homestay-melukote-kitchen.png" alt="Kitchen Facility Melukote">
      <div class="card-body">
        <p>Kitchen Facility</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img="img/bedroom.png"
      data-bs-description="Restful bedrooms designed for pilgrim comfort."
      data-bs-features="Double & Single Beds • Clean Linens • Storage Wardrobes">
      <img src="img/homestay-melukote-bedroom.png" alt="Clean Bedroom in Melukote">
      <div class="card-body">
        <p>Master Bedrooms</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal"
      data-bs-img="img/homestay-melukote-washroom.png" data-bs-description="Hygenic washrooms with 24/7 water supply."
      data-bs-features="Hot Water Geyser • Western Toilet • Daily Cleaning">
      <img src="img/homestay-melukote-washroom.png" alt="Hygienic Washroom">
      <div class="card-body">
        <p>Hygienic Washroom</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal"
      data-bs-img="img/homestay-melukote-utility.png" data-bs-description="Open utility area for relaxation or washing."
      data-bs-features="Seating Area • Fresh Air • Cloth Drying Space">
      <img src="img/homestay-melukote-utility.png" alt="Utility Area">
      <div class="card-body">
        <p>Utility & Sit-out</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal"
      data-bs-img="img/homestay-melukote-parking-passage.png"
      data-bs-description="Safe passage and parking for vehicles."
      data-bs-features="2-Wheeler Parking • Gated Compound • Safe & Secure">
      <img src="img/homestay-melukote-parking-passage.png" alt="Parking Passage">
      <div class="card-body">
        <p>Parking & Passage</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal"
      data-bs-img="img/homestay-melukote-temple.png"
      data-bs-description="Shree Niwasa Homestay located within walking distance of Cheluvanarayana Swamy Temple."
      data-bs-features="Walking Distance to Cheluvanarayana Swamy Temple • Near Vairamudi Utsava Route">
      <img src="img/homestay-melukote-temple.png"
        alt="Homestay near Cheluvanarayana Swamy Temple in Melukote within walking distance">
      <div class="card-body">
        <p>Temple Proximity</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal"
      data-bs-img="img/homestay-melukote-hilltop-view.png"
      data-bs-description="Hilltop surroundings and peaceful view near Shree Niwasa Homestay in Melukote."
      data-bs-features="Scenic Hill View • Calm and Peaceful Surroundings">
      <img src="img/homestay-melukote-hilltop-view.png"
        alt="Hilltop view near Shree Niwasa Homestay in Melukote Karnataka">
      <div class="card-body">
        <p>Hilltop View</p>
      </div>
    </div>

  </div>

  <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex">
          <div class="modal-text w-50 p-4">
            <h4 id="modal-description-title" class="modal-title mb-3" style="font-family: 'Playfair Display', serif;">
              Description</h4>
            <p id="modal-description-text" class="mb-4"></p>
            <h6 class="fw-bold text-primary">Key Features</h6>
            <ul id="modal-features-list"></ul>
          </div>
          <div class="modal-image w-50 p-2">
            <img id="modal-image" src="" alt="Modal Image" class="img-fluid rounded">
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <a href="bookings.php" class="btn btn-primary px-4">Book This Room</a>
        </div>
      </div>
    </div>
  </div>

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
    <a href="index.php" class="nav-item">
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
    <a href="gallery.php" class="nav-item active-nav">
      <i class="fa fa-image"></i>
      <span>Gallery</span>
    </a>
    <a href="tel:+919008288474" class="nav-item">
      <i class="fa fa-phone"></i>
      <span>Call</span>
    </a>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const galleryCards = document.querySelectorAll('.gallery-card');
    galleryCards.forEach(card => {
      card.addEventListener('click', function () {
        const imgSrc = card.getAttribute('data-bs-img');
        const description = card.getAttribute('data-bs-description');
        const features = card.getAttribute('data-bs-features').split('•').map(feature => feature.trim());
        document.getElementById('modal-image').src = imgSrc;
        document.getElementById('modal-description-text').textContent = description;
        const featuresList = document.getElementById('modal-features-list');
        featuresList.innerHTML = '';
        features.forEach(feature => {
          const li = document.createElement('li');
          li.textContent = feature;
          featuresList.appendChild(li);
        });
      });
    });
  </script>
</body>

</html>