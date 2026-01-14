<?php
// -------------------------------
// Secure Session
// -------------------------------
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_samesite', 'Strict');

session_start();
include '../inc/connection.php';

// -------------------------------
// Session Validation
// -------------------------------
if (!isset($_SESSION['admin_id'], $_SESSION['admin_user'])) {
    header("Location: index.php");
    exit;
}

// Session timeout (30 min)
if (!isset($_SESSION['last_activity'])) {
    $_SESSION['last_activity'] = time();
} elseif (time() - $_SESSION['last_activity'] > 1800) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}
$_SESSION['last_activity'] = time();

// -------------------------------
// CSRF Token
// -------------------------------
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// -------------------------------
// Logout (POST only)
// -------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    }
}

// -------------------------------
// Fetch bookings
// -------------------------------
$bookings = [];

$stmt = $conn->prepare(
    "SELECT id, name, address, phone, adults, children, aadhar_num,
            reg_date, check_in, check_out
     FROM bookings
     ORDER BY reg_date DESC"
);

if ($stmt && $stmt->execute()) {
    $result = $stmt->get_result();
    $bookings = $result->fetch_all(MYSQLI_ASSOC);
}

// -------------------------------
// Review Action (Approve / Reject)
// -------------------------------
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['action'], $_POST['booking_id']) &&
    hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
) {
    $bookingId = (int)$_POST['booking_id'];
    $action = $_POST['action'];

    if (in_array($action, ['Approved', 'Rejected'], true)) {
        $stmt = $conn->prepare(
            "UPDATE bookings SET status = ? WHERE id = ?"
        );
        $stmt->bind_param("si", $action, $bookingId);
        $stmt->execute();

        // ✅ Flash success message
        $_SESSION['success_message'] = "Booking has been {$action} successfully.";
    }

    header("Location: dashboard.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard | Shree Niwasa</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

<style>
body {
    background-color: #f4f6f8;
    font-family: 'Inter', sans-serif;
}

.navbar {
    box-shadow: 0 3px 12px rgba(0,0,0,0.15);
}

.dashboard-title {
    font-family: 'Playfair Display', serif;
    font-weight: 600;
}

.table-wrapper {
    background: #fff;
    padding: 1rem;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.05);
}

.table thead th {
    background-color: #212529;
    color: #fff;
    border: none;
    text-transform: uppercase;
    font-size: 0.8rem;
    letter-spacing: 0.05em;
}

.table tbody tr {
    transition: 0.2s ease;
}

.table tbody tr:hover {
    background-color: #f8f9fa;
}

.badge-count {
    background: #0d6efd;
}
@media (max-width: 768px) {
    .table thead {
        display: none;
    }
    .table, .table tbody, .table tr, .table td {
        display: block;
        width: 100%;
    }
    .table tr {
        margin-bottom: 1rem;
    }
}
</style>
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand">Admin Dashboard</span>

    <form method="post" class="mb-0">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button name="logout" class="btn btn-outline-light btn-sm">Logout</button>
    </form>
  </div>
</nav>

<div class="container mt-5">
    <h3 class="dashboard-title">
        Welcome, <?php echo ucwords(htmlspecialchars_decode($_SESSION['admin_user'], ENT_QUOTES)); ?>
        <span class="badge badge-count ms-2"><?php echo count($bookings); ?> bookings</span>
    </h3>
    <p class="text-muted mb-4">Manage and review guest bookings below.</p>

    <div class="table-wrapper">
        <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Guests</th>
                <th>Aadhar</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Action</th>
            </tr>
        </thead>

            <tbody>
            <?php if ($bookings): ?>
                <?php $i = 1; foreach ($bookings as $b): ?>
                <tr>
                    <td><?php echo htmlspecialchars($b['name']); ?></td>
                    <td><?php echo htmlspecialchars($b['phone']); ?></td>
                    <td><?php echo $b['adults']; ?>A / <?php echo $b['children']; ?>C</td>
                    <td><?php echo substr($b['aadhar_num'], -4); ?></td>
                    <td><?php echo $b['check_in']; ?></td>
                    <td><?php echo $b['check_out']; ?></td>
                    <td>
                        <button 
                            class="btn btn-sm btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#actionModal"
                            data-id="<?php echo $b['id']; ?>"
                            data-name="<?php echo htmlspecialchars($b['name']); ?>"
                            data-phone="<?php echo htmlspecialchars($b['phone']); ?>"
                            data-guests="<?php echo $b['adults'].' Adults, '.$b['children'].' Children'; ?>"
                            data-aadhar="<?php echo substr($b['aadhar_num'], -4); ?>"
                            data-checkin="<?php echo $b['check_in']; ?>"
                            data-checkout="<?php echo $b['check_out']; ?>"
                        >
                            Review
                        </button>
                    </td>
                </tr>

                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center text-muted">
                        No bookings found
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

 <!-- Action Modal -->
<div class="modal fade" id="actionModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Review Booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <form method="post" autocomplete="off">
          <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
          <input type="hidden" name="booking_id" id="bookingId">

          <p><strong>Name:</strong> <span id="mName"></span></p>
          <p><strong>Phone:</strong> <span id="mPhone"></span></p>
          <p><strong>Guests:</strong> <span id="mGuests"></span></p>
          <p><strong>Aadhar:</strong> <span id="mAadhar"></span></p>
          <p><strong>Check-In:</strong> <span id="mCheckIn"></span></p>
          <p><strong>Check-Out:</strong> <span id="mCheckOut"></span></p>

          <div class="d-flex justify-content-between mt-4">
            <button type="submit" name="action" value="Rejected" class="btn btn-danger">
                Reject
            </button>
            <button type="submit" name="action" value="Approved" class="btn btn-success">
                Approve
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">Success</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center">
        <p class="fs-5 mb-0">
          <?php echo $_SESSION['success_message'] ?? ''; ?>
        </p>
      </div>

      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">
          OK
        </button>
      </div>

    </div>
  </div>
</div>

<!-- Modal Script -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Action Modal Script
const actionModal = document.getElementById('actionModal');

actionModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;

    document.getElementById('bookingId').value = button.dataset.id;
    document.getElementById('mName').textContent = button.dataset.name;
    document.getElementById('mPhone').textContent = button.dataset.phone;
    document.getElementById('mGuests').textContent = button.dataset.guests;
    document.getElementById('mAadhar').textContent = button.dataset.aadhar;
    document.getElementById('mCheckIn').textContent = button.dataset.checkin;
    document.getElementById('mCheckOut').textContent = button.dataset.checkout;
});
// Success Modal Script
<?php if (!empty($_SESSION['success_message'])): ?>
    const successModal = new bootstrap.Modal(
        document.getElementById('successModal')
    );
    successModal.show();
<?php 
    // Clear flash message after showing
    unset($_SESSION['success_message']); 
endif; ?>
</script>

</body>
</html>
