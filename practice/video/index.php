<?php
session_start();
//include 'insertApi.php';
?>
<!DOCTYPE html>
<html>
    <head>
        
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title> Rate a Video </title>
    </head>
    <body>
        <h1>Rate this video:</h1>
        
        <iframe width="560" height="315" src="https://www.youtube.com/embed/CxCFtSjtSKc" 
        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen></iframe>

            Stars: <br>
            One <input type ="radio" name="rating" id="one" value="1" />
            Two <input type ="radio" name = "rating" id="two" value="2"/>
            Three <input type = "radio" name="rating" id="three" value="3"/>
            Four <input type ="radio" name="rating" id ="four" value="4"/>
            
            <button id='submitBtn'>Rate!</button>

        
        <?php
        include "api.php";
            $avgRating = getRating();
           // print_r($avgRating);
            echo "<h2> Rating of this video:" . $avgRating["AVG(rating)"] ."</h2>";
        ?>
        
        
    </body>
</html>