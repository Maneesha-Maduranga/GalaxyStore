<?php

    $conn = mysqli_connect("localhost","Maduranga","123","galaxystore");

    if(!$conn){
        echo "Error ". mysqli_connect_error();
    }

?>