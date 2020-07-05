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
<section class="about-content-wrapper section-padding-100">
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

    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row">

    <!-- Single Featured Property -->
    <div class="col-12 col-md-6 col-xl-8">
        <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="300ms">
            <!-- Property Thumbnail -->
            <div class="property-thumb">
                <img src="{$path}Smarty/img/bg-img/feature3.jpg" alt="">

                <div class="tag">
                    <span>For Sale</span>
                </div>
                <div class="list-price">
                    <p>$945 679</p>
                </div>
            </div>
            <!-- Property Content -->
            <div class="property-content">
                <h5>Town House in Los Angeles</h5>
                <p class="location"><img src="{$path}Smarty/img/icons/location.png" alt="">Upper Road 3411, no.34 CA</p>
                <p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.</p>
                <div class="property-meta-data d-flex align-items-end justify-content-between">
                    <div class="new-tag">
                        <img src="{$path}Smarty/img/icons/new.png" alt="">
                    </div>
                    <div class="bathroom">
                        <img src="{$path}Smarty/img/icons/bathtub.png" alt="">
                        <span>2</span>
                    </div>
                    <div class="garage">
                        <img src="{$path}Smarty/img/icons/garage.png" alt="">
                        <span>2</span>
                    </div>
                    <div class="space">
                        <img src="{$path}Smarty/img/icons/space.png" alt="">
                        <span>120 sq ft</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="300ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img src="{$path}Smarty/img/bg-img/team3.jpg" alt="">

                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>Gesù Cristo</h5>
                            <p>Agente Immobiliare</p>
                        </div>

                        <div class="property-content">
                            <h4>ORA INIZIO: </h4>
                            <p>adesso</p>
                            <h4>ORA FINE: </h4>
                            <p> dopo</p>
                        </div>
                        </div>
                    </div>

                </div>


        </div>

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