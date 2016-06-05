<?php
require 'class.phptester.php';
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
echo "Initial Array: " . implode(", ", $arr) . "<br />";
for ($i = 0; $i < 100; $i++) {
  echo implode(", ", (new PHPTester)->randomize($arr)) . "<br />";
}
echo "Final Array: " . implode(", ", $arr) . "<br />";
?>
