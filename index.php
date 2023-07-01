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
</head>
<body>
<!--Форма авторизации-->
<form action="vendor/singin.php" method="post">
    <label>Логин</label>
    <input type="text" name="username" required placeholder="Введите логин">
    <label>Пароль</label>
    <input type="password" name="pass" required placeholder="Введите пароль">
    <button>Войти</button>
    <p>
        Нет аккаунта? - <a href="register.php">Регистрация</a>!
    </p>
    <?php
    if ($_SESSION['message'] ?? '')
    {
        echo '<p class="msg">'.$_SESSION['message'].'</p>';
    }
    unset($_SESSION['message']);
    ?>
</form>


</body>
</html>