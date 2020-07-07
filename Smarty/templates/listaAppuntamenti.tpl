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
                <h3 class="card-title">Appuntamenti</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <th style="width: 1%"> ID </th>
                        <th style="width: 10%"> Data </th>
                        <th style="width: 10%"> Orario </th>
                        <th style="width: 15%"> Cliente </th>
                        <th style="width: 20%"> Agente Immobiliare </th>
                        <th style="width: 15%"> Immobile </th>
                        <th style="width: 29%"> </th>

                    </tr>
                    </thead>
                    <tbody>
                    {foreach $appuntamenti as $appuntamento}
                    <tr>

                        <td> {$appuntamento->getId()} </td>
                        <td> <a>{$appuntamento->getOrarioInizio()->getDateFormat()}</a> </td>
                        <td> <a>{$appuntamento->getOrarioInizio()->getOrario()}/{$appuntamento->getOrarioFine()->getOrario()}</a> </td>
                        <td > <a>{$appuntamento->getCliente()->getFullName()}<br></a>
                            <small>{$appuntamento->getCliente()->getId()}</small>
                        </td>
                        <td > <a>{$appuntamento->getAgenteImmobiliare()->getFullName()}<br> </a>
                            <small>{$appuntamento->getCliente()->getId()}</small>
                        </td>
                        <td > <a>{$appuntamento->getImmobile()->getNome()}<br></a>
                            <small>{$appuntamento->getImmobile()->getId()}</small>
                        </td>

                        <td>


                            </a>
                            <a class="btn btn-danger btn-xs" href="#">
                                <i class="fas fa-trash">
                                </i>

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