<?php
require 'class.phptester.php';
for ($i = 0; $i < 1000; $i++) {
  echo (new PHPTester)->random_number() . "<br />";
}
?>
