<?php
require('db.php');
require('user_access_control.php');
require('delete_practical.php');

function display_practicals_by_sem($semester, $subject)
{
    global $con;
    global $is_admin;
    $db = mysqli_select_db($con, 'notescentral');
    if (!$db) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = "SELECT * FROM `practicals` WHERE `semester` = '$semester' AND `subject` = '$subject'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
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
                                        <svg class="h-7 w-7 text-indigo-400" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <!-- <a href="<?php echo $delete_practical_url; ?>">
                                        <svg class="h-7 w-7 text-red-600" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a> -->

                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm text-center" type="button">
                                        <svg class="h-7 w-7 text-red-600" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>

                                    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                        <div class="relative w-20 h-20 max-w-sm md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                                                    <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-10 h-10 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this practical?</h3>
                                                    <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                    <a href="<?php echo $delete_practical_url; ?>" data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-400 rounded-lg border border-red-400 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-red-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-red-400">
                                                        Yes, I'm sure
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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

function display_grid()
{
    global $con;
    global $is_admin;
    $db = mysqli_select_db($con, 'notescentral');
    if (!$db) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = "SELECT * FROM `practicals`";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
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
                                        <svg class="h-7 w-7 text-indigo-400" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <!-- <a href="<?php echo $delete_practical_url; ?>">
                                        <svg class="h-7 w-7 text-red-600" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a> -->

                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm text-center" type="button">
                                        <svg class="h-7 w-7 text-red-600" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>

                                    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                        <div class="relative w-20 h-20 max-w-sm md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                                                    <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-10 h-10 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this practical?</h3>
                                                    <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                    <a href="<?php echo $delete_practical_url; ?>" data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-400 rounded-lg border border-red-400 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-red-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-red-400">
                                                        Yes, I'm sure
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
