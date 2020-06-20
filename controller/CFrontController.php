<?php

require_once 'StartSmarty.php';
class CFrontController
{
    public function main()
    {
        $path = $_SERVER['REQUEST_URI'];
        $resource = explode('/', $path);
        array_shift($resource);

        if ($resource[0] != 'api')
        {
            $controller = "C" . $resource[0];
            $dir = 'controller';

            if (in_array($controller . ".php", scandir($dir))){

                if(isset($resource[1]))
                {
                    $function = explode('?', $resource[1]);
                    if(method_exists($controller, $function[0]))
                    {
                        if(sizeof($function)==1)
                            $controller::$function[0]();
                        else $controller::$function[0]($this->queryUnpacker($function[1]));
                    }
                    else $this->wrongUrl();
                }
                else $this->wrongUrl();
                /**
                if (isset($resource[1])){
                    $function = $resource[1];
                    if (method_exists($controller, $function)){
                        $param = $resource; //gli array vengono copiati per valore (non c'è bisogno di clone)

                        array_shift($param);
                        array_shift($param);

                        if (sizeof($param) == 0) $controller::$function();
                        else if (sizeof($param) == 1) $controller::$function($param[0]);
                        else if (sizeof($param) == 2) $controller::$function($param[0], $param[1]);

                        else if (sizeof($param) == 3) $controller::$function($param[0], $param[1], $param[2]);
                        else if (sizeof($param) == 4) $controller::$function($param[0], $param[1], $param[2], $param[3]);
                        else if (sizeof($param) == 5) $controller::$function($param[0], $param[1], $param[2], $param[3], $param[4]);
                        else if (sizeof($param) == 6) $controller::$function($param[0], $param[1], $param[2], $param[3], $param[4], $param[5]);
                    }
                    else $this->wrongUrl();

                }
                else $this->wrongUrl();
                 **/
            }
            else $this->wrongUrl();
        }
        //else api


    }

    /**
     * Procedura da eseguire in caso di URL errata
     */
    public function wrongUrl()
    {
        if(CUtente::isLogged()){
            $utente = CSessionManager::getUtenteLoggato();
            if($utente instanceof MAmministratore)
                CAdmin::adminHomepage();
            else
                CHome::homepage();
        }
        else CHome::homepage();
    }

    /**
     * Converte la query dell'URL in un'array di parametri
     * @param string $query
     * @return array chiave = nome del parametro, valore = valore del parametro
     */
    public function queryUnpacker(string $query):array
    {
        $parameters = explode('&', $query);
        $toReturn = array();
        foreach ($parameters as $item)
        {
            $itemExploded = explode('=', $item);
            if(count($itemExploded) == 2)
                $toReturn[$itemExploded[0]] = $itemExploded[1];
        }
        return toReturn;
    }

}