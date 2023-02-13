<?php
include('php/db.php');
include("php/auth_session.php");
include("php/user_access_control.php");

if ($is_admin == 0) {
    header("Location: dashboard");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `practicals` WHERE `id` = $id";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $practical = mysqli_fetch_assoc($result);
    if (!$practical) {
        echo "Couldn't get practical data" . mysqli_error($con);
    }
} else {
    echo "Couldn't set id" . mysqli_error($con);
}

?>

<?php

if (isset($_POST['edit'])) {
    $pnum = $_POST['pnum'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $subject = $_POST['subject'];
    $semester = $_POST['semester'];
    $code = $_POST['code'];
    $output = $_POST['output'];
    $sql = "UPDATE `practicals` SET username='$username', name='$name', subject='$subject', code='$code', output='$output', semester='$semester', pnum='$pnum' WHERE `id` = $id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo '
        <div class="p-4 m-4 max-w-sm text-sm md:max-w-3xl mx-auto text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Success!</span> Practical has been edited successfully.
        </div>';
        header("Location: dashboard");
    } else {
        echo '
        <div class="p-4 m-4 max-w-sm text-sm md:max-w-3xl mx-auto text-green-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Failed!</span> Practical couldn\'t be edited.
        </div>' . mysqli_error($con);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
    <title>Edit Practical</title>
</head>

<body>
    <div class="flex items-center mx-4 my-40 px-4 md:mx-20 md:my-28 justify-center h-screen lg:h-full">
        <div class="w-full md:m-10 bg-white border border-gray-200 rounded-lg shadow md:max-w-3xl dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-center font-bold text-2xl mt-4">Edit a Practical</h1>
            <form class="space-y-8 p-6 md:p-6 md:m-2" action="" method="POST" name="edit">
                <div class="md:flex md:space-x-4">
                    <div class="mb-6 md:w-16">
                        <label for="pnum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number</label>
                        <input type="number" value="<?= $practical['pnum'] ?>" name="pnum" id="pnum" class="bg-gray-50 border text-center border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="25" required>
                    </div>
                    <div class="mb-6 flex-grow">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Practical name</label>
                        <input type="name" value="<?= $practical['name'] ?>" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Make a basic form to get user data." required>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
                    <input type="username" value="<?= $practical['username'] ?>" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="User" required>
                </div>
                <div class="mb-6">
                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Practical subject</label>
                    <input type="subject" value="<?= $practical['subject'] ?>" name="subject" id="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="PHP" required>
                </div>
                <div class="mb-6">
                    <label for="semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Practical semester</label>
                    <input type="number" value="<?= $practical['semester'] ?>" name="semester" id="semester" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="4" required>
                </div>

                <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Practical code</label>
                <textarea id="code" rows="4" name="code" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write code..."><?= $practical['code'] ?></textarea>


                <label for="output" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your output</label>
                <textarea id="output" rows="4" name="output" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write output..."><?= $practical['output'] ?></textarea>


                <button type="submit" name="edit" class="md:mx-auto md:w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>