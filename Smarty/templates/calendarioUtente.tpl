<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset='utf-8' />
    <link href='{$path}Smarty/others/calendario/lib/main.css' rel='stylesheet' />
    <script src='{$path}Smarty/others/calendario/lib/main.js'></script>
    <link rel="icon" type="image/png" href="{$path}Smarty/img/icons/favicon_1.ico"/>

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
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                initialDate: aaaa+'-'+mm+'-'+dd,
                initialView: 'timeGridWeek',
                navLinks: true, // can click day/week names to navigate views
                businessHours: false, // display business hours
                editable: false,
                selectable: false,

                events: [
                    {foreach $appuntamenti as $app}
                    {

                        start: '{$app->getOrarioInizio()->getFullDataString()}',
                        end: '{$app->getOrarioFine()->getFullDataString()}',
                        color: '#ff0523'
                        url: '{$path}'+'/Utente/visualizzaAppuntamento/'+'{$app->getId()}'
                    },
                    {/foreach}
                    {
                        title: 'Oggi',
                        start: '{$today->getFullDataString()}',
                        allDay: true,
                        color: '#257e4a'
                    }
                ]
            });

            calendar.setOption('locale', "it");

            calendar.render();

        });

    </script>
    <style>

        body {
            margin: 40px 10px;
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

<div id='calendar'></div>

</body>
</html>