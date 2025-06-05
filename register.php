<!-- register.php -->
<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
<h2>Register User</h2>
<form action="register.php" method="POST">
    Matric: <input type="text" name="matric" required><br>
    Name: <input type="text" name="name" required><br>
    Password: <input type="password" name="password" required><br>
    Access Level: 
    <select name="accessLevel">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select><br>
    <input type="submit" name="submit" value="Register">
</form>

<?php
if (isset($_POST['submit'])) {
    $conn = new mysqli("localhost", "root", "", "Lab_5b");
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $accessLevel = $_POST['accessLevel'];

    $sql = "INSERT INTO users (matric, name, password, accessLevel) VALUES ('$matric', '$name', '$password', '$accessLevel')";
    if ($conn->query($sql)) {
        echo "User registered.";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}
?>
</body>
</html>
