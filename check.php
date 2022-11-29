<?php
require 'includes/common.php';
if(!isset($_COOKIE['name'])) echo "yes";
echo $_COOKIE['name'];