<?php
@include 'conf.php';

session_start();
session_unset();
session_destroy();

header('location:../../page/long_rec/login.php');

?>