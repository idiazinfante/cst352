<?php

$bgcolor = "white";
$fontcolor ="";
$txtalign = "";
$border ="";

    if (isset($_GET['bgcolor']) ) {
        $bgcolor = $_GET['bgcolor'];
    }

    if (isset($_GET['fontcolor'])) {
        $fontcolor = $_GET['fontcolor'];
    }


    if (isset($_GET['border'])) {
        $border = $_GET['border'];
    }







?>




<!DOCTYPE html>
<html>
    <head>
        <title> HW3: Design Your Own Div Box Layout </title>
        
        <style>
            #sitecontent {
                width: 50%;
                height: 500px;
                margin: 0px auto;
                background-color: <?=$bgcolor?>;
                color: <?=$fontcolor?>;
                border: black <?=$border?> ;
                text-align: center;
            }
            
        </style>
        
        
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    </head>
    <body>
        
        <h1> Preview Your DIV Box Design </h1>
        
        <div id="choices">
        
        <h2>Enter your choices for your div boxes : </h2>    
        <br>
            
        <form>
            <input type="text" name ="bgcolor" size ="25" placeholder ="Enter a Background Color" value= "<?=$_GET['bgcolor']?>" />
            
            <select name="fontcolor">
                <option value="">Choose a Font Color</option>
                <option> White</option>
                <option> Black</option>
                <option> Grey</option>
                <option> Red</option>
            </select>
            
            <br>
            Div Border Style: 
            
            <input type="radio" name="border" value ="solid" id="solidbord"
            <?php
            
                if($_GET['border'] == "solid") {
                    echo " checked ";
                }
            ?>
            >
            
            <label for="solidbord">Solid</label>
            
            
            
            <input type="radio" name="border" value="dashed" id="dashedbord"
            <?php
            
                if($_GET['border'] == "dashed") {
                    echo " checked ";
                }
            ?>
            >
            <label for="dashedbord">Dashed</label>
            
            
            
            
            <input type="radio" name="border" value="dotted" id="dottedbord"
            <?php
            
                if($_GET['border'] == "dotted") {
                    echo " checked ";
                }
            ?>
            >
            
            <label for="dottedbord">Dotted</label>
            
            
            <input type="submit" name="submitBtn" value="Create" />
        </form>
        
        </div>
        
        <br> <br>
        
        <div id="sitecontent">
            
            
            
            <h5>INSERT CONTENT HERE</h5>
            
            
        </div>
    </body>
</html>