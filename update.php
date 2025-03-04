<?php
include 'db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE employees SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php"); // Redirect to index.php
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>