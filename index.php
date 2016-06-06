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
  $test->it("should have a functioning (protected) 'display' method", function () {
    global $test;
    echo $test->display(true) . "<br />";
    echo $test->display(false) . "<br />";
    echo $test->display(NULL) . "<br />";
    echo $test->display(1) . "<br />";
    echo $test->display(0) . "<br />";
    echo $test->display(M_PI) . "<br />";
    echo $test->display("Hello World") . "<br />";
    echo $test->display("bacon") . "<br />";
    echo $test->display(array(1, 2, 3, 4, 5)) . "<br />";
    echo $test->display(array(array(1, 2, 3), array(1, 2, 3), array(1, 2, 3))) . "<br />";
    class Cat {
      public $public = "public";
      private $private = "private";
      protected $protected = "protected";
      public $array = array(5, 4, 3, 2, 1, 10, 100);
    }
    echo $test->display(new Cat) . "<br />";
  });
});
?>
