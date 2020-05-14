<?php

function my_autoloader($classname)
{
    switch ($classname[0])
    {
        case 'M':
        {
            if(strcmp(implode(str_split($classname, 10)), "MValidator") === 0) {
                include_once('model/validators/' . $classname . '.php');
            }
            if (strcmp($classname, "MDataChecker") === 0) {
                include_once('model/utils/MDataChecker.php');
            }
            else {
                include_once('model/' . $classname . '.php');
            }
        }
    }

}

spl_autoload_register('my_autoloader');

