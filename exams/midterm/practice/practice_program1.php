<?php 

$alphabet=range("A","Z");


function makeGrid() {
    global $alphabet;
    $grid = $_GET['gridsize'];
    
    if (isset($_GET['gridsize'])) {
            colorLetter();
                    echo "<table>";
                    for ($i=0; $i<$grid; $i++) {
                        echo "<tr>";
                        for($a=0;$a<$grid;$a++) {
                            echo "<td>" . $alphabet[rand(0,count($alphabet)-1)] . "</td>";
                        }
                        
                        echo "</tr>";
                    }
                    
                    echo "</table>";
                    
                    
        }
}

function colorLetter() {
    $letterColor="";
    for ($c=0;$c<count($alphabet)-1; $c++) {
        if ( $alphabet[$c]< 6 ) {
            $letterColor="red";
            }
        
    }
}

?>



<!DOCTYPE html>
<html>
    <head>
        <title> Find the Letter </title>
        
        <style>
            body {
                text-align: center;
            }
            
            table {
                padding: 20px;
                margin: 0px auto;
                color: <?=$letterColor?> ;
            }
        </style>
    </head>
    <body>
        
        <h1>Find the Letter!</h1>
        
        <h3>Select a Letter to Find:</h3>
        <form method="GET">
            <select name="findletter">
                <?php
                
                global $alphabet;
                
                for ($i=0; $i < 27; $i++) {
                    echo "<option> $alphabet[$i] </option>";
                }
                
                ?>
             </select>
             
             <br><br>
             
             Select Table Size: 
             <select name="gridsize">
                 <option value="6">6x6</option>
                 <option value="7">7x7</option>
                 <option value="8">8x8</option>
                 <option value="9">9x9</option>
                 <option value="10">10x10</option>
             </select>
             
             <br><br>
             
             Select a Letter to Omit: 
             <select name="omitletter">
                <?php
                
                global $alphabet;
                
                for ($i=0; $i < 27; $i++) {
                    echo "<option> $alphabet[$i] </option>";
                }
                
                ?>
             </select>
             
             <input type="submit" name="submitBtn" value ="Create Table"/>
        </form>



        <?=makeGrid()?>
    </body>
</html>