<?php


class VUtente
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    public function showFormLogin()
    {
        if (isset($_POST['conveyor']))
            $this->smarty->assign('email', $_POST['conveyor']);
        $this->smarty->display('login.tpl');
    }

    public function loginOk($array)
    {
        $this->smarty->assign('immagine', "/FillSpaceWEB/Smarty/immagini/truck.png");
        $this->smarty->assign('userlogged', "loggato");
        $this->smarty->assign('array', $array);
        $this->smarty->assign('toSearch', 'trasporti');
        $this->smarty->display('home.tpl');
    }

    public function loginError() {
        $this->smarty->assign('error',"errore");
        $this->smarty->display('login.tpl');

}