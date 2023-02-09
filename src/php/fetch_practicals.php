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
            echo "<tr>";
            echo "<td>Practical " . $row['pnum'] . " -</td> ";
            echo "<td>" . $row['name'] . "</td>" . "<br>";
            echo "<td>Semester - " . $row['semester'] . "</td>" . "<br>";
            echo "<td>Subject - " . $row['subject'] . "</td>" . "<br>";
            echo '<td><blockquote class="p-4 my-4 border-l-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800"><p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">' . $row['code'] . "</p></blockquote></td>";
            echo "<td>Output <br>" . $row['output'] . "</td>" . "<br>";
            echo "</tr><br><br>";
        }
    }
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
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $pnum = $row['pnum'];
            $name = $row['name'];
            $semester = $row['semester'];
            $subject = $row['subject'];
            $code = $row['code'];
            $output = $row['output'];
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
