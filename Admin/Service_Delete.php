<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hms";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM services WHERE id=$id";
    $connection->query($sql);
}

header("location:Service.php");
exit;
