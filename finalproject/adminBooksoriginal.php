<!DOCTYPE html>
<html>
    <head>
        <title> Edit Book </title>
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
                text-align:center;
                }
            h1,h2,footer{
                text-align: center;
            }
             #carouselExampleIndicators{
                width: 400px;
                margin: auto;
            }
            
    </style>
<?php
session_start();

if (!isset($_SESSION['adminName'])) { //validates whether the admin has logged in
    
    header("Location: login.php");
    
}

include '../sqlConnection.php';
$dbConn = getConnection("books");

function displayAllBooks(){
    global $dbConn;
    
    $sql = "SELECT bookId, title, author, genre
              FROM b_book
              ORDER BY title";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    foreach ($books as $book) {
        
        echo "<a class='btn btn-primary' role='button' href='editBook.php?bookId=".$book['bookId']."'>Edit</a>";
        //echo "[<a href='deleteBook.php'>delete</a>] ";
        echo "<form action='deleteBook.php'  onsubmit='return confirmDelete()'  >";
        echo "  <input type='hidden' name='bookId' value='".$book['bookId']."' >";
        echo "  <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form> ";
        echo "<a href='#' class='bookLink' id='". $book["bookId"]. "'>" .$book["title"]. "</a><br>";
        echo $book['genre'] . "<br><br>";
        
        
    }
}


function bookCount(){
    global $dbConn;
    
    $sql = "SELECT
                COUNT (*)
            FROM    b_book";
            
            $stmt = $dbConn->prepare($sql);
            $stmt->execute();
            $bookCount = $stmt->fetch(PDO::FETCH_ASSOC);
            
            echo $bookCount;
}

?>
<!DOCTYPE html>
<html>
      <?php
    include "header.php";
    ?>
    <head>
        <title> Admin Section </title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        
        <style>
            
            form {
                display:inline-block;
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
            data: { "bookId":$(this).attr("bookId") },
            success: function(data,status) {
               // alert(data.description);
               $("#bookTitle").html(data.title);
               $("#year").html(data.year);
               $("#synopsis").html(data.synopsis);
               $("#bookImg").attr("src", data.picture);
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
      
      
                function confirmDelete() {
                   return confirm("Do you really want to delete this book?");
                }            
                
                function openModal() {
                    
                    $('#myModal').modal("show");
                    
                }
                
        </script>
        
    </head>
    <body>

<center>     
        <?=displayAllBooks()?>
        </center>
    


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
        <div id="bookInfo">
     <!-- this is an html element -->
     <img id="bookImg" src="" width="150"></img>
     <span id="genre"></span> <br>
     <span id="author"></span> <br>
     <span id="bio"></span> <br>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<br><BR><center>
  <form action="logout.php">
            <input type="submit" class='btn btn-outline-danger' name="logout" value="Logout"/>
        </form>
        </center>
<hr>
<?php
    include "footer.php";
    ?>
    </body>
</html>