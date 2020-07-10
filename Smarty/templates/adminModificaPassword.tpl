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
        <form method="post" action="{$path}Admin/modificaPassword">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Modifica</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 20%"> Nome </th>
                            <th style="width: 20%"> Cognome </th>
                            <th style="width: 20%"> Email </th>
                            <th style="width: 15%"> Password </th>


                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nome" value="{$admin->getNome()}" readonly>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cognome" value="{$admin->getCognome()}" readonly>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" value="{$admin->getMail()}" readonly>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="passwordAdmin" value="{$admin->getPassword()}">
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
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->