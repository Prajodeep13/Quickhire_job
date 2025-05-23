<?php include 'includes/db.php'; session_start();
if ($_SESSION['user']['role'] != 'jobseeker') die("Unauthorized");
?>
<!DOCTYPE html>
<html>
<head><title>Apply Job</title></head>
<body>
<form method="POST" enctype="multipart/form-data">
  <label>Upload Resume (PDF)</label>
  <input type="file" name="resume" accept=".pdf" required />
  <button type="submit">Apply</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $job_id = $_GET['job_id'];
  $user_id = $_SESSION['user']['id'];
  $file = $_FILES['resume']['name'];
  $target = "uploads/resumes/" . basename($file);
  move_uploaded_file($_FILES['resume']['tmp_name'], $target);

  $conn->query("INSERT INTO applications (job_id, user_id, resume) 
                VALUES ($job_id, $user_id, '$file')");
  echo "Application submitted!";
}
?>
</body>
</html>
