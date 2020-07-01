<!DOCTYPE html>
<html lang="it">
<head>
    <title>Registrati</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{$path}Smarty/img/icons/favicon_1.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/css/main.css">
    <!--===============================================================================================-->

</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form action="{$path}Utente/registrazione" method="POST" class="login100-form validate-form flex-sb flex-w">
                <div>
                    <a href="{$path}"><img src="{$path}Smarty/img/core-img/logo_1.png"style="position:absolute; top:15px; left:340px; z-index:1"></a>
                </div>
                <span class="login100-form-title p-b-32">
                    <br>
						Aggiunta immobile
					</span>

                <span class="txt1 p-b-11">
						Nome
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Inserire il nome">
                    <input class="input100" type="text" required name="nome" >
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Città
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Inserire la città">
                    <input class="input100" type="text" required name="citta" >
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Indirizzo
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Inserire l'indirizzo">
                    <input class="input100" type="text" required name="indirizzo" placeholder="es. via Roma 1" >
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Tipologia
					</span>
                <div class="col-12 col-md-12 col-xl-12">
                <div class="form-group">
                    <select class="form-control" id="catagories">
                        <option>Tutte le categorie</option>
                        <option>Monolocale</option>
                        <option>Bilocale</option>
                        <option>Farm</option>
                        <option>House</option>
                        <option>Store</option>
                    </select>
                </div>
                </div>

                <span class="txt1 p-b-11">
						Dimensione
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Inserire la dimensione">
                    <input class="input100" type="text" required name="dimensione"  placeholder="es. 500 (in mq)" >
                    <span class="focus-input100"></span>
                </div>



                <span class="txt1 p-b-11">
						Tipo Annuncio
					</span>
                <div class="col-12 col-md-12 col-xl-12">
                <div class="form-group">
                    <select class="form-control" id="cities">
                        <option>Vendita/Affitto</option>
                        <option>Vendita</option>
                        <option>Affitto</option>
                    </select>
                </div>
                </div>
                <span class="txt1 p-b-11">
						Prezzo
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Reinserire la password">
                    <input class="input100" type="password" required name="prezzo" placeholder="es. 20000 (in €)">
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Descrizione
					</span>
                <div class="wrap-input100 validate-input m-b-20" data-validate = "Inserire la descrizione">
                    <input class="input100" type="text" required name="descrizione" >
                    <span class="focus-input100"></span>
                </div>


                {include file="loadImage.tpl"}

                <!--
                <div class="flex-m w-full p-b-33">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									I agree to the
									<a href="#" class="txt2 hov1">
										Terms of User
									</a>
								</span>
                        </label>
                    </div>
                </div>
                -->




                <br>
                <br>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Aggiungi
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="{$path}Smarty/others/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/others/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/others/login/vendor/bootstrap/js/popper.js"></script>
<script src="{$path}Smarty/others/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/others/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/others/login/vendor/daterangepicker/moment.min.js"></script>
<script src="{$path}Smarty/others/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/others/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/others/login/js/main.js"></script>

</body>
</html>