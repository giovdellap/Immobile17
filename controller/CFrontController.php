<?php

require_once 'StartSmarty.php';
class CFrontController
{
    public function main()
    {
        $path = $_SERVER['REQUEST_URI'];
        $resource = explode('/', $path);

        array_shift($resource);
        array_shift($resource);
        if (!isset($resource[0]))
            $this->wrongUrl();


        else
        {
            $api = false;
            if($resource[0] === 'api')
            {
                $api = true;
                array_shift($resource);
                $token = $resource[0];
                array_shift();
                CSessionManager::tokenValidation($token);
            }
            $controller = "C" . $resource[0];
            $dir = 'controller';
            if (in_array($controller . ".php", scandir($dir))){
                if(isset($resource[1]))
                {
                    $function=$resource[1];
                    if(count($resource) == 2)
                    {
                        if($controller === 'CAdmin')
                            $controller::$function();
                        else $controller::$function($api);
                    }
                    elseif (count($resource)== 3)
                    {
                        if($controller === 'CAdmin')
                            $controller::$function($resource[2]);
                        else $controller::$function($resource[2], $api);
                    }
                    else
                    {
                        $parameters = $resource;
                        array_shift($parameters);
                        array_shift($parameters);
                        if($controller === 'CAdmin')
                            $controller::$function($this->queryUnpacker($parameters));
                        else $controller::$function($this->queryUnpacker($parameters), $api);
                    }
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
        if(CSessionManager::sessionExists()){
            $utente = CSessionManager::getUtenteLoggato();
            if($utente instanceof MAmministratore)
                CAdmin::homepage();
            else
                CHome::homepage(false);

        }
        else CHome::homepage(false);
    }

    /**
     * Converte la query dell'URL in un'array di parametri
     * @param array $parameters
     * @return array chiave = nome del parametro, valore = valore del parametro
     */
    public function queryUnpacker(array $parameters):array
    {
        $toReturn = array();
        for($i=0;$i<count($parameters);$i++) {

            if (key_exists($i, $parameters) && key_exists($i + 1, $parameters))
                $toReturn[$parameters[$i]] = $parameters[$i + 1];
            $i++;
        }
        return $toReturn;
    }

}