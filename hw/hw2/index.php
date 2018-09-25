<?php
    $animal = array("bear","cat","lion", "shiba");
    $zoo = rand(1,10);
    
    
    function displayPlant() {
        global $zoo;
        $garden = rand(1,10);
        
        
        
        for ($i==0;$i< $garden; $i++) {
            echo "<img src ='img/tree.png' alt = 'tree' title='tree' />";
            if ($zoo ==1) {
                $garden = 1;
            }
            
        }
    }
    
    function displayAnimal() {
        global $animal;
        global $zoo;
        
 
        for ($i==0;$i< $zoo; $i++) {
             $randAnimal = $animal[rand(0,3)];
            echo "<img src ='img/$randAnimal.png' alt = '$randAnimal' title='$randAnimal' />";
            
            if ($zoo == 1) {
                echo "'I need my alone time'";
            }
        }
        
    }



?>





<!DOCTYPE html>
<html>
    <head>
        <title> Homework 2: Zoo Maker  </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    </head>
    <body>
       
        
        <h1> CREATE YOUR OWN ZOO EXHIBIT</h1>
        
        <br> <br>

        <div id="zoo">
        
            
        <?php
        displayPlant();
        displayAnimal();
        displayPlant();
        
        ?>
        </div>
        
       
        
    </body>
</html>