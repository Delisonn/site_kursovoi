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
    $sql_one = "DELETE FROM client WHERE id_client=$id";
    if($connection->query($sql_one)){
    header("location: client.php");
} else {
    header("location: ../tariffs/tariffs.php");
}
?>