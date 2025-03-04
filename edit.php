<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM employees WHERE id = $id");
$row = $result->fetch_assoc();
?>

<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
    Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br>
    <input type="submit" name="update" value="Update">
</form>