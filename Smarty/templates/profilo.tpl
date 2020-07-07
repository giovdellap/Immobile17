<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>{$utente->getNome()} {$utente->getCognome()}</title>

    <!-- Favicon  -->
    <link rel="icon" href="{$path}Smarty/img/icons/favicon_1.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{$path}Smarty/style.css">

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>


    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer/"/>

    <!-- Bootstrap core CSS -->
    <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous"/>

    <!-- Font Awesome -->
    <link href="{$path}Smarty/css/fonts/font-awesome.min.css" rel="stylesheet"/>
    <!--href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"-->

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="south-load"></div>
</div>

{include file="header.tpl"}
<section class="breadcumb-area bg-img" style="background-image: url({$path}Smarty/img/bg-img/areapersonale.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">Area Personale</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <p>&nbsp;	</p>
    <p>&nbsp;	</p>


</section>
<!-- ##### Breadcumb Area End ##### -->



<!-- Begin page content -->
<main role="main" class="container">
    <div class="mt-20"></div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-md-4">
                    <img
                            src="{$utente->getImmagine()->viewImageHTML()}"
                            alt="{$path}Smarty/img/icons/avatar.png"
                            class="profile-image"
                    />
                </div>
                <div class="col-md- top-col">
                    <h5 class="">{$utente->getNome()} {$utente->getCognome()}</h5>
                    <p class="lead"> </p>



                </div>
            </div>
        </div>
    </div>





    <hr class="divider" />
    <h5>Dati Personali &nbsp;</h5>
    <span style="color: #0b0b0b">Email:</span> <p> {$utente->getEmail()} </p>
    <span style="color: #0b0b0b">Data di Nascita:</span> <p> {$utente->getDataNascita()->getDateFormat()}</p>
    <p></p>

    <hr class="divider">
    <h5>I miei Appuntamenti</h5>


    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <hr class="divider" />
    <h5>Impostazioni&nbsp;</h5>

    <div class="row">
        <div class="col-sm-6">
            <ul>
                <li><a href="{$path}Utente/privacy">Privacy e Sicurezza </a> </li>
                <li><a href="{$path}Utente/modificaDati" >Modifica Dati Personali </a></li>
                <li><a href="{$path}Utente/eliminaAccount" > Elimina Account&nbsp; </a></li>
            </ul>
        </div>

    </div>
</main>
</body>

{include file="footer.tpl"}

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{$path}Smarty/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="{$path}Smarty/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="{$path}Smarty/js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="{$path}Smarty/js/plugins.js"></script>
<script src="{$path}Smarty/js/classy-nav.min.js"></script>
<script src="{$path}Smarty/js/jquery-ui.min.js"></script>
<!-- Active js -->
<script src="{$path}Smarty/js/active.js"></script>

</body>

</html>