<!doctype html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script.js"></script>

    <title>Document</title>
</head>
<body class="text-center">


<?php

function generateSalt($length = null)
{
    $salt = "";
    if ($length == null) $length = 20;
    for ($i = 0; $i < $length; $i++) {
        $salt .= chr(mt_rand(33, 126));
    }
    return $salt;
}

session_start();
require "user.php";

$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "television";

//Таблица MySql, в которой хранятся данные

$usertable = "users";

$errorMessage = "";
$successMessage = "";

//Создать соединение

$connection = mysqli_connect($hostname, $username, $password, $dbName) or die("Не могу создать соединение ");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$login = $_POST['login'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat_password'];
$email = $_POST['email'];
do {
    if (empty($login) || empty($password) || empty($repeat_password) || empty($email)) {
        $errorMessage = "Не всі поля були заповнені";
        break;
    }

    if ($password != $repeat_password) {
        echo "Паролі не співпадають!";
    } else {
        $salt = generateSalt(20);
        $password = password_hash($_POST['password'] . $salt, PASSWORD_DEFAULT);
        $sql = "insert into $usertable values(null, '$login', '$email', '$password', '$salt', 0)";
        $result = mysqli_query($connection, $sql);

        $successMessage = "Ви зареєструвалися";
        header("Location:login.php");
    }
}while (false) ;



}
    session_destroy();
?>

<div class="container" style="width: 25%; margin-top: 10%">
    <form action="registration.php" method="post">
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal">Реєстрація</h1>

            <? if (!empty($errorMessage)) {
                echo "
            <div class='row mb-3'>
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
            </div>
            ";
            }
            ?>

            <div class="form-floating" style="margin-bottom: 5%">
                <input type="text" class="form-control" id="floatingInput" placeholder="name" name="login">
                <label for="floatingInput">Логін</label>
            </div>

            <div class="form-floating" style="margin-bottom: 5%">
                <input type="email" class="form-control" id="floatingInput" placeholder="name" name="email">
                <label for="floatingInput">Електронна почта</label>
            </div>

            <div class="form-floating" style="margin-bottom: 5%">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                       name="password">
                <label for="floatingPassword">Пароль</label>
            </div>

            <div class="form-floating" style="margin-bottom: 5%">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                       name="repeat_password">
                <label for="floatingPassword">Підтвердіть пароль</label>
            </div>

            <a href="login.php">Вже є аккаунт?</a>

            <input class="w-100 btn btn-lg btn-primary" type="submit" name="reg" value="Зареєструватися"
                   style="margin-top: 2%">

            <?
            if (!empty($successMessage)) {
                echo "
                    <div class='row mb-3'>
               
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                 
                    </div>
                    ";
            }
            ?>
        </main>
    </form>
</div>
</body>
</html>