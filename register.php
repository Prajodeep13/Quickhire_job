<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
<form method="POST" action="">
  <input type="text" name="name" placeholder="Full Name" required />
  <input type="email" name="email" placeholder="Email" required />
  <input type="password" name="password" placeholder="Password" required />
  <select name="role">
    <option value="jobseeker">Job Seeker</option>
    <option value="employer">Employer</option>
  </select>
  <button type="submit">Register</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $role = $_POST['role'];
  $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
  echo "Registered successfully!";
}
?>
</body>
</html>
