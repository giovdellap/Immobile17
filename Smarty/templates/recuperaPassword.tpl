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

    <script>

        function testpass(modulo)
        {
            // Verifico che il campo password sia valorizzato in caso contrario
            // avverto dell'errore tramite un Alert
            if (modulo.password.value == "")
            {
                alert("Errore: inserire una password!")
                modulo.password.focus()
                return false
            }
            // Verifico che le due password siano uguali, in caso contrario avverto
            // dell'errore con un Alert
            if (modulo.password.value != modulo.password2.value)
            {
                alert("La password inserita non coincide con la prima!")
                modulo.password.focus()
                modulo.password.select()
                return false
            }
            return true
        }

    </script>

</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form action="{$path}Utente/registrazione" method="POST" class="login100-form validate-form flex-sb flex-w" name="modulo" onsubmit="return testpass(this)">
                <div>
                    <a href="{$path}"><img src="{$path}Smarty/img/core-img/logo_1.png"style="position:absolute; top:5px; left:340px; z-index:1"></a>
                </div>
                <span class="login100-form-title p-b-32">
						Recupera Password
					</span>


                <span class="txt1 p-b-11">
						Nuova Password
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Inserire la password">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
                    <input class="input100" type="password" required name="password" placeholder="**********">
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						ripeti nuova Password
                </span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Reinserire la password">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
                    <input class="input100" type="password" required name="password2" placeholder="**********">
                    <span class="focus-input100"></span>
                </div>

                <font color="white">
                    space
                    <br>
                </font>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" style="position:absolute; top:325px; left:370px; z-index:1">
                            Conferma
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