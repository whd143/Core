<?php
session_start();

/********Live server*********/
//$base_url="http://demo-biztec.com/php/GroundOutGloves/";
//mysql_connect("localhost", "demobizt_glus", "develop123") or die(mysql_error());
//mysql_select_db("demobizt_glove") or die(mysql_error());
/********Live server*********/

/********Local server*********/
$base_url="http://localhost/GroundOutGloves/";
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("GroundOutGloves") or die(mysql_error());
/********Local server*********/
?>