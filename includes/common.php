<?php
    $conn = mysqli_connect("localhost", "root", "", "bank-management") or die(mysqli_error($conn));
    if(!isset($_SESSION['email'])|| !isset($_SESSION['pan'])){
        session_start();
    }
?>