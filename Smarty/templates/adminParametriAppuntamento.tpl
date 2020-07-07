<!-- Content Wrapper. Contains page content -->
<script>
    function goCalendar(parameters)
        {
            var url = '{$path}'+'Admin/calendarioAggiuntaAppuntamento/cliente/';
            var id_cliente = parameters.cliente.value.split("-")[1];
            id_cliente = id_cliente.slice(1);
            var id_immobile = parameters.immobile.value.split("-")[1];
            id_immobile = id_immobile.slice(1);
            url = url+id_cliente+"/immobile/"+id_immobile;
            window.location.href=url;
        }
</script>

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
                <form id="parametriAppuntamento" name="parameters" onsubmit="goCalendar(this); return false;">
                <table class="table table-striped projects">

                    <tbody>
                    <tr>
                        <td>
                            <div class ="form-group">
                                <label>Cliente</label>
                                <select class="form-control" id="cliente" name="cliente">
                                        <option selected disabled> Seleziona Cliente </option>
                                    {foreach $clienti as $cliente}
                                       <option>{$cliente->getFullName()} - {$cliente->getId()}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </td>

                        <td>
                            <div class ="form-group">
                                <label>Cliente</label>
                                <select class="form-control" id="immobile" name="immobile">
                                    <option selected disabled> Seleziona Immobile</option>
                                    {foreach $immobili as $immobile}
                                        <option>{$immobile->getNome()} - {$immobile->getId()}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </td>

                        <td> <button type="submit" class="btn btn-primary">Conferma</button> </td>
                    </tr>

                    </tbody>
                </table>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->