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
                        icon: 'left-single-arrow',
                        click: function() {
                            var url = '{$path}'+'Immobile/calendario/id/'+'{$immobile->getId()}'
                                +'/inizio/'+'{$prevInizio->getDateString()}'
                                +'/fine/'+'{$prevFine->getDateString()}';
                            window.location.href=url;
                        }
                    },
                    nextCustomButton: {
                        icon: 'right-single-arrow',
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
                    },
                    logoCustomButton: {
                        icon: logo,
                        click: function() {
                            window.location.href='{$path}';
                        }
                    }

                },

                headerToolbar: {
                    left: 'prevCustomButton,nextCustomButton todayCustomButton',
                    center: 'title',
                    right: 'logo'
                },
                initialDate: aaaa+'-'+mm+'-'+dd,
                initialView: 'timeGridWeek',
                navLinks: false, // can click day/week names to navigate views
                businessHours: false, // display business hours
                editable: false,
                selectable: false,

                events: [

                    {
                        title: 'PROVAPROVAPROVA',
                        start: {$appLiberi[0]->getOrarioInizio()->getFullDataString()},
                        end: {$appLiberi[0]->getOrarioFine()->getFullDataString()},
                        color: '#ea12ac'
                    },
                    {
                        title: 'Festivo',
                        start: '{$inizio->getfullDataString()}',
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

{if ($error=="Appuntamento non disponibile")}
    <div class="sign__group">
        <span class="sign__text" style="color: #ff0000">Appuntamento non disponibile</span>
    </div>
{/if}

<div id='calendar'></div>

</body>
</html>