<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>{$immobile->getNome()}</title>

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

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url({$immobile->getPresentationImg()}")>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">{$immobile->getNome()}</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

{include file="advanceSearch.tpl"}


<!-- ##### Listings Content Area Start ##### -->
<section class="listings-content-wrapper section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Single Listings Slides -->
                <div class="single-listings-sliders owl-carousel">

                    {foreach $immobile->getImmagini() as $imgs}

                    <!-- Single Slide -->
                        <img src="{$imgs->viewImageHTML()}" alt="">
                    <img src="{$imgs->viewImageHTML()}" alt="">
                   {/foreach}
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <div class="listings-content">
                    <!-- Price -->
                    <div class="list-price">
                        <p>€ {$immobile->getPrezzo()}</p>
                    </div>
                    <h5>{$immobile->getNome()}</h5>
                    <p class="location"><img src="{$path}Smarty/img/icons/location.png" alt="">{$immobile->getIndirizzo()}</p>
                    <p> {$immobile->getDescrizione()}</p>
                    <!-- Meta -->
                    <div class="property-meta-data d-flex align-items-end">
                        <div class="new-tag">
                            <img src="{$path}Smarty/img/icons/new.png" alt="">
                        </div>
                        <div class="space">
                            <img src="{$path}Smarty/img/icons/space.png" alt="">
                            <span>{$immobile->getGrandezza()} mq</span>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="listings-btn-groups">
                        <a href="{$path}Immobile/calendario/id/{$immobile->getId()}" class="btn south-btn">prenota un appuntamento</a>

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
<!-- Google Maps
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>-->
<script src="{$path}Smarty/js/map-active.js"></script>

</body>

</html>