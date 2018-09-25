<?php

    $symbols = array("orange","seven");
    echo $symbols[0];
    
    array_push($symbols,"lemon");//adds lemon to end of array
    
    print_r($symbols); //displays the whole array
    
    $symbols[] = "grapes"; //adds item to the end of the array 
    
    echo "<hr>";
    print_r($symbols); //displays the whole array
    
    $symbols[2] = "BAR";
    
    unset($symbols[2]); // deletes an item from the array
    echo "<hr>";
    print_r($symbols); //displays the whole array
    
    $symbols = array_values($symbols); // re-indexes the array after delete
    echo "<hr>";
    print_r($symbols); //displays the whole array
    
    sort($symbols); //sorts alphebetaically
    echo "<hr>";
    print_r($symbols); //displays the whole array
    
    rsort($symbols); // sorts alph backwards
    echo "<hr>";
    print_r($symbols); //displays the whole array
    
    array_push($symbols, "lemon", "bar"); // adding two more elements
    echo "<hr>";
    print_r($symbols);
    
    
    display_array();
    
    
    
    display_random_element();
    
    function display_random_element() {
        global $symbols;
        
        echo "<hr>Random value: <br>";
        //$randomIndex = rand(0, count($symbols) - 1 );
        //echo $randomIndex;
        //echo $symbols[$randomIndex];
        //echo $symbols[rand(0, count($symbols) -1)];
        
        $image = $symbols[rand(0, count($symbols) -1)];
        
        for ($i = 0; $i < 3; $i++) {
        echo "<img src= '../labs/777/img/$image.png' alt = '$image' title = '$image' />"; 
        
        }
        
    }
    
    function display_array() {
        global $symbols;
        echo "<hr>Here is the content of the array: <br>";
        //print_r($symbols);
        
        for ($i = 0; $i < count($symbols); $i++) { //count() returns size of the array
            echo $symbols[$i] . ", ";
        }
        
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Review: Arrays </title>
    </head>
    <body>

    </body>
</html>