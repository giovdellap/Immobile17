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
            logo.onclick=function () {
                window.location.href="{$path}";
            };

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
                editable: true,
                selectable: true,
                events: [
                    {
                        title: 'Business Lunch',
                        start: '2020-06-03T13:00:00',
                        constraint: 'businessHours'
                    },
                    {
                        title: 'Meeting',
                        start: '2020-06-13T11:00:00',
                        constraint: 'availableForMeeting', // defined below
                        color: '#257e4a'
                    },
                    {
                        title: 'Conference',
                        start: '2020-06-18',
                        end: '2020-06-20'
                    },
                    {
                        title: 'Party',
                        start: '2020-06-29T20:00:00'
                    },

                    // areas where "Meeting" must be dropped
                    {
                        groupId: 'availableForMeeting',
                        start: '2020-06-11T10:00:00',
                        end: '2020-06-11T16:00:00',
                        display: 'background'
                    },
                    {
                        groupId: 'availableForMeeting',
                        start: '2020-06-13T10:00:00',
                        end: '2020-06-13T16:00:00',
                        display: 'background'
                    },

                    // red areas where no events can be dropped
                    {
                        start: '2020-06-24',
                        end: '2020-06-28',
                        overlap: false,
                        display: 'background',
                        color: '#ff9f89'
                    },
                    {
                        start: '2020-06-06',
                        end: '2020-06-08',
                        overlap: false,
                        display: 'background',
                        color: '#ff9f89'
                    }
                ]
            });

            calendar.setOption('locale', "it");

            calendar.render();

            $('.fc-button-prev span').click(function(){
                var baseURL = {$path}+'Immobile/calendario/id/'+{$immobile->getId()};
                var inizioURL = '/ai/'+String({$prevInizio->getAnno()})
                    +'/mi/'+String({$prevInizio->getMese()})+'/gi/'+String({$prevInizio->getGiorno()});
                var fineURL = '/af/'+String({$prevFine->getAnno()})
                    +'/mf/'+String({$prevFine->getMese()})+'/gf/'+String({$prevFine->getGiorno()});
                window.location.href=baseURL+inizioURL+fineURL;
            });
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