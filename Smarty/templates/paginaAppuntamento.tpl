<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Appuntamento</title>

    <!-- Favicon-->

    <link rel="icon" href={$path}Smarty/img/icons/favicon_1.ico">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{$path}Smarty/style.css">

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="south-load"></div>
</div>

{include file="header.tpl"}

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url({$path}Smarty/img/bg-img/appuntamento.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">Appuntamento</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->
<section class="about-content-wrapper section-padding-100-50">
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="section-heading text-left wow fadeInUp" data-wow-delay="250ms">
                <h2>Dettagli appuntamento</h2>
                <p>Tutto quello che c'è da sapere</p>
            </div>
        </div>
    </div>
</div>
</section>
    <section class="featured-properties-area section-padding-50-50-20">
        <div class="container">
            <div class="row">

    <!-- Single Featured Property -->
    <div class="col-12 col-md-6 col-xl-8">
        <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="300ms">
            <!-- Property Thumbnail -->
            <a href="{$path}Immobile/visualizza/{$immobile->getId()}">
            <div class="property-thumb">
                <img src="{$immobile->getPresentationImg()}" alt="">

                <div class="tag">
                    <span>{$immobile->getTipoAnnuncio()}</span>
                </div>
                <div class="list-price">
                    <p>€ {$immobile->getPrezzo()}</p>
                </div>
            </div>
            <!-- Property Content -->
            <div class="property-content">
                <h5>{$immobile->getNome()}</h5>
                <p class="location"><img src="{$path}Smarty/img/icons/location.png" alt="">{$immobile->getIndirizzo()}, {$immobile->getComune()}</p>
                <p>{$immobile->getDescrizioneBreve()}</p>
                <div class="property-meta-data d-flex align-items-end justify-content-between">
                    <div class="new-tag">
                        <img src="{$path}Smarty/img/icons/new.png" alt="">
                    </div>

                    <div class="space">
                        <img src="{$path}Smarty/img/icons/space.png" alt="">
                        <span>{$immobile->getGrandezza()} mq</span>
                    </div>
                </div>
            </div>
            </a>
        </div>

    </div>

    <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="300ms">
                        <!-- Property Thumbnail-->
                        {if $userType === 'AGENTE'}
                            <div class="property-thumb">
                            {if isset ($cliente->getImmagine())}
                                <img src="{$cliente->getImmagine()->viewImageHTML()}" >
                            {else}
                                <img src="{$path}Smarty/img/icons/avatar.png">
                            {/if}

                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>{$cliente->getFullName()}</h5>
                            <p>Cliente</p>
                        </div>
                        {else}
                            <div class="property-thumb">
                                {if isset ($agente->getImmagine())}
                                    <img src="{$agente->getImmagine()->viewImageHTML()}" >
                                {else}
                                    <img src="{$path}Smarty/img/icons/avatar.png">
                                {/if}

                            </div>
                            <!-- Property Content -->
                            <div class="property-content">
                                <h5>{$agente->getFullName()}</h5>
                                <p>Agente Immobiliare</p>
                            </div>
                        {/if}
                        <div class="property-content">
                            <h4>DATA:</h4>
                            <p>{$appuntamento->getOrarioInizio()->getDateFormat()}</p>
                            <h5>ORA INIZIO: </h5>
                            <p>{$appuntamento->getOrarioInizio()->getOrario()}</p>
                            <h5>ORA FINE: </h5>
                            <p> {$appuntamento->getOrarioFine()->getOrario()}</p>
                        </div>
                        </div>
                    </div>

                </div>


        </div>
    </section>
        <!-- Single Featured Property -->


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