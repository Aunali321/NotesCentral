<?php
//include auth_session.php file on all user panel pages

use function PHPSTORM_META\map;

include("php/auth_session.php");
include("php/fetch_practicals.php");

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
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
            <ul class="space-y-2">
                <li>
                    <div class="inline">
                        <form action="#" method="POST">
                            <input type="hidden" name="semester" value="">
                            <input type="hidden" name="subject" value="">
                            <a href="" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <img class="h-7 w-7" src="https://img.icons8.com/sf-regular-filled/96/null/home-page.png" />
                                <span class="ml-3">All Practicals</span>
                            </a>
                        </form>

                    </div>

                </li>
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="sem1-dropdown" data-collapse-toggle="sem1-dropdown">
                        <i><img class="h-7 w-7" src="https://img.icons8.com/ios-filled/100/null/1-key.png" /></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Semester - 1</span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>

                    </button>
                    <ul id="sem1-dropdown" class="hidden py-2 space-y-2">
                        <li>
                            <form action="#" method="POST">
                                <input type="hidden" name="semester" value="1">
                                <input type="hidden" name="subject" value="C">
                                <a href="" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><button type="submit">C</button></a>
                            </form>
                        </li>
                        <li>
                            <form action="#" method="POST">
                                <input type="hidden" name="semester" value="1">
                                <input type="hidden" name="subject" value="DBMS">
                                <a href="" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><button type="submit">DBMS</button></a>
                            </form>
                        </li>
                    </ul>
                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="sem2-dropdown" data-collapse-toggle="sem2-dropdown">
                        <i><img class="h-7 w-7" src="https://img.icons8.com/ios-filled/100/null/2-key.png" /></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Semester - 2</span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="sem2-dropdown" class="hidden py-2 space-y-2">
                        <li>
                            <form action="#" method="POST">
                                <input type="hidden" name="semester" value="2">
                                <input type="hidden" name="subject" value="Advanced C">
                                <a href="" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><button type="submit">Advanced C</button></a>
                            </form>
                        </li>
                        <li>
                            <form action="#" method="POST">
                                <input type="hidden" name="semester" value="2">
                                <input type="hidden" name="subject" value="I & WD">
                                <a href="" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><button type="submit">I & WD</button></a>
                            </form>
                        </li>
                    </ul>
                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="sem3-dropdown" data-collapse-toggle="sem3-dropdown">
                        <i><img class="h-7 w-7" src="https://img.icons8.com/ios-filled/100/null/3-key.png" /></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Semester - 3</span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="sem3-dropdown" class="hidden py-2 space-y-2">
                        <li>
                            <form action="#" method="POST">
                                <input type="hidden" name="semester" value="3">
                                <input type="hidden" name="subject" value="ADBMS">
                                <a href="" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><button type="submit">ADBMS</button></a>
                            </form>
                        </li>
                        <li>
                            <form action="#" method="POST">
                                <input type="hidden" name="semester" value="3">
                                <input type="hidden" name="subject" value="DS">
                                <a href="" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><button type="submit">DS</button></a>
                            </form>
                        </li>
                    </ul>
                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="sem4-dropdown" data-collapse-toggle="sem4-dropdown">
                        <i><img class="h-7 w-7" src="https://img.icons8.com/ios-filled/100/null/4-key.png" /></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Semester - 4</span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="sem4-dropdown" class="hidden py-2 space-y-2">
                        <li>
                            <form action="#" method="POST">
                                <input type="hidden" name="semester" value="4">
                                <input type="hidden" name="subject" value="PHP">
                                <a href="" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><button type="submit">PHP</button></a>
                            </form>
                        </li>
                        <li>
                            <form action="#" method="POST">
                                <input type="hidden" name="semester" value="4">
                                <input type="hidden" name="subject" value="CPP">
                                <a href="" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><button type="submit">CPP</button></a>
                            </form>
                        </li>
                    </ul>
                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="sem5-dropdown" data-collapse-toggle="sem5-dropdown">
                        <i><img class="h-7 w-7" src="https://img.icons8.com/ios-filled/100/null/5-key.png" /></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Semester - 5</span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="sem5-dropdown" class="hidden py-2 space-y-2">
                        <li>
                            <form action="#" method="POST">
                                <input type="hidden" name="semester" value="5">
                                <input type="hidden" name="subject" value="Java">
                                <a href="" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><button type="submit">Java</button></a>
                            </form>
                        </li>
                        <li>
                            <form action="#" method="POST">
                                <input type="hidden" name="semester" value="5">
                                <input type="hidden" name="subject" value=".NET">
                                <a href="" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><button type="submit">.NET</button></a>
                            </form>
                        </li>
                    </ul>
                    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="sem6-dropdown" data-collapse-toggle="sem6-dropdown">
                        <i><img class="h-7 w-7" src="https://img.icons8.com/ios-filled/100/null/6-key.png" /></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Semester - 6</span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="sem6-dropdown" class="hidden py-2 space-y-2">
                        <li>
                            <form action="#" method="POST">
                                <input type="hidden" name="semester" value="6">
                                <input type="hidden" name="subject" value="Python">
                                <a href="" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><button type="submit">Python</button></a>
                            </form>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="h-7 w-7" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Sign In</span>
                    </a>
                </li>
                <li>
                    <a href="registration.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="h-7 w-7" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Sign Up</span>
                    </a>
                </li>
                <li>
                    <div id="dropdown-cta" class="p-4 mt-6 rounded-lg bg-blue-50 dark:bg-blue-900" role="alert">
                        <div class="flex items-center mb-3">
                            <span class="bg-orange-100 text-orange-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-900">Logout</span>
                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-900 rounded-lg focus:ring-2 focus:ring-blue-400 p-1 hover:bg-blue-200 inline-flex h-6 w-6 dark:bg-blue-900 dark:text-blue-400 dark:hover:bg-blue-800" data-dismiss-target="#dropdown-cta" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="mb-3 text-sm text-blue-800 dark:text-blue-400">
                            <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
                            <p>You are now in dashboard page.</p>
                        </div>
                        <a class="text-sm text-blue-800 underline hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300" href="logout.php">Logout</a>
                    </div>
                </li>

            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 text-center">
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