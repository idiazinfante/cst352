<?php

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

function showL() {
    global $dbConn;
    $sql = "SELECT quote
              FROM q_quotes
              WHERE quote LIKE 'L%'
              ORDER BY quote DESC"
              ;
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    //$records = $statement->fetch(); //returns only ONE record
    $records = $statement->fetchAll(PDO::FETCH_ASSOC); //returns multiple records
    
    foreach ($records as $record) {
    echo $record['quote'] . "<br>";
    }
}

function displayMale() {
    global $dbConn;
    
    $sql = "SELECT firstName, lastName, country
              FROM q_author
              WHERE gender = 'M' && country != 'USA'
              ORDER BY lastName"
              ;
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    //$records = $statement->fetch(); //returns only ONE record
    $records = $statement->fetchAll(PDO::FETCH_ASSOC); //returns multiple records
    
    //print_r($records);
    
    foreach ($records as $record) {
        
        echo  $record['firstName'] . "  " . $record['lastName'] . " " . $record['country'] . "<br>";
        
    }//end Foreach
    
} //endFunction

function fifthQuote() {
    global $dbConn;
    $sql = "SELECT quote
              FROM q_quotes
              
              ORDER BY quote LENGTH (0,5)"
              ;
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    //$records = $statement->fetch(); //returns only ONE record
    $records = $statement->fetchAll(PDO::FETCH_ASSOC); //returns multiple records
    
    foreach ($records as $record) {
    echo $record['quote'] . "<br>";
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Program2  </title>
    </head>
    <body>
        
        <?=showL()?>
        <hr>
        <?=displayMale()?>
        <hr>
        

    </body>
    
      
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>All quotes that start with letter "L", in descending order </td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>First name, last name and country of all male authors who were not born in the USA, ordered by last name</td>
      <td width="20" align="center">15</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td>Author, Quote, and Quote length of the current fifth longest quote in the table</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#FFC0C0">
       <td>4</td>
       <td>All quotes in the "Philosophy" category, ordered alphabetically </td>
       <td align="center">15</td>
     </tr>
     <tr style="background-color:#99E999">
      <td>6</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>    

</html>