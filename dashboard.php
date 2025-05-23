<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}
$user = $_SESSION['user'];
if ($user['role'] == 'employer') {
  header("Location: employer/dashboard.php");
} else {
  header("Location: jobseeker/dashboard.php");
}
?>
