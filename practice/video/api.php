<?php
    session_start();
    include 'sqlConnection.php';
    $dbConn = getConnection("rating");

    function insertRating(){
        global $dbConn;
        if (isset($_GET['rating'])) {  //checks whether the form has been submitted
            //if(isset($_GET[])){
           
                $sql = "INSERT INTO userRating (rating) 
                               VALUES (". $_GET['rating'] .");";
                
                $stmt = $dbConn->prepare($sql);                 
                $stmt->execute(); //This will insert the record!
           // }
        }
    
    }
    
    insertRating();
    
    function getRating(){
        global $dbConn;
        
        $sql = "SELECT AVG(rating)
                  FROM userRating ";

        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $rating = $stmt->fetch(PDO::FETCH_ASSOC); 
        
        return $rating;
    }

    $ratings = getRating();
    
   
   // print_r($petDisp);
   
   //DO NOT DISPLAY ANYTHING OTHER THAN JSON FORMAT IN WEB APIS
    
    echo json_encode($rating);
?>
