<?php
session_start();
?>
<!DOCTYPE html>
<html>   
<head>
  <title>QuickHire</title>
  <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<header>
  <h1>QuickHire</h1>
  <nav>
    <?php if (isset($_SESSION['user'])): ?>
      <a href="/dashboard.php">Dashboard</a>
      <a href="/logout.php">Logout</a>
    <?php else: ?>
      <a href="/login.php">Login</a>
      <a href="/register.php">Register</a>
    <?php endif; ?>
  </nav>
</header>
<main>
