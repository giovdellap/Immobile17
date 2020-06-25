<?php

require_once "autoload.php";
require_once 'StartSmarty.php';

$GLOBALS["path"] = "/AgenziaImmobiliare/";
$fc = new CFrontController();
$fc->main();

