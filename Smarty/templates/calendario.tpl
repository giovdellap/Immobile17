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
                                +'/inizio/'+'{MData::getDateString($prevInizio)}'
                                +'/fine/'+'{MData::getDateString($prevFine)}';
                            window.location.href=url;
                        }
                    },
                    nextCustomButton: {
                        icon: 'right-single-arrow',
                        click: function() {
                            var url = '{$path}'+'Immobile/calendario/id/'+'{$immobile->getId()}'
                                +'/inizio/'+'{MData::getDateString($nextInizio)}'
                                +'/fine/'+'{MData::getDateString($nextFine)}';
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
                businessHours: true, // display business hours
                editable: false,
                selectable: false,

                events: [
                    {foreach $appLiberi as $app}
                    {
                        title: 'selezionabile',
                        start: '{$app->getOrarioInizio()->getFullDataString()}',
                        end: '{$app->getOrarioFine()->getFullDataString()}',
                        color: '#faf3dc'

                    },
                    {/foreach}


                    // red areas where no events can be dropped


                    {
                        title: 'festivo',
                        start: '{MData::getDateString($inizio)}'+'T00:00:00',
                        end: '{MData::getDateString($inizio)}'+'T23:59:00',
                        display: 'background',
                        color: '#111111'
                    },
                    {
                        title: 'festivo',
                        start: '{MData::getDateString($fine)}'+'T00:00:00',
                        end: '{MData::getDateString($fine)}'+'T23:59:00',
                        display: 'background',
                        color: '#111111'
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