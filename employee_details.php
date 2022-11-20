<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) header("location:login.php");
if ($_SESSION['mgr'] < 1) header("location:employee_dashboard.php");
$email = $_SESSION['email'];
$fetch = "select * from employee where emp_id = '{$_SESSION['emp_id']}'";
$submit = mysqli_query($conn, $fetch) or die(mysqli_error($conn));
$row = mysqli_fetch_array($submit);
$short_name = $row['fname'] . " " . $row['lname'];
$name = $row['fname'] . " " . $row['mname'] . " " . $row['lname'];
$fetch1 = "select ifsc from branch where manager_id = '{$_SESSION['emp_id']}'";
$submit1 = mysqli_query($conn, $fetch1) or die(mysqli_error($conn));
$row1 = mysqli_fetch_array($submit1);
$ifsc = $row1['ifsc'];
// get all employees
$fetch_employees = "select * from employee where branch_id = '{$ifsc}' and emp_id<>'{$_SESSION['emp_id']}' order by fname,mname,lname";
$submit_fetch_employees = mysqli_query($conn, $fetch_employees) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Details|DBMS Bank</title>
  <!-- Bootsrtap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-mobile/1.4.5/jquery.mobile.structure.min.css" integrity="sha512-ycYlLqHTXPRocKFV8t0C5fUwTvuiv+4m5kHWTN5juUkOiGEJIqlqNtPCwhfKaFlwH+dfQdKRwhOCnI2zds/dmA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <i class="fa-solid fa-house fa-fw"></i><a href="admin_dashboard.php"> Dashboard</a>
      </li>
      <li class="highlight">
        <i class="fa-solid fa-users fa-fw"></i><a href="#"> Employee Details</a>
      </li>
      <li>
        <i class="fa-solid fa-users-rectangle fa-fw"></i><a href="#"> Customer Details</a>
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
          <h1 align="center" class="fs-3">Employee Details</h1>
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
                  <th scope="col">Designation</th>
                  <th scope="col">Phone No</th>
                  <th scope="col">More Details</th>
                </tr>
              </thead>
              <tbody>
                    <tr class="table-warning">
                    <td><?php echo $name; ?></td>
                    <td><?php echo $row['designation']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><a href="#">click here</a></td>
                  </tr>
                <?php while ($employees = mysqli_fetch_array($submit_fetch_employees)) { ?>
                  <tr class="table-warning">
                    <td><?php echo $employees['fname']." ".$employees['mname']." ".$employees['lname']; ?></td>
                    <td><?php echo $employees['designation']; ?></td>
                    <td><?php echo $employees['phone_number']; ?></td>
                    <td><a href="#">click here</a></td>
                  </tr>
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