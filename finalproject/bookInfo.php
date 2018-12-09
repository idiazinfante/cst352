<?php
session_start();

if (!isset($_SESSION['adminName'])) {
    
    header("Location: login.php");
    
}

include '../sqlConnection.php';
$dbConn = getConnection("books");

function getBookInfo() {
    global $dbConn;
    
    $sql = "SELECT * FROM `b_book` WHERE bookId = "  . $_GET['bookId'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $record;

}

if (isset($_GET['bookId'])) {
    
  $bookInfo = getBookInfo();
  
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <img src="<?=$bookInfo['picture']?>" height="100" />
        <h3><i>  <?=$bookInfo['genre']?></i></h3>
        <h2><?=$bookInfo['author']?></h2>
        <?=$bookInfo['bio']?><br>
        

    </body>
</html>