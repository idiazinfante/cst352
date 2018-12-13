<?php

session_start();
if (!isset($_SESSION['adminName'])) {
    
    header("Location: login.php");
    
}


if (isset($_GET['addBookForm'])) {  //checks whether the form has been submitted

 include '../sqlConnection.php';
 $dbConn = getConnection("books");
    
    
  $title = $_GET['title'];    
  $author = $_GET['author'];
  $year = $_GET['year'];
  $genre = $_GET['genre'];
  $imageUrl = $_GET['imageUrl'];
  $synopsis = $_GET['synopsis'];
  $avrating = $_GET['avrating'];
  $seriesNum = $_GET['seriesNum'];
  $language = $_GET['language'];
  
  $bio = $_GET['bio'];
  
  
  $sql = "INSERT INTO b_book (title, author, year, genre, picture, synopsis, avrating, seriesNum, language, bio) 
                 VALUES ( :title, :author, :year, :genre, :picture, :synopsis, :avrating, :seriesNum, :language, :bio);";
                 
  $namedParameters = array();
  $namedParameters[':title'] = $title;
  $namedParameters[':author'] = $author;
  $namedParameters[':year'] = $year;
  $namedParameters[':genre'] = $genre;
  $namedParameters[':picture'] = $imageUrl;
  $namedParameters[':synopsis'] = $synopsis;
  $namedParameters[':avrating'] = $avrating;
  $namedParameters[':seriesNum'] = $seriesNum;
  $namedParameters[':language'] = $language;
  
  $namedParameters[':bio'] = $bio;

  $stmt = $dbConn->prepare($sql);                 
  $stmt->execute($namedParameters); //This will insert the record!
  
  echo "Book was added!";
 
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Add New Book</title>
    </head>
    <body>
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
    include "adminHeader.php";
    ?>
        
        <h1> Add New Book!</h1><br>
        
        <form>
            Title: <input type="text" name="title"/> <br><br>
            Author: <input type="text" name="author"/> <br><br>
            Year: <input type="text" name="year"/> <br><br>
            Genre: <input type="text" name="genre"/> <br><br>
            Image URL: <input type="text" name="imageUrl"/> <br><br>
            Synopsis: <input type="text" name="synopsis"/> <br><br>
            Average Rating: <input type="text" name="avrating"/> <br><br>
            Series Number: <input type="text" name="seriesNum"/> <br><br>
            Language: <input type="text" name="language"/> <br><br>
            Bio: <textarea name="bio"></textarea><br>
            <br>
            
            
            <input type="submit" value="Add Book" name="addBookForm" /><br><br>
            
        </form><br><br>
          <form action="logout.php">
            <input type="submit" class='btn btn-outline-danger' name="logout" value="Logout"/>
        </form>
 <hr>
 <?php
    include "footer.php";
    ?>
    </body>
</html>