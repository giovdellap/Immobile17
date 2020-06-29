<?php

require_once "autoload.php";
require_once 'StartSmarty.php';

//print_r(session_save_path());
$GLOBALS["path"] = "/AgenziaImmobiliare/";
$fc = new CFrontController();
$fc->main();

