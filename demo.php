<?php
include('vendor/autoload.php');

# plugin
include_once('vendor/pmvc/pmvc/include_plug.php');
PMVC\setPlugInFolder('../');

# add route
PMVC\plug('fast-route')->addRoute('GET','/','aaa');

# parse route by url
$dispatch = PMVC\plug('fast-route')->getDispatch('GET','/');
var_dump($dispatch);

