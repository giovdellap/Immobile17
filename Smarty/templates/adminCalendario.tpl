<script src='{$path}Smarty/others/calendario/lib/main.js'></script>


<script>



    document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {


            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'

            },
            initialDate: '{MData::getToday()->getDateString()}',
            initialView: 'timeGridWeek',
            navLinks: false, // can click day/week names to navigate views
            businessHours: false, // display business hours
            editable: false,
            selectable: false,
            //themeSystem: 'bootstrap',
            slotMinTime: '07:00:00',
            slotMaxTime: '22:00:00',
            contentHeight: 715,


            eventClick: function(info)
            {
                var id = info.event.id;
                var parameters = id.split("/");
                var url = '{$path}'+'Admin/aggiuntaAppuntamento';

                var form = document.createElement('form');
                form.setAttribute('method', 'post');
                form.setAttribute('action', url);

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
                    start: '{$app->getOrarioInizio()->getFullDataString()}',
                    end: '{$app->getOrarioFine()->getFullDataString()}',
                    color: '#ff8000',

                },
                {/foreach}
                {
                    title: 'Oggi',
                    start: '{MData::getToday()->getFullDataString()}',
                    allDay: true,
                    color: 'white'
                }
            ]
        });

        calendar.setOption('locale', "it");

        calendar.render();

    });

</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div id="calendar";></div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->