<?php 
session_start();

if (!isset($_SESSION['adminName'])) { //validates whether the admin has logged in
    
    header("Location: login.php");
    
}
include '../sqlConnection.php';
$dbConn = getConnection("books");

            function displayAllBooks(){
                global $dbConn;
                
              $sql = "SELECT bookId, title, author, genre, picture, bio
                          FROM b_book
                          ORDER BY title";
                
                $stmt = $dbConn->prepare($sql);
                $stmt->execute();
                $books = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                
                
                return $books;
                
                
            }
            
            function bookCount() {
                global $dbConn;
                
                $sql= "SELECT COUNT(1)
                        FROM b_book";
                        
                    $stmt = $dbConn->prepare($sql);
                    $stmt->execute();
                    $count = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    return $count;
                    
            }
            
            function highestRated() {
                global $dbConn;
                
                $sql = "SELECT *
                        FROM `b_book`
                        WHERE 
    	                        avrating=(
                            SELECT MAX(avrating)
        	                FROM b_book)";
                        
                    $stmt = $dbConn->prepare($sql);
                    $stmt->execute();
                    $rating = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    return $rating;
                
            }
            
            function lowestRated() {
                global $dbConn;
                
                $sql = "SELECT *
                        FROM `b_book`
                        WHERE 
    	                        avrating=(
                            SELECT MIN(avrating)
        	                FROM b_book)";
                        
                    $stmt = $dbConn->prepare($sql);
                    $stmt->execute();
                    $lowRating = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    return $lowRating;
                
            }

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
       
 <?php
   include "adminHeader.php";
  ?>
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
               $("#picture").attr("src", data.picture);
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
            form {
                display:inline-block;
            }
            
            #adminReport {
                width: 50%;
                margin: 0px auto;
                border: 2px solid black;
                border-radius: 5px;
                padding: 10px;
                
            }
            
            #adminReport i {
                color: red;
            }
            
    </style>
  <center>
  <?php 
    
    $books = displayAllBooks();
    
    foreach($books as $book) {
        echo "<a class='btn btn-primary' role='button' href='editBook.php?bookId=".$book['bookId']."'>Edit</a>  ";
        //echo "[<a href='deleteBook.php'>delete</a>] ";
        echo "<form action='deleteBook.php'  onsubmit='return confirmDelete()'  >";
        echo "  <input type='hidden' name='bookId' value='".$book['bookId']."' >";
        echo "  <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form> ";
        echo "<a href='#' class='bookLink' id='". $book["bookId"]. "'>" .$book["title"]. "</a><br><br>";
        echo "<br><br>";
        
    }
  ?>
  </center>
  
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
     <img id="picture" src="" width="150" height ="200"></img><br>
     <h3><i><span id="genre"></span></i></h3> <br>
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


<div id ="adminReport">
    <?php
    $numBooks = bookCount();
    echo "<b><h3># of Books in Database:</b> " .$numBooks["COUNT(1)"] ."</h3><br>";
    
    $topRating = highestRated();
    echo "<h4><b>Highest Rated Book in Database:</b> " .$topRating['title'] ." <i> (" .$topRating['avrating'] .")</i></h3><br>";
    
    $lowestRating = lowestRated();
    echo "<h4><b>Lowest Rated Book in Database:</b> " .$lowestRating['title'] ." <i> (" .$lowestRating['avrating'] .")</i></h3><br>";
    
    ?>
</div>
    <br><br>

    <center>
      <form action="logout.php">
            <input type="submit" class='btn btn-outline-danger' name="logout" value="Logout"/>
        </form>
        </center><hr>
   <?php
   include "footer.php";
  ?>