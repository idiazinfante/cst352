<?php
session_start(); //starts or resumes a session



//verifies that username and password are valid

include '../sqlConnection.php';
$dbConn = getConnection("books");

 $username = $_POST['username'];
 $password = sha1($_POST['password']);


//This sql prevents SQL INJECTION!!
 $sql = "SELECT * 
         FROM b_admin 
         WHERE username = :u; 
         AND   password = :password ";

 $namedParameters = array();
 $namedParameters[":u"] = $username;
 $namedParameters[":password"] = $password;

 $stmt = $dbConn->prepare($sql);
 $stmt->execute($namedParameters);
 $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

 if (empty($record)){
   
   echo "Wrong username or password!";
     
 } else {
     
    $_SESSION['adminName'] = $record['username'];
     
     header("location: adminOptions.php"); //redirects to another program.
     
     
     
 }




?>