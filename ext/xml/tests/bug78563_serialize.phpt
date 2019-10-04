--TEST--
Bug #78563: parsers should not be clonable
--SKIPIF--
<?php include("skipif.inc"); ?>
--FILE--
<?php

	$parser = xml_parser_create();
	serialize($parser);

?>
===DONE===
--EXPECTF--
Fatal error: Uncaught Exception: Serialization of 'XmlParser' is not allowed in %s:%d
Stack trace:
#0 %s(%d): serialize(Object(XmlParser))
#1 {main}
  thrown in %s on line %d
