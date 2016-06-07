<?php
try {
  interface PHPTesterInterface {
    /* TODO: Uncomment all methods and implement all of them properly by v3.0.0 release */

    /* Spec Methods */
    public function describe($msg, $fn);
    public function it($msg, $fn);

    /* Random Output Methods */
    public function random_number($min = 0, $max = 100);
    public function random_token($length = 10);
    public function randomize($array);

    /* Pass/Fail Methods */

    // Core
    public function expect($passed, $msg = "Default Message", $success = "Default Success Message");

    // Primitives
    public function assert_equals($actual, $expected, $msg = "Default Message", $success = "Default Success Message");
    public function assert_not_equals($actual, $unexpected, $msg = "Default Message", $success = "Default Success Message");

    // Errors
    # public function expect_error($msg, $fn);
    # public function expect_no_error($msg, $fn);

    // Arrays (and primitives)
    # public function assert_similar($actual, $expected, $msg = "Default Message", $success = "Default Success Message");
    # public function assert_not_similar($actual, $unexpected, $msg = "Default Message", $success = "Default Success Message");

    // Numbers
    public function assert_fuzzy_equals($actual, $expected, $precision = 5, $msg = "Default Message", $success = "Default Success Message");
    public function assert_not_fuzzy_equals($actual, $unexpected, $precision = 5, $msg = "Default Message", $success = "Default Success Message");
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
      $this->passes = 0;
      $this->fails = 0;
      $this->errors = 0;
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
    public function it($msg, $fn) {
      if (!$this->describing) throw new PHPTesterException("An 'it' context must be wrapped in a 'describe' context!");
      if ($this->using_it) throw new PHPTesterException("An 'it' context cannot be nested within another 'it' context!");
      $this->using_it = true;
      echo "<strong>$msg</strong>";
      echo "<div style='margin-left:30px'>";
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
      echo "</div>";
      $this->using_it = false;
    }
    public function expect($passed, $msg = "Value was not what was expected", $success = "Test Passed") {
      if ($passed) {
        $this->passes++;
        echo "<span style='color:lime'>$success</span><br />";
      } else {
        $this->fails++;
        echo "<span style='color:red'>$msg</span><br />";
      }
    }
    protected function display($input) {
      if ($input === true) return "true";
      if ($input === false) return "false";
      if ($input === NULL) return "NULL";
      if (is_int($input) || is_float($input)) return $input;
      if (is_string($input)) return '"' . htmlspecialchars($input) . '"';
      if (is_array($input)) return "array(" . (count($input) === 0 ? "" : "<div style='margin-left:30px'>" . implode(",<br />", array_map(function ($key, $value) {return $this->display($key) . " =&gt; " . $this->display($value);}, array_keys($input), $input)) . "</div>") . ")";
      $result = "object {<div style='margin-left:30px'>";
      foreach ($input as $property => $value) $result .= "public \$$property = " . $this->display($value) . ";<br />";
      $result .= "</div>}";
      return $result;
    }
    public function assert_equals($actual, $expected, $msg = "Actual value did not match expected", $success = "Test Passed") {
      if ((!is_int($actual) && !is_float($actual) && !is_bool($actual) && !is_string($actual) && !is_null($actual)) || (!is_int($expected) && !is_float($expected) && !is_bool($expected) && !is_string($expected) && !is_null($expected))) throw new TypeError("In PHPTester::assert_equals, both the actual and expected values must be primitives!");
      $this->expect($actual === $expected, "$msg - Expected: " . $this->display($expected) . ", but instead got: " . $this->display($actual), "$success - Value === " . $this->display($expected));
    }
    public function assert_not_equals($actual, $unexpected, $msg = "Unexpected value returned", $success = "Test Passed") {
      if ((!is_int($actual) && !is_float($actual) && !is_bool($actual) && !is_string($actual) && !is_null($actual)) || (!is_int($unexpected) && !is_float($unexpected) && !is_bool($unexpected) && !is_string($unexpected) && !is_null($unexpected))) throw new TypeError("In PHPTester::assert_not_equals, both the actual and expected values must be primitives!");
      $this->expect($actual !== $unexpected, "$msg - Expected value to not equal: " . $this->display($unexpected), "$success - Value !== " . $this->display($unexpected));
    }
    public function assert_fuzzy_equals($actual, $expected, $precision = 5, $msg = "Actual value did not match expected", $success = "Test Passed") {
      if ((!is_int($actual) && !is_float($actual)) || (!is_int($expected) && !is_float($expected))) throw new TypeError("In PHPTester::assert_fuzzy_equals, both the actual and expected values must be valid numbers!");
      if (!is_int($precision)) throw new TypeError("In PHPTester::assert_fuzzy_equals, \$precision must be a valid integer!");
      $this->expect(round($actual, $precision) === round($expected, $precision), "$msg - Expected: " . $this->display(round($expected, $precision)) . ", but instead got: " . $this->display(round($actual, $precision)), "$success - Value === " . $this->display(round($expected, $precision)));
    }
    public function assert_not_fuzzy_equals($actual, $unexpected, $precision = 5, $msg = "Unexpected value returned", $success = "Test Passed") {
      if ((!is_int($actual) && !is_float($actual)) || (!is_int($unexpected) && !is_float($unexpected))) throw new TypeError("In PHPTester::assert_not_fuzzy_equals, both the actual and unexpected values must be valid numbers!");
      if (!is_int($precision)) throw new TypeError("In PHPTester::assert_not_fuzzy_equals, the \$precision must be a valid integer!");
      $this->expect(round($actual, $precision) !== round($unexpected, $precision), "$msg - Rounded value was expected to not equal: " . $this->display(round($unexpected, $precision)), "$success - Value !== " . $this->display(round($unexpected, $precision)));
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
