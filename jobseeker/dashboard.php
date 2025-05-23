<?php include '../includes/db.php'; session_start();
$uid = $_SESSION['user']['id'];
$apps = $conn->query("SELECT a.*, j.title FROM applications a JOIN jobs j ON a.job_id = j.id WHERE a.user_id = $uid");
?>
<!DOCTYPE html>
<html>
<head><title>Jobseeker Dashboard</title></head>
<body>
<h2>Applied Jobs</h2>
<ul>
<?php while ($app = $apps->fetch_assoc()) {
  echo "<li>{$app['title']} - Applied on {$app['applied_at']}</li>";
} ?>
</ul>
<a href="../view_jobs.php">Browse Jobs</a> | <a href="../logout.php">Logout</a>
</body>
</html>
