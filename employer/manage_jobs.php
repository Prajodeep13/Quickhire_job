<?php
include '../includes/db.php';
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employer') {
    header("Location: ../login.php");
    exit();
}

$employer_id = $_SESSION['user']['id'];

// Delete job if requested
if (isset($_GET['delete'])) {
    $job_id = (int)$_GET['delete'];
    $conn->query("DELETE FROM jobs WHERE id = $job_id AND employer_id = $employer_id");
    header("Location: manage_jobs.php");
    exit();
}

// Fetch jobs posted by this employer
$result = $conn->query("SELECT * FROM jobs WHERE employer_id = $employer_id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Jobs - QuickHire</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<?php include '../includes/header.php'; ?>
<h2>Manage Your Posted Jobs</h2>

<?php if ($result->num_rows > 0): ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>Job Title</th>
            <th>Location</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php while ($job = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($job['title']) ?></td>
                <td><?= htmlspecialchars($job['location']) ?></td>
                <td><?= htmlspecialchars(substr($job['description'], 0, 50)) ?>...</td>
                <td>
                    <a href="edit_job.php?id=<?= $job['id'] ?>">Edit</a> |
                    <a href="manage_jobs.php?delete=<?= $job['id'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>You haven’t posted any jobs yet. <a href="dashboard.php">Go back</a> and post one now.</p>
<?php endif; ?>

<?php include '../includes/footer.php'; ?>
</body>
</html>
