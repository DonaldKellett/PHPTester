# PHPTester

A custom PHP TDD Framework.  MIT Licensed.

## Version Details

- Version Number: `v3.0.0-dev`
- Status: Ready for production but awaiting documentation
- License: **MIT License**

## A note regarding version number

Since PHPTester is a continuation of the [PHP Test Fixture](https://github.com/DonaldKellett/PHP_Test_Fixture), please note that version numbers start from `v3.0.0` and **not** `v1.0.0`.  If you are searching for `v2.1.1` or earlier, please refer to [PHP Test Fixture](https://github.com/DonaldKellett/PHP_Test_Fixture) instead.

## Class and Filename Renaming Notice (for `v2.1.1` or earlier users)

Please note that as of `v3.0.0`, the class is no longer called `Test` but will instead be called `PHPTester`.  Additionally, the file is now named `class.phptester.php` instead of `class.test.php`.

## Initialization

Kindly follow the steps below to setup **PHPTester** and start using it:

1. Include the following line at the top of your PHP file: `require '/path/to/your/class.phptester.php';`
2. Create a `new` instance of `PHPTester` e.g. `$test = new PHPTester;`

## Structure Overview

The PHP code in `class.phptester.php` consists of three main parts:

1. The `PHPTesterInterface` interface - this contains the names of all the methods available for use when performing TDD using an instance of `PHPTester`.  The interface itself provides no functionality - however, it provides valuable information to the user (i.e. YOU) as to what methods are available and what arguments it accepts.
2. The `PHPTesterException` class - this is used internally by the main class so **please do not alter it unless you are very experienced with PHP exceptions and classes**
3. The `PHPTester` class - this is the main class that you will be creating instances of when performing your Test-Driven Development.

## Documentation

### Spec Methods

#### describe

```php
PHPTester::describe($msg, $fn);
```

`PHPTester::describe` expects exactly 2 arguments, the first one being the description of the group of tests (`$msg`) which should be a string and the second one being the function in which the group of tests are to be executed.  Please note that although it is not compulsory to use `PHPTester::describe`, it is **highly recommended** that you do so as it provides valuable information regarding the number of passes/fails and the execution time.  It also handles any errors being executed inside the anonymous function (`$fn`) properly, allowing the rest of your PHP script to be executed as normal even if an error is thrown.
