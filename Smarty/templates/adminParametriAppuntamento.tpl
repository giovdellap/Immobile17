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
                <h3 class="card-title">Appuntamento</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 45%"> Cliente </th>
                        <th style="width: 45%"> Immobile </th>
                        <th style="width: 10%"> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class ="form-group">
                                <label>Cliente</label>
                                <select class="form-control">
                                    {foreach $clienti as $cliente}
                                        {$cliente->getNome()} - {$cliente->getId()}
                                    {/foreach}
                                </select>
                            </div>
                        </td>

                        <td>
                            <div class ="form-group">
                                <label>Cliente</label>
                                <select class="form-control">
                                    {foreach $immobili as $immobile}
                                        {$immobile->getNome()} - {$immobile->getId()}
                                    {/foreach}
                                </select>
                            </div>
                        </td>

                        <td> <button type="submit" class="btn btn-primary">Conferma</button> </td>
                    </tr>

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