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

    <title>Calendario Personale</title>

    <script>


        document.addEventListener('DOMContentLoaded', function() {

            var calendarEl = document.getElementById('calendar');

            // INITIALDATE
            var dd = String({$today->getGiorno()}).padStart(2,'0');
            var mm = String({$today->getMese()}).padStart(2,'0');
            var aaaa = String({$today->getAnno()});

            // LOGO
            var logo = new Image();
            logo.src="{$path}Smarty/img/core-img/logo_1.png";

            //EVENTS


            var calendar = new FullCalendar.Calendar(calendarEl, {

                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'

                },
                initialDate: aaaa+'-'+mm+'-'+dd,
                initialView: 'timeGridWeek',
                navLinks: true, // can click day/week names to navigate views
                businessHours: false, // display business hours
                editable: false,
                selectable: false,
                themeSystem: 'bootstrap',
                slotMinTime: '07:00:00',
                slotMaxTime: '22:00:00',
                contentHeight: 715,

                events: [
                    {foreach $appuntamenti as $app}
                    {

                        start: '{$app->getOrarioInizio()->getFullDataString()}',
                        end: '{$app->getOrarioFine()->getFullDataString()}',
                        color: '#ff8000',
                        url: '{$path}'+'/Utente/visualizzaAppuntamento/'+'{$app->getId()}'
                    },
                    {/foreach}
                    {
                        title: 'Oggi',
                        start: '{$today->getFullDataString()}',
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