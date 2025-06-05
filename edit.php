<!-- edit.php -->
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "Lab_5b");

$id = $_GET['id'];
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $accessLevel = $_POST['accessLevel'];
    $conn->query("UPDATE users SET name='$name', accessLevel='$accessLevel' WHERE id=$id");
    header("Location: dashboard.php");
}

$result = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
?>

<h2>Edit User</h2>
<form method="POST">
    Name: <input type="text" name="name" value="<?= $result['name'] ?>"><br>
    Access Level: 
    <select name="accessLevel">
        <option value="admin" <?= $result['accessLevel'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        <option value="user" <?= $result['accessLevel'] == 'user' ? 'selected' : '' ?>>User</option>
    </select><br>
    <input type="submit" name="update" value="Update">
</form>
