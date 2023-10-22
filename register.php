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
<!--Menu-->
<?php require 'vendor/menu.php' ?>
<!--Форма регистрации-->
<div class="myRegForm">
    <h4>Регистрация</h4>
    <form>
        <label for="">Имя</label>
        <input type="text" name="name" autocomplete="off" placeholder="Введите своё имя">
        <label for="">Логин</label>
        <input type="text" name="username" autocomplete="off" placeholder="Введите свой логин">
        <label for="">Почта</label>
        <input type="email" name="email" autocomplete="off" placeholder="Введите свою почту">
        <label for="">Аватар</label>
        <input type="file" placeholder="asdasdasd" name="avatar">
        <label for="">Пароль</label>
        <input type="password" name="password" autocomplete="off" placeholder="Введите свой пароль">
        <label for="">Подтвердите пароль</label>
        <input type="password" name="passConfirm" autocomplete="off" placeholder="Подтвердите пароль">
        <button type="submit" class="reg-btn">Зарегестрироваться</button>
        <div class="reg-log">
        <p>
            Есть аккаунт? - <a href="index.php">Авторизуйтесь</a>!
        </p>
        </div>
        <p class="msg none">'Lorem ipsum2'</p>';
    </form>
</div>
<?php require 'vendor/footer.php' ?>