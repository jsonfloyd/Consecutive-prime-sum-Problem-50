<?php
namespace App;
require './src/ConsecutivePrivmeSum.php';
$time_start = microtime(true);
$calc = new ConsecutivePrivmeSum(15000);
print_r($calc->getConsecutiveSums());
$time_end = microtime(true);

//dividing with 60 will give the execution time in minutes otherwise seconds
$execution_time = ($time_end - $time_start);

//execution time of the script
echo '<b>Total Execution Time:</b> '.$execution_time.' secs';