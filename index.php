<?php
require 'class.phptester.php';
for ($i = 0; $i < 1000; $i++) {
  echo (new PHPTester)->random_token() . "<br />";
  echo (new PHPTester)->random_token(1) . "<br />";
  echo (new PHPTester)->random_token(5) . "<br />";
  echo (new PHPTester)->random_token(20) . "<br />";
  echo (new PHPTester)->random_token(50) . "<br />";
}
?>
