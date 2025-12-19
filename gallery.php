<?php
// gallery.php
session_start();
include 'inc/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <link rel="icon" href="img/preview.png" type="image/png" />
  <title>Photo Gallery | Shree Niwasa Melukote Rooms & Amenities</title>

  <meta name="description" content="View photos of Shree Niwasa Melukote. spacious 2BHK hall, clean bedrooms, kitchen, and restrooms. See why pilgrims love our homestay near the temple." />
  <meta name="keywords" content="Melukote Room Photos, Shree Niwasa Gallery, Homestay Interior Melukote, 2BHK House Images, Pilgrim Stay Photos, Melukote Accommodation Pictures" />
  <meta name="author" content="Shree Niwasa" />
  <link rel="canonical" href="https://melukote.com/gallery.php" />

  <meta property="og:title" content="Photo Gallery — Shree Niwasa Melukote" />
  <meta property="og:description" content="Take a tour of our clean, spacious 2BHK home for pilgrims. See bedrooms, hall, and kitchen." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://melukote.com/gallery.php" />
  <meta property="og:image" content="https://melukote.com/img/hall.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/styles.css" />

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ImageGallery",
      "name": "Shree Niwasa Interiors",
      "description": "Photos of the 2BHK pilgrim accommodation including hall, kitchen, and bedrooms.",
      "image": [
        "https://melukote.com/img/front.png",
        "https://melukote.com/img/hall.png",
        "https://melukote.com/img/bedroom.png",
        "https://melukote.com/img/kitchen.png"
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
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); /* Responsive Grid */
      gap: 30px;
      padding: 30px;
      max-width: 1200px;
      margin: 0 auto 60px auto;
    }

    /* Card styling matching the new Elegant theme */
    .gallery-card {
      background: #fff;
      border: none;
      box-shadow: 0 10px 20px rgba(0,0,0,0.05);
      border-radius: 16px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
      display: flex;
      flex-direction: column;
    }

    .gallery-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    /* Image Aspect Ratio */
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
      font-weight: 500;
      color: #555;
      margin: 0;
    }

    /* Modal Styles */
    .modal-content {
      border-radius: 16px;
      border: none;
      overflow: hidden;
    }
    
    .modal-header { border-bottom: none; padding-bottom: 0; }
    .modal-footer { border-top: none; }

    .modal-image img {
      width: 100%;
      height: auto;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    
    #modal-features-list {
        padding-left: 20px;
        margin-top: 10px;
    }
    #modal-features-list li {
        margin-bottom: 5px;
        color: #555;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .gallery-container {
        padding: 15px;
        gap: 20px;
        grid-template-columns: 1fr; /* Single column on mobile */
      }
      
      .modal-body.d-flex {
          flex-direction: column-reverse; /* Text below image on mobile */
      }
      
      .modal-text, .modal-image {
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
          <a href="bookings.php" class="btn btn-primary me-2">Book Now</a>
          <a href="https://wa.me/+919008288474" class="btn btn-success d-none d-md-inline"><i class="fa fa-whatsapp"></i> WhatsApp</a>
        </div>
      </div>
    </div>
  </nav>

  <nav class="navbar navbar-light bg-light sticky-top shadow-sm d-lg-none">
      <div class="container-fluid justify-content-center">
          <a class="navbar-brand fw-bold" href="index.php">Shree Niwasa</a>
      </div>
  </nav>

  <div class="container page-title">
      <h1>Our Home</h1>
      <p class="text-muted small">Tap on any image to see details</p>
  </div>

  <div class="gallery-container">
    
    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" 
         data-bs-img="img/front.png"
         data-bs-description="A welcoming front elevation of Shree Niwasa. Secure and homely."
         data-bs-features="Secure Gated Entry • Private Parking Space • Quiet Neighborhood">
      <img src="img/front.png" alt="Shree Niwasa Melukote Front View">
      <div class="card-body">
        <p>Front Elevation</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" 
         data-bs-img="img/hall.png"
         data-bs-description="Spacious hall perfect for family gatherings."
         data-bs-features="Seating for 10 people • Sofa & Mats Available • Ideal for Bhajans/Events">
      <img src="img/hall.png" alt="Spacious Hall for Pilgrims">
      <div class="card-body">
        <p>Spacious Main Hall</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" 
         data-bs-img="img/kitchen.png"
         data-bs-description="Functional kitchen for basic pilgrim needs."
         data-bs-features="Basic Utensils • Hot Water Kettle • Counter Space">
      <img src="img/kitchen.png" alt="Kitchen Facility Melukote">
      <div class="card-body">
        <p>Kitchen Facility</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" 
         data-bs-img="img/bedroom.png"
         data-bs-description="Restful bedrooms designed for pilgrim comfort."
         data-bs-features="Double & Single Beds • Clean Linens • Storage Wardrobes">
      <img src="img/bedroom-closet.png" alt="Clean Bedroom in Melukote">
      <div class="card-body">
        <p>Master Bedrooms</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" 
         data-bs-img="img/washroom.png"
         data-bs-description="Hygenic washrooms with 24/7 water supply."
         data-bs-features="Hot Water Geyser • Western Toilet • Daily Cleaning">
      <img src="img/washroom.png" alt="Hygienic Washroom">
      <div class="card-body">
        <p>Hygienic Washroom</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" 
         data-bs-img="img/utility.png"
         data-bs-description="Open utility area for relaxation or washing."
         data-bs-features="Seating Area • Fresh Air • Cloth Drying Space">
      <img src="img/utility.png" alt="Utility Area">
      <div class="card-body">
        <p>Utility & Sit-out</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" 
         data-bs-img="img/passage.png"
         data-bs-description="Safe passage and parking for vehicles."
         data-bs-features="2-Wheeler Parking • Gated Compound • Safe & Secure">
      <img src="img/passage.png" alt="Parking Passage">
      <div class="card-body">
        <p>Parking & Passage</p>
      </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" 
         data-bs-img="img/temple-.png"
         data-bs-description="Located just minutes from the main temple."
         data-bs-features="Walking Distance to Temple • Near Vairamudi Utsav Route">
      <img src="img/temple-.png" alt="Near Melukote Temple">
      <div class="card-body">
        <p>Temple Proximity</p>
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
            <h4 id="modal-description-title" class="modal-title mb-3" style="font-family: 'Playfair Display', serif;">Description</h4>
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