<?php
require 'includes/common.php';
if (!isset($_SESSION['pan']))
    header("location:cust_login.php");
$pan = $_SESSION['pan'];
$fetch = "select * from customer where cin = '{$_SESSION['cin']}'";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/styles.css" rel="stylesheet">

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
            <li class="highlight">
                <a href="admin_dashboard.php"><i class="fa-solid fa-house fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="employee_details.php"><i class="fa-regular fa-credit-card fa-fw"></i> Card Details</a>
            </li>
            <!-- <li>
                <a href="customer_details.php"><i class="fa-sharp fa-solid fa-file-invoice fa-fw"></i> Account Details</a>
            </li> -->
            <li>
                <a href="customer_details.php"><i class="fa-solid fa-money-bill-transfer fa-fw"></i> Transactions</a>
            </li>
            <li>
                <a href="customer_details.php"><i class="fa-solid fa-sack-dollar fa-fw"></i> Loans</a>
            </li>
            <li>
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-fw"></i> Log Out</a>
            </li>
        </ul>
    </aside>

    <section id="wrapper">
        <div class="p-4">
            <div class="welcome">
                <div class="content rounded-3 p-3">
                    <h1 class="fs-3">Hello
                        <?php echo $name; ?>
                    </h1>
                    <p class="mb-0">Welcome to your awesome dashboard!</p>
                </div>
            </div>
        </div>

        <section class="admins mt-4">
            <div class="row">
                <!-- savings -->
                <div class="col-md-6">
                    <div class="box">
                        <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
                            <div class="ms-3">
                            <h2 class="fs-5 mb-1"> SAVINGS ACCOUNT</h2> 
                            <?php $fetch = "(select * from account where acc_type='SAVINGS') a join (select cin from customer where cin='{$_SESSION['cin']}') c on c.cin = a.cin";
                                $submit = mysqli_query($conn, $fetch) or die(mysqli_error($conn));
                                if (mysqli_num_rows($submit) == 0) {?>
                                    <h3 class="fs-5 mb-1"> N/A</h3>                                   
                              <?php  } else {
                                $row = mysqli_fetch_array($submit); ?>

                                <h3 class="fs-5 mb-1">Account Number:<?php echo $row['acc_no']?> </h3> 

                           <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- current -->
                <div class="col-md-6">
                    <div class="box">
                        <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
                            <div class="ms-3">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- salary -->
                <div class="col-md-6">
                    <div class="box">
                        <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
                            <div class="ms-3">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- RD -->
                <div class="col-md-6">
                    <div class="box">
                        <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
                            <div class="ms-3">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- FD -->
                <div class="col-md-6">
                    <div class="box">
                        <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
                            <div class="ms-3">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- NRI -->
                <div class="col-md-6">
                    <div class="box">
                        <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
                            <div class="ms-3">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</body>

</html>