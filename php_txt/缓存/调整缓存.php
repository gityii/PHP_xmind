<?php # Script 2.8 - view_tasks.php

// Connect to the database:
$dbc = mysqli_connect('localhost', 'root', '', 'tasks_1');

// Get the latest dates as timestamps:
$q = 'SELECT UNIX_TIMESTAMP(MAX(date_added)), UNIX_TIMESTAMP(MAX(date_completed)) FROM tasks'; 
$r = mysqli_query($dbc, $q);
list($max_a, $max_c) = mysqli_fetch_array($r, MYSQLI_NUM);

// Determine the greater timestamp:
$max = ($max_a > $max_c) ? $max_a : $max_c;

// Create a cache interval in seconds:
$interval = 60 * 60 * 6; // 6 hours

// Send the headers:
header("Last-Modified: " . gmdate ('r', $max));
header("Expires: " . gmdate ("r", ($max + $interval)));
header("Cache-Control: max-age=$interval");
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Tasks</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Current To-Do List</h2>
<?php
function make_list($parent) {
    global $tasks;
    echo '<ol>'; // Start an ordered list.
    foreach ($parent as $task_id => $todo) {
        echo "<li>$todo";
        if (isset($tasks[$task_id])) { 
            // Call this function again:
            make_list($tasks[$task_id]);
        }
        echo '</li>'; // Complete the list item.
    } // End of FOREACH loop.
    echo '</ol>'; // Close the ordered list.
} // End of make_list() function.
$q = 'SELECT task_id, parent_id, task FROM tasks WHERE date_completed="0000-00-00 00:00:00" ORDER BY parent_id, date_added ASC'; 
$r = mysqli_query($dbc, $q);
$tasks = array();
while (list($task_id, $parent_id, $task) = mysqli_fetch_array($r, MYSQLI_NUM)) {
    $tasks[$parent_id][$task_id] =  $task;
}
make_list($tasks[0]);
?>
</body>
</html>