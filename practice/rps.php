<?php

    

    function hand1 ()   {
        $firstHand = rand(0,2);
        
        if ($firstHand == 0) {
            echo "<img src ='img/rps/paper.png' alt = 'paper' title = 'paper'/>";
            
        } elseif($firstHand == 1) {
            
             echo "<img src ='img/rps/rock.png' alt = 'rock' title = 'rock'/>";
             
        } else {
             echo "<img src ='img/rps/scissors.png' alt = 'scissors' title = 'scissors'/>";
             
        }
        return $firstHand;
    }
    function hand2 ()   {
        $secondHand = rand(0,2);
        
        if ($secondHand == 0) {
            echo "<img src ='img/rps/paper.png' alt = 'paper' title = 'paper'/>";
            
            
        } elseif($secondHand == 1) {
            
             echo "<img src ='img/rps/rock.png' alt = 'rock' title = 'rock'/>";
             
        } else {
             echo "<img src ='img/rps/scissors.png' alt = 'scissors' title = 'scissors'/>";
             
        }
        return $secondHand;
    }
    
    

    function winner(){
        if($firstHand == $secondHand){
        echo "It's a tie!";
    } else {
        echo "Keep playing!";
    }
}
    



?>





<!DOCTYPE html>
<html>
    <head>
        <title> Rock Paper Scissors</title>
    </head>
    <body>
        
        <?php
        
        echo hand1(); 
        echo hand2();
        echo winner();
        ?>

    </body>
</html>