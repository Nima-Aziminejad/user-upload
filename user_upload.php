#!/usr/bin/php
<?php
require_once('CSVParser.php');
require_once('CommandLineOption.php');
global $shortOptions, $longOptions, $flagDescription;
$opts = getopt($shortOptions,$longOptions);

$test = new CSVParser($opts,$flagDescription);
$test->run();
