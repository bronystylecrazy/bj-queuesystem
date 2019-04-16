<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$alias = $_POST['ALIAS'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=bjcoupon", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("DELETE FROM $alias WHERE 1; ALTER TABLE $alias AUTO_INCREMENT = 1");
    $stmt->execute();
}
catch(PDOException $e)
{
    echo $e;
}
?>