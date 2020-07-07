<!DOCTYPE html>
<html lang="it">
<head>

    <!-- Style CSS for header -->
    <link rel="stylesheet" href="{$path}Smarty/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Style CSS for calendar -->
    <meta charset='utf-8' />
    <link href='{$path}Smarty/others/calendario/lib/main.css' rel='stylesheet' />
    <link href='{$path}Smarty/others/calendario/lib/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <script src='{$path}Smarty/others/calendario/lib/main.js'></script>
    <link rel="icon" type="image/ico" href="{$path}Smarty/img/icons/favicon_1.ico"/>

    <title>Prenotazione</title>






    <script>



        document.addEventListener('DOMContentLoaded', function() {

            var calendarEl = document.getElementById('calendar');

            // INITIALDATE
            var dd = String({$inizio->getGiorno()}).padStart(2,'0');
            var mm = String({$inizio->getMese()}).padStart(2,'0');
            var aaaa = String({$inizio->getAnno()});

            // LOGO
            var logo = new Image();
            logo.src="{$path}Smarty/img/core-img/logo_1.png";

            //EVENTS


            var calendar = new FullCalendar.Calendar(calendarEl, {

                customButtons: {
                    prevCustomButton: {
                        text: "<",
                        click: function() {
                            var url = '{$path}'+'Immobile/calendario/id/'+'{$immobile->getId()}'
                                +'/inizio/'+'{$prevInizio->getDateString()}'
                                +'/fine/'+'{$prevFine->getDateString()}';
                            window.location.href=url;
                        }
                    },
                    nextCustomButton: {
                        text: ">",
                        click: function() {
                            var url = '{$path}'+'Immobile/calendario/id/'+'{$immobile->getId()}'
                                +'/inizio/'+'{$nextInizio->getDateString()}'
                                +'/fine/'+'{$nextFine->getDateString()}';
                            window.location.href=url;
                        }
                    },todayCustomButton: {
                        text: 'Oggi',
                        click: function() {
                            var url = '{$path}'+'Immobile/calendario/id/'+'{$immobile->getId()}';
                            window.location.href=url;
                        }
                    }
                },

                headerToolbar: {
                    left: 'prevCustomButton,nextCustomButton',
                    center: 'title',
                    right: 'todayCustomButton'
                },
                initialDate: aaaa+'-'+mm+'-'+dd,
                initialView: 'timeGridWeek',
                navLinks: false, // can click day/week names to navigate views
                businessHours: false, // display business hours
                editable: false,
                selectable: false,
                themeSystem: 'bootstrap',
                slotMinTime: '07:00:00',
                slotMaxTime: '22:00:00',
                contentHeight: 715,


                eventClick: function(info)
                {
                    var id = info.event.id;
                    var parameters = id.split("/");

                    var form = document.createElement('form');
                    form.setAttribute('method', 'post');
                    form.setAttribute('action', '{$path}'+'Immobile/prenota');

                    const idCl = document.createElement('input');
                    idCl.type = 'hidden';
                    idCl.name = 'idCl';
                    idCl.value = parameters[0];
                    form.appendChild(idCl);

                    const idIm = document.createElement('input');
                    idIm.type = 'hidden';
                    idIm.name = 'idIm';
                    idIm.value = parameters[1];
                    form.appendChild(idIm);

                    const idAg = document.createElement('input');
                    idAg.type = 'hidden';
                    idAg.name = 'idAg';
                    idAg.value = parameters[2];
                    form.appendChild(idAg);

                    const inizio = document.createElement('input');
                    inizio.type = 'hidden';
                    inizio.name = 'inizio';
                    inizio.value = info.event.start;
                    form.appendChild(inizio);

                    const fine = document.createElement('input');
                    fine.type = 'hidden';
                    fine.name = 'fine';
                    fine.value = info.event.end;
                    form.appendChild(fine);

                    const agInizio = document.createElement('input');
                    agInizio.type = 'hidden';
                    agInizio.name = 'agInizio';
                    agInizio.value = '{$inizio->getDateString()}';
                    form.appendChild(agInizio);

                    const agFine = document.createElement('input');
                    agFine.type = 'hidden';
                    agFine.name = 'agFine';
                    agFine.value = '{$fine->getDateString()}';
                    form.appendChild(agFine);

                    document.body.appendChild(form);
                    form.submit();
                },

                events: [
                    {foreach $appLiberi as $app}
                    {
                        id: '{$app->getCliente()->getId()}'+'/'+
                                '{$app->getImmobile()->getId()}'+'/'+
                                '{$app->getAgenteImmobiliare()->getId()}',
                        start: '{$app->getOrarioInizio()->getFullDataString()}',
                        end: '{$app->getOrarioFine()->getFullDataString()}',
                        color: '#ff8000',

                    },
                    {/foreach}
                    {
                        title: 'Festivo',
                        start: '{$inizio->getFullDataString()}',
                        allDay: true,
                        color: 'white'
                    }
                ]
            });

            calendar.setOption('locale', "it");

            calendar.render();

        });

    </script>
    <style>

        body {
            /*margin: 40px 10px;*/
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
                    }


    </style>
</head>
<body>
{include file="header.tpl"}
<section class="breadcumb-area bg-img" style="background-image: url({$path}Smarty/img/bg-img/calendar.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">PRENOTAZIONE</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<div>
    <p> <br> </p>
    <p> <br> </p>
</div>
{if ($error=="Appuntamento non disponibile")}

    <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
        <span class="txt1 p-b-11" style="color: greenyellow">Appuntamento non disponibile!</span>
    </div>
{/if}

<div id='calendar'></div>

{include file="footer.tpl"}

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