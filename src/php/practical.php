<?php
require('db.php');

$url_params = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($url_params, $params);
$id = $params['id'];

global $con;
$db = mysqli_select_db($con, 'notescentral');
if (!$db) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = "SELECT * FROM `practicals` WHERE `id` = '$id'";
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
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P - <?php echo $pnum; ?>. <?php echo $name; ?> </title>
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="../../assets/highlight/styles/night-owl.min.css">
</head>

<body>

    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="flex flex-col justify-between h-full">
                <div class="space-y-4">
                    <h1 class="text-center font-bold"><?php echo $subject ?></h1>
                    <?php

                    $query = "SELECT * FROM `practicals` WHERE `subject` = '$subject' ORDER BY `pnum` ASC";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $pnumSidebar = $row['pnum'];
                            $nameSidebar = $row['name'];

                            echo '<li class="px-2 py-1.5 text-sm font-semibold text-gray-700 rounded-lg dark:text-gray-400 dark:hover:text-white dark:hover:bg-blue-600 hover:bg-gray-100"> <a href="practical.php?id=' . $id . '"> P - ' . $pnumSidebar . '. ' . $nameSidebar . '</a> </li>';
                        }
                    }
                    ?>
                </div>
                <div class="inline">
                    <a href="../dashboard" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="h-7 w-7" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg> <span class="ml-3">Home</span>
                    </a>
                </div>
            </ul>
        </div>
    </aside>

    <div class="px-4 py-2 sm:ml-64">
        <div class="rounded-lg">
            <div class="p-4 h-min mb-4 rounded-xl bg-gray-50 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> P - <?php echo htmlspecialchars($pnum); ?>. <?php echo htmlspecialchars($name); ?> </h5>
                </p>
                <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">Sem - <?php echo htmlspecialchars($semester); ?> <br> Subject - <?php echo htmlspecialchars($subject); ?> </p>
            </div>
        </div>

        <!-- practical code using pre tag and wrap word on overflow -->
        <div class="rounded-lg">
            <div class="p-4 h-full mb-4 rounded-xl bg-gray-50 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                <h5 class="mb-5 text-2xl font-bold text-center tracking-tight text-gray-900 dark:text-white"> Practical Code </h5>
                </p>
                <pre><code id="code" class="rounded-xl mb-5 font-normal overflow-scroll md:overflow-auto md:whitespace-pre-wrap"><?php echo htmlspecialchars($code); ?></code></pre>
            </div>
        </div>

        <!-- practical output -->
        <div class="rounded-lg">
            <div class="p-4 h-full mb-4 rounded-xl bg-gray-50 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                <h5 class="mb-5 text-2xl font-bold text-center tracking-tight text-gray-900 dark:text-white"> Practical Output </h5>
                </p>
                <pre><code class="rounded-xl mb-5 font-normal overflow-auto whitespace-pre-wrap"><?php echo htmlspecialchars($output); ?></code></pre>
            </div>
        </div>

        <script src="../../node_modules/flowbite/dist/flowbite.min.js"></script>
        <script src="../../assets/highlight/highlight.min.js"></script>
        <script>
            hljs.highlightAll();
        </script>

        <!-- add language-cpp to id "card" if subject is "CPP" -->
        <script>
            var subject = "<?php echo $subject; ?>";
            if (subject == "CPP") {
                document.getElementById("code").classList.add("language-cpp");
            }
        </script>

</body>

</html>

<!-- explain why `code` and `output` variables get updated when selecting another practical from sidebar but `pnum` and `name` variables don't -->