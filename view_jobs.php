<?php include 'includes/db.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>Available Jobs</title></head>
<body>
<h2>Available Jobs</h2>
<ul>
<?php
$jobs = $conn->query("SELECT j.*, u.name as employer FROM jobs j JOIN users u ON j.employer_id = u.id ORDER BY j.created_at DESC");
while ($job = $jobs->fetch_assoc()) {
  echo "<li><b>{$job['title']}</b> at {$job['employer']} in {$job['location']} 
        - <a href='apply_job.php?job_id={$job['id']}'>Apply</a></li>";
}
?>
</ul>
</body>
</html>
