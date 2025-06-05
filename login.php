<!-- login.php -->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>Login</h2>
<form action="login.php" method="POST">
    Matric: <input type="text" name="matric" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" name="login" value="Login">
</form>
<a href="register.php">Register Here</a>

<?php
if (isset($_POST['login'])) {
    $conn = new mysqli("localhost", "root", "", "Lab_5b");
    $matric = $_POST['matric'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE matric='$matric'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['matric'] = $user['matric'];
            $_SESSION['accessLevel'] = $user['accessLevel'];
            header("Location: dashboard.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Matric not found.";
    }
}
?>
</body>
</html>
