<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) header("location:index.php");
if ($_SESSION['mgr'] < 1) header("location:employee_dashboard.php");
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
$number_of_branches = "select * from count_branches";
$submit_number_of_branches = mysqli_query($conn, $number_of_branches) or die(mysqli_error($conn));
$row2 = mysqli_fetch_array($submit_number_of_branches);
$no_of_branches = $row2['count'];
// number of employees
$number_of_employees = "select * from count_employee";
$submit_number_of_employees = mysqli_query($conn, $number_of_employees) or die(mysqli_error($conn));
$row3 = mysqli_fetch_array($submit_number_of_employees);
$no_of_employees = $row3['count'];
// number of customers
$number_of_customers = "select * from count_customer";
$submit_number_of_customers = mysqli_query($conn, $number_of_customers) or die(mysqli_error($conn));
$row4 = mysqli_fetch_array($submit_number_of_customers);
$no_of_customers = $row4['count'];
// getting timestamps for charts
$transactions = "select time_stamp,type,amount from transactions where ifsc='$ifsc'";
$submit_transactions = mysqli_query($conn, $transactions) or die(mysqli_error($conn));
// $row_of_transactions = mysqli_fetch_array($submit_transactions);
$credit_each_month=array("01"=>0,"02"=>0,"03"=>0,"05"=>0,"06"=>0,"07"=>0,"08"=>0,"09"=>0,"10"=>0,"11"=>0,"12"=>0,"04"=>0);
$debit_each_month=array("01"=>0,"02"=>0,"03"=>0,"05"=>0,"06"=>0,"07"=>0,"08"=>0,"09"=>0,"10"=>0,"11"=>0,"12"=>0,"04"=>0);
$amount_each_month=array("01"=>0,"02"=>0,"03"=>0,"05"=>0,"06"=>0,"07"=>0,"08"=>0,"09"=>0,"10"=>0,"11"=>0,"12"=>0,"04"=>0);
echo '<script>let x=1;</script>';
while($row_of_transactions = mysqli_fetch_array($submit_transactions)){
    $type=$row_of_transactions['type'];
    if($type=="CREDIT"){
        switch(date("m",  strtotime ($row_of_transactions['time_stamp']))){
            case '01':$credit_each_month["01"]+=1;$amount_each_month["01"]+=$row_of_transactions['amount'];break;
            case '02':$credit_each_month["02"]+=1;$amount_each_month["02"]+=$row_of_transactions['amount'];break;
            case '03':$credit_each_month["03"]+=1;$amount_each_month["03"]+=$row_of_transactions['amount'];break;
            case '04':$credit_each_month["04"]+=1;$amount_each_month["04"]+=$row_of_transactions['amount'];break;
            case '05':$credit_each_month["05"]+=1;$amount_each_month["05"]+=$row_of_transactions['amount'];break;
            case '06':$credit_each_month["06"]+=1;$amount_each_month["06"]+=$row_of_transactions['amount'];break;
            case '07':$credit_each_month["07"]+=1;$amount_each_month["07"]+=$row_of_transactions['amount'];break;
            case '08':$credit_each_month["08"]+=1;$amount_each_month["08"]+=$row_of_transactions['amount'];break;
            case '09':$credit_each_month["09"]+=1;$amount_each_month["09"]+=$row_of_transactions['amount'];break;
            case '10':$credit_each_month["10"]+=1;$amount_each_month["10"]+=$row_of_transactions['amount'];break;
            case '11':$credit_each_month["11"]+=1;$amount_each_month["11"]+=$row_of_transactions['amount'];break;
            case '12':$credit_each_month["12"]+=1;$amount_each_month["12"]+=$row_of_transactions['amount'];break;
        }
    }
    else{
        switch(date("m",  strtotime ($row_of_transactions['time_stamp']))){
            case '01':$debit_each_month["01"]+=1;$amount_each_month["01"]-=$row_of_transactions['amount'];break;
            case '02':$debit_each_month["02"]+=1;$amount_each_month["02"]-=$row_of_transactions['amount'];break;
            case '03':$debit_each_month["03"]+=1;$amount_each_month["03"]-=$row_of_transactions['amount'];break;
            case '04':$debit_each_month["04"]+=1;$amount_each_month["04"]-=$row_of_transactions['amount'];break;
            case '05':$debit_each_month["05"]+=1;$amount_each_month["05"]-=$row_of_transactions['amount'];break;
            case '06':$debit_each_month["06"]+=1;$amount_each_month["06"]-=$row_of_transactions['amount'];break;
            case '07':$debit_each_month["07"]+=1;$amount_each_month["07"]-=$row_of_transactions['amount'];break;
            case '08':$debit_each_month["08"]+=1;$amount_each_month["08"]-=$row_of_transactions['amount'];break;
            case '09':$debit_each_month["09"]+=1;$amount_each_month["09"]-=$row_of_transactions['amount'];break;
            case '10':$debit_each_month["10"]+=1;$amount_each_month["10"]-=$row_of_transactions['amount'];break;
            case '11':$debit_each_month["11"]+=1;$amount_each_month["11"]-=$row_of_transactions['amount'];break;
            case '12':$debit_each_month["12"]+=1;$amount_each_month["12"]-=$row_of_transactions['amount'];break;
        }
    }
    
}
// setting cookie -> experimental
$credit_jan=$credit_each_month["01"];
setcookie("credit_jan",$credit_jan);
$credit_feb=$credit_each_month["02"];
setcookie("credit_feb",$credit_feb);
$credit_mar=$credit_each_month["03"];
setcookie("credit_mar",$credit_mar);
$credit_apr=$credit_each_month["04"];
setcookie("credit_apr",$credit_apr);
$credit_may=$credit_each_month["05"];
setcookie("credit_may",$credit_may);
$credit_jun=$credit_each_month["06"];
setcookie("credit_jun",$credit_jun);
$credit_jul=$credit_each_month["07"];
setcookie("credit_jul",$credit_jul);
$credit_aug=$credit_each_month["08"];
setcookie("credit_aug",$credit_aug);
$credit_sep=$credit_each_month["09"];
setcookie("credit_sep",$credit_sep);
$credit_oct=$credit_each_month["10"];
setcookie("credit_oct",$credit_oct);
$credit_nov=$credit_each_month["11"];
setcookie("credit_nov",$credit_nov);
$credit_dec=$credit_each_month["12"];
setcookie("credit_dec",$credit_dec);

$debit_jan=$debit_each_month["01"];
setcookie("debit_jan",$debit_jan);
$debit_feb=$debit_each_month["02"];
setcookie("debit_feb",$debit_feb);
$debit_mar=$debit_each_month["03"];
setcookie("debit_mar",$debit_mar);
$debit_apr=$debit_each_month["04"];
setcookie("debit_apr",$debit_apr);
$debit_may=$debit_each_month["05"];
setcookie("debit_may",$debit_may);
$debit_jun=$debit_each_month["06"];
setcookie("debit_jun",$debit_jun);
$debit_jul=$debit_each_month["07"];
setcookie("debit_jul",$debit_jul);
$debit_aug=$debit_each_month["08"];
setcookie("debit_aug",$debit_aug);
$debit_sep=$debit_each_month["09"];
setcookie("debit_sep",$debit_sep);
$debit_oct=$debit_each_month["10"];
setcookie("debit_oct",$debit_oct);
$debit_nov=$debit_each_month["11"];
setcookie("debit_nov",$debit_nov);
$debit_dec=$debit_each_month["12"];
setcookie("debit_dec",$debit_dec);

$amount_jan=$amount_each_month["01"];
setcookie("amount_jan",$amount_jan);
$amount_feb=$amount_each_month["02"];
setcookie("amount_feb",$amount_feb);
$amount_mar=$amount_each_month["03"];
setcookie("amount_mar",$amount_mar);
$amount_apr=$amount_each_month["04"];
setcookie("amount_apr",$amount_apr);
$amount_may=$amount_each_month["05"];
setcookie("amount_may",$amount_may);
$amount_jun=$amount_each_month["06"];
setcookie("amount_jun",$amount_jun);
$amount_jul=$amount_each_month["07"];
setcookie("amount_jul",$amount_jul);
$amount_aug=$amount_each_month["08"];
setcookie("amount_aug",$amount_aug);
$amount_sep=$amount_each_month["09"];
setcookie("amount_sep",$amount_sep);
$amount_oct=$amount_each_month["10"];
setcookie("amount_oct",$amount_oct);
$amount_nov=$amount_each_month["11"];
setcookie("amount_nov",$amount_nov);
$amount_dec=$amount_each_month["12"];
setcookie("amount_dec",$amount_dec);
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

            <!-- <section class="statis mt-4 text-center">
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
                </div> -->
        </div>
    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- <script src="js/main.js"></script> -->
    <script>
        'use strict'
        // getting cookies -> highly experimental
        <?php $data = $_COOKIE['credit_jan']; ?>
        var credit_jan=<?php echo $data;?>;
        <?php $data = $_COOKIE['credit_feb']; ?>
        var credit_feb=<?php echo $data;?>;
        <?php $data = $_COOKIE['credit_mar']; ?>
        var credit_mar=<?php echo $data;?>;
        <?php $data = $_COOKIE['credit_apr']; ?>
        var credit_apr=<?php echo $data;?>;
        <?php $data = $_COOKIE['credit_may']; ?>
        var credit_may=<?php echo $data;?>;
        <?php $data = $_COOKIE['credit_jun']; ?>
        var credit_jun=<?php echo $data;?>;
        <?php $data = $_COOKIE['credit_jul']; ?>
        var credit_jul=<?php echo $data;?>;
        <?php $data = $_COOKIE['credit_aug']; ?>
        var credit_aug=<?php echo $data;?>;
        <?php $data = $_COOKIE['credit_sep']; ?>
        var credit_sep=<?php echo $data;?>;
        <?php $data = $_COOKIE['credit_oct']; ?>
        var credit_oct=<?php echo $data;?>;
        <?php $data = $_COOKIE['credit_nov']; ?>
        var credit_nov=<?php echo $data;?>;
        <?php $data = $_COOKIE['credit_dec']; ?>
        var credit_dec=<?php echo $data;?>;

        <?php $data = $_COOKIE['debit_jan']; ?>
        var debit_jan=<?php echo $data;?>;
        <?php $data = $_COOKIE['debit_feb']; ?>
        var debit_feb=<?php echo $data;?>;
        <?php $data = $_COOKIE['debit_mar']; ?>
        var debit_mar=<?php echo $data;?>;
        <?php $data = $_COOKIE['debit_apr']; ?>
        var debit_apr=<?php echo $data;?>;
        <?php $data = $_COOKIE['debit_may']; ?>
        var debit_may=<?php echo $data;?>;
        <?php $data = $_COOKIE['debit_jun']; ?>
        var debit_jun=<?php echo $data;?>;
        <?php $data = $_COOKIE['debit_jul']; ?>
        var debit_jul=<?php echo $data;?>;
        <?php $data = $_COOKIE['debit_aug']; ?>
        var debit_aug=<?php echo $data;?>;
        <?php $data = $_COOKIE['debit_sep']; ?>
        var debit_sep=<?php echo $data;?>;
        <?php $data = $_COOKIE['debit_oct']; ?>
        var debit_oct=<?php echo $data;?>;
        <?php $data = $_COOKIE['debit_nov']; ?>
        var debit_nov=<?php echo $data;?>;
        <?php $data = $_COOKIE['debit_dec']; ?>
        var debit_dec=<?php echo $data;?>;

        <?php $data = $_COOKIE['amount_jan']; ?>
        var amount_jan=<?php echo $data;?>;
        <?php $data = $_COOKIE['amount_feb']; ?>
        var amount_feb=<?php echo $data;?>;
        <?php $data = $_COOKIE['amount_mar']; ?>
        var amount_mar=<?php echo $data;?>;
        <?php $data = $_COOKIE['amount_apr']; ?>
        var amount_apr=<?php echo $data;?>;
        <?php $data = $_COOKIE['amount_may']; ?>
        var amount_may=<?php echo $data;?>;
        <?php $data = $_COOKIE['amount_jun']; ?>
        var amount_jun=<?php echo $data;?>;
        <?php $data = $_COOKIE['amount_jul']; ?>
        var amount_jul=<?php echo $data;?>;
        <?php $data = $_COOKIE['amount_aug']; ?>
        var amount_aug=<?php echo $data;?>;
        <?php $data = $_COOKIE['amount_sep']; ?>
        var amount_sep=<?php echo $data;?>;
        <?php $data = $_COOKIE['amount_oct']; ?>
        var amount_oct=<?php echo $data;?>;
        <?php $data = $_COOKIE['amount_nov']; ?>
        var amount_nov=<?php echo $data;?>;
        <?php $data = $_COOKIE['amount_dec']; ?>
        var amount_dec=<?php echo $data;?>;

        // Global defaults
        Chart.defaults.global.animation.duration = 2000; // Animation duration
        Chart.defaults.global.title.display = false; // Remove title
        Chart.defaults.global.defaultFontColor = '#71748c'; // Font color
        Chart.defaults.global.defaultFontSize = 13; // Font size for every label

        // Tooltip global resets
        Chart.defaults.global.tooltips.backgroundColor = '#111827'
        Chart.defaults.global.tooltips.borderColor = 'blue'

        // Gridlines global resets
        Chart.defaults.scale.gridLines.zeroLineColor = '#3b3d56'
        Chart.defaults.scale.gridLines.color = '#3b3d56'
        Chart.defaults.scale.gridLines.drawBorder = false

        // Legend global resets
        Chart.defaults.global.legend.labels.padding = 0;
        Chart.defaults.global.legend.display = false;

        // Ticks global resets
        Chart.defaults.scale.ticks.fontSize = 12
        Chart.defaults.scale.ticks.fontColor = '#71748c'
        Chart.defaults.scale.ticks.beginAtZero = false
        Chart.defaults.scale.ticks.padding = 10

        // Elements globals
        Chart.defaults.global.elements.point.radius = 0

        // Responsivess
        Chart.defaults.global.responsive = true
        Chart.defaults.global.maintainAspectRatio = false

        // The bar chart
        var myChart = new Chart(document.getElementById('myChart'), {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", 'May', 'June', 'August', 'September','October','November','December'],
                datasets: [{
                    label: "Credit",
                    data: [credit_jan,credit_feb,credit_mar,credit_apr, credit_may, credit_jun, credit_jul, credit_aug, credit_sep,credit_oct,credit_nov,credit_dec],
                    backgroundColor: "#0d6efd",
                    borderColor: 'transparent',
                    borderWidth: 2.5,
                    barPercentage: 0.4,
                }, {
                    label: "Debit",
                    startAngle: 2,
                    data: [debit_jan,debit_feb,debit_mar,debit_apr, debit_may, debit_jun, debit_jul, debit_aug, debit_sep,debit_oct,debit_nov,debit_dec],
                    backgroundColor: "#dc3545",
                    borderColor: 'transparent',
                    borderWidth: 2.5,
                    barPercentage: 0.4,
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {},
                        ticks: {
                            stepSize: 15,
                        },
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }
        })

        // The line chart
        var chart = new Chart(document.getElementById('myChart2'), {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", 'May', 'June', 'August', 'September','October','November','December'],
                datasets: [{
                    label: "Amount",
                    data: [amount_jan,amount_feb,amount_mar,amount_apr, amount_may, amount_jun, amount_jul, amount_aug, amount_sep,amount_oct,amount_nov,amount_dec],
                    backgroundColor: 'transparent',
                    borderColor: '#0d6efd',
                    lineTension: .4,
                    borderWidth: 1.5,
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false
                        },
                        ticks: {
                            stepSize: 12,
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                        },
                    }]
                }
            }
        })
    </script>
</body>

</html>