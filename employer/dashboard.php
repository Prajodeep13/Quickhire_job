<?php include '../includes/db.php'; session_start();
if ($_SESSION['user']['role'] != 'employer') die("Unauthorized");
$eid = $_SESSION['user']['id'];
$jobs = $conn->query("SELECT * FROM jobs WHERE employer_id = $eid");
?>
<!DOCTYPE html>
<html>
<head><title>Employer Dashboard</title></head>
<body>
<h2>My Jobs</h2>
<ul>
<?php while ($job = $jobs->fetch_assoc()) {
  echo "<li>{$job['title']} - <a href='view_applicants.php?job_id={$job['id']}'>View Applicants</a></li>";
} ?>
</ul>
<a href="../post_job.php">Post New Job</a> | <a href="../logout.php">Logout</a>
</body>
</html>
