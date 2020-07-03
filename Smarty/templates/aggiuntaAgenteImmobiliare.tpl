

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form action="{$path}Utente/registrazione" method="POST" class="login100-form validate-form flex-sb flex-w">
                <div>
                    <a href="{$path}"><img src="{$path}Smarty/img/core-img/logo_1.png"style="position:absolute; top:15px; left:340px; z-index:1"></a>
                </div>
                <span class="login100-form-title p-b-32">
                    <br>
						Aggiunta Agente Immobiliare
					</span>

                <span class="txt1 p-b-11">
						Nome
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Inserire il nome">
                    <input class="input100" type="text" required name="nome" >
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Cognome
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Inserire il cognome">
                    <input class="input100" type="text" required name="cognome" >
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Data di nascita
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "inserire la data di nascita">
                    <input class="input100" type="date" name="date" required name="date"  >
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Email
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Inserire l'indirizzo Email">
                    <input class="input100" type="text" required name="email"  >
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Password
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Inserire la password">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
                    <input class="input100" type="password" required name="password" placeholder="**********">
                    <span class="focus-input100"></span>
                </div>


                {include file="loadImage.tpl"}


                <br>
                <br>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Aggiungi
                        </button>
                    </div>


                    </a>
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
