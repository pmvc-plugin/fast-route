<?php
include_once('vendor/pmvc/pmvc/include_plug.php');
include('vendor/autoload.php');

PMVC\plug('fastroute',array(
    _FILE=>'./fastroute.php'
))->addRoute('GET','/','aaa');

$dispatch = PMVC\plug('fastroute')->getDispatch('GET','/');

var_dump($dispatch);

