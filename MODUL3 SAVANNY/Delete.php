<?php
    include('config.php');

    $id   = $_GET['Id'];
    
    $query="DELETE from event where Id='$id'";
    mysqli_query($conn, $query);
    
    header("location:Home.php");
?>