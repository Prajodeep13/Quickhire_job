<?php include 'includes/db.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<form method="POST" action="">
  <input type="email" name="email" placeholder="Email" required />
  <input type="password" name="password" placeholder="Password" required />
  <button type="submit">Login</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
  if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user;
      header("Location: dashboard.php");
    } else echo "Incorrect password";
  } else echo "User not found";
}
?>
</body>
</html>
