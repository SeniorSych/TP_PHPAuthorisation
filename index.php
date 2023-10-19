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
<div class="myform">
    <h4>Вход в профиль</h4>
    <div class="login">
        <form action="vendor/signin.php" method="post">

            <input type="text" name="username"  placeholder="Введите логин">

            <input type="password" name="pass"  placeholder="Введите пароль">
            <button type="submit" class="login-btn">Войти</button>
            <div class="reg">
                <p>
                    Нет аккаунта? - <a href="register.php">Регистрация</a>!
                </p>
            </div>
            <?php
            if ($_SESSION['message'] ?? '') {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?>
        </form>
    </div>
</div>
<script src="assets/js/jquery-3.7.0.slim.js">
<script src="assets/js/main.js">

</script>

</body>
</html>