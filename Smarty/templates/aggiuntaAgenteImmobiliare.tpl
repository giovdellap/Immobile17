<!--

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
-->
<!--===============================================================================================
<script src="{$path}Smarty/others/login/vendor/jquery/jquery-3.2.1.min.js"></script>
!--===============================================================================================--
<script src="{$path}Smarty/others/login/vendor/animsition/js/animsition.min.js"></script>
!--===============================================================================================--
<script src="{$path}Smarty/others/login/vendor/bootstrap/js/popper.js"></script>
<script src="{$path}Smarty/others/login/vendor/bootstrap/js/bootstrap.min.js"></script>
!--===============================================================================================--
<script src="{$path}Smarty/others/login/vendor/select2/select2.min.js"></script>
!--===============================================================================================--
<script src="{$path}Smarty/others/login/vendor/daterangepicker/moment.min.js"></script>
<script src="{$path}Smarty/others/login/vendor/daterangepicker/daterangepicker.js"></script>
!--===============================================================================================--
<script src="{$path}Smarty/others/login/vendor/countdowntime/countdowntime.js"></script>
!--===============================================================================================--
<script src="{$path}Smarty/others/login/js/main.js"></script>
-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Clienti</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            Foto
                        </th>

                        <th style="width: 20%">
                            Nome
                        </th>
                        <th style="width: 20%">
                            Cognome
                        </th>
                        <th style="width: 20%">
                            Email
                        </th>
                        <th style="width: 15%">
                            Data di nascita
                        </th>

                        <th style="width: 20%">
                            Password
                        </th>

                        <th style="width: 40%" class="text-center">
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="exampleInputFile"></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" >
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" >
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" >
                            </div>
                        </td>
                        <td >

                            <div class="form-group">
                                <input type="date" class="form-control" >
                            </div>

                        </td>

                        <td >
                            <div class="form-group">

                                <input type="text" class="form-control" >
                            </div>
                        </td>

                        <td>

                            <button type="submit" class="btn btn-primary">Conferma</button>

                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->