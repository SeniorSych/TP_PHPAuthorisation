<?php
session_start();

require_once 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$errorFields = [];

if ($username === '') {
    $errorFields[] = 'username';
}

if ($password === '') {
    $errorFields[] = 'password';
}

if (!empty ($errorFields)) {
    $flag = [
        'status' => false,
        'errorType' => 1,
        'message' => 'Check fields',
        'fields' => $errorFields
    ];
    echo json_encode($flag);
    die();
}

$password = md5($_POST['password']);

$userCheck = $db->query("SELECT * FROM users 
WHERE username = '$username' AND password = '$password'")->fetch();

if (is_array($userCheck))
{
    $_SESSION['user'] = [
        'id' => $userCheck['id'],
        'name' => $userCheck['fullname'],
        'avatar' => $userCheck['avatar'],
        'email' => $userCheck['email']
    ];

    $flag = [
        'status' => true
    ];

    echo json_encode($flag);
}
else
{
    $flag = [
        'status' => false,
        'errorType' => 1,
        'message' => 'Wrong login or password'
    ];
    echo json_encode($flag);
}























