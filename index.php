

<?php
session_start();
if (!isset($_SESSION['roleId'])) {
    header("Location: login.php");
    exit;
}
$role = $_SESSION['roleId'];
?>

<h2>Welcome to Dashboard</h2>

<?php if ($role == 1): ?>
    <h3>Admin Panel</h3>
<?php elseif ($role == 2): ?>
    <h3>Parent Panel</h3>
<?php elseif ($role == 3): ?>
    <h3>Hospital Panel</h3>
<?php endif; ?>

<a href="logout.php">Logout</a>
