<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$alias = $_POST['ALIAS'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=bjcoupon", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM $alias WHERE status = 0 ORDER BY regist ASC ");
    $stmt->execute();

    $data = $stmt->fetchAll();
    echo json_encode($data);
}
catch(PDOException $e)
{
    
}
?>