<?php
// Start the session at the very beginning of the file
session_start();

// Include the database connection
include 'inc/connection.php';

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Collect form data and sanitize it
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $aadhar_num = mysqli_real_escape_string($conn, $_POST['aadhar_num']);
    $adults = intval($_POST['adults']);
    $children = intval($_POST['children']);

    // Check if terms are agreed to (Server-side validation)
    if (!isset($_POST['terms'])) {
        $error_message = "You must agree to the Terms and Policies.";
    } else {
        // Prepare and bind statement for inserting data into database
        $stmt = $conn->prepare("INSERT INTO bookings (name, address, phone, adults, children, aadhar_num) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiis", $name, $address, $phone, $adults, $children, $aadhar_num);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Set success message and payment QR code
            $success_message = "Booking successful! Scan the QR code for payment.";
            $payment_qr_code = "https://www.qr-code-generator.com/wp-content/themes/qr/new_structure/php/qrcodes/payment.png"; // Replace with your QR code URL
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Booking Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* General Page Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        /* Container Card */
        .booking-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            width: 100%;
        }

        /* Header Styling */
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 10px;
        }

        .info-text {
            text-align: center;
            color: #666;
            font-size: 0.9em;
            margin-bottom: 5px;
        }

        .highlight {
            color: #2c3e50;
            font-weight: 600;
        }

        /* Form Grid System (2 Columns) */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* 2 equal columns */
            gap: 20px;
            margin-top: 30px;
        }

        /* Input Groups */
        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: 500;
            color: #444;
            font-size: 0.95em;
        }

        input[type="text"],
        input[type="number"] {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1em;
            transition: border-color 0.3s;
            font-family: 'Poppins', sans-serif;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #3498db;
            outline: none;
        }

        /* Terms and Conditions Section */
        .terms-container {
            grid-column: 1 / -1;
            /* Spans full width */
            margin-top: 10px;
            display: flex;
            align-items: center;
            font-size: 0.9em;
        }

        .terms-container input {
            margin-right: 10px;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .terms-container a {
            color: #3498db;
            text-decoration: none;
        }

        /* Submit Button */
        .submit-btn {
            grid-column: 1 / -1;
            /* Spans full width */
            background-color: #27ae60;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 6px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background-color: #219150;
        }

        /* Messages */
        .msg {
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .msg-success {
            background-color: #d4edda;
            color: #155724;
        }

        .msg-error {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Mobile Responsive */
        @media (max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr;
                /* Stack to 1 column */
            }
        }

        /* Modal Styling */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            /* Semi-transparent background */
            padding-top: 60px;
            transition: opacity 0.3s ease-in-out;
        }

        /* Modal Content Styling */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 30px;
            border: 1px solid #888;
            width: 90%;
            /* Full width, but with a max-width for large screens */
            max-width: 600px;
            /* Limiting max-width to avoid stretching on large screens */
            text-align: center;
            border-radius: 8px;
            /* Rounded corners for the modal */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Modal Image Styling */
        .modal img {
            width: 80%;
            /* Adjusting width to fit smaller screens */
            height: auto;
            max-width: 100%;
            /* Ensures the image doesn't overflow */
            margin-top: 20px;
        }

        /* Close Button Styling */
        .modal .close {
            color: #aaa;
            font-size: 32px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        /* Close Button Hover Effect */
        .modal .close:hover,
        .modal .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Media Query for Responsiveness */
        @media (max-width: 768px) {
            .modal-content {
                width: 95%;
                /* Ensure modal takes up more space on small screens */
                padding: 20px;
            }

            .modal img {
                width: 100%;
                /* Make the image take up the full width on smaller screens */
            }
        }
    </style>

    <script type="text/javascript">
        // Function to display modal after booking is successful
        function showModal() {
            var modal = document.getElementById("bookingModal");
            modal.style.display = "block";
        }

        // Function to close modal
        function closeModal() {
            var modal = document.getElementById("bookingModal");
            modal.style.display = "none";
            window.location.href = "index.php"; // Redirect to homepage
        }

        window.onload = function () {
            // Show modal after successful booking
            <?php if (isset($success_message)) {
                echo "showModal();";
            } ?>
        };
    </script>
</head>

<body>

    <div class="booking-container">
        <h2>Reservation</h2>
        <div class="info-text">Check-in: 12:00 PM • Check-out: 10:00 AM</div>
        <div class="info-text">Max 6 Guests • <span class="highlight">₹999/day</span> Contribution</div>

        <?php
        if (isset($success_message)) {
            echo "<div class='msg msg-success'>$success_message</div>";
        } elseif (isset($error_message)) {
            echo "<div class='msg msg-error'>$error_message</div>";
        }
        ?>

        <form name="bookingForm" action="" method="post" onsubmit="return validateForm()">
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="John Doe" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" placeholder="9876543210" required>
                </div>

                <div class="form-group">
                    <label for="address">Address (As in Aadhar)</label>
                    <input type="text" id="address" name="address" placeholder="Street, City, Pincode" required>
                </div>

                <div class="form-group">
                    <label for="aadhar_num">Aadhar (Last 4 Digits)</label>
                    <input type="text" id="aadhar_num" name="aadhar_num" maxlength="4" placeholder="XXXX" required>
                </div>

                <div class="form-group">
                    <label for="adults">Adults (Max 4)</label>
                    <input type="number" id="adults" name="adults" min="1" max="4" required>
                </div>

                <div class="form-group">
                    <label for="children">Children (Max 2)</label>
                    <input type="number" id="children" name="children" min="0" max="2" value="0" required>
                </div>

                <div class="terms-container">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms" style="margin:0; font-weight: 400;">
                        I agree to the <a href="T&C.html">Terms and Policies</a> regarding house rules and
                        cancellations.
                    </label>
                </div>

                <input type="submit" value="Confirm Booking" class="submit-btn">
            </div>
        </form>
    </div>

    <!-- Modal for success message -->
    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Booking Successful!</h2>
            <p>Scan the QR code below for payment of ₹999/day.</p>
            <img src="img/payment-qr.png" alt="QR Code for Payment"
                style="width: 200px; height: auto; max-width: 100%; margin-top: 20px;">
            <p style="margin-top: 20px;">Thank you for choosing Shree Niwasa. We look forward to hosting you!</p>
        </div>
    </div>

</body>

</html>