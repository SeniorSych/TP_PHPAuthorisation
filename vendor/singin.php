<?php
session_start();
require_once 'connect.php';

$username = $_POST['username'];
$pass = md5($_POST['pass']);

$userCheck = $db->query("SELECT * FROM users 
WHERE username = '$username' AND password = '$pass'")->fetch();
if (is_array($userCheck))
{
    $_SESSION['user'] = [
        'id' => $userCheck['id'],
        'name' => $userCheck['fullname'],
        'avatar' => $userCheck['avatar'],
        'email' => $userCheck['email']
    ];
    header('Location: ../profile.php');
}
else
{
    $_SESSION['message'] = 'Wrong login or password';
    header('Location: ../index.php');
}























