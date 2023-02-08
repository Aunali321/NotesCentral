<?php
require('db.php');

session_start();

// fetch practicals from database based on selected semester and subject

$semester = $_POST['semester'];
$subject = $_POST['subject'];

$query = "SELECT * FROM `practicals` WHERE `semester` = '$semester' AND `subject` = '$subject'";
$result = mysqli_query($con, $query);
