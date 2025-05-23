<?php include '../includes/db.php'; session_start();
$job_id = $_GET['job_id'];
$applicants = $conn->query("SELECT a.*, u.name, u.email FROM applications a 
                            JOIN users u ON a.user_id = u.id 
                            WHERE a.job_id = $job_id");
?>
<!DOCTYPE html>
<html>
<head><title>Applicants</title></head>
<body>
<h2>Applicants for Job ID: <?= $job_id ?></h2>
<ul>
<?php while ($app = $applicants->fetch_assoc()) {
  echo "<li>{$app['name']} ({$app['email']}) - <a href='../uploads/resumes/{$app['resume']}'>View Resume</a></li>";
} ?>
</ul>
<a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
