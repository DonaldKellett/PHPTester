<?php
try {
  interface PHPTesterInterface {
    /* TODO: Uncomment all methods and implement all of them properly by v3.0.0 release */

    /* Spec Methods */
    # public function describe($msg, $fn);
    # public function it($msg, $fn);

    /* Random Output Methods */
    public function random_number($min = 0, $max = 100);
    # public function random_token($length = 10);
    # public function randomize($array);

    /* Pass/Fail Methods */

    // Core
    # public function expect($passed, $msg = "Default Message", $success = "Default Success Message");

    // Primitives
    # public function assert_equals($actual, $expected, $msg = "Default Message", $success = "Default Success Message");
    # public function assert_not_equals($actual, $unexpected, $msg = "Default Message", $success = "Default Success Message");

    // Errors
    # public function expect_error($msg, $fn);
    # public function expect_no_error($msg, $fn);

    // Arrays (and primitives)
    # public function assert_similar($actual, $expected, $msg = "Default Message", $success = "Default Success Message");
    # public function assert_not_similar($actual, $unexpected, $msg = "Default Message", $success = "Default Success Message");

    // Numbers
    # public function assert_fuzzy_equals($actual, $expected, $precision = 5, $msg = "Default Message", $success = "Default Success Message");
    # public function assert_not_fuzzy_equals($actual, $unexpected, $precision = 5, $msg = "Default Message", $success = "Default Success Message");
  }
  class PHPTesterException extends Exception {
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
  }
  class PHPTester implements PHPTesterInterface {
    protected $passes = 0;
    protected $fails = 0;
    protected $errors = 0;
    protected $describing = false;
    public function random_number($min = 0, $max = 100) {
      return rand($min, $max);
    }
  }
} catch (TypeError $e) {
  echo "Failed to load PHPTester<br />";
} catch (ParseError $e) {
  echo "Failed to load PHPTester<br />";
} catch (DivisionByZeroError $e) {
  echo "Failed to load PHPTester<br />";
} catch (AssertionError $e) {
  echo "Failed to load PHPTester<br />";
} catch (ArithmeticError $e) {
  echo "Failed to load PHPTester<br />";
} catch (Error $e) {
  echo "Failed to load PHPTester<br />";
} catch (ErrorException $e) {
  echo "Failed to load PHPTester<br />";
} catch (Exception $e) {
  echo "Failed to load PHPTester<br />";
}
?>
