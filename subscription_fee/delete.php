<?php

if (!$_SESSION['auth']) {
    header("Location: ../index.php");
}

if(isset($_GET['id']) ) {
    $id = $_GET['id'];

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "television";

    $connection = mysqli_connect($hostname, $username, $password, $dbName) or die("Не могу создать соединение ");
}
    $sql_one = "DELETE FROM subscription_fee WHERE id_subscription=$id";
    if($connection->query($sql_one)){
        header("location: subscription_fee.php");
    } else {
        header("location: ../contracts/contracts.php");
    }
?>