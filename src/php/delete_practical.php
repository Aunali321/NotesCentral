<?php
require('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `practicals` WHERE `id` = $id";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    if ($result) {
        header("Location: ../dashboard");
    }
}
