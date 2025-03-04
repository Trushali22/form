<form action="insert.php" method="post">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Phone: <input type="text" name="phone" required><br>
    <input type="submit" name="submit" value="Insert">
</form>
<?php
include 'db.php';
$result = $conn->query("SELECT * FROM employees");
echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Action</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone']}</td>
            <td>
                <a href='edit.php?id={$row['id']}'>Edit</a> |
                <a href='delete.php?id={$row['id']}'>Delete</a>
            </td>
          </tr>";
}
echo "</table>";
?>