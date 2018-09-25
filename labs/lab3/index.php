<?php  


$suit = array("clubs","diamonds","hearts","spades");
$deck = range(1,52); //$deck = array(1,2,3,4.....52)
shuffle($deck);
    
    
print_r($deck);

    function hand(){
        global $deck;
        global $suit;
        for($i = 1; $i < 6; $i++) {
        $lastCard = array_pop($deck);
        $faceValue = $lastCard % 13;
        //echo $faceValue . "-";
       // echo $lastCard . " ";
        
        if($faceValue==0) {
            $faceValue = 13;
        }
        echo "<img src = 'cards/clubs/$faceValue.png' alt='$faceValue' title='$faceValue' />";
         }
    
    }


    function displayCard() {
        
        global $suit;
        
        for ($i=1; $i<6; $i++) {
            $card = rand(1,13);
            $randSuit = $suit[rand(0,3)];
            
            echo "<img src = 'cards/$randSuit/$card.png' alt = '$card' title = '$card' />";
            echo " ";
        }
    }
    



?>


<!DOCTYPE html>
<html>
    <head>
        <title> Lab 3: Ace Poker </title>
        
        <style>
            h1, h2, body {
                text-align: center;
            }
        </style>
    </head>
    
    
    <body>
        <h1> Ace Poker</h1>
        <h2> Player with more aces wins all the points!</h2>
        
        <?php
        
        echo "Player 1: ";
        hand();
        
        
        echo "<br>";
        
        echo "Player 2: ";
        hand();
        
        ?>

    </body>
</html>