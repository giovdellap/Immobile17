<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>About us</title>

    <!-- Favicon-->

    <link rel="icon" href={$path}Smarty/img/core-img/favicon.ico">
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
                    <h3 class="breadcumb-title">About us</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### About Content Wrapper Start ##### -->
<section class="about-content-wrapper section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="section-heading text-left wow fadeInUp" data-wow-delay="250ms">
                    <h2>Selezioniamo le case perfette per te</h2>
                    <p>Suspendisse dictum enim sit amet libero</p>
                </div>
                <div class="about-content">
                    <img class="wow fadeInUp" data-wow-delay="350ms" src="{$path}Smarty/img/bg-img/about.jpg" alt="">
                    <p class="wow fadeInUp" data-wow-delay="450ms">Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada. Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada feugiat. Praesent malesuada congue magna at finibus. In hac habitasse platea dictumst. Curabitur rhoncus auctor eleifend. Fusce venenatis diam urna, eu pharetra arcu varius ac. Etiam cursus turpis lectus, id iaculis risus tempor id. Phasellus fringilla nisl sed sem scelerisque, eget aliquam magna vehicula.</p>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="section-heading text-left wow fadeInUp" data-wow-delay="250ms">
                    <h2>Immobili in vista</h2>
                    <p>Suspendisse dictum enim sit amet libero</p>
                </div>

                <div class="featured-properties-slides owl-carousel wow fadeInUp" data-wow-delay="350ms">
                    {foreach $Tops as $Top}
                        {$img=$Top->getImmagini()}
                    <!-- Single Slide -->
                    <div class="single-featured-property">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="{$path}Immobile/visualizza/{$Top->getId()}"<img src="{$imgs[0]->viewImageHTML()}" alt="">

                            <div class="tag">
                                <span>{$Top->getTipoAnnuncio()}</span>
                            </div>
                            <div class="list-price">
                                <p>{$Top->getPrezzo()}</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>{$Top->getNome()}</h5>
                            <p class="location"><img src="{$path}Smarty/img/icons/location.png" alt="">{$Top->getIndirizzo()}</p>
                            <p>{$Top->getDescrizioneBreve()}</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="{$path}Smarty/img/icons/new.png" alt="">
                                </div>
                                <div class="space">
                                    <img src="{$path}Smarty/img/icons/space.png" alt="">
                                    <span>{$Top->getGrandezza()} mq</span>
                                </div>
                            </div>
                        </div>
                    </div>
                        {/foreach}


                    </div>
                </div>
            </div>
        </div>

</section>
<!-- ##### About Content Wrapper End ##### -->

<!-- ##### Call To Action Area Start ##### -->
<section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url({$path}Smarty/img/bg-img/cta.jpg)">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-12">
                <div class="cta-content text-center">
                    <h2 class="wow fadeInUp" data-wow-delay="300ms">Cerchi casa?</h2>
                    <h6 class="wow fadeInUp" data-wow-delay="400ms">Dai un'occhiata alle nostre migliori proposte</h6>
                    <a href="#" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Cerca</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Call To Action Area End ##### -->

<!-- ##### Meet The Team Area Start ##### -->
<section class="meet-the-team-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2>incontra il nostro team</h2>
                    <p>Suspendisse dictum enim sit amet libero</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- Single Team Member -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="250ms">
                    <!-- Team Member Thumb -->
                    <div class="team-member-thumb">
                        <img src="{$path}Smarty/img/bg-img/team1.jpg" alt="">
                    </div>
                    <!-- Team Member Info -->
                    <div class="team-member-info">
                        <div class="section-heading">
                            <img src="{$path}Smarty/img/icons/prize.png" alt="">
                            <h2>Jeremy Scott</h2>
                            <p>C.E.O.</p>
                        </div>
                        <div class="address">
                            <h6><img src="{$path}Smarty/img/icons/phone-call.png" alt=""> +45 677 8993000 223</h6>
                            <h6><img src="{$path}Smarty/img/icons/envelope.png" alt=""> office@template.com</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Team Member -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <!-- Team Member Thumb -->
                    <div class="team-member-thumb">
                        <img src="{$path}Smarty/img/bg-img/team2.jpg" alt="">
                    </div>
                    <!-- Team Member Info -->
                    <div class="team-member-info">
                        <div class="section-heading">
                            <img src="{$path}Smarty/img/icons/prize.png" alt="">
                            <h2>Vanessa Marchesani</h2>
                            <p>Agente immobiliare</p>
                        </div>
                        <div class="address">
                            <h6><img src="{$path}Smarty/img/icons/phone-call.png" alt=""> +45 677 8993000 223</h6>
                            <h6><img src="{$path}Smarty/img/icons/envelope.png" alt=""> office@template.com</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Team Member -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="750ms">
                    <!-- Team Member Thumb -->
                    <div class="team-member-thumb">
                        <img src="{$path}Smarty/img/bg-img/team3.jpg" alt="">
                    </div>
                    <!-- Team Member Info -->
                    <div class="team-member-info">
                        <div class="section-heading">
                            <img src="{$path}Smarty/img/icons/prize.png" alt="">
                            <h2>Gabriele Gatti</h2>
                            <p>agente immobiliare</p>
                        </div>
                        <div class="address">
                            <h6><img src="{$path}Smarty/img/icons/phone-call.png" alt=""> +45 677 8993000 223</h6>
                            <h6><img src="{$path}Smarty/img/icons/envelope.png" alt=""> office@template.com</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Meet The Team Area End ##### -->
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