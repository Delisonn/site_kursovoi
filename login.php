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
session_start();
require "user.php";
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "television";

//Таблица MySql, в которой хранятся данные


//Создать соединение

$connection = mysqli_connect($hostname, $username, $password, $dbName) or die("Не могу создать соединение "); ?>

<form action="login.php" method="post">
    <div class="container" style="width: 25%; margin-top: 15%">
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal">Увійти</h1>
            <?if ($_POST['enter']) {
            if (getUserByLogin($_POST['login']) == null) {
                echo $_POST['login'];
                echo "<div class='row mb-3'>
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Користувача не існує!</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
            </div>"; } else if (password_verify($_POST['password'] . getUserByLogin($_POST['login'])->getSalt(), getUserByLogin($_POST['login'])->getPassword()) == false) {
                    echo "<div class='row mb-3'>
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Не вірний пароль!</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
            </div>";
//        echo getUserByLogin($_POST['login'])->getSalt();
                } else {
                    $_SESSION['auth'] = true;
                    $_SESSION['user'] = getUserByLogin($_POST['login']);
                    $_SESSION['id'] = getUserByLogin($_POST['login'])->getLogin();
                    header("location:index.php");
                }
            }?>
            <div class="form-floating" style="margin-bottom: 5%">
                <input type="text" class="form-control" id="floatingInput" placeholder="login" name="login">
                <label for="floatingInput">Логін</label>
            </div>
            <div class="form-floating" style="margin-bottom: 5%">
                <input type="password" class="form-control" id="floatingPassword" placeholder="password"
                       name="password">
                <label for="floatingPassword">Пароль</label>
            </div>
            <a href="registration.php">Не має аккаунту?</a>
            <input class="w-100 btn btn-lg btn-primary" type="submit" name="enter" value="Увійти"
               style="margin-top: 2%">
        </main>
    </div>
</form>
</body>
</html>