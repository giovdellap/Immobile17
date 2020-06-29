<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-29 16:28:27
  from 'C:\xampp\htdocs\AgenziaImmobiliare\Smarty\templates\profilo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef9fa8b537a43_43044638',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d782647ae8ba06aa7a82a54c0a02149a41db6bf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AgenziaImmobiliare\\Smarty\\templates\\profilo.tpl',
      1 => 1593438374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ef9fa8b537a43_43044638 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/favicon_1.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/style.css">

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="south-load"></div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icon/favicon.ico" />

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
    <link href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/css/fonts/font-awesome.min.css"
            <!--href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"-->

            rel="stylesheet"
    />
    <!-- Custom styles for this template -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/css/style.css" rel="stylesheet" />
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
                            src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/avatar.png"
                            alt="..."
                            class="rounded-circle profile-image"
                    />
                </div>
                <div class="col-md- top-col">
                    <h1 class=""><?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['utente']->value->getCognome();?>
</h1>
                    <p class="lead"><?php echo $_smarty_tpl->tpl_vars['utente']->value->getEmail();?>
</p>



                </div>
            </div>
        </div>
    </div>





    <hr class="divider" />
    <h5>I miei Dati&nbsp;</h5>
    <p><?php echo $_smarty_tpl->tpl_vars['utente']->value->getId();?>
</p>
    <p></p>
    <p><?php echo $_smarty_tpl->tpl_vars['utente']->value->getIndirizzo();?>
</p>
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
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Utente/privacy">Privacy e Sicurezza </a> </li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Utente/cambioPassword" >Cambio Password  </a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Utente/eliminaAccount" > Elimina Account&nbsp; </a></li>
            </ul>
        </div>

    </div>
</main>
</body>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/js/jquery/jquery-2.2.4.min.js"><?php echo '</script'; ?>
>
<!-- Popper js -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/js/popper.min.js"><?php echo '</script'; ?>
>
<!-- Bootstrap js -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<!-- Plugins js -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/js/plugins.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/js/classy-nav.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/js/jquery-ui.min.js"><?php echo '</script'; ?>
>
<!-- Active js -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/js/active.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
