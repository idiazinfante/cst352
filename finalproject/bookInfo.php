<?php
include '../sqlConnection.php';
$dbConn = getConnection("books");

function getBookInfo() {
    global $dbConn;
    
    $sql = "SELECT * 
            FROM `b_book` 
            WHERE bookId = "  . $_GET['bookId'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $record;

}

    $bookDisp = getBookInfo();
    echo json_encode($bookDisp);
    

?>
