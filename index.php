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
    <title>Головна</title>
</head>
<body>

<?php
session_start();
require 'user.php';
// Переменные БД

$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "television";

//Таблица MySql, в которой хранятся данные

$usertable = "tariffs";
$connection = mysqli_connect($hostname, $username, $password, $dbName) or die("Не могу создать соединение ");

$query = "SELECT * FROM tariffs";


$result = mysqli_query($connection, $query) or die(mysql_error());



//if ($_SESSION['auth'] === false): header("Location:login.php"); endif;
?>


<nav class="navbar navbar-expand-lg bg-light">

    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">Головна</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="tariffs/tariffs.php">Тарифи</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="fare_terms/fare_terms.php">Умови тарифів</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="client/client.php">Клієнти</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="contracts/contracts.php">Контракти</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="employee/employee.php">Працівники</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="payment/payment.php">Оплата</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="subscription_fee/subscription_fee.php">Підписка</a>
            </div>
            <div class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Кінцеві запити
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="result/first_request.php">Клієнти, які не сплатили абонплату</a></li>
                        <li><a class="dropdown-item" href="result/second_request.php">Тарифи за адресою</a></li>
                        <li><a class="dropdown-item" href="result/third_request.php">Олата за вказаною адресою</a></li>
                        <li><a class="dropdown-item" href="result/four_request.php">Підсумкові суми оплати</a></li>
                        <li><a class="dropdown-item" href="result/five_request.php">Борги з початку року</a></li>
                    </ul>
                </li>
            </div>
        </div>



            <? if ($_SESSION['auth'] == true): ?>
                <a href="logout.php" type="button" class="btn btn-primary" style="margin-left: 20%">Вийти</a>
            <? endif; ?>
            <? if ($_SESSION['auth'] == false): ?>
                <a href="login.php" type="button" class="btn btn-primary" style="margin-left: 20%">Увійти</a>
            <? endif; ?>
    </div>
</nav>
<div class="container">
    <div class="text-block"><h1>Казанцев ТБ</h1></div>
    <div class="container">


<div class="text-block"><h2>Понад 40 каналів</h2></div>
<div class="row row-cols-1 row-cols-md-6 g-4">
    <div class="col">
        <div class="card rounded-5">
            <img src="./img/1+1-HD.png" class="card-img-top rounded-5 width_two" alt="...">
        </div>
    </div>
    <div class="col ">
        <div class="card rounded-5">
            <img src="./img/Noviy-kanal.png" class="card-img-top rounded-5 width_two" alt="...">
        </div>
    </div>
    <div class="col">
        <div class="card rounded-5">
            <img src="./img/ViP_Megahit_HD.png" class="card-img-top rounded-5 width_two" alt="...">
        </div>
    </div>
    <div class="col">
        <div class="card  rounded-5">
            <img src="./img/tv-action.png" class="card-img-top rounded-5 width_two" alt="...">
        </div>
    </div>
    <div class="col">
        <div class="card rounded-5">
            <img src="./img/History_HD.png" class="card-img-top rounded-5 width_two" alt="...">
        </div>
    </div>
    <div class="col">
        <div class="card rounded-5">
            <img src="./img/Epic_Drama_HD.png" class="card-img-top rounded-5 width_two" alt="...">
        </div>
    </div>
    <div class="col">
        <div class="card rounded-5">
            <img src="./img/nick-junior.png" class="card-img-top rounded-5 width_two" alt="...">
        </div>
    </div>
    <div class="col">
        <div class="card rounded-5">
            <img src="./img/Eurosport.png" class="card-img-top rounded-5 width_two" alt="...">
        </div>
    </div>
    <div class="col">
        <div class="card rounded-5">
            <img src="./img/Discovery_Channel.png" class="card-img-top rounded-5 width_two" alt="...">
        </div>
    </div>
    <div class="col">
        <div class="card rounded-5">
            <img src="./img/viasat-explore.png" class="card-img-top rounded-5 width_two" alt="...">
        </div>
    </div>
    <div class="col">
        <div class="card rounded-5">
            <img src="./img/Setanta_Sports_plus_HD.png" class="card-img-top rounded-5 width_two" alt="...">
        </div>
    </div>
    <div class="col">
        <div class="card rounded-5">
            <img src="./img/FOX.png" class="card-img-top rounded-5 width_two" alt="...">
        </div>
    </div>
</div>
<div class="text-block_two"><h2>Фільми та серіали на ваш смак</h2></div>
<div class="text-block_three">Разом із телеканалами вам доступна відеобібліотека фільмів і серіалів, що постійно
    оновлюється.
</div>

<div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner width_three">
        <div class="carousel-item active" role="listbox">
            <div class="card card_carousel" style="width: 18rem; border: 0">
                <img class="d-block col-3 img_carousel"
                     src="./img/films/The_Hobbit_poster_2x_c5146b8c90.png">
                <div class="card-body">
                    <p class="card-text card_text">Хоббіт: Несподівана подорож</p>
                </div>
            </div>
            <div class="card card_carousel" style="width: 18rem; border: 0">
                <img class="d-block col-3 img_carousel " src="./img/films/sonik_2x_06038c2d82.png">
                <div class="card-body">
                    <p class="card-text card_text">Їжак Сонік</p>
                </div>
            </div>
            <div class="card card_carousel" style="width: 18rem; border: 0">
                <img class="d-block col-3 img_carousel width_two" src="./img/films/fabrika_2x_717d492fa1.png">
                <div class="card-body">
                    <p class="card-text card_text">Фабрика снів</p>
                </div>
            </div>

            <div class="card card_carousel" style="width: 18rem; border: 0">
                <img class="d-block col-3 img_carousel" src="./img/films/spy_2x_bf2e9eab59.png">
                <div class="card-body">
                    <p class="card-text card_text">Мій шпигун</div>
            </div>
        </div>
        <div class="carousel-item" role="listbox">
            <div class="card card_carousel" style="width: 18rem; border: 0">
                <img class="d-block col-3 img_carousel" src="./img/films/easy_2x_3e43954fcc.png">
                <div class="card-body">
                    <p class="card-text card_text">Просто послуга</p>
                </div>
            </div>
            <div class="card card_carousel" style="width: 18rem; border: 0">
                <img class="d-block col-3 img_carousel"
                     src="./img/films/Miss_Sloane_poster_2x_869d99ac38.png">
                <div class="card-body">
                    <p class="card-text card_text">Небезпечка гра Слоун</p>
                </div>
            </div>
            <div class="card card_carousel" style="width: 18rem; border: 0">
                <img class="d-block col-3 img_carousel" src="./img/films/paw_2x_e7e7c0a2b1.png">
                <div class="card-body">
                    <p class="card-text card_text">Щенячий патруль</p>
                </div>
            </div>
            <div class="card card_carousel" style="width: 18rem; border: 0">
                <img class="d-block col-3 img_carousel" src="./img/films/angelfall_2x_d4b5db580c.png">
                <div class="card-body">
                    <p class="card-text card_text">Паддіня янгола</p>
                </div>
            </div>
        </div>
        <div class="carousel-item" role="listbox">
            <div class="card card_carousel" style="width: 18rem; border: 0">
                <img class="d-block col-3 img_carousel" src="./img/films/Rok_Dog_2x_1550c98856.png">
                <div class="card-body">
                    <p class="card-text card_text">Рок Дог 2</p>
                </div>
            </div>
            <div class="card card_carousel" style="width: 18rem; border: 0">
                <img class="d-block col-3 img_carousel" src="./img/films/the_protege_poster_2x_c59e5c18dd.png">
                <div class="card-body">
                    <p class="card-text card_text">Кодекс кілера</p>
                </div>
            </div>
            <div class="card card_carousel" style="width: 18rem; border: 0">
                <img class="d-block col-3 img_carousel" src="./img/films/svit_2x_22ad699a8a.png">
                <div class="card-body">
                    <p class="card-text card_text">Світ навиворіт</p>
                </div>
            </div>
            <div class="card card_carousel" style="width: 18rem; border: 0">
                <img class="d-block col-3 img_carousel" src="./img/films/golos_2x_a70679d740.png">
                <div class="card-body">
                    <p class="card-text card_text">Голос країни</p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Предыдущий</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Следующий</span>
    </button>
</div>
</div>
</body>
</html>