<?php  


$suit = array("clubs","diamonds","hearts","spades");
$deck = range(1,52); //$deck = array(1,2,3,4.....52)
$totalPoints = 0;
shuffle($deck);
    
    
//print_r($deck);

    function hand(){
        global $deck, $suit, $totalPoints;
        
        
        $aceCounter = 0;
        $pointCounter = 0;
        
        for($i = 1; $i < 6; $i++) {
        $lastCard = array_pop($deck);
        $faceValue = $lastCard % 13;
        //echo $faceValue . "-";
       // echo $lastCard . " ";
        
        if($faceValue==0) {
            $faceValue = 13;
        }
        $indexSuit=($lastCard-1)/13;
        
        //Another way to display the right suit
        //if ($lastCard <14) {
        //    $suit="clubs";
        //} else if ( $lastCard > 13 && $lastCard <27 ) {
        //    $suit ="diamonds";
       // }
        
        $pointCounter = $pointCounter + $faceValue;     //$pointCounter += $faceValue;
        if ($faceValue==1) {
            echo "<img src = 'cards/$suit[$indexSuit]/$faceValue.png' alt='$faceValue' title='$faceValue' width:'120px' height='190px' class='ace'/>";
            $aceCounter++;  // $aceCounter = $aceCounter + 1;
        } else {
            echo "<img src = 'cards/$suit[$indexSuit]/$faceValue.png' alt='$faceValue' title='$faceValue' width: '120px' height='190px' class='card' />";
        }
        
         }
         
         echo "Points: $pointCounter";
         
         $totalPoints += $pointCounter;
         
         return $aceCounter;
        
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
    
    
    
    function displayWinner($p1, $p2) {
        global $totalPoints;
        echo "<h1 style='text-decoration: underline yellow;'>";
        
        if($p1 > $p2) {
            echo "Player 1 wins $totalPoints Points";
        }   else if ($p1 < $p2){
            echo "Player 2 wins $totalPoints Points";
        }   else {
            echo "Tie Game";
        }
        echo "</h1>";
    }
    



?>


<!DOCTYPE html>
<html>
    <head>
        <title> Lab 3: Ace Poker </title>
        
        <style>
            body {
                text-align: center;
                font-family: 'Notable', sans-serif;
                color:white;
                background-image: url("img/pokerbg.jpg");
                background-size: cover;
                
            }
           h1, h2 {
                text-align: center;
                font-family: 'Notable', sans-serif;
                color:white;
            }
            

            .ace {
                border: 2px yellow solid;
            }
            .card {
                padding-right: 5px;
            }
            .hand {
                margin: 0px auto;
                padding:10px;
                padding-top:20px;
                padding-bottom: 20px;
                border: solid white;
                border-radius: 8px;
                width:  75%;
                font-size: 2em;
                background-color: rgba(225,225,225, .5);
            }
        </style>
        
        <link href="https://fonts.googleapis.com/css?family=Notable" rel="stylesheet">
    </head>
    
    
    <body>
        <h1> Ace Poker</h1>
        <h2> Player with more aces wins all the points!</h2>
        
        <?php
        
        
        echo "<div class='hand'> Player 1: ";
        $p1 = hand();
       // echo $p1;
        echo "</div>";
        
        
        echo "<br>";
        
        echo "<div class='hand'> Player 2: ";
        $p2 = hand();
        //echo $p2;
       echo "</div>";
        
        
        displayWinner($p1, $p2);
        ?>

    </body>
</html>