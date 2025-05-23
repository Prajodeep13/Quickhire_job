<?php include '../includes/db.php'; session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'jobseeker') die("Unauthorized");

$user_id = $_SESSION['user']['id'];
$apps = $conn->query("SELECT j.title, j.location, a.applied_at 
                      FROM applications a 
                      JOIN jobs j ON a.job_id = j.id 
                      WHERE a.user_id = $user_id");
?>
<!DOCTYPE html>
<html>
<head><title>My Applied Jobs</title></head>
<body>
<h2>Jobs You've Applied To</h2>
<ul>
<?php while ($row = $apps->fetch_assoc()): ?>
  <li><?= $row['title'] ?> in <?= $row['location'] ?> (Applied on <?= $row['applied_at'] ?>)</li>
<?php endwhile; ?>
</ul>
<a href="dashboard.php">Back</a>
</body>
</html>
