  <?php
    include "adminHeader.php";
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
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
        <h1> Administrator Options </h1><br>
        
        <form action="addBook.php">
        
        <input type="submit" class="btn btn-primary btn-lg"value="Add Book"/><br><br>
        
        </form>
        
        <form action="adminBooks.php">
        
        <input type="submit" class="btn btn-primary btn-lg"value="Edit Book"/><br><br>
        
        </form>
        

    </body>
</html><BR><BR>
  <form action="logout.php">
            <input type="submit"class='btn btn-outline-danger' name="logout" value="Logout"/>
        </form>
<hr>
<?php
    include "footer.php";
    ?>