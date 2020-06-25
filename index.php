<?php

require_once "autoload.php";
require_once 'StartSmarty.php';

$GLOBALS["path"] = "/AgenziaImmobiliare/";
echo "peni VIOLACEI";
echo $_SERVER["REQUEST_URI"];
$fc = new CFrontController();
$fc->main();

