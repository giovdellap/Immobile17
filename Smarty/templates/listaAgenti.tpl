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
            <div class="card-header">
                <h3 class="card-title">Agenti Immobiliari</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            Foto
                        </th>
                        <th style="width: 1%">
                            ID
                        </th>
                        <th style="width: 15%">
                            Nome
                        </th>
                        <th style="width: 15%">
                            Email
                        </th>
                        <th style="width: 15%">
                            Data di nascita
                        </th>
                        <th style="width: 15%" class="text-center">
                            Data di iscrizione
                        </th>

                        <th style="width: 5%" class="text-center">
                            Verificato
                        </th>

                        <th style="width: 40%" class="text-center">
                        </th>

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
                        <td>
                            {$agente->getId()}
                        </td>
                        <td>
                            <a>
                                {$agente->getNome()} {$agente->getCognome()}
                            </a>

                        </td>
                        <td>
                            <a>{$agente->getEmail()}</a>
                        </td>
                        <td >
                            <a>
                                {$agente->getDataNascita()->getDateString()}
                            </a>
                        </td>

                        <td >
                            <a>{$agente->getIscrizione()->getDateString()}</a>
                        </td>

                        <td class="project-state">
                            {if $agente->isAttivato()}
                                <span class="badge badge-success">Attivo</span>
                            {else} <span class="badge badge-danger">Non Attivo</span>
                            {/if}
                        </td>



                        <td class="project-actions text-right">
                            <a class="project-state" href="{$path}Admin/modificaAgente/id/{$agente->getId()}">
                                {if $agente->isAttivato()}
                                    <button class="btn btn-primary btn-sm" onclick="disattiva({$agente->getId()})">
                                        <i class="fas fa-folder" >

                                        </i>
                                        Disattiva
                                    </button>
                                {else}
                                    <button class="btn btn-primary btn-sm" onclick="attiva({$agente->getId()})">
                                        <i class="fas fa-folder" >
                                        </i>
                                        Attiva
                                    </button>
                                {/if}

                                <button class="btn btn-primary btn-sm" onclick="modifica({$agente->getId()})">
                                    <i class="fas fa-trash">
                                    </i>
                                    Modifica
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="elimina({$agente->getId()})">
                                    <i class="fas fa-trash">
                                    </i>
                                    Elimina
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
        form.setAttribute('action', '/AgenziaImmobiliare/Admin/attivazioneUtente');

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
    function modifica(idParam)
    {

        var form = document.createElement('form');
        form.setAttribute('method', 'post');
        form.setAttribute('action', '/AgenziaImmobiliare/Admin/modificaUtente');

        const id = document.createElement('input');
        id.type = 'hidden';
        id.name = 'id';
        id.value = idParam;
        form.appendChild(id);


        document.body.appendChild(form);
        form.submit();

    }

</script>

<script>
    function elimina(idParam)
    {

        var form = document.createElement('form');
        form.setAttribute('method', 'post');
        form.setAttribute('action', '/AgenziaImmobiliare/Admin/eliminaUtente');

        const id = document.createElement('input');
        id.type = 'hidden';
        id.name = 'id';
        id.value = idParam;
        form.appendChild(id);


        document.body.appendChild(form);
        form.submit();

    }

</script>