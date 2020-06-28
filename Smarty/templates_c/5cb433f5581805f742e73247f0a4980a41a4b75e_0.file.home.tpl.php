<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-28 19:27:36
  from '/opt/lampp/htdocs/AgenziaImmobiliare/Smarty/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef8d308c4f6a2_09395894',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5cb433f5581805f742e73247f0a4980a41a4b75e' => 
    array (
      0 => '/opt/lampp/htdocs/AgenziaImmobiliare/Smarty/templates/home.tpl',
      1 => 1593362131,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ef8d308c4f6a2_09395894 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/core-img/favicon.ico">

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

<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['imgSlide1']->value;?>
);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Fai goal insieme a Ciro</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['imgSlide2']->value;?>
);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Cerca la casa dei tuoi sogni</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['imgSlide3']->value;?>
);" >
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Prega nella chiesa più figa del mondo</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Hero Area End ##### -->



<!-- ##### Featured Properties Area Start ##### -->
<section class="featured-properties-area section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading wow fadeInUp">
                    <h2>in primo piano</h2>
                    <p>I migliori immobili che puoi trovare a L'Aquila</p>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Single Featured Property -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="200ms">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Immobile/visualizza/<?php echo $_smarty_tpl->tpl_vars['immobile0']->value->getId();?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['imgTop1']->value[0]->viewImageHTML();?>
" alt="">

                            <div class="tag">
                                <span><?php echo $_smarty_tpl->tpl_vars['immobile0']->value->getTipoAnnuncio();?>
</span>
                            </div>
                            <div class="list-price">
                                <p>€ <?php echo $_smarty_tpl->tpl_vars['immobile0']->value->getPrezzo();?>
</p>
                            </div>
                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                        <h5><?php echo $_smarty_tpl->tpl_vars['immobile0']->value->getNome();?>
</h5>
                        <p class="location"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/location.png" alt=""> <?php echo $_smarty_tpl->tpl_vars['immobile1']->value->getIndirizzo();?>
</p>
                        <p><?php echo $_smarty_tpl->tpl_vars['immobile1']->value->getDescrizioneBreve();?>
</p>
                        <div class="property-meta-data d-flex align-items-end justify-content-between">
                            <div class="new-tag">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/new.png" alt="">
                            </div>
                            <div class="space">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/space.png" alt=""">
                                <span><?php echo $_smarty_tpl->tpl_vars['immobile0']->value->getGrandezza();?>
 mq</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Featured Property -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="200ms">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Immobile/visualizza/<?php echo $_smarty_tpl->tpl_vars['immobile1']->value->getId();?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['imgTop2']->value[0]->viewImageHTML();?>
" alt="">

                        <div class="tag">
                            <span><?php echo $_smarty_tpl->tpl_vars['immobile1']->value->getTipoAnnuncio();?>
</span>
                        </div>
                        <div class="list-price">
                            <p>€ <?php echo $_smarty_tpl->tpl_vars['immobile1']->value->getPrezzo();?>
</p>
                        </div>
                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                        <h5><?php echo $_smarty_tpl->tpl_vars['immobile1']->value->getNome();?>
</h5>
                        <p class="location"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/location.png" alt=""> <?php echo $_smarty_tpl->tpl_vars['immobile1']->value->getIndirizzo();?>
</p>
                        <p><?php echo $_smarty_tpl->tpl_vars['immobile1']->value->getDescrizioneBreve();?>
</p>
                        <div class="property-meta-data d-flex align-items-end justify-content-between">
                            <div class="new-tag">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/new.png" alt="">
                            </div>
                            <div class="space">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/space.png" alt=""">
                                <span><?php echo $_smarty_tpl->tpl_vars['immobile1']->value->getGrandezza();?>
 mq</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Featured Property -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="200ms">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Immobile/visualizza/<?php echo $_smarty_tpl->tpl_vars['immobile2']->value->getId();?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['imgTop3']->value[0]->viewImageHTML();?>
" alt="">

                        <div class="tag">
                            <span><?php echo $_smarty_tpl->tpl_vars['immobile2']->value->getTipoAnnuncio();?>
</span>
                        </div>
                        <div class="list-price">
                            <p>€ <?php echo $_smarty_tpl->tpl_vars['immobile2']->value->getPrezzo();?>
</p>
                        </div>
                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                        <h5><?php echo $_smarty_tpl->tpl_vars['immobile2']->value->getNome();?>
</h5>
                        <p class="location"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/location.png" alt=""> <?php echo $_smarty_tpl->tpl_vars['immobile1']->value->getIndirizzo();?>
</p>
                        <p><?php echo $_smarty_tpl->tpl_vars['immobile2']->value->getDescrizioneBreve();?>
</p>
                        <div class="property-meta-data d-flex align-items-end justify-content-between">
                            <div class="new-tag">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/new.png" alt="">
                            </div>
                            <div class="space">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/space.png" alt=""">
                                <span><?php echo $_smarty_tpl->tpl_vars['immobile2']->value->getGrandezza();?>
 mq</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</section>
<!-- ##### Featured Properties Area End ##### -->

<!-- ##### Call To Action Area Start ##### -->
<section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/bg-img/cta.jpg)">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-12">
                <div class="cta-content text-center">
                    <h2 class="wow fadeInUp" data-wow-delay="300ms">Cerchi casa in affitto?</h2>
                    <h6 class="wow fadeInUp" data-wow-delay="400ms">Dai un'occhiata alle nostre migliori proposte</h6>
                    <a href="#" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Affitti</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Call To Action Area End ##### -->

<!-- ##### Editor Area Start ##### -->
<section class="south-editor-area d-flex align-items-center">
    <!-- Editor Content -->
    <div class="editor-content-area">
        <!-- Section Heading -->
        <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
            <img src=<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/prize.png alt="">
            <h2>Admin Istrator</h2>
            <p>Amministratore</p>
        </div>
        <p class="wow fadeInUp" data-wow-delay="500ms">Admin Istrator è un dirigente d'azienda italiano con cittadinanza statunitense. Da sempre appassionato di immobili e barbe, è diventato il nuovo amministratore di Immobile17 nell'aprile 2020. Muove i suoi primi passi in azienda assumendo la carica di agente immobiliare nel reparto I17 research.</p>
        <div class="address wow fadeInUp" data-wow-delay="750ms">
            <h6><img src=<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/phone-call.png alt=""> +39 0862 433812</h6>
            <h6><img src=<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/icons/envelope.png alt=""> admin@admin.it</h6>
        </div>
        <div class="signature mt-50 wow fadeInUp" data-wow-delay="1000ms">
            <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/core-img/firma.png" alt="">
        </div>
    </div>

    <!-- Editor Thumbnail -->
    <div class="editor-thumbnail">
        <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/bg-img/editor.jpg" alt="">
    </div>
</section>
<!-- ##### Editor Area End ##### -->

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<?php echo '<script'; ?>
 src=<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/Smarty/js/jquery/jquery-2.2.4.min.js><?php echo '</script'; ?>
>
<!-- Popper js -->
<?php echo '<script'; ?>
 src=<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/Smarty/js/popper.min.js><?php echo '</script'; ?>
>
<!-- Bootstrap js -->
<?php echo '<script'; ?>
 src=<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/Smarty/js/bootstrap.min.js><?php echo '</script'; ?>
>
<!-- Plugins js -->
<?php echo '<script'; ?>
 src=<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/Smarty/js/plugins.js><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src=<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/Smarty/js/classy-nav.min.js><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src=<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/Smarty/js/jquery-ui.min.js><?php echo '</script'; ?>
>
<!-- Active js -->
<?php echo '<script'; ?>
 src=<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/Smarty/js/active.js><?php echo '</script'; ?>
>

</body>

</html><?php }
}
