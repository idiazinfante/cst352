<?php


function displayCity() {

    $mexico = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco","mexico_city");
    $norway = array("alesund", "bergen", "hammerfest", "oslo", "stavanger","trondheim");  
    $bothCountry = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco","mexico_city",
                        "alesund", "bergen", "hammerfest", "oslo", "stavanger","trondheim");
    
    if ($_GET[country] =="mexico") {
        $country = "Mexico";
    }
    if ($_GET[country] =="norway") {
        $country = "Norway";
    }
    
    if ($_GET[country] =="both") {
        $country = "Both Mexico and Norway";
    }
    
    if (empty($_GET[cityNumber])) {
        echo "You must enter the number of cities!";
    }
    
    if($_GET[country] =="both" & ($_GET[cityNumber] < 2)) {
        echo "Number of cities must be between 2 and 12";
    }
    
    if($_GET[country] =="mexico" && ($_GET[cityNumber] > 6)) {
        echo "Number of cities must be less than 7 for just one country";
    }
    
    if($_GET[country] =="norway" && ($_GET[cityNumber] > 6)) {
        echo "Number of cities must be less than 7 for just one country";
    }
    
    if (!empty($_GET[cityNumber])) {
    echo "<h2> Visiting " . $_GET[cityNumber] .  " Cities in " .$country ." </h2>";
    }
    
        
    
    if (isset($_GET[cityNumber]) && isset($_GET[country])) {
        echo "<table>";
        
        if($_GET[country] =="mexico" && ($_GET[cityNumber] > 0) && ($_GET[cityNumber] < 7)) {
        for ($i=0; $i<($_GET[cityNumber]); $i++) {
            
            $randCity = $mexico[rand(0, count($mexico)-1)];
             echo "<td>";
             
            if (isset($_GET[image])) {
                echo "<img src = 'img/$randCity.png' /> <br>";
                }
                
            echo " $randCity </td>" ;
            
     
            }
        }
        if($_GET[country] =="norway" && ($_GET[cityNumber] > 0) && ($_GET[cityNumber] < 7)) {
        for ($i=0; $i<($_GET[cityNumber]); $i++) {
            $randCity = $norway[rand(0, count($norway)-1)];
            
             echo "<td>";
             
            if (isset($_GET[image])) {
                echo "<img src = 'img/$randCity.png' /> <br>";
                }
                
            echo " $randCity </td>" ;
            }
        }
        
         if($_GET[country] =="both" && ($_GET[cityNumber] > 1) && ($_GET[cityNumber] < 13)) {
        for ($i=0; $i<($_GET[cityNumber]); $i++) {
            
            $randCity = $bothCountry[rand(0, count($bothCountry)-1)];
             echo "<td>";
             
            if (isset($_GET[image])) {
                echo "<img src = 'img/$randCity.png' /> <br>";
                }
                
            echo " $randCity </td>" ;
            } 
         }
         
        echo "</table>";
    }
    
    
    
    
}








?>
<!DOCTYPE html>
<html>
    <head>
        <title>Vacation Spot Generator</title>
    </head>
    <body>
        
        <h1>Next Vacation Spots</h1>
        
        <style>
            body {
                text-align: center;
            }
            
            table {
                margin: 0px auto;
               
            }
            
            td {
                border: 1px solid black;
            }
            
        </style>
        
        
        <form>
            
            Number of Cities to Visit: 
            <input type="text" name ="cityNumber"/>
            
            <br><br>
            
            
            Country to Visit:
            <input type="radio" name="country" value="mexico" >Mexico<br>
            <input type="radio" name="country" value="norway">Norway<br>
            <input type="radio" name="country" value="both">Both<br>
            
            <br>
            
            Display cities to visit in alphabetical order: 
            <input type="radio" name="alphOrder" value="az">A-Z<br>
            <input type="radio" name="alphOrder" value="za">Z-A<br>
            
            <br>
            
            <input type="checkbox" name="image">Display Images<br>
            
            <br><br>
            
            <input type="submit" name="submitBtn" value="Display Cities to Visit!">
                
            <hr>
            <?=displayCity()?>
            
            
            
            
        </form>


        <br> <br> <hr>
    <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>The page includes the form elements as the Program Sample: checkbox, radio buttons, etc.</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>Error is displayed if Number of Cities is not submitted.</td>
      <td width="20" align="center">5</td>
    </tr> 
    <tr style="background-color:#99E999">
      <td>3</td>
      <td>Error is displayed if Number of Cities is less than 2 or left blank </td>
      <td align="center">5</td>
    </tr>    
   <tr style="background-color:#99E999">
      <td>4</td>
      <td>Error is displayed if Number of Cities is greater than 6 AND only one country is selected, or if size is greater than 12 AND country is "Both" </td>
      <td align="center">10</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>5</td>
      <td>Header is displayed with info submitted (number of cities and country to visit) </td>
      <td align="center">5</td>
    </tr>    
	<tr style="background-color:#99E999">
      <td>6</td>
      <td>The right number of random cities is displayed when selecting Mexico or Norway as Country </td>
      <td align="center">15</td>
    </tr> 
   	<tr style="background-color:#99E999">
      <td>7</td>
      <td>If selecting "Both" as Country, there must be at least ONE city of each country</td>
      <td align="center">15</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>8</td>
      <td>The names are ordered alphabetically as chosen by the user (asc/desc)</td>
      <td align="center">10</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>9</td>
      <td>City images are displayed if corresponding checkbox is checked</td>
      <td align="center">10</td>
    </tr>       
    <tr style="background-color:#FFC0C0">
      <td>10</td>
      <td>Cities are displayed in a two-column table</td>
      <td align="center">15</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>11</td>
      <td>The web page uses Bootstrap and has a nice look. </td>
      <td align="center">5</td>
    </tr>        
    <tr style="background-color:#99E999">
      <td>12</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>   
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>

    </body>
</html>