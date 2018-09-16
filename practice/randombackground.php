<?php
    
    function getRandomColor() {
        echo "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10 )." );";
    }

?>



<!DOCTYPE html>
<html>
    <head>
        <title> Random Colors</title>
        
        <style>
            
            body {
                
                <?php
                
                    $red = rand(0,255);
                    
                
                    echo "background-color: rgba($red,".rand(0,255).",".rand(0,255).",".(rand(0,10)/10 ).");";
                
                ?>
            }
            
            h1 {
                <?php
                
                    $red = rand(0,255);
                    
                
                    echo "background-color: rgba($red,".rand(0,255).",".rand(0,255).",".(rand(0,10)/10 ).");";
                
                    echo "color: rgba($red,".rand(0,255).",".rand(0,255).",".(rand(0,10)/10 ).");";
                
                
                ?>
            }
            
            h2 {
                background-color:<?php  getRandomColor()  ?>;
                
                color: <?= getRandomColor() ?> ;
            }
            
            h3 {
                background-color:<?= getRandomColor() ?> ;
                color: <?= getRandomColor() ?> ;
            }

            
        </style>    
        
    </head>
    
    
    
    
    
        <body>
            
            <h1>Welcome</h1>
            
            <h2> Random colors!</h2>

        </body>
</html>