<?php
    $conn = mysqli_connect("localhost","root","","opentutorials");
    $sql = "
        INSERT INTO topic (title, description, created) VALUES ('MySQL', 'MySQL is ..', NOW())";
    $reslut = mysqli_query($conn, $sql);
    if($reslut === false){
        echo mysqli_error($conn);
    }
?>