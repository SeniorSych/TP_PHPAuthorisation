<?php
session_start();

require_once 'connect.php';

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passConfirm = $_POST['passConfirm'];

$errorFields = [];

if ($name === '') {
    $errorFields[] = 'name';
}

if ($username === '') {
    $errorFields[] = 'username';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorFields[] = 'email';
}

if ($password === '') {
    $errorFields[] = 'password';
}

if ($passConfirm === '') {
    $errorFields[] = 'passConfirm';
}

//if (empty($_FILES['avatar']['name'])) {
//    $errorFields[] = 'avatar';
//}

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

if ($password === $passConfirm)
{
//    $_FILES['avatar']['name']
$avatarPath = 'uploads/'.time().$_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../'.$avatarPath))
    {
        $flag = [
            'status' => false,
            'errorType' => 2,
            'message' => 'Check avatar',
        ];
        echo json_encode($flag);
    }
    else
    {
        $pass = md5($pass);

        try
        {
            $stmt->execute([$name, $username, $email, $password, $avatarPath]);
        }
        catch (PDOException $e)
        {
            print $e->getMessage();
        }
        $flag = [
            'status' => true,
            'message' => 'Registration succeed',
        ];
        echo json_encode($flag);
    }
}
else
{
    $flag = [
        'status' => false,
        'message' => 'Passwords are not same',
    ];
    echo json_encode($flag);
}
