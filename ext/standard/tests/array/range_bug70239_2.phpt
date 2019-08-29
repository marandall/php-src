--TEST--
Bug #70239 Creating a huge array doesn't result in exhausted, but segfault, var 3
--FILE--
<?php
try {
    var_dump(range(0, PHP_INT_MAX));
} catch (\Error $e) {
    echo $e->getMessage() . "\n";
}
?>
===DONE===
--EXPECTF--
The supplied range exceeds the maximum array size: start=0 end=%d
===DONE===
