<?php
$current_page = basename($_SERVER['PHP_SELF']);

function mobileActive($page)
{
  global $current_page;
  return ($current_page === $page) ? 'active-nav' : '';
}
?>


<!-- Footer Start -->
<footer class="bg-dark text-light pt-5 pb-3" section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold text-white">Shree Niwasa Homestay</h5>
        <p class="small text-secondary">
          The preferred <strong>2BHK homestay in Melukote</strong> for families and pilgrims. Located in the heart of
          the temple town, providing clean and affordable accommodation near Cheluvanarayana Swamy Temple.
        </p>
        <div class="mt-3">
          <p class="small mb-0">Visiter Count: <span id="visitor-count"
              class="text-white fw-bold"><?php echo $visitorCount; ?></span></p>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <h6 class="text-white mb-3">Location & Contact</h6>
        <a href="https://www.google.com/maps/search/?api=1&query=Shree+Niwasa+Melukote" target="_blank"
          rel="noopener noreferrer" class="text-decoration-none">
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
          <li class="mb-2"><a href="payments.php" class="text-secondary text-decoration-none">Payments</a></li>
          <li class="mb-2"><a href="shree-niwasa-homestay-gallery.php" class="text-secondary text-decoration-none">Home
              Gallery</a></li>
          <li class="mb-2"><a href="bookings.php" class="text-secondary text-decoration-none">Check Availability</a>
          </li>
          <li class="mb-2"><a href="index.php#local-services" class="text-secondary text-decoration-none">Food &
              Travel Guide</a></li>
          <li class="mb-2"><a href="privacy-policy.php" class="text-secondary text-decoration-none">Privacy Policy</a>
          </li>
          <li><a href="terms-and-conditions.php" class="text-secondary text-decoration-none">Terms & Conditions</a></li>
          
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
        <span class="small text-secondary">Best Pilgrim Stay in Melukote, Pandavapura Taluk, Mandya District,
          Karnataka</span>
      </div>
    </div>
  </div>
</footer>
<!-- Footer End -->

<!-- Mobile Bottom Navigation -->
<nav class="mobile-bottom-nav d-lg-none">
  <a href="index.php" class="nav-item <?php echo mobileActive('index.php'); ?>">
    <i class="fa fa-home"></i>
    <span>Home</span>
  </a>

  <a href="index.php#amenities" class="nav-item">
    <i class="fa fa-bed"></i>
    <span>Facilities</span>
  </a>

  <a href="bookings.php" class="nav-item <?php echo mobileActive('bookings.php'); ?>">
    <i class="fa fa-calendar-check-o"></i>
    <span>Book</span>
  </a>

  <a href="shree-niwasa-homestay-gallery.php"
    class="nav-item <?php echo mobileActive('shree-niwasa-homestay-gallery.php'); ?>">
    <i class="fa fa-image"></i>
    <span>Gallery</span>
  </a>

  <a href="tel:+919008288474" class="nav-item">
    <i class="fa fa-phone"></i>
    <span>Help</span>
  </a>
</nav>

<!-- Mobile Bottom Navigation End -->