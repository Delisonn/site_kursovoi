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

    <title>Перегляд оплат</title>
</head>
<body>
<?php
session_start();
require '../user.php';
// Переменные БД

$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "television";

//Таблица MySql, в которой хранятся данные
$connection = mysqli_connect($hostname, $username, $password, $dbName) or die("Не могу создать соединение ");

$query = "SELECT * FROM payment INNER JOIN contracts ON contract_id = id_contract INNER JOIN client ON id_client = client_id WHERE client_id";

$user = getUserByLogin($_SESSION['id']);

$result = mysqli_query($connection, $query) or die("Не вдалося встановити з'єднання");

?>
<nav class="navbar navbar-expand-lg bg-light">

    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Головна</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="../tariffs/tariffs.php">Тарифи</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="../fare_terms/fare_terms.php">Умови тарифів</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="../client/client.php">Клієнти</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="../contracts/contracts.php">Контракти</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="../employee/employee.php">Працівники</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="payment.php">Оплата</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="../subscription_fee/subscription_fee.php">Підписка</a>
            </div>
            <div class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Кінцеві запити
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../result/first_request.php">Клієнти, які не сплатили абонплату</a></li>
                        <li><a class="dropdown-item" href="../result/second_request.php">Тарифи за адресою</a></li>
                        <li><a class="dropdown-item" href="../result/third_request.php">Олата за вказаною адресою</a></li>
                        <li><a class="dropdown-item" href="../result/four_request.php">Підсумкові суми оплати</a></li>
                        <li><a class="dropdown-item" href="../result/five_request.php">Борги з початку року</a></li>
                    </ul>
                </li>
            </div>
        </div>

        <? if ($_SESSION['auth'] == true): ?>
            <a href="../logout.php" type="button" class="btn btn-primary" style="margin-left: 20%">Вийти</a>
        <? endif; ?>
        <? if ($_SESSION['auth'] == false): ?>
            <a href="../login.php" type="button" class="btn btn-primary" style="margin-left: 20%">Увійти</a>
        <? endif; ?>

    </div>
</nav>
<form method="post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                <? if($_SESSION['auth'] && $user->getAccessLevel() >= 0) {
                    echo '
                    <h2 class="pull-left">Додати оплату</h2>
                    <a href="add_payment.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Додати оплату</a>
                </div>';} ?>
                <?php
                if ($result = mysqli_query($connection, $query)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table class='table table-bordered table-striped'>
                                <thead>
                                <tr>
                                <th>ПІБ</th>
                                <th>Внесені кошти</th>
                                <th>Дата оплати</th> "; ?>
                        <? if ($_SESSION['auth'] && $user->getAccessLevel() >0) {
                            echo "<th>Керування</th>";} ?> <?
                        echo "</tr>
                               </thead>
                               <tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>$row[fio]</td>
                                    <td>$row[contributed_money]</td>
                                    <td>$row[payment_date]</td>
                                   "; ?>
                                    <? if ($_SESSION['auth'] && $user->getAccessLevel() >0) {
                                    echo "<td> <a href='refactor_payment.php?id=$row[id_payment]' class='mr-3' title='Оновити тариф' data-toggle='tooltip' ><span class='fa fa-pencil'></span></button>
                                    <a href='delete.php?id=$row[id_payment]' title='Видалити тариф' data-toggle='tooltip'><span class='fa fa-trash'></span></a></td> "; }?>
                                    <?
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($result);
                    } else {
                        echo '<div class="alert alert-danger"><em>Нічого не знайдено</em></div>';
                    }
                } else {
                    echo "Щось пішло не так, спробуйте пізніше...";
                }

                ?>
            </div>
        </div>

</form>
</body>
</html>