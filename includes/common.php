<?php
    $conn = mysqli_connect("localhost", "root", "root", "bank-management") or die(mysqli_error($conn));
    if(!isset($_SESSION['email'])){
        session_start();
    }
?>