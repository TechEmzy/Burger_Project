<?php

    //connecting to the database(using mysqli)
    $connect = mysqli_connect('localhost', 'root', '', 'burger_bite');

    //check connection
    if(!$connect){
        echo 'connection error: ' . mysqli_connect_error();
    }

?>