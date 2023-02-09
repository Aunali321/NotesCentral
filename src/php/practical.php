<?php
require('db.php');

$url_params = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($url_params, $params);
$sem = $params['sem'];
$sub = $params['sub'];
$pnum = $params['pnum'];

function display_practical($pnum, $subject, $semester)
{
    global $con;
    $db = mysqli_select_db($con, 'notescentral');
    if (!$db) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = "SELECT * FROM `practicals` WHERE `semester` = '$semester' AND `subject` = '$subject' AND `pnum` = '$pnum'";
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
                    <pre class="border-l-4 whitespace-pre-wrap border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                        <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">%s</p>
                    </pre>
                    <pre class="p-4 my-4 border-l-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                        <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white"><span class="underline font-bold">Output</span><br>%s</p>
                    </pre>
                </div>
            </div>
            ';
            echo sprintf($format, $pnum, $name, $semester, $subject, $code, $output);
        }
    }
}

display_practical($pnum, $sub, $sem);

?>

<html>

<head>
    <title>Practical</title>
</head>

</html>

<body>
</body>