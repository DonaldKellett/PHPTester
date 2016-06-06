<?php
require 'class.phptester.php';
$array = [0,1,2,3,4,5,6,7,8,9];
for ($i = 0; $i < 10; $i++) {
  echo implode(",", (new PHPTester)->randomize($array)) . "<br />";
}
$array = ["Hello", "World", "bacon", 3.14, 42, true, false];
for ($i = 0; $i < 10; $i++) {
  echo implode(",", (new PHPTester)->randomize($array)) . "<br />";
}
try {
  (new PHPTester)->randomize(true);
} catch (TypeError $e) {
  echo "$e<br />";
}
try {
  (new PHPTester)->randomize(false);
} catch (TypeError $e) {
  echo "$e<br />";
}
try {
  (new PHPTester)->randomize(0);
} catch (TypeError $e) {
  echo "$e<br />";
}
try {
  (new PHPTester)->randomize(1);
} catch (TypeError $e) {
  echo "$e<br />";
}
try {
  (new PHPTester)->randomize("Hello World");
} catch (TypeError $e) {
  echo "$e<br />";
}
try {
  (new PHPTester)->randomize(["Hello" => "World", 3, 4, 5, 6, 7, 8, 9]);
} catch (TypeError $e) {
  echo "$e<br />";
}
?>
