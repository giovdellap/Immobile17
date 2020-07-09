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
                        <img src="{$imgs->viewImageHTML()}" alt="PIPPA">
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
                    <p style="text-align: justify;"> {$immobile->getDescrizioneVista()}</p>
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
                        {if $tipoUtente == 'CLIENTE' && $utente->isAttivato()}
                            <a href="{$path}Immobile/calendario/id/{$immobile->getId()}" class="btn south-btn">prenota un appuntamento</a>
                        {elseif $tipoUtente == 'VISITATORE'}
                            <a href="{$path}Utente/login" class="btn south-btn">prenota un appuntamento</a>
                        {elseif $tipoUtente == 'CLIENTE' && !$utente->isAttivato()}
                            <a onclick="alert('Verifica il tuo Account');" class="btn south-btn">prenota un appuntamento</a>
                        {/if}
                    </div>
                </div>
            </div>
        </div>


        <!-- Listing Maps -->
        <div class="row">
            <div class="col-12">
                <div class="listings-maps mt-80">
                        <div id="googleMap" ></div>
                </div>
            </div>
        </div>
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsKBFy70Mv9pah4QrR39P8xzBbWQThDIU"></script>
<script>
    var map;
    var latlng = new google.maps.LatLng(56.9496, 24.1052);
    var stylez = [{
        featureType: "all",
        elementType: "all",
        stylers: [{
            saturation: -25
        }]
    }];
    var mapOptions = {
        zoom: 15,
        center: latlng,
        scrollwheel: false,
        scaleControl: false,
        disableDefaultUI: true,
        mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'gMap']
        }
    };
    map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

    var geocoder_map = new google.maps.Geocoder();
    var address = '{$immobile->getIndirizzo()}' + ', ' + "{$immobile->getComune()}";
    geocoder_map.geocode({
        'address': address
    }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                icon: '',
                position: map.getCenter()
            });
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
    var mapType = new google.maps.StyledMapType(stylez, {
        name: "Grayscale"
    });
    map.mapTypes.set('gMap', mapType);
    map.setMapTypeId('gMap');

</script>



</body>

</html>