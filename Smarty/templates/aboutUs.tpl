<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>About us</title>

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
            <div class="col-12 col-lg-6">
                <div class="section-heading text-left wow fadeInUp" data-wow-delay="250ms">
                    <h2>Selezioniamo le case perfette per te</h2>
                    <p>Suspendisse dictum enim sit amet libero</p>
                </div>
                <div class="about-content">
                    <img class="wow fadeInUp" data-wow-delay="350ms" src="{$path}Smarty/img/bg-img/about.jpg" alt="">
                    <p class="wow fadeInUp" data-wow-delay="450ms">L'agenzia Immobile17 nasce dal desiderio di valorizzare al massimo l'esperienza maturata nel settore dal 1999.
                        L'utilizzo del proprio nome nel marchio vuol essere sinonimo di massima serietà, trasparenza e correttezza, VALORI CONCRETI sui quali è fondata la nostra piccola ma efficiente struttura.
                        Un'attività giovane e contemporanea che opera selezionando minuziosamente le migliori opportunità immobiliari, sia in vendita che in locazione. Ogni immobile che scegliamo di trattare è altamente qualificato, completo di documentazione e preparato alla vendita.
                        Rivolgersi alla nostra Agenzia Immobiliare significa affidarsi a giovani e dinamici professionisti, regolarmente iscritti alla Camera di Commercio e alla Fiaip (Federazione Italiana Agenti Immobiliari Professionali) costantemente aggiornati mediante corsi di alta formazione professionale, pronti ad ascoltarvi attentamente al fine di risolvere ogni tipo di esigenza legata all'abitare.
                        <br>
                    </p>
                    <p class="wow fadeInUp" data-wow-delay="450ms">Siamo in grado di offrire un'assistenza precisa e puntuale sin dal primo incontro. Tutto su misura e personalizzato come un abito sartoriale, tutto seguito direttamente da noi in prima persona: dalla valutazione dell'immobile al piano marketing dedicato, dalle visite coi clienti ai feed-back programmati, dalle trattative sino alla stipula dell'atto definitivo.
                        La nostra figura è quella dell'AGENTE IMMOBILIARE PROFESSIONISTA e l'attenzione è principalmente rivolta, prima ancora che all'immobile, alla Persona ed alle sue esigenze: in questo modo gli interessi del Cliente sono sempre preminenti.
                        Condividiamo ogni passaggio della compravendita con i nostri Clienti, in piena armonia e con la massima condivisione: la finalità è quella di raggiungere gli obiettivi prefissati con determinazione, spiccato dinamismo ed entusiasmo, mantenendo sempre un approccio diretto ed un'attenzione costante. Il rapporto confidenziale che si stabilisce è fondamentale per affrontare con serenità il delicato percorso di compravendita.
                        Crediamo fortemente nei rapporti etici, nel rispetto reciproco e nella collaborazione qualificata: ogni tipo di contatto per noi è prezioso e diventa un'importante opportunità di crescita.
                        Il costante sviluppo personale e professionale, i successi conseguiti nel tempo e la soddisfazione dei Clienti, hanno contribuito a far diventare oggi la nostra Azienda un rilevante punto di riferimento per chi necessita di un servizio efficiente e meticoloso, con professionalità e riservatezza.
                        Ricerchiamo da sempre l'eccellenza nelle CASE, nella qualità delle RELAZIONI e nel modo di ABITARE.
                    </p>


                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="section-heading text-left wow fadeInUp" data-wow-delay="250ms">
                    <h2>Immobili in vista</h2>
                    <p>Suspendisse dictum enim sit amet libero</p>
                </div>

                <div class="featured-properties-slides owl-carousel wow fadeInUp" data-wow-delay="350ms">

                    <!-- Single Slide -->
                    <div class="single-featured-property">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="{$path}Immobile/visualizza/{$immobile0->getId()}"><img src="{$imgTop1[0]->viewImageHTML()}"></a>

                            <div class="tag">
                                <span>{$immobile0->getTipoAnnuncio()}</span>
                            </div>
                            <div class="list-price">
                                <p>{$immobile0->getPrezzo()}</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>{$immobile0->getNome()}</h5>
                            <p class="location"><img src="{$path}Smarty/img/icons/location.png" alt="">{$immobile0->getIndirizzo()}</p>
                            <p>{$immobile0->getDescrizioneBreve()}</p>
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

                    <!-- Single Slide -->
                    <div class="single-featured-property">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="{$path}Immobile/visualizza/{$immobile1->getId()}"><img src="{$imgTop2[0]->viewImageHTML()}"></a>

                            <div class="tag">
                                <span>{$immobile1->getTipoAnnuncio()}</span>
                            </div>
                            <div class="list-price">
                                <p>{$immobile1->getPrezzo()}</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>{$immobile1->getNome()}</h5>
                            <p class="location"><img src="{$path}Smarty/img/icons/location.png" alt="">{$immobile1->getIndirizzo()}</p>
                            <p>{$immobile1->getDescrizioneBreve()}</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="{$path}Smarty/img/icons/new.png" alt="">
                                </div>

                                <div class="space">
                                    <img src="{$path}Smarty/img/icons/space.png" alt="">
                                    <span>{$immobile1->getGrandezza()}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Single Slide -->
                    <div class="single-featured-property">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="{$path}Immobile/visualizza/{$immobile2->getId()}"><img src="{$imgTop3[0]->viewImageHTML()}"></a>

                            <div class="tag">
                                <span>{$immobile2->getTipoAnnuncio()}</span>
                            </div>
                            <div class="list-price">
                                <p>{$immobile2->getPrezzo()}</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>{$immobile2->getNome()}</h5>
                            <p class="location"><img src="{$path}Smarty/img/icons/location.png" alt="">{$immobile2->getIndirizzo()}</p>
                            <p>{$immobile2->getDescrizioneBreve()}</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="{$path}Smarty/img/icons/new.png" alt="">
                                </div>

                                <div class="space">
                                    <img src="{$path}Smarty/img/icons/space.png" alt="">
                                    <span>{$immobile2->getGrandezza()}</span>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
</section>
<!-- ##### About Content Wrapper End ##### -->

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
                            <h2>Admin Istrator</h2>
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