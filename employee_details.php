<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) header("location:login.php");
if ($_SESSION['mgr']<1) header("location:employee_dashboard.php");
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details|DBMS Bank</title>
    <!-- Bootsrtap CSS -->
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-mobile/1.4.5/jquery.mobile.structure.min.css"
    integrity="sha512-ycYlLqHTXPRocKFV8t0C5fUwTvuiv+4m5kHWTN5juUkOiGEJIqlqNtPCwhfKaFlwH+dfQdKRwhOCnI2zds/dmA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      <div class="welcome">
        <div class="content rounded-3 p-3">
            <h1 align="center"class="fs-3">Employee Details</h1>
            <p align="center">Branch <?php echo $ifsc; ?></p>
        </div>
    </div>
    <div class="emp-table">
      <table class="table table-bordered table-light table-hover table-responsive-sm">
        <thead>
          <tr class="table-danger">
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Designation</th>
            <th scope="col">Phone No</th>
            <th scope="col">More Details</th>
          </tr>
        </thead>
        <tbody>
          <!-- ELEMENT 1 -->
          <tr class="table-warning">
            <td>Vadiraj</td>
            <td>Gururaj</td>
            <td>Inamdar</td>
            <td>C.E.O</td>
            <td>7083491368</td>
            <td><a href="#">click here</a></td>
          </tr>
          <!-- ELEMENT 2 -->
          <tr class="table-success">
            <td>Chinmay</td>
            <td>Umesh</td>
            <td>Joshi</td>
            <td>General Manager</td>
            <td>7083494568</td>
            <td><a href="#">click here</a></td>
          </tr>
          <!-- ELEMENT 3 -->
          <tr class="table-warning">
            <td>Rutvik</td>
            <td>Prashant</td>
            <td>Vaze</td>
            <td>Branch Manager</td>
            <td>8830925147</td>
            <td><a href="#">click here</a></td>
          </tr>
          <!-- ELEMENT 4 -->
          <tr class="table-success">
            <td>Vibhav </td>
            <td>Visvajeet</td>
            <td>Desai</td>
            <td>Cashier Head</td>
            <td>7543491368</td>
            <td><a href="#">click here</a></td>
          </tr>
        </tbody>
      </table>
    </div>
     </section>
     
</body>
</html>