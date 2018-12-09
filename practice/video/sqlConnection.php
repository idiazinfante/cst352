<?php

function getConnection($dbname) {
        $host = "localhost";  //c9
        //$dbname = "quotes";
        $username = "web user";
        $password = "s3cr3t";
        
        
        //when connecting from Heroku 
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
                $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
                $host = $url["host"];
                $dbname = substr($url["path"], 1);
                $username = $url["user"];
                $password = $url["pass"];
            }  
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $dbConn;

}

?>