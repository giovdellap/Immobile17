<!DOCTYPE html>
{assign var='utente' value=$utente|default:'visitatore'}
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Immobile17 | Home</title>

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

<!-- ##### Header Area Start ##### -->
<header class="header-area">



    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="southNav">

                <!-- Logo -->
                <a class="nav-brand" href="{$path}"><img src="{$path}Smarty/img/core-img/logo.png" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{$path}">Home</a></li>

                            <li class="cn-dropdown-item has-down pr12"><a href="#">Immobili</a>
                                <ul class="dropdown">
                                    <li><a href="//URLVENDITA">Vendita</a></li>
                                    <li><a href="//URLAFFITTO">Affitto</a></li>

                                </ul>
                            </li>
                            {if $utente != 'visitatore'}
                                <li><a href="index.html">login</a></li>

                            {else}
                                <li class="cn-dropdown-item has-down pr12"><a href="#">{$nomeutente}</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Area Riservata</a></li>
                                        <li><a href="about-us.html">Logout</a></li>

                                    </ul>
                                </li>
                            {/if}

                            <li><a href="contact.html">About Us</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img" style="background-image: {$immagine1};">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Trova la casa perfetta per te</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img" style="background-image: {$immagine2};">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Trova la casa perfetta per te</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img" style="background-image: {$immagine3};">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Trova la casa perfetta per te</h2>
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
                <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">
                        <img src={$immobile0->getImmagini()[0]->getData()} alt="">

                        <div class="tag">
                            <span>"{$immobile1->getTipoAnnuncio()}"</span>
                        </div>
                        <div class="list-price">
                            <p>"{$immobile0->getPrezzo()}"</p>
                        </div>
                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                        <h5>"{$immobile0->getNome()}"</h5>
                        <p class="location"><img src="{$path}Smarty/img/icons/location.png" alt="">"{$immobile0->getIndirizzo()}"</p>
                        <p>"{$miniDescr0}"</p>
                        <div class="property-meta-data d-flex align-items-end justify-content-between">
                            <div class="new-tag">
                                <img src="{$path}Smarty/img/icons/new.png" alt="">
                            </div>
                            <div class="space">
                                <img src="{$path}Smarty/img/icons/space.png" alt="">
                                <span>{$immobile0->getGrandezza()}</span>
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
                        <img src={$immobile1->getImmagini()[0]->getData()} alt="">

                        <div class="tag">
                            <span>"{$immobile1->getTipoAnnuncio()}"</span>
                        </div>
                        <div class="list-price">
                            <p>"{$immobile1->getPrezzo()}"</p>
                        </div>
                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                        <h5>"{$immobile1->getNome() }"</h5>
                        <p class="location"><img src="{$path}Smarty/img/icons/location.png" alt=""</p>
                        <p>"{{$miniDescr1}}"</p>
                        <div class="property-meta-data d-flex align-items-end justify-content-between">
                            <div class="new-tag">
                                <img src="{$path}Smarty/img/icons/new.png" alt="">
                            </div>
                            <div class="space">
                                <img src="{$path}Smarty/img/icons/space.png" alt=""">
                                <span>{$immobile1->getGrandezza()}</span>
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
                        <img src={$immobile2->getImmagini()[0]->getData()} alt="">

                        <div class="tag">
                            <span>"{$immobile2->getTipoAnnuncio()}"</span>
                        </div>
                        <div class="list-price">
                            <p>"{$immobile2->getPrezzo()}"</p>
                        </div>
                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                        <h5>"{$immobile2->getNome() }"</h5>
                        <p class="location"><img src="{$path}Smarty/img/icons/location.png" alt="">{$immobile2->getIndirizzo()}</p>
                        <p>{$miniDescr2}</p>
                        <div class="property-meta-data d-flex align-items-end justify-content-between">
                            <div class="new-tag">
                                <img src="{$path}Smarty/img/icons/new.png" alt="">
                            </div>
                            </div>
                            <div class="space">
                                <img src="{$path}Smarty/img/icons/space.png" alt="">
                                <span>{$immobile1->getGrandezza()}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
<!-- ##### Featured Properties Area End ##### -->

<!-- ##### Call To Action Area Start ##### -->
<section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(img/bg-img/cta.jpg)">
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
            <img src="img/icons/prize.png" alt="">
            <h2>Admin Istrator</h2>
            <p>Amministratore</p>
        </div>
        <p class="wow fadeInUp" data-wow-delay="500ms">Admin Istrator è un dirigente d'azienda italiano con cittadinanza statunitense. Da sempre appassionato di immobili e barbe, è diventato il nuovo amministratore di Immobile17 nell'aprile 2020. Comincia i primi passi nell'azienda assumendo la carica di agente immobiliare nel reparto I17 research.</p>
        <div class="address wow fadeInUp" data-wow-delay="750ms">
            <h6><img src="img/icons/phone-call.png" alt=""> +39 0862 433812</h6>
            <h6><img src="img/icons/envelope.png" alt=""> admin@admin.it</h6>
        </div>
        <div class="signature mt-50 wow fadeInUp" data-wow-delay="1000ms">
            <img src="img/core-img/signature.png" alt="">
        </div>
    </div>

    <!-- Editor Thumbnail -->
    <div class="editor-thumbnail">
        <img src="img/bg-img/editor.jpg" alt="">
    </div>
</section>
<!-- ##### Editor Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<footer class="footer-area section-padding-100-0 bg-img gradient-background-overlay" style="background-image: url(img/bg-img/cta.jpg);">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-6">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>About Us</h6>
                        </div>

                        <img src="img/bg-img/footer.jpg" alt="">
                        <div class="footer-logo my-4">
                            <img src="img/core-img/logo.png" alt="">
                        </div>
                        <p>Giovanni Nicola Della Pelle<br>
                        </p>
                        <p>Marco Di Domenica</p>
                        <p>Gabriele Foderà</p>
                        <p>&nbsp;</p>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-6">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>Orari</h6>
                        </div>
                        <!-- Office Hours -->
                        <div class="weekly-office-hours">
                            <ul>
                                <li class="d-flex align-items-center justify-content-between"><span>Lunedì - Venerdì</span> <span>08:00 - 20:00</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Sabato</span> <span>Chiuso</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Domenica</span> <span>Chiuso</span></li>
                            </ul>
                        </div>
                        <!-- Address -->
                        <div class="address">
                            <h6><img src="img/icons/phone-call.png" alt=""> +39 0862 433812</h6>
                            <h6><img src="img/icons/envelope.png" alt=""> admin@admin.it</h6>
                            <h6><img src="img/icons/location.png" alt=""> L'Aquila(AQ), 67100, Via Enrico De Nicola 17&nbsp; &nbsp;</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copywrite Text -->
    <div class="copywrite-text d-flex align-items-center justify-content-center">
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    </div>
</footer>
<!-- ##### Footer Area End ##### -->

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

</body>

</html>