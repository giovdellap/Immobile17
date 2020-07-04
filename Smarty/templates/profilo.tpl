<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>South - Real Estate Agency Template | Blog</title>

    <!-- Favicon  -->
    <link rel="icon" alt="{$path}Smarty/img/icons/favicon_1.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{$path}Smarty/style.css">

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="south-load"></div>
</div>

{include file="header.tpl"}
<section>
    <p>&nbsp;	</p>
    <p>&nbsp;	</p>
    <p>&nbsp;	</p>
    <p>&nbsp;	</p>

</section>
<!-- ##### Breadcumb Area End ##### -->

<head>
    <meta charset="utf-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="author" content="YOUR NAME HERE" />
    <link rel="icon" href="{$path}Smarty/img/icon/favicon.ico" />

    <title>Profile Page</title>

    <link
            rel="canonical"
            href="https://getbootstrap.com/docs/4.0/examples/sticky-footer/"
    />

    <!-- Bootstrap core CSS -->
    <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous"
    />

    <!-- Font Awesome -->
    <link href="{$path}Smarty/css/fonts/font-awesome.min.css" rel="stylesheet"/>
            <!--href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"-->



    <!-- Custom styles for this template -->
    <link href="{$path}Smarty/css/style.css" rel="stylesheet" />
</head>

<body>
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
                            class="rounded-circle profile-image"
                    />
                </div>
                <div class="col-md- top-col">
                    <h1 class="">{$utente->getNome()} {$utente->getCognome()}</h1>
                    <p class="lead">{$utente->getEmail()}</p>



                </div>
            </div>
        </div>
    </div>





    <hr class="divider" />
    <h5>I miei Dati&nbsp;</h5>
    <p>{$utente->getId()}</p>
    <p></p>
    <p></p>
    <p>boh</p>
    <hr class="divider" />
    <h5>I miei Appuntamenti</h5>
    <p>*INSERT CALENDARIO*</p>
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