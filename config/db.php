<?php

    $database = "galaxystore";
    $conn = mysqli_connect("localhost","root","", $database);

    if(!$conn){
        echo "Error ". mysqli_connect_error();
    }

?>