<!DOCTYPE html>
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
    <link rel="icon" href="{$path}Smarty/img/icons/favicon_1.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{$path}Smarty/style.css">

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="south-load"></div>
</div>

{include file="header.tpl"}

<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img" style="background-image: url({$imgSlide1});">
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
        <div class="single-hero-slide bg-img" style="background-image: url({$imgSlide2});">
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
        <div class="single-hero-slide bg-img" style="background-image: url({$imgSlide3});" >
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">collemaggio</h2>
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


            {foreach $immobili as $immobile}
            <!-- Single Featured Property -->
            <div class="col-12 col-md-4 col-xl-4">
                <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="200ms">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">
                        <a href="{$path}Immobile/visualizza/{$immobile->getId()}"><img src="{$immobile->getPresentationImg()}" alt="" style="width: 450px; height: 270px">

                            <div class="tag">
                                <span>{$immobile->getTipoAnnuncio()}</span>
                            </div>
                            <div class="list-price">
                                <p>€ {$immobile->getPrezzo()}</p>
                            </div>
                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                        <h5>{$immobile->getNome() }</h5>
                        <p class="location"><img src="{$path}Smarty/img/icons/location.png" alt=""> {$immobile->getIndirizzo()}</p>
                        <p>{$immobile->getDescrizioneBreve()}</p>
                        <div class="property-meta-data d-flex align-items-end justify-content-between">
                            <div class="new-tag">
                                <img src="{$path}Smarty/img/icons/new.png" alt="">
                            </div>
                            <div class="space">
                                <img src="{$path}Smarty/img/icons/space.png" alt=""">
                                <span>{$immobile->getGrandezza()} mq</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/foreach}
    </div>
</section>
<!-- ##### Featured Properties Area End ##### -->

<!-- ##### Call To Action Area Start ##### -->
<section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url({$path}Smarty/img/bg-img/cta.jpg)">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-12">
                <div class="cta-content text-center">
                    <h2 class="wow fadeInUp" data-wow-delay="300ms">Cerchi casa in affitto?</h2>
                    <h6 class="wow fadeInUp" data-wow-delay="400ms">Dai un'occhiata alle nostre migliori proposte</h6>
                    <a href="{$path}Immobile/ricerca/ti/Affitto" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Affitti</a>
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
            <img src={$path}Smarty/img/icons/prize.png alt="">
            <h2>Admin Istrator</h2>
            <p>Amministratore</p>
        </div>
        <p class="wow fadeInUp" data-wow-delay="500ms" style="text-align: justify;">
            Admin Istrator è un dirigente d'azienda italiano con cittadinanza statunitense.
            Da sempre appassionato di immobili e barbe, è diventato il nuovo amministratore
            di Immobile17 nell'aprile 2020. Muove i suoi primi passi in azienda assumendo
            la carica di agente immobiliare nel reparto I17 research.</p>
        <div class="address wow fadeInUp" data-wow-delay="750ms">
            <h6><img src={$path}Smarty/img/icons/phone-call.png alt=""> +39 0862 433812</h6>
            <h6><img src={$path}Smarty/img/icons/envelope.png alt=""> admin@admin.it</h6>
        </div>
        <div class="signature mt-50 wow fadeInUp" data-wow-delay="1000ms">
            <img src="{$path}Smarty/img/core-img/firma.png" alt="">
        </div>
    </div>

    <!-- Editor Thumbnail -->
    <div class="editor-thumbnail">
        <img src="{$path}Smarty/img/bg-img/editor.jpg" alt="">
    </div>
</section>
<!-- ##### Editor Area End ##### -->

{include file = "footer.tpl"}

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src={$path}/Smarty/js/jquery/jquery-2.2.4.min.js></script>
<!-- Popper js -->
<script src={$path}/Smarty/js/popper.min.js></script>
<!-- Bootstrap js -->
<script src={$path}/Smarty/js/bootstrap.min.js></script>
<!-- Plugins js -->
<script src={$path}/Smarty/js/plugins.js></script>
<script src={$path}/Smarty/js/classy-nav.min.js></script>
<script src={$path}/Smarty/js/jquery-ui.min.js></script>
<!-- Active js -->
<script src={$path}/Smarty/js/active.js></script>

</body>

</html>