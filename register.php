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
<!--Форма регистрации-->
<form action="vendor/signup.php" method="post" enctype="multipart/form-data">
    <label for="">Имя</label>
    <input type="text" name="name" required placeholder="Введите своё имя">
    <label for="">Логин</label>
    <input type="text" name="username" required placeholder="Введите свой логин">
    <label for="">Почта</label>
    <input type="email" name="email" required placeholder="Введите свою почту">
    <label for="">Аватар</label>
    <input type="file" name="avatar" required>
    <label for="">Пароль</label>
    <input type="password" name="pass" required placeholder="Введите свой пароль">
    <label for="">Подтвердите пароль</label>
    <input type="password" name="passConfirm" required placeholder="Подтвердите пароль">
    <button>Зарегестритроваться</button>
    <p>
        Уже есть аккаунт? - <a href="index.php">Авторизуйтесь</a>!
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