<?php
session_start();

if ($_SESSION['user'] ?? '')
{
    header('Location: profile.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php require 'vendor/menu.php' ?>
<!--Форма авторизации-->
<div class="myLoginForm">
    <h4>Вход в профиль</h4>
        <form>
            <input  type="text" name="username" autocomplete="off" placeholder="Введите логин">
            <input  type="password" name="password" autocomplete="off" placeholder="Введите пароль">
            <button type="submit" class="login-btn">Войти</button>
            <div class="reg-log">
                <p>
                    Нет аккаунта? - <a href="register.php">Регистрация</a>!
                </p>
            </div>
            <p class="msg none">Lorem ipsum</p>
        </form>
</div>
<?php  require 'vendor/footer.php' ?>