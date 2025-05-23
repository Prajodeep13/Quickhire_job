<?php include 'includes/db.php'; session_start();
if ($_SESSION['user']['role'] != 'employer') die("Unauthorized");
?>
<!DOCTYPE html>
<html>
<head><title>Post Job</title></head>
<body>
<form method="POST" action="">
  <input type="text" name="title" placeholder="Job Title" required />
  <textarea name="description" placeholder="Job Description" required></textarea>
  <input type="text" name="location" placeholder="Location" required />
  <button type="submit">Post Job</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $desc = $_POST['description'];
  $location = $_POST['location'];
  $eid = $_SESSION['user']['id'];
  $conn->query("INSERT INTO jobs (title, description, location, employer_id)
                VALUES ('$title', '$desc', '$location', $eid)");
  echo "Job posted successfully!";
}
?>
</body>
</html>
