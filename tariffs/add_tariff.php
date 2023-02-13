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

    <title>Додати тарифів</title>
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

$name = "";
$cost = "";
$errorMessage = "";
$successMessage = "";

$fare_term = mysqli_query($connection,"SELECT * FROM fare_terms;");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name_tariff'];
    $cost = $_POST['cost'];


    do {
        if (empty($name) || empty($cost)) {
            $errorMessage = "Не всі поля були заповнені";
            break;
        }

        //Додавання нових тарифів до БД
        $add_tariff = "INSERT INTO tariffs VALUES(null, '$name', $cost, {$_POST['fare_term']})";
        mysqli_query($connection, $add_tariff);

        $name = "";
        $cost = "";

        $successMessage = "Ви успішно додали тариф";
        header("location: tariffs.php");
    } while (false);
}
?>
<form method="post" enctype="multipart/form-data">
    <div class="container" style="width: 25%; margin-top: 15%">
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal">Додати тариф</h1>
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
                <input type="text" class="form-control" id="floatingInput" placeholder="name_tariff" name="name_tariff">
                <label for="floatingInput">Назва тарифу</label>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Умови</label>
                <select class="form-select" name="fare_term">
                    <? while ($row = mysqli_fetch_array($fare_term)) : ?>
                        <option value="<? echo $row['id_fare_terms'] ?>">
                            <? echo $row['fare_term_tariff'] ?>
                        </option>
                    <? endwhile; ?>
                </select>
            </div>

            <div class="form-floating" style="margin-bottom: 5%">
                <input type="number" class="form-control" id="floatingPassword" placeholder="cost"
                       name="cost" value="cost">
                <label for="floatingPassword">Ціна</label>
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