<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>South - Real Estate Agency Template | Listings Details</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="south-load"></div>
</div>

{include file="header.tpl"}

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url("{$immobile->getImmagini()[0]->viewImageHTML()}") ;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">Immobile</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Advance Search Area Start ##### -->
<div class="south-search-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="advanced-search-form">
                    <!-- Search Title -->
                    <div class="search-title">
                        <p>Cerca la tua casa </p>
                    </div>
                    <!-- Search Form -->
                    <form action="#" method="post" id="advanceSearch">
                        <div class="row">

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <input type="input" class="form-control" name="input" placeholder="Parola Chiave">
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="catagories">
                                        <option>Tutte le Tipologie</option>
                                        <option>Monolocale</option>
                                        <option>Bilocale</option>
                                        <option>Villa</option>
                                        <option>Appartamento</option>
                                        <option>Garage</option>
                                        <option>Mansarda</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 d-flex">
                                <!-- Space Range -->
                                <div class="slider-range">
                                    <div data-min="50" data-max="500" data-unit=" mq" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="50" data-value-max="500">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range">50 mq - 500 mq</div>
                                </div>

                                <!-- Price Range -->
                                <div class="slider-range">
                                    <div data-min="50000" data-max="1000000" data-unit=" €" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="50000" data-value-max="1000000">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range">50000 € - 1000000 €</div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-between align-items-end">

                                <!-- Submit -->
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn south-btn">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Advance Search Area End ##### -->


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
                   {/foreach}
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="listings-content">
                    <!-- Price -->
                    <div class="list-price">
                        <p>{$immobile->getPrezzo()}</p>
                    </div>
                    <h5>{$immobile->getNome}</h5>
                    <p class="location"><img src="img/icons/location.png" alt="">"{$immobile->getIndirizzo()}"</p>
                    <p> "{$immobile->getDescrizione()}"</p>
                    <!-- Meta -->
                    <div class="property-meta-data d-flex align-items-end">
                        <div class="new-tag">
                            <img src="img/icons/new.png" alt="">
                        </div>
                        <div class="space">
                            <img src="img/icons/space.png" alt="">
                            <span>"{$immobile->getDimensione()}"</span>
                        </div>
                    </div>
                    <br></br>
                    <br></br>
                    <div class="listings-btn-groups">
                        <a href="#" class="btn south-btn">prenota un appuntamento</a>

                    </div>
                </div>
            </div>
        </div>


        <!--QUA SOTTO CI VA TIPO LA POSIZIONE SULLA MAPPA -->

        <!-- Listing Maps -->
        <div class="row">
            <div>
                <div class="listings-maps mt-80">
                    <div id="googleMap"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Listings Content Area End ##### -->

{include file="footer.tpl"}
<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="js/plugins.js"></script>
<script src="js/classy-nav.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>
<!-- Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
<script src="js/map-active.js"></script>

</body>

</html>