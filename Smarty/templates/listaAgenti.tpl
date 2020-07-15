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

        <!-- Default box -->
        <div class="card">
            <div class="card-header"> <h3 class="card-title">Agenti Immobiliari</h3> </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%"> Foto </th>
                        <th style="width: 1%"> ID </th>
                        <th style="width: 15%"> Nome </th>
                        <th style="width: 15%"> Email </th>
                        <th style="width: 15%"> Data di nascita </th>
                        <th style="width: 15%"> Data di iscrizione </th>
                        <th style="width: 3%"> Stato </th>
                        <th style="width: 35%"> </th>
                    </tr>
                    </thead>
                    <tbody>

                    {foreach $agenti as $agente}
                    <tr>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    {if isset($agente->getImmagine())}
                                        <img  class="table-avatar" src="{$agente->getImmagine()->viewImageHTML()}">
                                    {else}  <img class="table-avatar" src="{$path}Smarty/img/icons/avatar.png">
                                    {/if}
                                </li>
                            </ul>
                        </td>
                        <td> {$agente->getId()} </td>
                        <td> {$agente->getNome()} {$agente->getCognome()} </td>
                        <td> {$agente->getEmail()} </td>
                        <td> {$agente->getDataNascita()->getDateFormat()} </td>
                        <td> {$agente->getIscrizione()->getDateFormat()} </td>
                        <td class="project-state">
                            {if $agente->isAttivato()}
                                <span class="badge badge-success">Attivo</span>
                            {else}
                                <span class="badge badge-danger">Non Attivo</span>
                            {/if}
                        </td>

                        <td class="project-actions text-right">
                                {if $agente->isAttivato()}
                                    <button class="btn btn-dark btn-xs"
                                            onclick="disattiva('{$agente->getId()}')">
                                        <i class="fas fa-ban" title="Disattiva"> </i>
                                    </button>
                                {else}
                                    <button class="btn btn-dark btn-xs"
                                            onclick="attiva('{$agente->getId()}')">
                                        <i class="fas fa-smile" title="Attiva" > </i>
                                    </button>
                                {/if}
                            <a href="{$path}Admin/modificaUtente/{$agente->getId()}">
                                <button class="btn btn-primary btn-xs">
                                    <i class="fas fa-pen" title="Modifica"> </i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    {/foreach}

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    function attiva(idParam)

    {
        var form = document.createElement('form');
        form.setAttribute('method', 'post');
        form.setAttribute('action', '{$path}'+'Admin/attivazioneUtente');

        const id = document.createElement('input');
        id.type = 'hidden';
        id.name = 'id';
        id.value = idParam;
        form.appendChild(id);

        const attiva = document.createElement('input');
        attiva.type = 'hidden';
        attiva.name = 'attiva';
        attiva.value = 'true';
        form.appendChild(attiva);

        document.body.appendChild(form);
        form.submit();

    }
</script>
<script>
    function disattiva(idParam)
    {

        var form = document.createElement('form');
        form.setAttribute('method', 'post');
        form.setAttribute('action', '{$path}'+'Admin/attivazioneUtente');

        const id = document.createElement('input');
        id.type = 'hidden';
        id.name = 'id';
        id.value = idParam;
        form.appendChild(id);

        const attiva = document.createElement('input');
        attiva.type = 'hidden';
        attiva.name = 'attiva';
        attiva.value = 'false';
        form.appendChild(attiva);

        document.body.appendChild(form);
        form.submit();

    }

</script>


<script>
    function elimina(idParam)
    {

        var form = document.createElement('form');
        form.setAttribute('method', 'post');
        form.setAttribute('action', '{$path}'+'Admin/eliminaUtente');

        const id = document.createElement('input');
        id.type = 'hidden';
        id.name = 'id';
        id.value = idParam;
        form.appendChild(id);


        document.body.appendChild(form);
        form.submit();

    }

</script>