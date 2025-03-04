<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM employees WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php"); // Redirect to index.php
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>
