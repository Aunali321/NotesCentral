<?php
require('db.php');

function display_practicals_by_sem($semester, $subject)
{
    global $con;
    $db = mysqli_select_db($con, 'notescentral');
    if (!$db) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = "SELECT * FROM `practicals` WHERE `semester` = '$semester' AND `subject` = '$subject'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pnum = $row['pnum'];
            $name = $row['name'];
            $semester = $row['semester'];
            $subject = $row['subject'];
            $format = '
                <div class="max-h-96 gap-4 p-5">
                    <div class="w-full flex flex-col justify-between h-full max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">P - %d. %s </h5>
                            </a>
                        </div>
                        <div class="">
                            <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Sem - %d <br> Subject - %s </p>
                            <a href="php/practical.php?sem=%d&sub=%s&pnum=%d" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Read More</a>
                        </div>
                    </div>
                </div>
            ';
            echo sprintf($format, $pnum, $name, $semester, $subject, $semester, $subject, $pnum);
        }
    }
}

function display_grid()
{
    require('user_access_control.php');
    global $con;
    $db = mysqli_select_db($con, 'notescentral');
    if (!$db) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = "SELECT * FROM `practicals`";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pnum = $row['pnum'];
            $name = $row['name'];
            $semester = $row['semester'];
            $subject = $row['subject'];
            $read_more_url = sprintf("php/practical.php?sem=%d&sub=%s&pnum=%d", $semester, $subject, $pnum);
            $is_admin = (bool) isset($is_admin) ? $is_admin : false;
?>
            <div class="max-h-96 gap-4 p-5">
                <div class="w-full flex flex-col justify-between h-full max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div>
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">P - <?php echo $pnum; ?>. <?php echo $name; ?> </h5>
                        </a>
                    </div>
                    <div>
                        <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Sem - <?php echo $semester; ?> <br> Subject - <?php echo $subject; ?> </p>
                        <div class="flex justify-between items-center">
                            <a href="<?php echo $read_more_url; ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Read More</a>
                            <?php if ($is_admin) : ?>
                                <div class="flex space-x-4">
                                    <svg class="h-7 w-7" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <svg class="h-7 w-7" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
<?php

        }
    }
}
