<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-27 22:06:13
  from '/opt/lampp/htdocs/AgenziaImmobiliare/Smarty/templates/immobili.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef7a6b57cab13_46202958',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d02bfb2d8428945191967f5e4a6a043c3c936e4' => 
    array (
      0 => '/opt/lampp/htdocs/AgenziaImmobiliare/Smarty/templates/immobili.tpl',
      1 => 1593190176,
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
function content_5ef7a6b57cab13_46202958 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<?php $_smarty_tpl->_assignInScope('utente', (($tmp = @$_smarty_tpl->tpl_vars['utente']->value)===null||$tmp==='' ? 'visitatore' : $tmp));?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Immobili</title>

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smartystyle.css">

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="south-load"></div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/bg-img/hero1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">immobili In Vendita</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<?php $_smarty_tpl->_subTemplateRender("file:advanceSearch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- ##### Listing Content Wrapper Area Start ##### -->
<section class="listings-content-wrapper section-padding-100">
    <div class="container">

        <div class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['immobili']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
            <!-- Single Featured Property -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">
                        <img src=<?php echo $_smarty_tpl->tpl_vars['item']->value->getPresentationImg();?>
 alt="">

                        <div class="tag">
                            <span>"<?php echo $_smarty_tpl->tpl_vars['item']->value->getTipoAnnuncio();?>
"</span>
                        </div>
                        <div class="list-price">
                            <p>"<?php echo $_smarty_tpl->tpl_vars['item']->value->getPrezzo();?>
"</p>
                        </div>
                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                        <h5>"<?php echo $_smarty_tpl->tpl_vars['item']->value->getNome();?>
"</h5>
                        <p class="location"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/location.png" alt="">"<?php echo $_smarty_tpl->tpl_vars['item']->value->getIndirizzo();?>
"</p>
                        <p>"<?php echo $_smarty_tpl->tpl_vars['item']->value->getDescrizioneBreve();?>
"</p>
                        <div class="property-meta-data d-flex align-items-end justify-content-between">
                            <div class="new-tag">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/new.png" alt="">
                            </div>
                            <div class="space">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/space.png" alt="">
                                <span><?php echo $_smarty_tpl->tpl_vars['item']->value->getGrandezza();?>
</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</section>
<!-- ##### Listing Content Wrapper Area End ##### -->

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
