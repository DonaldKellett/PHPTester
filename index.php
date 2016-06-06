<?php
require 'class.phptester.php';
echo (new PHPTester)->random_token() . "<br />";
echo (new PHPTester)->random_token(100) . "<br />";
try {
  echo (new PHPTester)->random_token(true) . "<br />";
} catch (TypeError $e) {
  echo "$e<br />";
}
try {
  echo (new PHPTester)->random_token(3.14) . "<br />";
} catch (TypeError $e) {
  echo "$e<br />";
}
try {
  echo (new PHPTester)->random_token(0) . "<br />";
} catch (TypeError $e) {
  echo "$e<br />";
}
try {
  echo (new PHPTester)->random_token(-42) . "<br />";
} catch (TypeError $e) {
  echo "$e<br />";
}
?>
