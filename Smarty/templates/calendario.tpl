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

            var dd = String({$inizio->getGiorno()}).padStart(2,'0');
            var mm = String({$inizio->getMese()}).padStart(2,'0');
            var aaaa = String({$inizio->getAnno()});
            var logo = new Image();
            logo.src="{$path}Smarty/img/core-img/logo_1.png";
            logo.onclick=function () {
                window.location.href="{$path}";
            };

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
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