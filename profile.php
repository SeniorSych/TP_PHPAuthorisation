<?php
session_start();

if (!$_SESSION['user'])
{
    header('Location: index.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php require 'vendor/menu.php' ?>
<!--Профиль-->
<form style="text-align: center;">
    <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
    <h2 style="margin: 10px 0;"><?= $_SESSION['user']['name'] ?></h2>
    <a href="#"><?= $_SESSION['user']['email'] ?></a>
    <a href="vendor/logout.php" class="logout">Logout</a>
</form>


</body>
</html>