<?php
require 'login.php';
require 'signupp.php';\

session_destroy();
header('Location:login.php');
?>