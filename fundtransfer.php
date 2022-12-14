<?php
require 'includes/common.php';
if (!isset($_SESSION['pan']))
    header("location:cust_login.php");
$fetch = "select * from customer where cin = '{$_SESSION['cin']}'";
$submit = mysqli_query($conn, $fetch) or die(mysqli_error($conn));
if (mysqli_num_rows($submit) == 0) {
    die("User Not Found");
}
$row = mysqli_fetch_array($submit);
$short_name = $row['fname'] . " " . $row['lname'];

$fetch2 = "select balance from account_details join account on account.acc_no=account_details.acc_no where cin = '{$_SESSION['cin']}' and acc_type='SAVINGS'";
$submit2 = mysqli_query($conn, $fetch2) or die(mysqli_error($conn));
$row2 = mysqli_fetch_array($submit2);
$savings_balance = round($row2['balance'], 2);
$savings_acc_no = $row2['acc_no'];
$sender_ifsc = $row2['ifsc'];



if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $acc_no = $_POST['acc_no'];
    $ifsc = $_POST['ifsc'];
    $amount = $_POST['amount'];
    if ((int) $savings_balance < ((int) $amount + 2000)) {
        echo '<script>alert("Insufficient balance");window.location = history.back();</script>';

    } 
    echo '<script>var otp = prompt("Enter the otp: ");
    console.log(otp);
        if (otp == null || otp == "") 
            alert("incorrect otp");window.location = history.back();
            if(otp=="1234")
            {  
                document.cookie = "transfer=" + "true";
            }
            else
            {
                document.cookie = "transfer=" + "false";
                <?php echo "alert("transfer failed");";?>

            }

            </script>';
    if ($_COOKIE['transfer'] == "false") 
    {
        echo '<script>alert("transfer failed");window.location = history.back();</script>';
    } 
    
        $new_balance_sender = $row2['balance'] - $amount;
        // echo $new_balance_sender;
        $fetch3 = "update account_details set balance=$new_balance_sender where acc_no=$savings_acc_no";
        $submit3 = mysqli_query($conn, $fetch3) or die(mysqli_error($conn));
        $fetch5 = "select cin,balance from account_details join account on account.acc_no=account_details.acc_no where account.acc_no = '$acc_no' and acc_type='SAVINGS'";
        $submit5 = mysqli_query($conn, $fetch5) or die(mysqli_error($conn));
        $row5 = mysqli_fetch_array($submit5);
        $receiver_cin = $row5['cin'];
        $new_balance_receiver = $row5['balance'] + $amount;
        echo $new_balance_receiver;

        $fetch4 = "update account_details set balance=$new_balance_receiver where acc_no=$acc_no";
        $submit4 = mysqli_query($conn, $fetch4) or die(mysqli_error($conn));
        $fetch6 = "insert into transactions(type,amount,cin,ifsc) values('DEBIT','$amount','{$_SESSION['cin']}','$sender_ifsc')";
        $submit6 = mysqli_query($conn, $fetch6) or die(mysqli_error($conn));
        $fetch7 = "insert into transactions(type,amount,cin,ifsc) values('CREDIT','$amount','$receiver_cin','$ifsc')";
        $submit7 = mysqli_query($conn, $fetch7) or die(mysqli_error($conn));
        echo '<script>alert("transfer successful");window.location = history.back();</script>';

    
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Transfer</title>
    <link href="css/cust_dash.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/8afb14104e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
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
                <a href="fundtransfer.php"><i class="fa-solid fa-arrow-up-from-bracket fa-fw"></i> Transfer</a>
            </li>
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
        <div class="fund-transfer">

            <form id="transfer" method="POST">
                <h2 id="ft">Fund Transfer</h2>
                Account number<input type="text" name="acc_no" placeholder="Enter the account number"><br>
                IFSC Code<input type="text" name="ifsc" placeholder="Enter the branch IFSC Code"><br>
                Amount<input type="number" name="amount" placeholder="Enter the amount to be transfered"><br>
                <!-- Remakrs<input type="text" placeholder="Family/Friends/Others"><br> -->
                <button type="submit" name="submit" value="submit">Pay</button>
            </form>
        </div>
    </section>

    </div>
</body>

</html>