<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) header("location:login.php");
if ($_SESSION['mgr']<1) header("location:employee_dashboard.php");
$email = $_SESSION['email'];
$fetch = "select * from employee where emp_id = '{$_SESSION['emp_id']}'";
$submit = mysqli_query($conn, $fetch) or die(mysqli_error($conn));
$fetch1 = "select ifsc from branch where manager_id = '{$_SESSION['emp_id']}'";
$submit1 = mysqli_query($conn, $fetch1) or die(mysqli_error($conn));
if (mysqli_num_rows($submit) == 0) {
    die("User Not Found");
}
$row = mysqli_fetch_array($submit);
$short_name = $row['fname'] . " " . $row['lname'];
$name = $row['fname'] . " " . $row['mname'] . " " . $row['lname'];
$row1 = mysqli_fetch_array($submit1);
$ifsc = $row1['ifsc'];
$fetch_all_branches = "select * from employee e join (select ifsc,manager_id from branch where manager_id <> '{$_SESSION['emp_id']}') b on e.emp_id=b.manager_id order by rand() limit 6";
$submit_list_of_managers = mysqli_query($conn, $fetch_all_branches) or die(mysqli_error($conn));
// number of branches
$number_of_branches="select * from count_branches";
$submit_number_of_branches = mysqli_query($conn, $number_of_branches) or die(mysqli_error($conn));
$row2 = mysqli_fetch_array($submit_number_of_branches);
$no_of_branches=$row2['count'];
// number of employees
$number_of_employees="select * from count_employee";
$submit_number_of_employees = mysqli_query($conn, $number_of_employees) or die(mysqli_error($conn));
$row3 = mysqli_fetch_array($submit_number_of_employees);
$no_of_employees=$row3['count'];
// number of customers
$number_of_customers="select * from count_customer";
$submit_number_of_customers = mysqli_query($conn, $number_of_customers) or die(mysqli_error($conn));
$row4 = mysqli_fetch_array($submit_number_of_customers);
$no_of_customers=$row4['count'];
// $row_of_managers = mysqli_fetch_array($submit_list_of_managers);
?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-mobile/1.4.5/jquery.mobile.structure.min.css" integrity="sha512-ycYlLqHTXPRocKFV8t0C5fUwTvuiv+4m5kHWTN5juUkOiGEJIqlqNtPCwhfKaFlwH+dfQdKRwhOCnI2zds/dmA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <i class="fa-solid fa-house fa-fw"></i><a href="admin_dashboard.php"> Dashboard</a>
            </li>
            <li>
                <i class="fa-solid fa-users fa-fw"></i><a href="employee_details.php"> Employee Details</a>
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
                    <h1 class="fs-3">Hello <?php echo $name; ?></h1>
                    <p class="mb-0">Welcome to your awesome dashboard!</p>
                    <p class="mb-0">IFSC <?php echo $ifsc; ?></p>
                </div>
            </div>

            <section class="statistics mt-4">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                            <i class="uil-envelope-shield fs-2 text-center bg-primary rounded-circle"><i class="fa-solid fa-building-columns"></i></i>
                            <div class="ms-3">
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0"><?php echo $no_of_branches; ?></h3> <span class="d-block ms-2">Branches</span>
                                </div>
                                <p class="fs-normal mb-0">All Over The World</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                            <i class="uil-file fs-2 text-center bg-danger rounded-circle"><i class="fa-sharp fa-solid fa-people-group"></i></i>
                            <div class="ms-3">
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0"><?php echo $no_of_employees; ?></h3> <span class="d-block ms-2">Employees</span>
                                </div>
                                <p class="fs-normal mb-0">Working Hard For The People</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box d-flex rounded-2 align-items-center p-3">
                            <i class="uil-users-alt fs-2 text-center bg-success rounded-circle"><i class="fa-solid fa-user-group"></i></i>
                            <div class="ms-3">
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0"><?php echo $no_of_customers; ?></h3> <span class="d-block ms-2">Customers</span>
                                </div>
                                <p class="fs-normal mb-0">To Keep Us Motivated</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="charts mt-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="chart-container rounded-2 p-3">
                            <!-- <h3 class="fs-6 mb-3">Chart title number one</h3> -->
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="chart-container rounded-2 p-3">
                            <!-- <h3 class="fs-6 mb-3">Chart title number two</h3> -->
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            </section>

            <section class="admins mt-4">
                <div class="row">
                    <?php
                    while ($row_of_managers = mysqli_fetch_array($submit_list_of_managers)) {
                    ?>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
                                    <div class="ms-3">
                                        <h3 class="fs-5 mb-1"><?php echo $row_of_managers['fname']; ?></h3>
                                        <p class="mb-0">Manager at branch <?php echo $row_of_managers['ifsc']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-md-12">
                            <div class="box">
                                <!-- <div class="admin d-flex align-items-center rounded-2 p-3 mb-4"> -->
                                    <div align="center">
                                    <button href="#" class="buttonClass">View All Fellow Managers</button>
                                    </div>
                                <!-- </div> -->
                            </div>
                        </div>
                </div>
            </section>

            <section class="statis mt-4 text-center">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="box bg-primary p-3">
                            <i class="uil-eye"></i>
                            <h3>9999</h3>
                            <p class="lead">New Customers</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="box bg-danger p-3">
                            <i class="uil-user"></i>
                            <h3>9999</h3>
                            <p class="lead">Total customers</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                        <div class="box bg-warning p-3">
                            <i class="uil-shopping-cart"></i>
                            <h3>9999</h3>
                            <p class="lead">Loans Sanctioned</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="box bg-success p-3">
                            <i class="uil-feedback"></i>
                            <h3>9999</h3>
                            <p class="lead">Transactions</p>
                        </div>
                    </div>
                </div>

                <section class="charts mt-4">
                    <div class="chart-container p-3">
                        <!-- <h3 class="fs-6 mb-3">Chart title number three</h3> -->
                        <div style="height: 300px">
                            <canvas id="chart3" width="100%"></canvas>
                        </div>
                    </div>
                </section>
        </div>
    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.jshttps://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script src="js/main.js"></script>
</body>

</html>