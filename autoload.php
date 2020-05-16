<?php

function my_autoloader($classname)
{
    switch ($classname[0])
    {
        case 'M':

            if(strcmp(str_split($classname, 10)[0], "MValidator") === 0) {
                echo($classname . " 1\n");
                include_once('model/validators/' . $classname . '.php');
            }
            else if (strcmp($classname, "MDataChecker") === 0) {
                include_once('model/utils/MDataChecker.php');
            }
            else {
                echo ($classname . "2\n");
                include_once('model/' . $classname . '.php');
            }
            break;

    }

}

spl_autoload_register('my_autoloader');

