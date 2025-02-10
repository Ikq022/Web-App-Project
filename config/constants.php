<?php 
    //Start Session
    session_start();


    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://jq-juicyjuice.zya.me/');
    define('LOCALHOST', 'sql109.hstn.me');
    define('DB_USERNAME', 'mseet_36305165');
    define('DB_PASSWORD', 'JwAalPvUtERO');
    define('DB_NAME', 'mseet_36305165_juicy');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database


?>