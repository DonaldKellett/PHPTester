<?php
require 'class.phptester.php';
$test = new PHPTester;
$test->describe("PHPTester", function () {
  global $test;
  $test->it("should have a fully functioning 'it' block", function () {
    global $test;
    $test->it("should work");
  });
  $test->it("should have a fully functioning 'it' block", function () {
    global $test;
    $test->it("should work");
  });
  $test->it("should have a fully functioning 'it' block", function () {
    global $test;
    $test->it("should work");
  });
  $test->it("should have a fully functioning 'it' block", function () {
    global $test;
    $test->it("should work");
  });
  $test->it("should have a fully functioning 'it' block", function () {
    global $test;
    $test->it("should work");
  });
});
$test->describe("PHPTester", function () {
  global $test;
  $test->it("should have a fully functioning 'it' block", function () {});
});
$test->describe("PHPTester", function () {
  global $test;
  $test->it("should have a fully functioning 'it' block", function () {});
});
$test->describe("PHPTester", function () {
  global $test;
  $test->it("should have a fully functioning 'it' block", function () {});
});
?>
