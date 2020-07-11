<!DOCTYPE html>
<html lang="it">
<head>
    <title>Installazione</title>
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
            <form method="post" action="{$path}"  enctype="multipart/form-data" class="login100-form validate-form flex-sb flex-w">
                <div>
                    <a href="{$path}"><img src="{$path}Smarty/img/core-img/logo_1.png" style="position:absolute; top:15px; left:340px; z-index:1"></a>
                </div>

                <span class="login100-form-title p-b-32">
                        <br>
						Installazione
					</span>

                <span class="txt1 p-b-11"> Scegli il nome del database </span>

                <div class="wrap-input100 validate-input m-b-36" data-validate = "Scrivere il nome del Database">
                    <input class="input100" type="text" required name="nomeDB"  >
                    <span class="focus-input100"> </span>
                </div>

                <span class="txt1 p-b-11"> Nome Utente </span> <small> (database)</small>

                <div class="wrap-input100 validate-input m-b-36" data-validate = "Scrivere il nome utente per accedere al Database">
                    <input class="input100" type="text" required name="usernameDB"  >
                    <span class="focus-input100"> </span>
                </div>


                <span class="txt1 p-b-11"> Password </span> <small> (database)</small>

                <div class="wrap-input100 validate-input m-b-12" data-validate = "Scrivere la password per accedere al Database">
                    <input class="input100" type="text" required name="passwordDB" placeholder="**********">
                    <span class="focus-input100"> </span>
                </div>

                <span class="txt1 p-b-11"> Email Amministratore </span> <small> (non modificabile)</small>

                <div class="wrap-input100 validate-input m-b-36" data-validate = "Email dell'admin per il login">
                    <input class="input100" type="text" required value="admin@admin.it"  readonly>
                    <span class="focus-input100"> </span>
                </div>


                <span class="txt1 p-b-11">
						Scegli la password dell'Amministratore
					</span>

                <div class="wrap-input100 validate-input m-b-12" data-validate = "Scrivere la password per il login dell'Amministratore">
                    <input class="input100" type="text" required name="passwordAdmin" placeholder="**********">
                    <span class="focus-input100"> </span>
                </div>

                <div class="flex-sb-m w-full p-b-48">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="populate">
                        <label class="label-checkbox100" for="ckb1">
                            Popola il Database
                        </label>
                    </div>

                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" onclick="document.cookie= 'checkjs=true'">
                        Installa
                    </button>
                </div>
                <h3> {$error} </h3>


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
