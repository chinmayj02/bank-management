<?php
require 'includes/common.php';
if (!isset($_SESSION['email']))
  header("location:index.php");
if ($_SESSION['mgr'] < 1)
  header("location:employee_dashboard.php");
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
if ($email == "root@dbms.com") {
  $fetch_employees = "select * from employee where emp_id<>'{$_SESSION['emp_id']}' order by designation,fname,mname,lname";
} else {
  $fetch_employees = "select * from employee where branch_id = '{$ifsc}' and emp_id<>'{$_SESSION['emp_id']}' order by designation,fname,mname,lname";
}
$submit_fetch_employees = mysqli_query($conn, $fetch_employees) or die(mysqli_error($conn));
function passChecker($conn)
{
  if (isset($_COOKIE['pass'])) {
    $pass_to_check = md5($_COOKIE['pass']);
    $fetch_pass = "select password from emp_credentials where emp_id = '{$_SESSION['emp_id']}'";
    $submit_pass = mysqli_query($conn, $fetch_pass) or die(mysqli_error($conn));
    $row_pass = mysqli_fetch_array($submit_pass);
    if ($row_pass['password'] == $pass_to_check)
      return 1;
    else if (!isset($_COOKIE['pass']))
      return 0;
    else
      return -1;
  }
}
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
  if ($_POST['submit'] == "More") {
    if (passChecker($conn) == 1)
      header("location:profile.php");
    else if (passChecker($conn) == -1)
      echo '<script>alert("Incorrect Password, Please try again");window.location = history.back();</script>';
    else
      echo '<script>window.location = history.back();</script>';
  } else if ($_POST['submit'] == "Remove") {
    if (passChecker($conn) == 1) {
      //  code for removal of the employee starts here
      $to_be_deleted = $_COOKIE['id'];
      $remove_employee_query = "delete from employee where emp_id = '" . $to_be_deleted . "'";
      if (mysqli_query($conn, $remove_employee_query))
        echo '<script>alert("Record deleted successfully.");window.location = history.back();</script>';
      else
        echo '<script>alert("Could not delete.Try again\nError: ".mysqli_error($conn));window.location = history.back();</script>';
      // ends here
    } else if (passChecker($conn) == -1)
      echo '<script>alert("Incorrect Password, Please try again");window.location = history.back();</script>';
    else
      echo '<script>window.location = history.back();</script>';

  }
}
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-mobile/1.4.5/jquery.mobile.structure.min.css"
    integrity="sha512-ycYlLqHTXPRocKFV8t0C5fUwTvuiv+4m5kHWTN5juUkOiGEJIqlqNtPCwhfKaFlwH+dfQdKRwhOCnI2zds/dmA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script>
    function checkPass() {
      document.cookie = "pass= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
      var pass = prompt("Confirm your password:");
      if (pass == null || pass == "" || pass == " ") {
        return;
      }
      document.cookie = "pass=" + pass;
      <?php $_SESSION[' employee_details '] = 1;
      $_SESSION[' customer_details '] = 0;
      ?>
    }

    function confirmRemove() {
      var name= <?php echo $employees['fname'];?>;
      var id= <?php echo $employees['emp_id'];?>;
      alert("Employee " + name + " [Employee ID:" + id + "] will be notified about the removal of his/her record from the database.");
      document.cookie = "name=" + name;
      document.cookie = "id=" + id;
      // checkPass();
    }
  </script>
</head>

<body>
  <nav class="navbar position-sticky top-0 left-0 navbar-expand-md">
    <div class="container-fluid mx-2">
      <div class="navbar-header">
        <a class="navbar-brand" href="admin_dashboard.php">DBMS<span class="main-color">Bank</span></a>
      </div>
    </div>
  </nav>

  <aside class="sidebar position-fixed top-40 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
    <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
      <div class="ms-2">
        <h5 class="fs-6 mb-0">
          <a class="text-decoration-none" href="profile.php">
            <?php echo $short_name; ?>
          </a>
        </h5>
        <p class="mt-1 mb-0">
          <?php echo $email; ?>
        </p>
      </div>
    </div>

    <ul class="list-unstyled">
      <li>

        <?php if ($_SESSION['email'] != "root@dbms.com") {
          echo '<a href="admin_dashboard.php"><i class="fa-solid fa-house fa-fw"></i> Dashboard</a>';
        } else
          echo '<a href="superadmin_portal.php"><i class="fa-solid fa-house fa-fw"></i> Dashboard</a>'; ?>
      </li>
      <li class="highlight">
        <a href="employee_details.php"><i class="fa-solid fa-users fa-fw"></i> Employee Details</a>
      </li>
      <li>
        <a href="customer_details.php"> <i class="fa-solid fa-users-rectangle fa-fw"></i> Customer Details</a>
      </li>
      <li>
        <a href="logout.php"> <i class="fa-solid fa-right-from-bracket fa-fw"></i> Log Out</a>
      </li>
    </ul>

  </aside>
  <section id="wrapper">
    <div class="p-4">
      <div class="welcome">
        <div class="content rounded-3 p-3">
          <h1 align="center" class="fs-3">Employee Details</h1>
          <p align="center">Branch
            <?php echo $ifsc; ?>
          </p>
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
                  <th scope="col">Remove Employee</th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-warning">
                  <td>
                    <?php echo $name; ?>
                  </td>
                  <td>
                    <?php echo $row['designation']; ?>
                  </td>
                  <td align="center">
                    <?php echo $row['phone_number']; ?>
                  </td>
                  <td align="center"></td>
                  <td align="center"></input></td>
                </tr>
                <?php while ($employees = mysqli_fetch_array($submit_fetch_employees)) { ?>
                <tr class="table-warning">
                  <td>
                    <?php echo $employees['fname'] . " " . $employees['mname'] . " " . $employees['lname']; ?>
                  </td>
                  <td>
                    <?php echo $employees['designation']; ?>
                  </td>
                  <td align="center">
                    <?php echo $employees['phone_number']; ?>
                  </td>
                  <td align="center">
                    <form method="post"><input class="btn btn-success" type=submit name="submit" value="More"
                        onclick="checkPass()"></input></form>
                  </td>
                  <td align="center">
                    
                    <form method="post"><input class="btn btn-danger" type=submit name="submit" value="Remove"
                        onclick='<script>alert("Record deleted successfully.");</script>'></input></form>
                  </td>
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