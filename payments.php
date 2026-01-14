<?php
// -----------------------------
// DB CONFIG
// -----------------------------

include 'inc/connection.php';

// UPI DETAILS
$upi_id = "srirangarajs@ybl";
$merchant_name = "Shree Niwasa Homestay";

$booking = null;
$error = "";
$qr_code_url = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $phone = trim($_POST["phone"]);

    if (strlen($phone) < 10) {
        $error = "Please enter a valid phone number.";
    } else {

        $stmt = $conn->prepare("
            SELECT name, check_in, check_out 
            FROM bookings 
            WHERE phone = ? 
            ORDER BY id DESC 
            LIMIT 1
        ");
        $stmt->bind_param("s", $phone);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $error = "No booking found for this phone number.";
        } else {
            $row = $result->fetch_assoc();

            $checkIn  = new DateTime($row["check_in"]);
            $checkOut = new DateTime($row["check_out"]);
            $days = max(1, $checkIn->diff($checkOut)->days);
            $price_per_day = 999;
            $total_amount = $days * $price_per_day;

            // Build UPI payment URL
            $upi_note = "Homestay Booking - " . $row["name"];

            $upi_url = "upi://pay?pa=" . urlencode($upi_id)
                     . "&pn=" . urlencode($merchant_name)
                     . "&am=" . $total_amount
                     . "&cu=INR"
                     . "&tn=" . urlencode($upi_note);

            // Generate QR dynamically
            $qr_code_url = "https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=" . urlencode($upi_url);

            $booking = [
                "name"  => $row["name"],
                "days"  => $days,
                "total" => $total_amount
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Payment | Shree Niwasa Homestay</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<style>
body {
    background: #f2f4f7;
    font-family: "Segoe UI", system-ui, sans-serif;
}

.container {
    max-width: 520px;
    margin-top: 80px;
}

.card {
    border-radius: 14px;
    box-shadow: 0 15px 40px rgba(0,0,0,.12);
}

.price-box {
    background: #f1f8f4;
    border-left: 5px solid #2f7d4a;
    padding: 12px;
    border-radius: 8px;
}

.total-box {
    background: #fff6e8;
    border-left: 5px solid #e09b2d;
    padding: 12px;
    border-radius: 8px;
}

.qr-box {
    background: #f8f9fa;
    border-radius: 10px;
    border: 1px solid #ddd;
    padding: 15px;
}

.whatsapp {
    position: fixed;
    right: 30px;
    bottom: 90px;
    width: 60px;
    height: 60px;
    background: #25d366;
    color: #fff;
    border-radius: 50%;
    font-size: 30px;
    text-align: center;
    box-shadow: 2px 2px 6px #999;
}

.whatsapp i {
    margin-top: 16px;
}
</style>
</head>

<body>

<div class="container">
<div class="card p-4 text-center">

<i class="fa fa-check-circle text-success fa-3x mb-3"></i>
<h4>Scan & Pay</h4>

<div class="price-box my-3">
<strong>₹999</strong> Per Day × Stay Duration
</div>

<form method="POST">
    <input type="tel"
           name="phone"
           class="form-control mb-3"
           placeholder="Enter registered phone number"
           required>

    <button class="btn btn-success w-100">
        Check Booking
    </button>
</form>

<?php if ($error): ?>
    <div class="alert alert-danger mt-3">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>

<?php if ($booking): ?>
    <div class="total-box mt-4 text-start">
        <p><strong>Name:</strong> <?= htmlspecialchars($booking["name"]) ?></p>
        <p><strong>Stay:</strong> <?= $booking["days"] ?> days</p>
        <p class="fs-5">
            <strong>Total Amount:</strong>
            ₹<?= $booking["total"] ?>
        </p>
    </div>

    <div class="qr-box mt-4 text-center">
        <img src="<?= $qr_code_url ?>" class="img-fluid" style="max-width:220px" alt="UPI Payment QR">
        <p class="small text-muted mt-2">
            UPI ID: <strong><?= htmlspecialchars($upi_id) ?></strong><br>
            Amount will be auto-filled in your UPI app
        </p>
    </div>

    <p class="small text-muted mt-2">
        After payment, please share the screenshot on WhatsApp.
    </p>
<?php endif; ?>

<a href="index.php" class="btn btn-outline-secondary mt-3">
Home
</a>

</div>
</div>

<a href="https://wa.me/+919008288474"
   class="whatsapp"
   target="_blank">
   <i class="fa fa-whatsapp"></i>
</a>

</body>
</html>
