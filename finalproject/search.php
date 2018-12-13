<?php
session_start();

include '../sqlConnection.php';
$dbConn = getConnection("books");

function searchBook() {
      global $dbConn;
    
    $sql = "SELECT bookId, title, avrating, author, genre, synopsis, picture 
            FROM `b_book` 
            WHERE title LIKE '%".$_GET['searchInput']."%'
            OR author LIKE '%".$_GET['searchInput']."%'";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(empty($books)) {
        echo "Empty Search Results";
    }
    foreach ($books as $book) {

        echo "<br>";
        echo "  <input type='hidden' name='seriesNum' value='".$book['seriesNum']."' >";
        echo "<img src=" . $book['picture']." width ='150px' height='200px'/><br>";
        echo "<b>".$book['title'] . "</b> <br>";
        echo "<i>".$book['genre'] . "</i> <br> By:";
        echo "<a href='#' class='bookLink' id='". $book["bookId"]. "'> " . $book['author'] . "</a> <br> Average Rating: " . $book['avrating'] . "<br>  ";
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
    $(document).ready(function(){
                $('.bookLink').click(function(){
                    //alert( $(this).attr("id") );
                        $('#bookModal').modal("show");
          
            $.ajax({
            
            type: "GET",
            url: "bookInfo.php",
            dataType: "json",
            data: { "bookId":$(this).attr("id") },
            success: function(data,status) {
               //alert(data.description);
               $("#bookTitle").html(data.title);
               $("#year").html(data.year);
               $("#synopsis").html(data.synopsis);
               $("#bookImg").attr("src",data.picture);
               $("#genre").html(data.genre);
               $("#author").html(data.author);
               $("#bio").html(data.bio);

            },
            complete: function(data,status) { //optional, used for debugging purposes
               //alert(status);
            }
            
                        });//ajax
                    }); 
                });
                
        function openModal() {
                    
                    $('#myModal').modal("show");
                    
                }
    </script>
    <body>
        
        <?php
    include "header.php";
    ?>

<!-- Modal -->
<div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="bookInfo">
     <!-- this is an html element -->
     
     <h2><span id="author"></span></h2> <br>
     <span id="bio"></span> <br>
     
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

<hr>

<div class="center">
  <?=searchBook()?>  
</div>
 
 

<hr>
    </body>
    <?php
    include "footer.php";
    ?>
</html>