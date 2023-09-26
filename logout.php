<?php

require_once('db.php');

session_start();
$con = db_conn();

session_unset();
session_destroy();

header('location:login.php');

?>