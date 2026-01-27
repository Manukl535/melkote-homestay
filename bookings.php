<?php
// -----------------------------
// INIT
// -----------------------------

include 'inc/connection.php';

// UPI DETAILS
$upi_id = "srirangarajs@ybl";
$merchant_name = "Shree Niwasa Homestay";

// -----------------------------
// FETCH BOOKED DATES
// -----------------------------
$booked_dates = [];
$res = $conn->query("SELECT check_in, check_out FROM bookings");
if ($res && $res->num_rows > 0) {
  while ($r = $res->fetch_assoc()) {
    $booked_dates[] = [
      "from" => $r["check_in"],
      "to" => $r["check_out"]
    ];
  }
}
$booked_dates_json = json_encode($booked_dates);

// -----------------------------
// HANDLE BOOKING
// -----------------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $name = trim($_POST["name"]);
  $phone = trim($_POST["phone"]);
  $address = trim($_POST["address"]);
  $aadhar = trim($_POST["aadhar_num"]);
  $adults = (int) $_POST["adults"];
  $children = (int) $_POST["children"];
  $check_in = $_POST["check_in"];
  $check_out = $_POST["check_out"];

  if (!$check_in || !$check_out) {
    $error_message = "Please select valid dates.";
  } else {

    // Double booking protection
    $chk = $conn->query("
      SELECT id FROM bookings 
      WHERE (check_in <= '$check_out' AND check_out >= '$check_in')
    ");

    if ($chk->num_rows > 0) {
      $error_message = "Selected dates are already booked.";
    } else {

      $stmt = $conn->prepare("
        INSERT INTO bookings 
        (name, address, phone, adults, children, aadhar_num, check_in, check_out)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
      ");
      $stmt->bind_param(
        "sssiisss",
        $name,
        $address,
        $phone,
        $adults,
        $children,
        $aadhar,
        $check_in,
        $check_out
      );

      if ($stmt->execute()) {

        $success_message = "Booking successful!";

        // Calculate stay
        $d1 = new DateTime($check_in);
        $d2 = new DateTime($check_out);
        $days = max(1, $d1->diff($d2)->days);
        $price_per_day = 999;
        $total_cost = $days * $price_per_day;

        // Dynamic UPI QR
        $upi_note = "Homestay Booking - " . $name;
        $upi_url =
          "upi://pay?pa=" . urlencode($upi_id) .
          "&pn=" . urlencode($merchant_name) .
          "&am=" . $total_cost .
          "&cu=INR" .
          "&tn=" . urlencode($upi_note);

        $qr_code_url =
          "https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=" .
          urlencode($upi_url);

        $show_payment_modal = true;

      } else {
        $error_message = "Booking failed. Please try again.";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title>Book Your 2BHK Pilgrim-Friendly Homestay | Shree Niwasa, Melukote | Rooms from ₹999</title>
  <meta name="description"
    content="Secure your stay at Shree Niwasa Homestay in Melukote. Clean and spacious 2BHK rooms near Cheluvanarayana Swamy Temple. Affordable, pilgrim-friendly accommodation. Check availability online today!" />

  <link rel="canonical" href="https://melukote.com/bookings.php" />
  <meta name="robots" content="index, follow, max-image-preview:large" />
  <meta name="author" content="Shree Niwasa" />
  <meta name="geo.region" content="IN-KA" />
  <meta name="geo.placename" content="Melukote" />

  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://melukote.com/bookings.php" />
  <meta property="og:title" content="Book 2BHK Pilgrim-Friendly Homestay | Shree Niwasa Melukote" />
  <meta property="og:description"
    content="Affordable and comfortable 2BHK homestay near Cheluvanarayana Swamy Temple. Book your room online today!" />
  <meta property="og:image" content="https://melukote.com/img/homestay-melukote-shree-niwasa.png" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:locale" content="en_IN" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Book 2BHK Pilgrim-Friendly Homestay | Shree Niwasa Melukote" />
  <meta name="twitter:description"
    content="Secure your stay at Shree Niwasa Homestay. Located minutes from Cheluvanarayana Swamy Temple." />
  <meta name="twitter:image" content="https://melukote.com/img/homestay-melukote-shree-niwasa.png" />

  <!-- Favicon -->
  <link rel="icon" href="img/homestay-melukote-temple-preview.png" type="image/png" />
  <link rel="apple-touch-icon" href="img/homestay-melukote-temple-preview.png" />

  <!-- Fonts & Styles -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap"
    rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="css/styles.css" />

  <!-- LodgingBusiness & Breadcrumb Schema -->
  <script type="application/ld+json">
  [
    {
      "@context": "https://schema.org",
      "@type": "LodgingBusiness",
      "name": "Shree Niwasa Homestay",
      "image": "https://melukote.com/img/homestay-melukote-shomestay-melukote-shree-niwasa.png",
      "@id": "https://melukote.com",
      "url": "https://melukote.com/bookings.php",
      "telephone": "+919008288474",
      "priceRange": "₹999 - ₹1500",
      "starRating": {
        "@type": "Rating",
        "ratingValue": "4.8",
        "reviewCount": "85"
      },
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Near Cheluvanarayana Swamy Temple",
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
      "checkinTime": "12:00",
      "checkoutTime": "10:00",
      "amenityFeature": [
        {"@type":"LocationFeatureSpecification","name":"Kitchen","value":true},
        {"@type":"LocationFeatureSpecification","name":"Parking","value":true},
        {"@type":"LocationFeatureSpecification","name":"Wi-Fi","value":true},
        {"@type":"LocationFeatureSpecification","name":"Family Rooms","value":true}
      ],
      "sameAs": [
        "https://www.facebook.com/shreeniwasa",
        "https://www.instagram.com/shreeniwasa"
      ]
    },
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "https://melukote.com/"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Bookings",
          "item": "https://melukote.com/bookings.php"
        }
      ]
    }
  ]
  </script>

  <style>
    /* --- Force Icon & Input to be inline --- */
    .input-group {
      display: flex !important;
      flex-wrap: nowrap !important;
      align-items: stretch;
      width: 100%;
      border: 1px solid #ced4da;
      border-radius: 8px;
      overflow: hidden;
    }

    .input-group-text {
      background-color: #e9ecef;
      border: none !important;
      border-radius: 0 !important;
      color: #555;
      padding: 0 15px;
      display: flex;
      align-items: center;
    }

    #dateRange {
      border: none !important;
      box-shadow: none !important;
      flex-grow: 1;
      width: auto !important;
      margin: 0 !important;
      border-radius: 0 !important;
    }

    /* Calendar Colors */
    .flatpickr-day.selected,
    .flatpickr-day.startRange,
    .flatpickr-day.endRange,
    .flatpickr-day.selected.inRange {
      background: #3360f3 !important;
      border-color: #3360f3 !important;
    }

    .flatpickr-day.flatpickr-disabled {
      background-color: #ffebee !important;
      color: #d32f2f !important;
      text-decoration: line-through;
    }

 /* Disclaimer Modal - Enhanced */
  .modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.65);
    backdrop-filter: blur(4px);
    transition: opacity 0.3s ease;
  }

  .modal-content {
    background: #fff;
    margin: 5% auto;
    padding: 30px 35px;
    width: 90%;
    max-width: 700px;
    max-height: 85vh;
    overflow-y: auto;
    border-radius: 12px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
    font-family: 'Poppins', sans-serif;
    line-height: 1.7;
    position: relative;
    animation: slideDown 0.4s ease forwards;
  }

  @keyframes slideDown {
    0% { transform: translateY(-30px); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
  }

  .modal-content h2 {
    margin-top: 0;
    font-size: 26px;
    color: #2c3e50;
    text-align: center;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 12px;
  }

  .modal-content h3 {
    margin-top: 25px;
    margin-bottom: 10px;
    font-size: 18px;
    color: #27ae60;
  }

  .modal-content p {
    font-size: 15px;
    color: #555;
    margin-bottom: 15px;
  }

  .close {
    position: absolute;
    top: 18px;
    right: 20px;
    font-size: 28px;
    font-weight: bold;
    color: #888;
    cursor: pointer;
    transition: color 0.2s ease;
  }

  .close:hover {
    color: #e74c3c;
  }

  .agree-btn {
    display: block;
    width: 150px;
    margin: 25px auto 0 auto;
    padding: 12px 20px;
    background-color: #27ae60;
    color: #fff;
    font-weight: 600;
    font-size: 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
  }

  .agree-btn:hover {
    background-color: #219150;
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.2);
  }

  .agree-btn:active {
    transform: translateY(0);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
  }

  /* Scrollbar styling for modal content */
  .modal-content::-webkit-scrollbar {
    width: 7px;
  }

  .modal-content::-webkit-scrollbar-thumb {
    background-color: rgba(0,0,0,0.2);
    border-radius: 4px;
  }

  .modal-content::-webkit-scrollbar-track {
    background: transparent;
  }

  @media (max-width: 768px) {
    .modal-content {
      padding: 25px 20px;
    }

    .modal-content h2 {
      font-size: 22px;
    }

    .modal-content h3 {
      font-size: 16px;
    }

    .agree-btn {
      width: 130px;
      font-size: 15px;
      padding: 10px 18px;
    }
  }  </style>
</head>

<body>
  <?php include 'inc/header.php'; ?>
  <!-- Disclaimer Modal -->
  <div id="disclaimerModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>

      <h2>Disclaimer</h2>

      <p>
        The information on <strong>www.melukote.com</strong> is provided for general informational purposes only.
        While we make every effort to ensure accuracy, <strong>Shree Niwasa - Melukote  Homestay</strong> and its
        family
        cannot guarantee the completeness or suitability of the information, services, or content on this Website.
      </p>

      <h3>Booking & Availability</h3>
      <p>
        Accommodation is subject to availability and may change without prior notice. During special cultural and
        religious periods,
        including <strong>Vairamudi Brahmotsava (27 Mar-6 Apr 2026)</strong>, <strong>2 Jul 2026</strong>,
        <strong>Rajamudi Utsav (3 Aug 2026)</strong>, and <strong>17-20 Nov 2026</strong>, our family may occupy the
        property,
        which could limit availability. We kindly advise guests to confirm bookings in advance.
      </p>

      <h3>Use of Property</h3>
      <p>
        This is a family home extended to guests in the spirit of hospitality, cultural respect, and spiritual
        convenience.
        Guests are requested to use the property considerately and refrain from any activities inconsistent with a
        peaceful
        family environment.
      </p>

      <h3>Limitation of Liability</h3>
      <p>
        <strong>Shree Niwasa - Melukote  Homestay</strong> shall not be liable for any loss or damage, including
        indirect
        or consequential loss, arising from the use of this Website or bookings made through it.
      </p>

      <p>
        By using this Website and making a booking, you kindly acknowledge and agree to this Disclaimer and the
        applicable
        <strong><a href="terms-and-conditions.php">Terms & Conditions</a></strong>.
      </p>

      <button onclick="closeModal()" class="agree-btn">I Agree</button>
    </div>
  </div>
  <script>
    window.onload = function () {
      document.getElementById("disclaimerModal").style.display = "block";
    };

    function closeModal() {
      document.getElementById("disclaimerModal").style.display = "none";
    }
  </script>


  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-body p-4 p-md-5">

            <h2 class="text-center mb-2" style="font-family: 'Playfair Display', serif;">Reserve Your Stay</h2>
            <p class="text-center text-muted mb-4">
              <span class="badge bg-primary fs-6">Contribution: ₹999/day</span>
            </p>
            <p class="text-center text-muted mb-4">Need Instructions for booking? 
              <a href="shree-niwasa-homestay-in-melukote-booking-instructions.php">Click here</a></p>
            <?php if (isset($success_message)): ?>
              <div class="alert alert-success text-center"><?php echo $success_message; ?></div>
            <?php elseif (isset($error_message)): ?>
              <div class="alert alert-danger text-center"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <form action="" method="post" id="bookingForm">
              <div class="row g-3">

                <div class="col-12">
                  <label class="form-label fw-bold text-dark">Select Dates (From - To)</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    <input type="text" id="dateRange" class="form-control bg-white"
                      placeholder="Select Check-in and Check-out dates" readonly required>
                  </div>
                  <input type="hidden" name="check_in" id="check_in">
                  <input type="hidden" name="check_out" id="check_out">
                  <div class="form-text text-success fw-bold mt-2" id="nightsCalc"></div>
                </div>

                <hr class="my-4 text-muted">

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    <label for="name">Full Name</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                    <label for="phone">Phone Number</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                    <label for="address">Address (As per Aadhar)</label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="aadhar_num" name="aadhar_num" maxlength="4"
                      placeholder="XXXX" required>
                    <label for="aadhar_num">Aadhar (Last 4 Digits)</label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="adults" name="adults" min="1" max="4" value="1"
                      required>
                    <label for="adults">Adults (Max 4)</label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="children" name="children" min="0" max="4" value="0"
                      required>
                    <label for="children">Children (Max 4)</label>
                  </div>
                </div>

                <div class="col-12 text-center mt-3">
                  <p class="small text-muted mb-0">
                    By clicking "Confirm Booking", you agree to our
                    <a href="terms-and-conditions.php" target="_blank" class="text-decoration-underline">Terms & 
                      Rules</a>.
                  </p>
                </div>

                <div class="col-12 mt-2">
                  <button type="submit" class="btn btn-primary w-100 py-3 fw-bold btn-pulse">
                    Confirm Booking
                  </button>
                </div>

              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- PAYMENT MODAL -->
  <div class="modal fade" id="paymentModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center p-4 rounded-4 border-0">

        <!-- Header -->
        <div class="modal-header border-0 justify-content-center pb-0">
          <i class="fa fa-check-circle text-success fa-4x mb-2"></i>
        </div>

        <!-- Body -->
        <div class="modal-body">
          <h3 class="mb-2" style="font-family: 'Playfair Display', serif;">
            Booking Confirmed!
          </h3>

          <p class="text-muted fs-5 mb-3">
            Scan & Pay<br>
            <strong class="text-dark">
              ₹<?= $price_per_day ?> × <?= $days ?> days = ₹<?= $total_cost ?? 0 ?>
            </strong>
          </p>

          <div class="p-3 bg-light rounded d-inline-block mb-3 border">
            <img src="<?= $qr_code_url ?? '' ?>" alt="UPI Payment QR" class="img-fluid" style="max-width: 200px;">
          </div>

          <p class="small text-muted mb-2">
            UPI ID: <strong><?= htmlspecialchars($upi_id ?? '') ?></strong><br>
            Amount will be auto-filled in your UPI app.
          </p>

          <p class="small text-muted mb-0">
            Once paid, please share the screenshot on WhatsApp.
          </p>
        </div>

        <!-- Footer -->
        <div class="modal-footer border-0 justify-content-center">
          <a href="index.php" class="btn btn-outline-secondary px-4">
            Home
          </a>
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

  <?php include 'inc/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <script>
    // -----------------------------
    // ELEMENT REFERENCES (SAFE)
    // -----------------------------
    const bookingForm = document.getElementById('bookingForm');
    const dateRange = document.getElementById('dateRange');
    const checkIn = document.getElementById('check_in');
    const checkOut = document.getElementById('check_out');
    const nightsCalc = document.getElementById('nightsCalc');

    const nameInput = document.getElementById('name');
    const phoneInput = document.getElementById('phone');
    const aadharInput = document.getElementById('aadhar_num');

    const bookedDates = <?= $booked_dates_json ?>;
    const PRICE_PER_DAY = 999;

    // -----------------------------
    // DATE PICKER
    // -----------------------------
    flatpickr(dateRange, {
      mode: "range",
      minDate: "today",
      dateFormat: "Y-m-d",
      disable: bookedDates,

      onChange(selectedDates, dateStr, instance) {
        if (selectedDates.length === 2) {

          const start = selectedDates[0];
          const end = selectedDates[1];
          const days = Math.ceil((end - start) / (1000 * 60 * 60 * 24));

          if (days < 1) {
            instance.clear();
            nightsCalc.innerHTML =
              "<span class='text-danger'>Minimum stay is 1 day</span>";
            checkIn.value = "";
            checkOut.value = "";
            return;
          }

          checkIn.value = instance.formatDate(start, "Y-m-d");
          checkOut.value = instance.formatDate(end, "Y-m-d");

          nightsCalc.innerHTML =
            `<i class="fa fa-check"></i> ${days} day(s) Selected.
           Total Contribution: <strong>₹${days * PRICE_PER_DAY}</strong>`;
        }
      },

      onClose(selectedDates) {
        if (selectedDates.length !== 2) {
          checkIn.value = "";
          checkOut.value = "";
          nightsCalc.innerHTML = "";
        }
      }
    });

    // -----------------------------
    // HELPERS
    // -----------------------------
    function onlyDigits(el) {
      el.value = el.value.replace(/\D/g, '');
    }

    function setValidity(el, isValid) {
      el.classList.remove('is-valid', 'is-invalid');
      el.classList.add(isValid ? 'is-valid' : 'is-invalid');
    }

    // -----------------------------
    // LIVE VALIDATION
    // -----------------------------
    nameInput.addEventListener('input', () => {
      const valid = /^[A-Za-z\s]{3,}$/.test(nameInput.value.trim());
      setValidity(nameInput, valid);
    });

    phoneInput.addEventListener('input', () => {
      onlyDigits(phoneInput);
      setValidity(phoneInput, phoneInput.value.length === 10);
    });

    aadharInput.addEventListener('input', () => {
      onlyDigits(aadharInput);
      setValidity(aadharInput, aadharInput.value.length === 4);
    });

    // -----------------------------
    // FORM SUBMIT GUARD
    // -----------------------------
    bookingForm.addEventListener('submit', function (e) {

      const invalidFields = bookingForm.querySelectorAll('.is-invalid');

      if (!checkIn.value || !checkOut.value || invalidFields.length > 0) {
        e.preventDefault();
        alert("Please complete all fields correctly before submitting.");
        return false;
      }
    });
  </script>

  <?php if (!empty($show_payment_modal)): ?>
    <script>
      new bootstrap.Modal(document.getElementById('paymentModal')).show();
    </script>
  <?php endif; ?>
</body>

</html>