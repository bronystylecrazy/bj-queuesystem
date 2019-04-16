<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$alias = $_POST['ALIAS'];
$dataID = $_POST['ID'];
$DO = $_POST['DO'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=bjcoupon", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $storedID = $dataID - (1 - $DO);
    $stmt = $conn->prepare("UPDATE $alias SET status = $DO WHERE ID = $storedID ");
    $stmt->execute();
    echo "UPDATE $alias SET status = $DO WHERE ID = $storedID ";
}
catch(PDOException $e)
{
    echo $e;
}
?>