<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}
$conn = new mysqli("localhost", "root", "", "Lab_5b");
$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<img src="https://www.uthm.edu.my/images/30_tahun_UTHM/Logo_Rasmi_Sambutan_30_Tahun_UTHM.png" alt="University Logo" style="width:150px; margin-bottom: 20px;">
<h2>Users List</h2>
<a href="logout.php">Logout</a>
<table border="1">
    <tr><th>Matric</th><th>Name</th><th>Access Level</th><th>Actions</th></tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['matric'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['accessLevel'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
