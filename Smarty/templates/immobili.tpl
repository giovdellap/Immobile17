<!DOCTYPE html>
<html lang="en">
{assign var='utente' value=$utente|default:'visitatore'}
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Immobili</title>

    <!-- Favicon  -->
    <link rel="icon" href="{$path}Smarty/img/core-img/favicon.ico">

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
<section class="breadcumb-area bg-img" style="background-image: url({$path}Smarty/img/bg-img/hero1.jpg);">
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

{include file="advanceSearch.tpl"}

<!-- ##### Listing Content Wrapper Area Start ##### -->
<section class="listings-content-wrapper section-padding-100">
    <div class="container">

        <div class="row">
            {foreach $immobili as $item}
            <!-- Single Featured Property -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">
                        <img src={$item->getPresentationImg()} alt="">

                        <div class="tag">
                            <span>"{$item->getTipoAnnuncio()}"</span>
                        </div>
                        <div class="list-price">
                            <p>"{$item->getPrezzo()}"</p>
                        </div>
                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                        <h5>"{$item->getNome()}"</h5>
                        <p class="location"><img src="{$path}Smarty/img/icons/location.png" alt="">"{$item->getIndirizzo()}"</p>
                        <p>"{$item->getDescrizioneBreve()}"</p>
                        <div class="property-meta-data d-flex align-items-end justify-content-between">
                            <div class="new-tag">
                                <img src="{$path}Smarty/img/icons/new.png" alt="">
                            </div>
                            <div class="space">
                                <img src="{$path}Smarty/img/icons/space.png" alt="">
                                <span>{$item->getGrandezza()}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/foreach}
        </div>
    </div>
</section>
<!-- ##### Listing Content Wrapper Area End ##### -->

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