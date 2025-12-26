<?php
session_start();
require_once "../class/User.php";

$user = new User();

$username = $_POST['username'];
$password = $_POST['password'];

$result = $user->login($username, $password);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];

    if ($data['level'] == 0) {
        header("Location: ../admin.php");
    } else {
        header("Location: ../user.php");
    }
} else {
    echo "Login gagal";
}
?>