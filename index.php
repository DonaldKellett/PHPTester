<?php
require 'class.phptester.php';
$test = new PHPTester;
$test->describe("PHPTester", function () {
  global $test;
  echo "Hello World<br />";
  echo "This is a test<br />";
  $test->describe("PHPTester", function () {});
});
?>
