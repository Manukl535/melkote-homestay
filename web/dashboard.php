<?php
session_start();
include '../inc/connection.php';

// Logout logic
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

// Check if admin is logged in
if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
    exit;
}

// Fetch bookings data
$bookings = [];
$result = $conn->query("SELECT id, name, address, phone, adults, children, aadhar_num, reg_date, check_in, check_out FROM bookings ORDER BY reg_date DESC");
if($result){
    $bookings = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
<style>
    body {
        background-color: #f4f6f8;
        font-family: 'Inter', sans-serif;
    }
    nav.navbar {
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
    }
    .container h3 {
        font-family: 'Playfair Display', serif;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .container p {
        color: #6c757d;
    }
    .table-responsive {
        background-color: #fff;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    table.table {
        border: none;
    }
    table.table thead th {
        background-color: #343a40 !important;
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
    }
    table.table tbody tr {
        transition: all 0.2s ease-in-out;
        cursor: default;
    }
    table.table tbody tr:hover {
        background-color: #f1f3f5;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    table.table td {
        border-top: none;
        vertical-align: middle;
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
            margin-bottom: 1.2rem;
            border-bottom: 2px solid #dee2e6;
            background-color: #fff;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .table td {
            text-align: right;
            padding-left: 50%;
            position: relative;
        }
        .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 1rem;
            width: 45%;
            font-weight: 600;
            color: #495057;
            text-align: left;
        }
    }
</style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Admin Dashboard</span>
    <a href="?action=logout" class="btn btn-outline-light">Logout</a>
  </div>
</nav>

<div class="container mt-5">
  <h3>Welcome, <?php echo htmlspecialchars($_SESSION['admin_user']); ?>!</h3>
  <p class="mb-4">Below is the list of all bookings. You can review them here.</p>

  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>Sl.No</th>
          <th>Name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Adults</th>
          <th>Children</th>
          <th>Aadhar</th>
          <th>Registration Date</th>
          <th>Check-In</th>
          <th>Check-Out</th>
        </tr>
      </thead>
      <tbody>
        <?php if(count($bookings) > 0): ?>
          <?php $sl = 1; ?>
          <?php foreach($bookings as $b): ?>
            <tr>
              <td data-label="Sl.No"><?php echo $sl++; ?></td>
              <td data-label="Name"><?php echo htmlspecialchars($b['name']); ?></td>
              <td data-label="Address"><?php echo htmlspecialchars($b['address']); ?></td>
              <td data-label="Phone"><?php echo htmlspecialchars($b['phone']); ?></td>
              <td data-label="Adults"><?php echo $b['adults']; ?></td>
              <td data-label="Children"><?php echo $b['children']; ?></td>
              <td data-label="Aadhar"><?php echo htmlspecialchars($b['aadhar_num']); ?></td>
              <td data-label="Registration Date"><?php echo $b['reg_date']; ?></td>
              <td data-label="Check-In"><?php echo $b['check_in']; ?></td>
              <td data-label="Check-Out"><?php echo $b['check_out']; ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="10" class="text-center">No bookings found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
