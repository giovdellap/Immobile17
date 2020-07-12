

<meta charset='utf-8' />
<link href='{$path}Smarty/others/calendario/lib/main.css' rel='stylesheet' />
<link href='{$path}Smarty/others/calendario/lib/bootstrap.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
<script src='{$path}Smarty/others/calendario/lib/main.js'></script>
<link rel="icon" type="image/ico" href="{$path}Smarty/img/icons/favicon_1.ico"/>


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
                    color: 'darkgrey',

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
