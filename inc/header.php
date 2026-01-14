<?php
// -------------------------------
// Page Active Logic
// -------------------------------
$current_page = basename($_SERVER['PHP_SELF']);

function isActivePage($page) {
    global $current_page;
    return ($current_page === $page) ? 'active' : '';
}

// -------------------------------
// DB Connection
// -------------------------------
include 'inc/connection.php';

// -------------------------------
// Visitor Counter (IP Based, Single Table)
// -------------------------------
$visitorCount = 1000; // fallback

if ($conn) {

    // Get visitor IP safely
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $visitorIP = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $visitorIP = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    } else {
        $visitorIP = $_SERVER['REMOTE_ADDR'];
    }

    $now = date('Y-m-d H:i:s');
    $shouldInsert = false;

    // Check existing IP
    $stmt = $conn->prepare(
        "SELECT last_visit FROM visitor_logs WHERE ip_address = ?"
    );
    $stmt->bind_param("s", $visitorIP);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        // New IP
        $shouldInsert = true;

        $insert = $conn->prepare(
            "INSERT INTO visitor_logs (ip_address, last_visit)
             VALUES (?, ?)"
        );
        $insert->bind_param("ss", $visitorIP, $now);
        $insert->execute();

    } else {
        // Existing IP → check 24h gap
        $stmt->bind_result($lastVisit);
        $stmt->fetch();

        if (strtotime($now) - strtotime($lastVisit) > 86400) {
            $update = $conn->prepare(
                "UPDATE visitor_logs SET last_visit = ? WHERE ip_address = ?"
            );
            $update->bind_param("ss", $now, $visitorIP);
            $update->execute();
        }
    }

    // Get total unique visitors
    $countResult = $conn->query(
        "SELECT COUNT(*) AS total FROM visitor_logs"
    );

    if ($countResult && $row = $countResult->fetch_assoc()) {
        $visitorCount = (int)$row['total'];
    }
}
?>

<!-- ===========================
     Desktop Navigation
=========================== -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm d-none d-lg-block">
  <div class="container">

    <a class="navbar-brand fw-bold" href="index.php">
      <img src="img/thrinama.png"
           width="30" height="30"
           class="d-inline-block align-top"
           alt="Shree Niwasa"
           style="padding-top:2px;">
      Shree Niwasa
    </a>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">

        <li class="nav-item">
          <a class="nav-link <?= isActivePage('index.php'); ?>" href="index.php">
            Home
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php#amenities">
            Facilities
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php#feedback">
            Reviews
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= isActivePage('gallery.php'); ?>" href="gallery.php">
            Gallery
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php#contact">
            Contact
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php#blogs">
            Blogs
          </a>
        </li>

      </ul>

      <div class="d-flex align-items-center">
        <span class="me-3 text-primary small d-none d-lg-inline">
          <strong>Rooms from ₹999/- Per Day</strong>
        </span>

        <a href="bookings.php"
           class="btn btn-primary me-2 <?= isActivePage('bookings.php'); ?>">
          <i class="fa fa-calendar"></i> Book Now
        </a>

        <a href="https://wa.me/919008288474"
           class="btn btn-success d-none d-md-inline">
          <i class="fa fa-whatsapp"></i> WhatsApp
        </a>
      </div>

    </div>
  </div>
</nav>
<!-- Desktop Navigation End -->

<!-- ===========================
     Mobile Top Header
=========================== -->
<nav class="navbar navbar-light bg-light sticky-top shadow-sm d-lg-none">
  <div class="container-fluid justify-content-center">
    <a class="navbar-brand fw-bold" href="index.php">
      Shree Niwasa – Pilgrim Homestay
    </a>
  </div>
</nav>
<!-- Mobile Navigation End -->



