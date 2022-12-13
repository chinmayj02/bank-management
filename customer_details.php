<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) header("location:index.php");
if ($_SESSION['mgr'] < 1) header("location:employee_dashboard.php");
$email = $_SESSION['email'];
$fetch_manager_name = "select * from employee where emp_id = '{$_SESSION['emp_id']}'";
$submit_manager_name = mysqli_query($conn, $fetch_manager_name) or die(mysqli_error($conn));
$row_manager_name = mysqli_fetch_array($submit_manager_name);
$short_name = $row_manager_name['fname'] . " " . $row_manager_name['lname'];
$name = $row_manager_name['fname'] . " " . $row_manager_name['mname'] . " " . $row_manager_name['lname'];
$fetch1 = "select ifsc from branch where manager_id = '{$_SESSION['emp_id']}'";
$submit1 = mysqli_query($conn, $fetch1) or die(mysqli_error($conn));
$row1 = mysqli_fetch_array($submit1);
$ifsc = $row1['ifsc'];
if($_SESSION['emp_id']==0){
  $fetch = "select * from branch_customers";
}
else
$fetch = "select * from branch_customers where ifsc = '{$ifsc}'";
$submit = mysqli_query($conn, $fetch) or die(mysqli_error($conn));

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
  if(isset($_COOKIE['pass'])){
    $pass_to_check= md5($_COOKIE['pass']);
    $fetch_pass = "select password from credentials where emp_id = '{$_SESSION['emp_id']}'";
    $submit_pass = mysqli_query($conn, $fetch_pass) or die(mysqli_error($conn));
    $row_pass = mysqli_fetch_array($submit_pass);
    if($row_pass['password']==$pass_to_check){
      header("location:profile.php");
    }
    else 	echo '<script>alert("Incorrect Password, Please try again");window.location = history.back();</script>';
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Details|DBMS Bank</title>
  <!-- Bootsrtap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-mobile/1.4.5/jquery.mobile.structure.min.css" integrity="sha512-ycYlLqHTXPRocKFV8t0C5fUwTvuiv+4m5kHWTN5juUkOiGEJIqlqNtPCwhfKaFlwH+dfQdKRwhOCnI2zds/dmA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script>

    function checkPass() {
      var pass = prompt("Confirm your password:");
      if(pass==null||pass=="") {document.cookie = "pass= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";return;}
      document.cookie = "pass="+pass;
      <?php $_SESSION['employee_details'] = 0;
      $_SESSION['customer_details'] = 1;
       ?>
    }
</script>
</head>

<body>
  <nav class="navbar position-sticky top-0 left-0 navbar-expand-md">
    <div class="container-fluid mx-2">
      <div class="navbar-header">
        <i data-show="show-side-navigation1" class="show-side-btn fa-fw text-white "></i>
        <a class="navbar-brand" href="admin_dashboard.php">DBMS<span class="main-color">Bank</span></a>
      </div>
    </div>
  </nav>

  <aside class="sidebar position-fixed top-40 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
    <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
      <div class="ms-2">
        <h5 class="fs-6 mb-0">
          <a class="text-decoration-none" href="#"><?php echo $short_name; ?></a>
        </h5>
        <p class="mt-1 mb-0"><?php echo $email; ?></p>
      </div>
    </div>

    <ul class="list-unstyled">
      <li>
        <i class="fa-solid fa-house fa-fw"></i>
        <?php if($_SESSION['email']!="root@dbms.com"){ ?><a href="admin_dashboard.php"> Dashboard</> 
        <?php } else ?><a href="superadmin_portal.php"> Dashboard</a>
      </li>
      <li>
        <i class="fa-solid fa-users fa-fw"></i><a href="employee_details.php"> Employee Details</a>
      </li>
      <li class="highlight">
        <i class="fa-solid fa-users-rectangle fa-fw"></i><a href="customer_details.php"> Customer Details</a>
      </li>
      <li>
        <i class="fa-solid fa-right-from-bracket fa-fw"></i><a href="logout.php"> Log Out</a>
      </li>
    </ul>

  </aside>
  <section id="wrapper">
    <div class="p-4">
      <div class="welcome">
        <div class="content rounded-3 p-3">
          <h1 align="center" class="fs-3">Customer Details</h1>
          <p align="center">Branch <?php echo $ifsc; ?></p>
        </div>
      </div>

      <section class="statistics mt-4">
        <div class="row">
          <div class="emp-table">
            <table class="table table-bordered table-light table-hover table-responsive-sm">
              <thead>
                <tr class="table-danger">
                  <th scope="col">Name</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Account Number</th>
                  <th scope="col">More Details</th>
                </tr>
              </thead>
              <tbody>
                   
                <?php while($row = mysqli_fetch_array($submit)){

                    $fetch2 = "select * from customer where cin = '{$row['cin']}'";
                    $submit2 = mysqli_query($conn, $fetch2) or die(mysqli_error($conn));
                    $row2 = mysqli_fetch_array($submit2);
                    ?>
                  <tr class="table-warning">
                    <td><?php echo $row2['fname']." ".$row2['mname']." ".$row2['lname']; ?></td>
                    <td><?php echo $row2['phone_number']; ?></td>
                    <td><?php echo $row['acc_no']; ?></td>
                    <td align="center">
                      <form method="post"><input class="btn btn-success" type=submit name="submit" value="More" onclick="checkPass()"></input></form>
                    </td>                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </section>


    </div>
  </section>

</body>

</html>