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
            <div class="grid grid-flow-row auto-rows-max gap-4">
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">P - %d. %s </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Sem - %d <br> Subject - %s </p>
                    <a href="php/practical.php?sem=%d&sub=%s&pnum=%d" class="px-4 py-2 mt-4 font-semibold text-white transition-colors duration-200 transform bg-gray-700 rounded-md dark:bg-gray-800 hover:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-600 dark:focus:bg-gray-700">Read More</a>
                </div>
            </div>
            ';
            echo sprintf($format, $pnum, $name, $semester, $subject, $semester, $subject, $pnum);
        }
    }
}
