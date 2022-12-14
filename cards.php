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


$fetch2 = "select balance from account_details join account on account.acc_no=account_details.acc_no where cin = '{$_SESSION['cin']}' and acc_type='SAVINGS'";
$submit2 = mysqli_query($conn, $fetch2) or die(mysqli_error($conn));
$row2 = mysqli_fetch_array($submit2);
$savings_balance = round($row2['balance'],2);
$fetch3 = "select balance from account_details join account on account.acc_no=account_details.acc_no where cin = '{$_SESSION['cin']}' and acc_type='CURRENT'";
$submit3 = mysqli_query($conn, $fetch3) or die(mysqli_error($conn));
$row3 = mysqli_fetch_array($submit3);
$current_balance = round($row3['balance'],2);

$fetch4 = "select * from 
customer join account on customer.cin=account.cin
join card on account.acc_no=card.acc_no 
join card_details on card.card_no=card_details.card_no
where card_details.card_type='CREDIT' and customer.cin='{$_SESSION['cin']}'";

$submit4 = mysqli_query($conn, $fetch4) or die(mysqli_error($conn));
$credit = mysqli_fetch_array($submit4);

$fetch5 = "select * from 
customer join account on customer.cin=account.cin
join card on account.acc_no=card.acc_no 
join card_details on card.card_no=card_details.card_no
where card_details.card_type='DEBIT' and customer.cin='{$_SESSION['cin']}'";

$submit5 = mysqli_query($conn, $fetch5) or die(mysqli_error($conn));
$debit = mysqli_fetch_array($submit5);

    // function moneyFormatIndia($num) {
    //     $explrestunits = "" ;
    //     if(strlen($num)>3) {
    //         $lastthree = substr($num, strlen($num)-3, strlen($num));
    //         $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
    //         $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
    //         $expunit = str_split($restunits, 2);
    //         for($i=0; $i<sizeof($expunit); $i++) {
    //             // creates each of the 2's group and adds a comma to the end
    //             if($i==0) {
    //                 $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
    //             } else {
    //                 $explrestunits .= $expunit[$i].",";
    //             }
    //         }
    //         $thecash = $explrestunits.$lastthree;
    //     } else {
    //         $thecash = $num;
    //     }
    //     return $thecash; // writes the final format where $currency is the currency symbol.
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="css/cust_dash.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/8afb14104e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    
        <nav class="navbar position-sticky top-0 left-0 navbar-expand-md">
            <div class="container-fluid mx-2">
                <div class="navbar-header">
                    <i data-show="show-side-navigation1" class="show-side-btn fa-fw text-white "></i>
                    <a class="navbar-brand" href="admin_dashboard.php">DBMS<span class="main-color">Bank</span></a>
                </div>
            </div>
            <div class="container-fluid" style="margin-right: -1060px;">
            <div class="navbar-header">
				<a type="submit" onclick="history.back()" class="btn btn-success">Go Back</a>
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
                <a href="customer_dashboard.php"><i class="fa-solid fa-house fa-fw"></i> Dashboard</a>
            </li>
            <li class="highlight">
                <a href="cards.php"><i class="fa-regular fa-credit-card fa-fw"></i> Card Details</a>
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
            <div class="customer-cards">
                <div class="card-1">
                <div class="CARD">
                    <div class="top">
                        <h1><i>visa</i></h1>
                        <h2>Credit Card</h2>
                    </div>
                    <div class="mid">
                        <h2>Card Number</h2>
                        <div class="card-number">
                            <span><?php echo $credit['card_no'];?></span>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="card-holder">
                            <h2>Card Holder</h2>
                            <span><?php echo $name;?></span>
                        </div>
                        <div class="express">
                            <h2>expires</h2>
                            <?php $expiry=strtotime($credit['exp_date']);
                                    $month=date("m",$expiry);
                                    $year=date("Y",$expiry); ?>
                            <span><?php echo $month ?></span>/
                            <span><?php echo $year ?></span>
                        </div>
                    </div>
                </div>
                </div>
                <div class="card-2">
                    <div class="CARD">
                        <div class="top">
                            <h1><i>visa</i></h1>
                            <h2>Debit Card</h2>
                        </div>
                        <div class="mid">
                            <h2>Card Number</h2>
                            <div class="card-number">
                                <span><?php echo $debit['card_no'];?></span>
                                
                            </div>
                        </div>
                        <div class="bottom">
                            <div class="card-holder">
                                <h2>Card Holder</h2>
                                <span><?php echo $name;?></span>
                            </div>
                            <div class="express">
                                <h2>expires</h2>
                                <?php $expiry=strtotime($debit['exp_date']);
                                    $month=date("m",$expiry);
                                    $year=date("Y",$expiry); ?>
                            <span><?php echo $month ?></span>/
                            <span><?php echo $year ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>