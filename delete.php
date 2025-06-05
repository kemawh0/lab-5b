<!-- delete.php -->
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "Lab_5b");
$id = $_GET['id'];
$conn->query("DELETE FROM users WHERE id=$id");
header("Location: dashboard.php");
?>
