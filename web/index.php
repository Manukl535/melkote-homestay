<?php
// -------------------------------
// Secure Session Settings
// -------------------------------
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_samesite', 'Strict');

session_start();
include '../inc/connection.php';

// -------------------------------
// CSRF Token
// -------------------------------
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// -------------------------------
// Basic Rate Limiting
// -------------------------------
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // CSRF check
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        $error = "Invalid request.";
    } elseif ($_SESSION['login_attempts'] >= 5) {
        $error = "Too many failed attempts. Try again later.";
    } else {

        $username = trim($_POST['username']);
        $password = $_POST['password'];

        // Use constant-time response
        $stmt = $conn->prepare(
            "SELECT id, password_hash FROM admin WHERE username = ? LIMIT 1"
        );
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($id, $hash);
            $stmt->fetch();

            if (password_verify($password, $hash)) {

                // Regenerate session ID (fixation protection)
                session_regenerate_id(true);

                $_SESSION['admin_id'] = $id;
                $_SESSION['admin_user'] = $username;
                $_SESSION['login_attempts'] = 0;

                header("Location: dashboard.php");
                exit;
            }
        }

        // Fail case
        $_SESSION['login_attempts']++;
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login | Shree Niwasa</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
}

.login-card {
    border-radius: 14px;
    border: none;
}

.login-card h3 {
    font-weight: 700;
}

.brand {
    font-size: 0.9rem;
    color: #6c757d;
}

input.form-control {
    height: 45px;
    border-radius: 10px;
}

.btn-primary {
    border-radius: 10px;
    padding: 10px;
    font-weight: 600;
}

.footer-text {
    font-size: 0.8rem;
    color: #adb5bd;
}
</style>
</head>

<body>
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card login-card shadow-lg p-4" style="width: 380px;">
        <h3 class="text-center mb-1">Admin Access</h3>
        <p class="text-center brand mb-4">Shree Niwasa Homestay</p>

        <?php if ($error): ?>
            <div class="alert alert-danger py-2 small">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="post" autocomplete="off">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100 mt-2">Sign In</button>
        </form>

        <div class="text-center mt-4 footer-text">
            © <?php echo date('Y'); ?> Shree Niwasa
        </div>
    </div>
</div>
</body>
</html>
