--TEST--
Bug #53305 (E_NOTICE when defining a constant starts with __COMPILER_HALT_OFFSET__)
--FILE--
<?php
error_reporting(E_ALL);

require __DIR__ . '/constants_helpers.inc';

tchelper_define('__COMPILER_HALT_OFFSET__1', 1);
tchelper_define('__COMPILER_HALT_OFFSET__2', 2);
tchelper_define('__COMPILER_HALT_OFFSET__', 3);
tchelper_define('__COMPILER_HALT_OFFSET__1'.chr(0), 4);

var_dump(__COMPILER_HALT_OFFSET__1);
var_dump(constant('__COMPILER_HALT_OFFSET__1'.chr(0)));

?>
--EXPECT--
>> define("__COMPILER_HALT_OFFSET__1", integer);
true

>> define("__COMPILER_HALT_OFFSET__2", integer);
true

>> define("__COMPILER_HALT_OFFSET__", integer);
ValueError :: Constant __COMPILER_HALT_OFFSET__ already defined

>> define("__COMPILER_HALT_OFFSET__1 ", integer);
true

int(1)
int(4)
