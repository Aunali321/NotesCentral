<?php
include("php/auth_session.php");
include("php/fetch_practicals.php");
include("php/user_access_control.php");
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="flex flex-col justify-between h-full">
                <div class="space-y-2">
                    <li>
                        <div class="inline">
                            <form action="#" method="POST">
                                <input type="hidden" name="semester" value="">
                                <input type="hidden" name="subject" value="">
                                <a href="" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg class="h-7 w-7" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg> <span class="ml-3">All Practicals</span>
                                </a>
                            </form>

                        </div>
                    </li>
                    <!-- using loops for navigation -->
                    <?php
                    // use a map
                    $semesters = array(
                        1 => array("C", "DBMS"),
                        2 => array("Advanced C", "I & WD"),
                        3 => array("ADBMS", "DS"),
                        4 => array("PHP", "CPP"),
                        5 => array("JAVA", ".NET"),
                        6 => array("Python")
                    );

                    foreach ($semesters as $semester => $subjects) {
                        echo '
                            <li>
                                <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="sem' . $semester . '-dropdown" data-collapse-toggle="sem' . $semester . '-dropdown">
                                    <span class="material-symbols-outlined h-7 w-7">
                                        counter_' . $semester . '
                                    </span> <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Semester - ' . $semester . '</span>
                                    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <ul id="sem' . $semester . '-dropdown" class="hidden py-2 space-y-2">
                        ';

                        foreach ($subjects as $subject) {
                            echo '
                                <li>
                                    <form method="POST">
                                        <input type="hidden" name="semester" value="' . $semester . '">
                                        <input type="hidden" name="subject" value="' . $subject . '">
                                        <a href="" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><button type="submit">' . $subject . '</button></a>
                                    </form>
                                </li>
                            ';
                        }

                        echo '
                                </ul>
                            </li>
                        ';
                    }
                    ?>

                    <!-- Show create practical if user is admin -->
                    <?php
                    global $is_admin;
                    if ($is_admin) {
                        echo '
                            <li>
                                <a href="create" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg class="h-7 w-7" data-darkreader-inline-stroke="" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <span class="flex-1 ml-3 whitespace-nowrap">Create Practical</span>
                                </a>
                            </li>
                        ';
                    }
                    ?>
                </div>
                <div>
                    <div class="mb-3 text-md font-semibold px-2">
                        <p>Logged in as <span class="text-blue-800 dark:text-blue-400 font-bold"><?php echo $_SESSION['username']; ?></span>!</p>
                    </div>
                    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                    <li>
                        <a href="logout" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg class="h-7 w-7" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                        </a>
                    </li>
                </div>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-blue-700 border-dashed bg-blue-800 text-white dark:bg-transparent rounded-lg dark:border-gray-700 text-center">
            <h3 class="font-bold mx-20">Welcome to our coding community!</h3>
            <h6>Share
                and access
                programming
                practicals with
                ease.
                Say goodbye to
                re-doing experiments,
                join us and improve your coding skills.</h6>
            <h6>With our platform, students can upload and access programming practicals anytime, making their learning
                process more
                efficient and effective. Join the community and take your coding skills to the next level!</h6>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3">
            <!-- <img class="justify-center h-96 md:w-full md:items-center md:justify-center md:mt-40" src="../assets/code_review.svg" alt=""> -->
            <?php

            if (isset($_POST['semester']) && isset($_POST['subject'])) {
                $semester = $_POST['semester'];
                $subject = $_POST['subject'];
                // $result = display_practicals_by_sem($semester, $subject);

                // Filter results by semester and subject

                $result = display_practicals_by_sem($semester, $subject);
            } else {
                $result = display_grid();
                echo $result;
            }
            ?>
        </div>
    </div>


    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>