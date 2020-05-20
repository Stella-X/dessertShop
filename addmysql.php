<?php
    $dbhost = "localhost";
    $dbusername = "root";
    $dbpasswd ="1234";
    $dbname ="dessertshop";
    $dbport = "3306";
    $db_link = new mysqli($dbhost,$dbusername,$dbpasswd,$dbname,$dbport);

    if($db_link->connect_error!="")
    {
        echo "connect error";
    }
    else{
        $db_link->query("SET NAMES 'utf8'");
    }
    session_start();
?>