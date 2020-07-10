<?php

require_once "autoload.php";
require_once 'StartSmarty.php';
require_once 'confDB.conf.php';

$GLOBALS["path"] = "/AgenziaImmobiliare/";
shell_exec("confDB.conf.php");

$fc = new CFrontController();
$fc->main();

