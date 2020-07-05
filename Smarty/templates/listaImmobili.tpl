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
                <h3 class="card-title">Immobili</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%"> Foto </th>
                        <th style="width: 1%"> ID </th>
                        <th style="width: 15%"> Nome </th>
                        <th style="width: 15%"> Città </th>
                        <th style="width: 15%"> Indirizzo </th>
                        <th style="width: 15%"> Tipologia </th>
                        <th style="width: 15%"> Dimensione </th>
                        <th style="width: 15%"> Vendita/Affitto </th>
                        <th style="width: 15%"> Prezzo </th>
                        <th style="width: 5%"> Stato </th>
                        <th style="width: 40%"> </th>

                    </tr>
                    </thead>
                    <tbody>
                    {foreach $immobili as $immobile}
                    <tr>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Immobile" class="table-avatar" src="{$immobile->getPresentationImg()}">
                                </li>
                            </ul>
                        </td>
                        <td> {$immobile->getId()} </td>
                        <td> <a>{$immobile->getNome()}</a> </td>
                        <td> <a>{$immobile->getComune()}</a> </td>
                        <td > <a>{$immobile->getIndirizzo()}</a> </td>
                        <td > <a>{$immobile->getTipologia()}</a> </td>
                        <td > <a>{$immobile->getGrandezza()} mq</a> </td>
                        <td ><a>{$immobile->getTipoAnnuncio()}</a></td>
                        <td > <a>€ {$immobile->getPrezzo()}</a> </td>

                        <td class="project-state">
                            {if $immobile->isAttivo()}
                                <span class="badge badge-success">Attivo</span>
                            {else}
                                <span class="badge badge-danger">Non Attivo</span>
                            {/if}
                        </td>

                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{$path}Admin/modificaImmobile/id/{$immobile->getId()}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Modifica
                            </a>
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                Attiva/Disattiva
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Cancella
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