<?php
session_start();

include '../sqlConnection.php';
$dbConn = getConnection("books");

function displayDescOrderBooks(){
    global $dbConn;
     
 //highest to lowest
 
 $sql = "SELECT title, picture, author, avrating, synopsis 
        FROM `b_book` 
        ORDER BY avrating DESC";
        
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    echo "<br><h2>Highest to Lowest Rated</h2><br><br>";
    
    foreach ($books as $book) {

        echo "<b>".$book['title'] . "</b> <br>";
        echo "<img src=" . $book['picture']." width ='150px' height='200px'/><br>";
        echo "<b>".$book['author'] . "</b> <br>";
        echo "<b><span style='color:red;font-weight:bold'>Average Rating: ".$book['avrating'] . "</span></b> <br>";
        echo $book['synopsis'] . "<br><br><br><hr>";
        
        }
}

?>
    <!DOCTYPE html>
<html>
    <head>
        <title> Online Library </title>
         
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        
    </head>
    <style>
            body{
                color: white;
                text-align: center;
                color: black;
                background:#caefff;
                }
            h1{
                text-align: center;
            }
             #carouselExampleIndicators{
                width: 400px;
                margin: auto;
            }
            .center{
                  margin: auto;
                  width: 50%;
                  padding: 10px;
            }
    </style>
    <script>
        function openModal() {
                    
                    $('#myModal').modal("show");
                    
                }
    </script>
    <body>
        
        <?php
    include "header.php";
    ?>

<hr>
  <h3>Order from:<br></h3>
  
 <form action="orderAscBook.php" method="GET">
  <input type="submit" class="btn btn-warning" value="Lowest to Highest">
</form>
<br>
 <form action="orderDescBook.php" method="GET">
    
  <input type="submit" class="btn btn-warning" value="Highest to Lowest">
</form>

<hr>

<div class="center">
  <?=displayDescOrderBooks()?>  
</div>

<hr>
    </body>
    <?php
    include "footer.php";
    ?>
</html>