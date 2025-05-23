<?php
include 'includes/db.php';

echo "<h3>Connected to DB: $db</h3>";

$result = $conn->query("SHOW COLUMNS FROM users");
if ($result) {
    echo "<h4>Columns in 'users' table:</h4><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['Field'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Query failed: " . $conn->error;
}
?>
