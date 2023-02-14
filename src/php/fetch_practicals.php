<?php
require('db.php');
require('user_access_control.php');
require('delete_practical.php');

function display_practicals_by_sem($semester, $subject)
{
    global $con;
    $db = mysqli_select_db($con, 'notescentral');
    if (!$db) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = "SELECT * FROM `practicals` WHERE `semester` = '$semester' AND `subject` = '$subject'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    practical_card($result);
}

function display_grid()
{
    global $con;
    $db = mysqli_select_db($con, 'notescentral');
    if (!$db) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = "SELECT * FROM `practicals`";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    practical_card($result);
}


function practical_card($result)
{
    global $is_admin;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $pnum = $row['pnum'];
            $name = $row['name'];
            $semester = $row['semester'];
            $subject = $row['subject'];
            $read_more_url = sprintf("php/practical.php?sem=%d&sub=%s&pnum=%d", $semester, $subject, $pnum);
            $delete_practical_url = sprintf("php/delete_practical.php?id=%d", $id);
            $edit_practical_url = sprintf("../src/edit?id=%d", $id);
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
                                    <a href="<?php echo $edit_practical_url; ?>">
                                        <svg class="h-7 w-7 text-indigo-500" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>

                                    <a href="<?php echo $delete_practical_url; ?>">
                                        <svg class="h-7 w-7 text-red-500" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
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
