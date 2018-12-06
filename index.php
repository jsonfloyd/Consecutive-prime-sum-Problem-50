<?php

namespace App;
require './src/ConsecutivePrimeSum.php';

$timeStart = microtime(true);

$calc = new ConsecutivePrimeSum(1000000);
$result = $calc->getConsecutiveSums();

$timeEnd = microtime(true);
print_r($result);
$executionTime = ($timeEnd - $timeStart);

echo 'Total Execution Time: ' . $executionTime . ' secs';