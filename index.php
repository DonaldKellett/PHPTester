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
  $test->it("should have a working assert_equals method", function () {
    global $test;

    # Passing Tests with Default Message
    $test->assert_equals(1, 1);
    $test->assert_equals(0, 0);
    $test->assert_equals(true, true);
    $test->assert_equals(false, false);
    $test->assert_equals("Hello World", "Hello World");

    # Passing Tests with Custom Message
    $test->assert_equals(1, 1, "", "Well done, you passed the test");
    $test->assert_equals(0, 0, "", "Well done, you passed the test");
    $test->assert_equals(true, true, "", "Well done, you passed the test");
    $test->assert_equals(false, false, "", "Well done, you passed the test");
    $test->assert_equals("Hello World", "Hello World", "", "Well done, you passed the test");

    # Failing Tests with Default Message
    $test->assert_equals(1, true);
    $test->assert_equals(0, false);
    $test->assert_equals(true, false);
    $test->assert_equals(0, 1);
    $test->assert_equals("Goodbye World", "Hello World");

    # Failing Tests with Custom Message
    $test->assert_equals(1, true, "Bad luck, you failed the test");
    $test->assert_equals(0, false, "Bad luck, you failed the test");
    $test->assert_equals(true, false, "Bad luck, you failed the test");
    $test->assert_equals(0, 1, "Bad luck, you failed the test");
    $test->assert_equals("Goodbye World", "Hello World", "Bad luck, you failed the test");

    # Error
    $test->assert_equals(array(3, 4, 5, 10, 12), 34);
  });
  $test->it("should have a working assert_not_equals method", function () {
    global $test;

    # Passing Tests with Default Message
    $test->assert_not_equals(1, true);
    $test->assert_not_equals(0, false);
    $test->assert_not_equals(M_PI, M_E);
    $test->assert_not_equals(3, M_PI);
    $test->assert_not_equals("Goodbye World", "Hello World");

    # Passing Tests with Custom Message
    $test->assert_not_equals(1, true, "", "Hooray, you passed");
    $test->assert_not_equals(0, false, "", "Hooray, you passed");
    $test->assert_not_equals(M_PI, M_E, "", "Hooray, you passed");
    $test->assert_not_equals(3, M_PI, "", "Hooray, you passed");
    $test->assert_not_equals("Goodbye World", "Hello World", "", "Hooray, you passed");

    # Failing Tests with Default Message
    $test->assert_not_equals(1, 1);
    $test->assert_not_equals(0, 0);
    $test->assert_not_equals(true, true);
    $test->assert_not_equals(false, false);
    $test->assert_not_equals("Hello World", "Hello World");

    # Failing Tests with Custom Message
    $test->assert_not_equals(1, 1, "Test did not pass");
    $test->assert_not_equals(0, 0, "Test did not pass");
    $test->assert_not_equals(true, true, "Test did not pass");
    $test->assert_not_equals(false, false, "Test did not pass");
    $test->assert_not_equals("Hello World", "Hello World", "Test did not pass");

    # Error
    $test->assert_not_equals(M_PI, array(1, 2, 3, 4, 5));
  });
  $test->it("should have a working assert_fuzzy_equals method", function () {
    global $test;

    # Passing Tests with Default Message
    $test->assert_fuzzy_equals(3.14159495, M_PI);
    $test->assert_fuzzy_equals(2.718284969, M_E);
    $test->assert_fuzzy_equals(3, M_PI, 0);
    $test->assert_fuzzy_equals(3, M_E, 0);
    $test->assert_fuzzy_equals(M_PI, M_E, 0);

    # Passing Tests with Custom Message
    $test->assert_fuzzy_equals(3.14159495, M_PI, 5, "", "Your value was within the accepted range");
    $test->assert_fuzzy_equals(2.718284969, M_E, 5, "", "Your value was within the accepted range");
    $test->assert_fuzzy_equals(3, M_PI, 0, "", "Your value was within the accepted range");
    $test->assert_fuzzy_equals(3, M_E, 0, "", "Your value was within the accepted range");
    $test->assert_fuzzy_equals(M_PI, M_E, 0, "", "Your value was within the accepted range");

    # Failing Tests with Default Message
    $test->assert_fuzzy_equals(2.718289, M_E);
    $test->assert_fuzzy_equals(3.141598, M_PI);
    $test->assert_fuzzy_equals(3, M_PI, 1);
    $test->assert_fuzzy_equals(3, M_E, 1);
    $test->assert_fuzzy_equals(M_PI, M_E, 1);

    # Failing Tests with Custom Message
    $test->assert_fuzzy_equals(2.718289, M_E, 5, "Your value was not within the accepted range");
    $test->assert_fuzzy_equals(3.141598, M_PI, 5, "Your value was not within the accepted range");
    $test->assert_fuzzy_equals(3, M_PI, 1, "Your value was not within the accepted range");
    $test->assert_fuzzy_equals(3, M_E, 1, "Your value was not within the accepted range");
    $test->assert_fuzzy_equals(M_PI, M_E, 1, "Your value was not within the accepted range");

    # Error
    $test->assert_fuzzy_equals(3, 3, 3.0);
  });
  $test->it("should have a working assert_not_fuzzy_equals method", function () {
    global $test;

    # Passing Tests with Default Message
    $test->assert_not_fuzzy_equals(2.718289, M_E);
    $test->assert_not_fuzzy_equals(3.141598, M_PI);
    $test->assert_not_fuzzy_equals(3, M_PI, 1);
    $test->assert_not_fuzzy_equals(3, M_E, 1);
    $test->assert_not_fuzzy_equals(M_PI, M_E, 1);

    # Passing Tests with Custom Message
    $test->assert_not_fuzzy_equals(2.718289, M_E, 5, "", "Your value was outside the forbidden range");
    $test->assert_not_fuzzy_equals(3.141598, M_PI, 5, "", "Your value was outside the forbidden range");
    $test->assert_not_fuzzy_equals(3, M_PI, 1, "", "Your value was outside the forbidden range");
    $test->assert_not_fuzzy_equals(3, M_E, 1, "", "Your value was outside the forbidden range");
    $test->assert_not_fuzzy_equals(M_PI, M_E, 1, "", "Your value was outside the forbidden range");

    # Failing Tests with Default Message
    $test->assert_not_fuzzy_equals(3.14159495, M_PI);
    $test->assert_not_fuzzy_equals(2.718284969, M_E);
    $test->assert_not_fuzzy_equals(3, M_PI, 0);
    $test->assert_not_fuzzy_equals(3, M_E, 0);
    $test->assert_not_fuzzy_equals(M_PI, M_E, 0);

    # Failing Tests with Custom Message
    $test->assert_not_fuzzy_equals(3.14159495, M_PI, 5, "Your value was within the forbidden range");
    $test->assert_not_fuzzy_equals(2.718284969, M_E, 5, "Your value was within the forbidden range");
    $test->assert_not_fuzzy_equals(3, M_PI, 0, "Your value was within the forbidden range");
    $test->assert_not_fuzzy_equals(3, M_E, 0, "Your value was within the forbidden range");
    $test->assert_not_fuzzy_equals(M_PI, M_E, 0, "Your value was within the forbidden range");

    # Error
    $test->assert_not_fuzzy_equals(M_PI, "Hello World");
  });
});
?>
