<?php

$zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse", "goat","monkey","rooster","dog","pig");        
        
 function displayYear($startYear, $endYear) {
        global $zodiac;
        $arrayIndex = 0;
        $sum = 0;
        
        for ($i = $startYear; $i <= $endYear; $i+=4) {
            echo "<li> Year  $i ";
            if ($i%100 == 0) {
                echo "<strong> HAPPY NEW CENTURY </strong> ";      
            }
            if ($i == 1776) {
                echo "<strong> USA INDEPENDENCE! </strong>";
               }
 
                
            echo "</li>";   
            
            echo "<img src='img/" .$zodiac[$arrayIndex].".png' >";
            $arrayIndex++;
            
            if ($arrayIndex == 12) {
                $arrayIndex =0;
            }
        
            $sum += $i;
            }
            
        return $sum;
}



 
        
       
       ?>




<!DOCTYPE html>
<html>
    <head>
        <title> Chinese Zodiac List </title>
        
        <style>
            html{
                text-align:center;
            }
        </style>
        
        
    </head>
    <body>
        
        <h1> Chinese Zodiac List</h1>
        
        <form> 
            <input type ="text" placeholder="start year" name ="startYear" />
            
            <input type ="text" placeholder="end year" name ="endYear" />
            
            <input type="submit" name="submitBtn" value="Go!" />

        </form>
        
        
        
        <ul>
        <?= displayYear(1900, 2000) ?>
        </ul>


        
    </body>
</html>