<?php
try {
  interface PHPTesterInterface {
    /* TODO: Uncomment all methods and implement all of them properly by v3.0.0 release */

    /* Spec Methods */
    public function describe($msg, $fn);
    # public function it($msg, $fn);

    /* Random Output Methods */
    public function random_number($min = 0, $max = 100);
    public function random_token($length = 10);
    public function randomize($array);

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
        return __CLASS__ . ": {$this->message}\n";
    }
  }
  class PHPTester implements PHPTesterInterface {
    protected $passes = 0;
    protected $fails = 0;
    protected $errors = 0;
    protected $describing = false;
    protected $using_it = false;
    public function describe($msg, $fn) {
      if ($this->describing) throw new PHPTesterException("A describe block cannot be nested in another describe block!");
      $this->describing = true;
      $console_id = "console_" . $this->random_token();
      echo "<div id='$console_id' style='color:white;background-color:black;padding:10px;font-family:monospace;font-size:18px'>";
      echo "<strong>$msg</strong>";
      echo "<div style='margin-left:30px'>";
      $start = microtime(true);
      try {
        $fn();
      } catch (PHPTesterException $e) {
        $this->errors++;
        echo "<span style='color:red'>$e</span><br />";
      } catch (TypeError $e) {
        $this->errors++;
        echo "<span style='color:red'>$e</span><br />";
      } catch (ParseError $e) {
        $this->errors++;
        echo "<span style='color:red'>$e</span><br />";
      } catch (DivisionByZeroError $e) {
        $this->errors++;
        echo "<span style='color:red'>$e</span><br />";
      } catch (AssertionError $e) {
        $this->errors++;
        echo "<span style='color:red'>$e</span><br />";
      } catch (ArithmeticError $e) {
        $this->errors++;
        echo "<span style='color:red'>$e</span><br />";
      } catch (Error $e) {
        $this->errors++;
        echo "<span style='color:red'>$e</span><br />";
      } catch (ErrorException $e) {
        $this->errors++;
        echo "<span style='color:red'>$e</span><br />";
      } catch (Exception $e) {
        $this->errors++;
        echo "<span style='color:red'>$e</span><br />";
      }
      $dur = ~~((microtime(true) - $start) * 1000.0);
      echo "</div>";
      echo "<hr />";
      echo "<span style='color:lime'>$this->passes Passed</span><br />";
      echo "<span style='color:red'>$this->fails Failed</span><br />";
      echo "<span style='color:red'>$this->errors Errors</span><br />";
      echo "Process took " . $dur . "ms to complete<br />";
      echo "</div>";
      echo "<br />";
      echo "<script>document.getElementById('$console_id').style.border = '5px solid " . ($this->passes > 0 && $this->fails === 0 && $this->errors === 0 ? "lime" : "red") . "';</script>";
      $this->describing = false;
    }
    public function random_number($min = 0, $max = 100) {
      if (!is_int($min) || !is_int($max)) throw new TypeError("In PHPTester::random_number, \$min and \$max must both be integers");
      if ($min >= $max) throw new TypeError("In PHPTester::random_number, \$min must be smaller than \$max");
      return rand($min, $max);
    }
    public function random_token($length = 10) {
      if (!is_int($length)) throw new TypeError("In PHPTester::random_token, \$length must be a valid integer");
      if ($length <= 0) throw new TypeError("In PHPTester::random_token, \$length must be a positive integer");
      $token = "";
      for ($i = 0; $i < $length; $i++) {
        $token .= str_split("abcdefghijklmnopqrstuvwxyz0123456789")[floor(lcg_value() * 36)];
      }
      return $token;
    }
    public function randomize($array) {
      if (!is_array($array)) throw new TypeError("In PHPTester::randomize, \$array must be a valid array");
      foreach ($array as $key => $value) {
        if (!is_int($key)) throw new TypeError("In PHPTester::randomize, \$array cannot be an associative array");
      }
      for ($i = 0; $i < 2 * count($array); $i++) {
        $a = rand(0, count($array) - 1);
        $b = rand(0, count($array) - 1);
        list($array[$a], $array[$b]) = array($array[$b], $array[$a]);
      }
      return $array;
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
