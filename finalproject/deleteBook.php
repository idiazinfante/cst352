<?php
session_start();

if (!isset($_SESSION['adminName'])) { //validates whether the admin has logged in
    
    header("Location: login.php");
    
}

include '../sqlConnection.php';
$dbConn = getConnection("books");

$sql = "DELETE FROM b_book WHERE book = " . $_GET['book'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();

header("Location: index.php");

?>