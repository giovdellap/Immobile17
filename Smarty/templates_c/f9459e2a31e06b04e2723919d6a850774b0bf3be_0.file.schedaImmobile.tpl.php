<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-30 09:50:21
  from '/opt/lampp/htdocs/AgenziaImmobiliare/Smarty/templates/schedaImmobile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efaeebd1a41e2_32573312',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9459e2a31e06b04e2723919d6a850774b0bf3be' => 
    array (
      0 => '/opt/lampp/htdocs/AgenziaImmobiliare/Smarty/templates/schedaImmobile.tpl',
      1 => 1593439486,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:advanceSearch.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5efaeebd1a41e2_32573312 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title><?php echo $_smarty_tpl->tpl_vars['immobile']->value->getNome();?>
</title>

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

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['immobile']->value->getPresentationImg();?>
")>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title"><?php echo $_smarty_tpl->tpl_vars['immobile']->value->getNome();?>
</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<?php $_smarty_tpl->_subTemplateRender("file:advanceSearch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- ##### Listings Content Area Start ##### -->
<section class="listings-content-wrapper section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Single Listings Slides -->
                <div class="single-listings-sliders owl-carousel">

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['immobile']->value->getImmagini(), 'imgs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['imgs']->value) {
?>

                    <!-- Single Slide -->
                        <img src="<?php echo $_smarty_tpl->tpl_vars['imgs']->value->viewImageHTML();?>
" alt="">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['imgs']->value->viewImageHTML();?>
" alt="">
                   <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <div class="listings-content">
                    <!-- Price -->
                    <div class="list-price">
                        <p>€ <?php echo $_smarty_tpl->tpl_vars['immobile']->value->getPrezzo();?>
</p>
                    </div>
                    <h5><?php echo $_smarty_tpl->tpl_vars['immobile']->value->getNome();?>
</h5>
                    <p class="location"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/location.png" alt=""><?php echo $_smarty_tpl->tpl_vars['immobile']->value->getIndirizzo();?>
</p>
                    <p> <?php echo $_smarty_tpl->tpl_vars['immobile']->value->getDescrizione();?>
</p>
                    <!-- Meta -->
                    <div class="property-meta-data d-flex align-items-end">
                        <div class="new-tag">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/new.png" alt="">
                        </div>
                        <div class="space">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/space.png" alt="">
                            <span><?php echo $_smarty_tpl->tpl_vars['immobile']->value->getGrandezza();?>
 mq</span>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="listings-btn-groups">
                        <a href="#" class="btn south-btn">prenota un appuntamento</a>

                    </div>
                </div>
            </div>
        </div>


        <!--QUA SOTTO CI VA TIPO LA POSIZIONE SULLA MAPPA -->

        <!-- Listing Maps
        <div class="row">
            <div>
                <div class="listings-maps mt-80">
                    <div id="googleMap"></div>
                </div>
            </div>
        </div>
        -->
    </div>
</section>
 <!--##### Listings Content Area End ##### -->

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
<!-- Google Maps
<?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/js/map-active.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
