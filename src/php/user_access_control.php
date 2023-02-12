<?php
include("php/db.php");

// check if user is admin 0 = false, 1 = true
$username = $_SESSION['username'];
$fetch_user_query = "SELECT * FROM `users` WHERE `username` = '$username'";
$fetch_user_result = mysqli_query($con, $fetch_user_query) or die(mysqli_error($con));
$user_record = mysqli_fetch_assoc($fetch_user_result);
$is_admin = $user_record['role'];
