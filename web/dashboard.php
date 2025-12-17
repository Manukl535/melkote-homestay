<?php
session_start();
// if (!isset($_SESSION['user_id'])) {
//     header('Location: /login.php');
//     exit();
// }
require_once '../inc/connection.php';

// Fetch user booking from database
$query = "SELECT * FROM bookings";
$bookings = $conn->query($query);

if (!$bookings) {
    // If query fails, show an error
    $error_message = "Error fetching bookings: " . $conn->error;
    echo $error_message;
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

    <!-- Display error message if there is one -->
    <?php if (isset($error_message)) : ?>
        <div class="msg msg-error"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <div class="dashboard-container">


        <div class="bookings-container">
            <h2>Your Bookings</h2>

            <?php if ($bookings->num_rows > 0) : ?>
                <table class="booking-table">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>User Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Adults</th>
                            <th>Children</th>
                            <th>Aadhar Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $bookings->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                <td><?php echo htmlspecialchars($row['address']); ?></td>
                                <td><?php echo htmlspecialchars($row['adults']); ?></td>
                                <td><?php echo htmlspecialchars($row['children']); ?></td>
                                <td><?php echo htmlspecialchars($row['aadhar_num']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="no-bookings">No bookings found</div>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
