<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) header("location:index.php");
if($_SESSION['employee_details']==1 && $_SESSION['customer_details']==0){
  $fetch = "select * from employee where emp_id = 1";
}
else{
  $fetch = "select * from customer where cin = 101";

}
$submit = mysqli_query($conn, $fetch) or die(mysqli_error($conn));
$row = mysqli_fetch_array($submit);

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
      <img style="margin-left:-15px;" src="<?php echo $row['profile_pic']; ?>" class="rounded-circle" alt="profile">
      <?php $name=$row['fname'] . " " . $row['mname'] . " " . $row['lname']; ?>
      <h3 style="margin-left:-50px;margin-top=20px;" id="name"><?php echo "$name"; ?></h3>
    </div>
           
    <div class="col-sm-8">
      <div class="card">
        <div class="card-body" style="color: white;">
          <h3 class="card-title">Personal Details</h3>
          <?php if($_SESSION['employee_details']==1 && $_SESSION['customer_details']==0){ ?>
          <p class="card-text"><b>Employee identification number :</b><?php echo $row['emp_id']; ?></p>
          <?php } else { ?>
          <p class="card-text"><b>Customer identification number :</b><?php echo $row['cin']; ?></p>
          <?php }?>
          <p class="card-text"><b>Contact No :</b><?php echo $row['phone_number']; ?></p>
          <p class="card-text"><b>Date of birth :</b><?php echo $row['dob']; ?></p>
          <p class="card-text"><b>Gender :</b><?php echo $row['gender']; ?></p>
          <p class="card-text"><b>Address :</b><?php echo $row['address']; ?></p>
          <p class="card-text"><b>Email id :</b><?php echo $row['email']; ?></p>
          <?php if($_SESSION['employee_details']==0 && $_SESSION['customer_details']==1){ ?>
          <p class="card-text"><b>Aadhar Number :</b><?php echo $row['aadhaar']; ?></p>
          <p class="card-text"><b>Pan Nummber :</b><?php echo $row['pan']; ?></p>
          <?php }  ?>
        </div>
      </div>
    </div>
  </div>
  <a onclick="history.back()" class="btn btn-success">Go Back</a>
  <a href="logout.php" class="btn btn-danger">Logout</a>
</div>
</body>    
</html>