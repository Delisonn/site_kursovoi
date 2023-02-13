<!doctype html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../style.css">
    <script type="text/javascript" src="script.js"></script>

    <title>Додати оплату</title>
</head>
<body>
<?php
session_start();
require '../user.php';
// Переменные БД

if (!$_SESSION['auth']) {
    header("Location: ../index.php");
}

$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "television";

//Таблица MySql, в которой хранятся данные
$connection = mysqli_connect($hostname, $username, $password, $dbName) or die("Не могу создать соединение ");

$clients = "";
$cost = "";



$errorMessage = "";
$successMessage = "";

$client = mysqli_query($connection,"SELECT * FROM client");



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $clients = $_POST['client'];
    $cost = $_POST['cost'];



    do {
        if (empty($clients) || empty($cost)) {
            $errorMessage = "Не всі поля були заповнені";
            break;
        }

        //Додавання нових тарифів до БД
        $add_tariff = "INSERT INTO payment VALUES(null, $cost, NOW(), $clients)";
        mysqli_query($connection, $add_tariff);

        $clients = "";
        $cost = "";


        $successMessage = "Ви успішно додали клієнта";
        header("location: payment.php");
    } while (false);
}
?>
<form method="post" enctype="multipart/form-data">
    <div class="container" style="width: 25%; margin-top: 15%">
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal">Додати оплату</h1>
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
                <input type="number" class="form-control" id="floatingPassword" placeholder="cost"
                       name="cost" value="cost">
                <label for="floatingPassword">Ціна</label>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Клієнти</label>
                <select class="form-select" name="client">
                    <? while ($row = mysqli_fetch_array($client)) : ?>
                        <option value="<? echo $row['id_client'] ?>">
                            <? echo $row['fio'] ?>
                        </option>
                    <? endwhile; ?>
                </select>
            </div>

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

            <button class="w-100 btn btn-lg btn-primary" type="submit"
                    style="margin-top: 2%">Додати
            </button>
        </main>
    </div>
</form>
</body>
</html>