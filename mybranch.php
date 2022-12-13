<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) header("location:index.php");
$fetch = "select * from branch where ifsc = '{$_SESSION['ifsc']}'";
$submit = mysqli_query($conn, $fetch) or die(mysqli_error($conn));
$row = mysqli_fetch_array($submit);
$fetch1 = "select e.fname,e.lname from employee e join (select manager_id from branch where ifsc='{$_SESSION['ifsc']}') b on e.emp_id=b.manager_id";
$submit1 = mysqli_query($conn, $fetch1) or die(mysqli_error($conn));
$row1 = mysqli_fetch_array($submit1);
$short_name = $row1['fname'] . " " . $row1['lname'];
?>
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
      <img style="margin-left:-15px;height:300px;width:300px;" src="https://www.pngitem.com/pimgs/m/531-5313435_bank-png-free-download-vector-bank-logo-png.png" class="rounded-circle" alt="profile">
      <h3 style="margin-left: 20px;" id="name">DBMS Bank</h3>
    </div>
           
    <div class="col-sm-8">
      <div class="card">
        <div class="card-body" style="color: white;">
          <h3 class="card-title">Branch Details</h3>
          <p class="card-text"><b>IFSC :</b><?php echo $row['ifsc']; ?></p>
          <p class="card-text"><b>Contact No :</b><?php echo $row['phone_number']; ?></p>
          <p class="card-text"><b>Address :</b><?php echo $row['address']; ?></p>
          <p class="card-text"><b>Email id :</b><?php echo $row['email']; ?></p>
          <p class="card-text"><b>Manager Name :</b><a style="text-decoration:none;color:white" href="profile.php"><?php echo " " .$short_name; ?></a></p>
        </div>
      </div>
    </div>
  </div>
  <a onclick="history.back()" class="btn btn-success">Go Back</a>
  <a href="logout.php" class="btn btn-danger">Logout</a>
</div>
</body>    
</html>