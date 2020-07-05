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
                <h3 class="card-title">Aggiungi</h3>
            </div>
            <form method="post" action="{$path}Admin/aggiuntaUtente">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 15%"> Utente </th>
                        <th style="width: 20%"> Nome </th>
                        <th style="width: 20%">Cognome </th>
                        <th style="width: 20%"> Email </th>
                        <th style="width: 15%"> Data di nascita </th>
                        <th style="width: 10%"> Password </th>
                        <th style="width: 10%">  </th>

                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>
                            <div class="form-group">
                                <select class="form-control custom-select" name="tipologia">
                                    <option selected disabled>Scegli</option>
                                    <option>Cliente</option>
                                    <option>Agente Immobiliare</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nome">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="cognome" >
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </td>
                        <td >

                                <div class="form-group">
                                    <input type="date" class="form-control" name="date">
                                </div>

                        </td>

                        <td >
                            <div class="form-group">

                                <input type="text" class="form-control" name="password">
                            </div>
                        </td>

                        <td>

                            <button type="submit" class="btn btn-primary">Conferma</button>

                        </td>
                    </tr>


                    </tbody>
                </table>
            </div>
            </form>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->