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
                <h3 class="card-title">Clienti</h3>
            </div>
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
                        <th style="width: 5%"> Stato </th>
                        <th style="width: 29%"> </th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach $clienti as $cliente}
                    <tr>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    {if isset($cliente->getImmagine())}
                                        <img  class="table-avatar" src="{$cliente->getImmagine()->viewImageHTML()}">
                                    {else}
                                        <img class="table-avatar" src="{$path}Smarty/img/icons/avatar.png">
                                    {/if}
                                </li>
                            </ul>
                        </td>
                        <td> {$cliente->getId()} </td>
                        <td> {$cliente->getNome()} {$cliente->getCognome()} </td>
                        <td> {$cliente->getEmail()} </td>
                        <td>{$cliente->getDataNascita()->getDateString()} </td>
                        <td> {$cliente->getIscrizione()->getDateString()} </td>
                        <td class="project-state">
                            {if $cliente->isAttivato()}
                                <span class="badge badge-success">Attivo</span>
                            {else}
                                <span class="badge badge-danger">Non Attivo</span>
                            {/if}
                        <td class="project-actions text-right">

                            {if $cliente->isAttivato()}
                                <button class="btn btn-primary btn-sm" onclick="disattiva('{$cliente->getId()}')">
                                    <i class="fas fa-folder" >Disattiva</i>
                                </button>

                            {else}
                                <button class="btn btn-primary btn-sm" onclick="attiva('{$cliente->getId()}')">
                                    <i class="fas fa-folder" >Attiva</i>
                                </button>
                            {/if}
                            <a href="{$path}Admin/modificaUtente/{$cliente->getId()}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-trash">Modifica</i>
                                </button>
                            </a>
                            <button class="btn btn-danger btn-sm" onclick="elimina('{$cliente->getId()}')">
                                <i class="fas fa-trash">Elimina</i>
                            </button>
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
        form.setAttribute('action', '{$path}'+'Admin/eliminaCliente');

        const id = document.createElement('input');
        id.type = 'hidden';
        id.name = 'id';
        id.value = idParam;
        form.appendChild(id);


        document.body.appendChild(form);
        form.submit();

    }

</script>