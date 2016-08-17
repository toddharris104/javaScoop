<?php
/**
 * Created by PhpStorm.
 * User: tharris
 * Date: 7/13/16
 * Time: 5:28 PM
 */

$xmlFile = simplexml_load_file("note.xml") or die("Error: Cannot create object");
echo $xml->to . "<br>";
echo $xml->from . "<br>";
echo $xml->heading . "<br>";
echo $xml->body;
