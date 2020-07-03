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


                    document.body.appendChild(form);
                    form.submit();
                },

                events: [
                    {foreach $appLiberi as $app}
                    {
                        id: '{$app->getCliente()->getId()}'+'/'+
                                '{$app->getImmobile()->getId()}'+'/'+
                                '{$app->getAgenteImmobiliare()->getId()}',
                        title: 'app',
                        start: '{$app->getOrarioInizio()->getFullDataString()}',
                        end: '{$app->getOrarioFine()->getFullDataString()}',
                        color: '#ff0523'
                    },
                    {/foreach}
                    {
                        title: 'Festivo',
                        start: '{$inizio->getFullDataString()}',
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