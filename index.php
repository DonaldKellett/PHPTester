<?php
require 'class.phptester.php';
echo (new PHPTester)->random_number() . "<br />";
try {
  echo (new PHPTester)->random_number("hello");
} catch (TypeError $e) {
  echo "$e<br />";
}
try {
  echo (new PHPTester)->random_number(34, "world");
} catch (TypeError $e) {
  echo "$e<br />";
}
try {
  echo (new PHPTester)->random_number(42, 42);
} catch (TypeError $e) {
  echo "$e<br />";
}
try {
  echo (new PHPTester)->random_number(66, 42);
} catch (TypeError $e) {
  echo "$e<br />";
}
echo (new PHPTester)->random_number(-100, 0);
?>
