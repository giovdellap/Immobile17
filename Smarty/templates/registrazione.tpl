<!DOCTYPE html>
<html lang="it">
<head>
    <title>Registrati</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{$path}Smarty/img/icons/favicon_1.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/css/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/css/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/css/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/css/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/css/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/css/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/css/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/css/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/css/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/css/login/css/main.css">
    <!--===============================================================================================-->

</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form class="login100-form validate-form flex-sb flex-w">
                <div>
                    <a href="{$path}"><img src="{$path}Smarty/img/core-img/logo_1.png"style="position:absolute; top:15px; left:340px; z-index:1"></a>
                </div>
					<span class="login100-form-title p-b-32">
						Registrati
					</span>

                <span class="txt1 p-b-11">
						Nome
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Inserire il nome">
                    <input class="input100" type="text" name="name" >
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Cognome
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Inserire il cognome">
                    <input class="input100" type="text" name="username" >
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Data di nascita
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "inserire la data di nascita">
                    <input class="input100" type="date" name="date"  >
                    <span class="focus-input100"></span>
                </div>




                <span class="txt1 p-b-11">
						Email
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Inserire l'indirizzo Email">
                    <input class="input100" type="text" name="email"  >
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Password
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Inserire la password">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
                    <input class="input100" type="password" name="pass" placeholder="**********">
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Conferma Password
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Reinserire la password">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
                    <input class="input100" type="password" name="pass" placeholder="**********">
                    <span class="focus-input100"></span>
                </div>


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

                <div class="sign__group">
                    <button id="insert_image" class="sign__btn" type="button" style="width: 200px" onclick="document.getElementById('choose_image').click()">Carica Immagine</button>
                    <input id="choose_image" type="file" name="propic" onchange="validateImage()" style="display: none" accept=".jpg, .jpeg, .gif, .png">
                    <br>
                    <!--<b><p id="image_name" class="faq__text" style="text-align: center; max-width: 300px">Nessuna immagine caricata (MAX 2MB)</p></b>-->

                    <br>
                    <br>
                    <br>
                    <br>
                </div>


                <br>
                <br>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Registrati
                        </button>
                    </div>

                    <a href="{$path}Utente/login" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                        Hai già un account?

                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="{$path}Smarty/css/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/css/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/css/login/vendor/bootstrap/js/popper.js"></script>
<script src="{$path}Smarty/css/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/css/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/css/login/vendor/daterangepicker/moment.min.js"></script>
<script src="{$path}Smarty/css/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/css/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/css/login/js/main.js"></script>

</body>
</html>