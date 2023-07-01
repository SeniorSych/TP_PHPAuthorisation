<?php
session_start();
require_once 'connect.php';

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$passConfirm = $_POST['passConfirm'];



if ($pass === $passConfirm)
{
//    $_FILES['avatar']['name']
$path = 'uploads/'.time().$_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../'.$path))
    {
        $_SESSION['message'] = 'Upload file error';
        header('Location: ../register.php');
    }
    else
    {
        $pass = md5($pass);

        try
        {
            $stmt->execute([$name, $username, $email, $pass, $path]);
        }
        catch (PDOException $e)
        {
            print $e->getMessage();
        }
        $_SESSION['message'] = 'Registration succeed';
        header('Location: ../index.php');
    }
}
else
{
    $_SESSION['message'] = 'Passwords are not same';
    header('Location: ../register.php');
}
