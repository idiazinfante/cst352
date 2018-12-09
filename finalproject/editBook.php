  <?php
    include "header.php";
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title> Edit Book </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        
    </head>
     <style>
            body{
                color: white;
                text-align: center;
                color: black;
                background:#caefff;
                }
            h1{
                text-align: center;
            }
             #carouselExampleIndicators{
                width: 400px;
                margin: auto;
            }
            
    </style>
    <body>
        <h1> Edit Book</h1>

    </body>
</html>
<?php
session_start();
if (!isset($_SESSION['adminName'])) {
    
    header("Location: login.php");
    
}

include '../sqlConnection.php';
$dbConn = getConnection("quotes");

function getBookInfo() {
    global $dbConn;
    
    $sql = "SELECT * FROM `b_book` WHERE book = "  . $_GET['book'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $record;
    
    
}

if (isset($_GET['updateAuthorForm'])) { // User submitted the form
    
    $sql = "UPDATE `q_author` 
            SET   firstName = :firstName,
                  lastName  = :lastName,
                  gender    = :gender,
                  dob       = :dob,
                  dod       = :dod,
                  profession= :profession,
                  country   = :country,
                  picture   = :picture,
                  bio       = :bio
              WHERE authorId = " . $_GET['authorId'];
    $np = array();
    $np[":firstName"] = $_GET['firstName'];
    $np[":lastName"]  = $_GET['lastName'];
    $np[":dob"]       = $_GET['dob'];
    $np[":dod"]       = $_GET['dod'];
    $np[":profession"] = $_GET['profession'];
    $np[":country"]    = $_GET['country'];
    $np[":picture"]    = $_GET['imageUrl'];
    $np[":bio"]        = $_GET['bio'];
    $np[":gender"]     = $_GET['gender'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
    echo "Author info was updated!";
    
}



if (isset($_GET['authorId'])) {
    
    $authorInfo = getAuthorInfo();
    //print_r($authorInfo);
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Author </title>
    </head>
    <body>
        
          <form>
            <input type="hidden" name="authorId" value="<?= $authorInfo['authorId'] ?>" />
            First Name: <input type="text" name="firstName" value="<?= $authorInfo['firstName'] ?>" /> <br />
            Last Name: <input type="text" name="lastName"   value="<?= $authorInfo['lastName'] ?>"/> <br />
            Gender: 
            <input type="radio" name="gender" value="M" id="genderMale"  
            
              <?php
              
                 if ($authorInfo['gender'] == "M") {
                     
                     echo " checked ";
                     
                 }
              
              ?>

            />
                <label for="genderMale">Male</label>
            <input type="radio" name="gender" value="F" id="genderFemale"  <?= ($authorInfo['gender'] == "F")?"checked":"" ?> /> 
                <label for="genderFemale">Female</label><br>
            
            Day of birth: <input type="text" name="dob"  value="<?= $authorInfo['dob'] ?>"/> <br />
            Day of death: <input type="text" name="dod"  value="<?= $authorInfo['dod'] ?>"/> <br />
            Country: <input type="text" name="country"   value="<?= $authorInfo['country'] ?>"/> <br>
            Profession: <input type="text" name="profession" value="<?= $authorInfo['profession'] ?>"/> <br>
            
            Image URL: <input type="text" name="imageUrl" value="<?= $authorInfo['picture'] ?>" size="40"/><br>
            Bio: 
            <textarea name="bio" cols="50" rows="5"/> <?= $authorInfo['bio'] ?> </textarea>
            
            <br>

            <input type="submit" value="Update Author" name="updateAuthorForm" />
        </form>
        

    </body>
</html><br><BR>
  <form action="logout.php">
            <input type="submit" class='btn btn-outline-danger' name="logout" value="Logout"/>
        </form>
<hr>
<?php
    include "footer.php";
    ?>