<?php
include("php/auth_session.php");
include("php/user_access_control.php");

if ($is_admin == 0) {
    header("Location: dashboard");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- dummy stuff -->
    <div class="max-h-96 gap-4 p-5">
        <div class="w-full flex flex-col justify-between h-full max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">P - 1. Practical 1 </h5>
                </a>
            </div>
            <div class="">
                <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Sem - 1 <br> Subject - Maths </p>
                <a href="php/practical.php?sem=1&sub=Maths&pnum=1" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="max-h-96 gap-4 p-5">
        <div class="w-full flex flex-col justify-between h-full max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">P - 2. Practical 2 </h5>
                </a>
            </div>
            <div class="">
                <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Sem - 1 <br> Subject - Maths </p>
                <a href="php/practical.php?sem=1&sub=Maths&pnum=2" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Read More</a>
            </div>
        </div>
    </div>

</body>

</html>