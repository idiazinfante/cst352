<?php
session_start();

include '../sqlConnection.php';
$dbConn = getConnection("books");

function displayAllBooks(){
    global $dbConn;
    
    $sql = "SELECT bookId, title, author, genre, synopsis 
            FROM b_book 
            ORDER BY title";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    foreach ($books as $book) {

        //echo "  <input type='hidden' name='seriesNum' value='".$book['seriesNum']."' >";
        echo "<a onclick='openModal()' target='bookModal'   href='bookInfo.php?bookId=".$book['bookId']."'> " . $book['title'] . "<br></a>  " . $book['author'] . "<br>  ";
        echo $book['synopsis'] . "<br><br>";
        echo "<button value =" . $book['bookId'] . ">Add to favorites </button><br><br>";
        
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
            
    </style>
    <body>
        
        <?php
    include "header.php";
    ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Book Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe name="bookModal" width='450'height='200'></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 <?=displayAllBooks()?>
 
 <div id="faveLink" style="display:none">
     <a href="fave.php"> Display fave</a>
 </div>
 
 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $("button").click(function() {
        //alert($(this).val());
        $.ajax({
        
        type: "GET",
        url: "addFavorite.php",
        dataType: "json",
        data: { "bookId":$(this).val() },
        success: function(data,status) {
        alert(data);
        
        },
        complete: function(data,status) { //optional, used for debugging purposes
        //alert(data);
        }
        
        });//ajax
    })
</script>
 
 
<hr>
    </body>
    <?php
    include "footer.php";
    ?>
</html>