<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) header("location:index.php");
$email = $_SESSION['email'];
$fetch = "select * from employee where emp_id = '{$_SESSION['emp_id']}'";
$submit = mysqli_query($conn, $fetch) or die(mysqli_error($conn));
if (mysqli_num_rows($submit) == 0) {
    die("User Not Found");
}
$row = mysqli_fetch_array($submit);
$short_name = $row['fname'] . " " . $row['lname'];
$name = $row['fname'] . " " . $row['mname'] . " " . $row['lname'];

?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>DBMS Bank</title>
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
            <li class="highlight">
                <a href="superadmin_portal.php"><i class="fa-solid fa-house fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="employee_details.php"><i class="fa-solid fa-users fa-fw"></i> Employee Details</a>
            </li>
            <li>
                <a href="customer_details.php"><i class="fa-solid fa-users-rectangle fa-fw"></i> Customer Details</a>
            </li>
            <li>
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-fw"></i> Log Out</a>
            </li>
        </ul>
    </aside>

    <section id="wrapper">
        <div class="p-4">
            <section class="mt-4">
                <div class="row">
                    <div class="col-lg-6">
                        <button     type=submit class="btn btn-danger" >Add Employee</button>
                    </div>
                    <div class="col-lg-6">
                    <button type=submit class="btn btn-danger" >Add Customer</button>

                    </div>
                </div>
            </section>

           
        </div>
    </section>
    
</body>

</html>