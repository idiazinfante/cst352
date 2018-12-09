<?php
session_start();

if (!isset($_SESSION['fave'])) {  //creates the session array if it doesn't exist yet
     $_SESSION['fave'] = array();	
} 
	
if (!in_array($_GET['bookId'], $_SESSION['fave'])) { //checks whether item is in array
   $_SESSION['fave'][] = $_GET['bookId'];
}	
echo "added";
?>
