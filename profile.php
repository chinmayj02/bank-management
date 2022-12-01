<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) header("location:index.php");?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="css/profile.css">


</head>

<body>
<nav class="navbar position-sticky top-0 left-0 navbar-expand-md">
    <div class="container-fluid mx-2">
      <div class="navbar-header">
        <a class="navbar-brand" href="admin_dashboard.php">DBMS<span class="main-color">Bank</span></a>
      </div>
    </div>
  </nav>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="profile-pic.png" class="rounded-circle" alt="profile">
                <h2 id="name">Vadiraj Inamdar</h2>
            </div>
           
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                      <h3 class="card-title">Personal Details</h3>
                      <p class="card-text"><b>Customer identification number :</b>1001</p>
                      <p class="card-text"><b>Contact No :</b>7083491368</p>
                      <p class="card-text"><b>Date of birth :</b>23/04/2002</p>
                      <p class="card-text"><b>Gender :</b>M</p>
                      <p class="card-text"><b>Address :</b>Flat No S-4 Susgegad Hsg Co-Opt Soc Dhavali Ponda Goa</p>
                      <p class="card-text"><b>Email id :</b>vadirajinamdar6@gmail.com</p>
                      <p class="card-text"><b>Aadhar Number :</b>4963 7684 6810</p>
                      <p class="card-text"><b>Pan Nummber :</b>ALP123Z3</p>
                      <!-- <a href="#" class="btn btn-success">Contact me</a> -->
                    </div>
                </div>
            </div>
        </div>
   
    
    
    <a href="logout.php" class="btn btn-danger">Logout</a>
</body>    </html>