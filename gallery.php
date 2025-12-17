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
        content="Melukote, Seva Home, Pilgrims, Accommodation, Shree Niwasa, 2BHK, Karnataka, Temple Stay, Vairamudi Utsava, Guest House" />
    <meta name="author" content="Shree Niwasa" />
    <meta property="og:title" content="Shree Niwasa — Melukote Seva Home" />
    <meta property="og:description"
        content="A humble home for pilgrims in Melukote. Stay, pray, and serve near the temple with modern amenities." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://melukote.com/" />
    <meta property="og:image" content="https://melukote.com/img/preview.jpg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Shree Niwasa — Melukote Seva Home" />
    <meta name="twitter:description"
        content="A humble home for pilgrims in Melukote. Stay, pray, and serve near the temple with modern amenities." />
    <meta name="twitter:image" content="https://melukote.com/img/preview.jpg" />
    <!-- SEO Meta Tags End -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css" />

    <style>
        /* 🌿 Gallery Section */
        .gallery-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            padding: 30px;
            background: linear-gradient(to bottom right, #f4f4f4, #ffffff);
            max-width: 1200px;
            margin: 50px auto;
        }

        /* Card styling */
        .gallery-card {
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .gallery-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        /* Aspect ratio for img inside the cards */
        .gallery-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            aspect-ratio: 16/9;
            /* Maintains a 16:9 aspect ratio for all img */
        }

        .gallery-card .card-body {
            padding: 20px;
        }

        .gallery-card .card-body p {
            font-size: 1.1rem;
            color: #333;
            line-height: 1.5;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 12px;
            border: none;
        }

        .modal-body {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-text {
            padding-right: 20px;
        }

        .modal-image img {
            max-width: 100%;
            border-radius: 10px;
        }

        /* Responsive design */
        @media (max-width: 992px) {
            .gallery-container {
                grid-template-columns: 1fr;
            }

            .gallery-card img {
                height: 250px;
                /* Adjust image height on smaller screens */
            }
        }
    </style>
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
                    <li class="nav-item"><a class="nav-link" href="./">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./#amenities">Amenities</a></li>
                    <li class="nav-item"><a class="nav-link" href="./#local-services">Local Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="./#feedback">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="./gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="./#contact">Contact</a></li>
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

<!-- Gallery Section -->
<div class="gallery-container">
<div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img="img/front.png"
    data-bs-description="The home secured by gate."
    data-bs-features="Secure Gated Entry, Modern Architecture, Spacious yard, Private Driveway">
    <img src="img/front.png" alt="Front Elevation">
    <div class="card-body">
        <p>Front Elevation of home</p>
    </div>
</div>
    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img="img/hall.png"
        data-bs-description="Spacious hall with a seating capacity of 10 people. Ideal for family gatherings and events."
        data-bs-features="Seating capacity of 10 people
• Comfortable seating arrangements
• Ideal for family gatherings and small events">
        <img src="img/hall.png" alt="Hall">
        <div class="card-body">
            <p>Spacious hall with a seating capacity of 10 people.</p>
        </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img="img/kitchen.png"
        data-bs-description="Spacious ready kitchen for use"
        data-bs-features="Equipped with essential kitchenware
• Spacious counter space for cooking
• Instant tea/coffe & hot water 1ltr ketal
• Nearby local markets for groceries">
        <img src="img/kitchen.png" alt="Kitchen">
        <div class="card-body">
            <p>Equipped with necessary utensils and appliances.</p>
        </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img="img/bedroom.png"
        data-bs-description="Comfortable and spacious bedroom featuring a double bed and a single bed. Perfect for families."
        data-bs-features="Foldable single & double beds • Closet with ample storage space">
        <img src="img/bedroom-closet.png" alt="Bedroom">
        <div class="card-body">
            <p>2 spacious bedrooms with a double bed and a single bed.</p>
        </div>
    </div>

    <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img="img/washroom.png"
        data-bs-description="Modern washroom with a shower, toilet facilities, and a clean, fresh environment."
        data-bs-features="Shower with hot and cold water
• Clean and well-maintained toilet facilities
• Spacious area for convenience">
        <img src="img/washroom.png" alt="Washroom">
        <div class="card-body">
            <p>Spacious washroom with a shower and toilet facilities.</p>
        </div>
    </div>

        <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img="img/utility.png"
        data-bs-description="Spacious utility with a seating arrangements. Ideal for family, friends gatherings and events."
        data-bs-features="Custom made seating arrangements • Ideal for family gatherings and small events • Suitable for moonlight and early morning sittig and relax">
        <img src="img/utility.png" alt="utility">
        <div class="card-body">
            <p>Spacious utility with a seating arrangements.</p>
        </div>
    </div>

        <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img="img/passage.png"
        data-bs-description="Great passage of 2 wheelers. Park vehicle safely."
        data-bs-features="Private driveway for 2 wheelers • Secure parking area • Park upto 4-5 vehicles safely">
        <img src="img/passage.png" alt="passage">
        <div class="card-body">
            <p>Passage for 2 wheelers parking</p>
        </div>
    </div>

        <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img="img/temple-.png"
        data-bs-description="Near to main temple in Melukote."
        data-bs-features="Close proximity to Melukote Temple • Easy access for pilgrims • Ideal location for temple visits">
        <img src="img/temple-.png" alt="temple">
        <div class="card-body">
            <p>Near to main temple in Melukote.</p>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body d-flex">
                <div class="modal-text w-50 p-4">
                    <h4 id="modal-description-title" class="modal-title">Description</h4>
                    <p id="modal-description-text"></p>
                    <h5>Key Features</h5>
                    <ul id="modal-features-list"></ul>
                </div>
                <div class="modal-image w-50">
                    <img id="modal-image" src="" alt="Modal Image" class="img-fluid rounded mb-3">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS & Dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

<!-- JavaScript to handle dynamic modal content -->
<script>
    const galleryCards = document.querySelectorAll('.gallery-card');

    galleryCards.forEach(card => {
        card.addEventListener('click', function () {
            const imgSrc = card.getAttribute('data-bs-img');
            const description = card.getAttribute('data-bs-description');
            const features = card.getAttribute('data-bs-features').split('•').map(feature => feature.trim());

            // Update modal with image, description, and features
            document.getElementById('modal-image').src = imgSrc;
            document.getElementById('modal-description-text').textContent = description;

            // Clear any previous features
            const featuresList = document.getElementById('modal-features-list');
            featuresList.innerHTML = ''; // Clear previous list items

            // Add new features dynamically to the modal
            features.forEach(feature => {
                const li = document.createElement('li');
                li.textContent = feature;
                featuresList.appendChild(li);
            });
        });
    });
</script>

<!-- Custom CSS for Modal Image Size -->
<style>
    .modal-image img {
        max-width: 90%; /* Ensures the image doesn't overflow */
        max-height: 400px; /* Limits height for consistency */
        margin: 0 auto; /* Centers the image */
        display: block; /* Centers the image inside the modal */
    }
</style>

</body>

</html>