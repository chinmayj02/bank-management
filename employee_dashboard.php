<?php 
require 'includes/common.php';

if (!isset($_SESSION['email'])) header("location:index.php");
?>

<!DOCTYPE html>
<head>

</head>
<in>
    <h1>Hello</h1>
    <a href="logout.php" target="_self"><span class="glyphicon glyphicon-log-out"></span> Logout</a>

</body>
</html>