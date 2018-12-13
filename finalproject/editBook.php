  <?php
    include "header.php";
    ?>

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
        <h1> Edit Book</h1>

    </body>
</html>
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

if (isset($_GET['updateBookForm'])) { // User submitted the form
    
    $sql = "UPDATE `b_book` 
            SET   title = :title,
                  author  = :author,
                  year    = :year,
                  genre       = :genre,
                  picture       = :picture,
                  synopsis = :synopsis,
                  avrating   = :avrating,
                  seriesNum   = :seriesNum,
                  Language       = :Language,
                  bio            = :bio
              WHERE bookId = " . $_GET['bookId'];
    $np = array();
    $np[":title"] = $_GET['title'];
    $np[":author"]  = $_GET['author'];
    $np[":year"]       = $_GET['year'];
    $np[":genre"]       = $_GET['genre'];
    $np[":picture"] = $_GET['picture'];
    $np[":synopsis"]    = $_GET['synopsis'];
    $np[":avrating"]    = $_GET['avrating'];
    $np[":seriesNum"]        = $_GET['seriesNum'];
    $np[":Language"]        = $_GET['Language'];
    $np[":bio"]     = $_GET['bio'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
    echo "Book info was updated!";
    
}



if (isset($_GET['bookId'])) {
    
    $bookInfo = getBookInfo();
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Author </title>
    </head>
    <body>
        
          <form>
            <input type="hidden" name="bookId" value="<?= $bookInfo['bookId'] ?>" />
            Title: <input type="text" name="title" value="<?= $bookInfo['title'] ?>" /> <br />
            Author: <input type="text" name="author"   value="<?= $bookInfo['author'] ?>"/> <br />
            Year: <input type="text" name="year"  value="<?= $bookInfo['year'] ?>"/> <br />
            Genre: <input type="text" name="genre"  value="<?= $bookInfo['genre'] ?>"/> <br />
            Picture: <input type="text" name="picture"   value="<?= $bookInfo['picture'] ?>"/> <br>
            Synopsis: <textarea name="synopsis" cols="50" rows="5"/> <?= $bookInfo['synopsis'] ?> </textarea> <br>
            Average Rating: <input type="text" name="avrating" value="<?= $bookInfo['avrating'] ?>"/><br>
            Series Number: <input type="text" name="seriesNum" value="<?= $bookInfo['seriesNum'] ?>"/> <br>
            Language: <input type="text" name="Language" value="<?= $bookInfo['Language'] ?>"/> <br>
            Bio: <textarea name="bio" cols="50" rows="5"/> <?= $bookInfo['bio'] ?> </textarea>
            <br>

            <input type="submit" value="Edit Book" name="updateBookForm" />
        </form>
        

    </body>
</html><br><br>
  <form action="logout.php">
            <input type="submit" class='btn btn-outline-danger' name="logout" value="Logout"/>
        </form>
<hr>
<?php
    include "footer.php";
    ?>