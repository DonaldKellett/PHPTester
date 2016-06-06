<?php
require 'class.phptester.php';
$test = new PHPTester;
$test->describe("PHPTester", function () {
  global $test;
  $test->it("should have a working 'expect' method", function () {
    global $test;

    # Passing Tests with Default Message
    $test->expect(true);
    $test->expect(true);
    $test->expect(true);
    $test->expect(true);
    $test->expect(true);

    # Passing Tests with Custom Message
    $test->expect(true, "", "Hooray!  You passed the test.");
    $test->expect(true, "", "Hooray!  You passed the test.");
    $test->expect(true, "", "Hooray!  You passed the test.");
    $test->expect(true, "", "Hooray!  You passed the test.");
    $test->expect(true, "", "Hooray!  You passed the test.");

    # Failing Tests with Default Message
    $test->expect(false);
    $test->expect(false);
    $test->expect(false);
    $test->expect(false);
    $test->expect(false);

    # Failing Tests with Custom Message
    $test->expect(false, "You failed, better luck next time");
    $test->expect(false, "You failed, better luck next time");
    $test->expect(false, "You failed, better luck next time");
    $test->expect(false, "You failed, better luck next time");
    $test->expect(false, "You failed, better luck next time");
  });
});
?>
