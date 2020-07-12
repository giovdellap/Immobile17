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
            <form method="post" enctype="multipart/form-data" action="{$path}Admin/aggiuntaUtente">
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
                        <th style="width: 15%">Immagine del profilo</th>
                        <th style="width: 10%">  </th>

                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>
                            <div class="form-group">
                                <select class="form-control custom-select" name="tipologia" required>
                                    <option selected disabled>Scegli</option>
                                    <option>Cliente</option>
                                    <option>Agente Immobiliare</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nome" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="cognome" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" required>
                            </div>
                        </td>
                        <td >

                                <div class="form-group">
                                    <input type="date" class="form-control" name="date" required>
                                </div>

                        </td>

                        <td >
                            <div class="form-group">

                                <input type="text" class="form-control" name="password" required>
                            </div>
                        </td>
                        <td>
                            <span class="txt1 p-b-7"></span>
                            <input type="file" name="propic" required/>
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
<script>
    function validateImage() {
        var formData = new FormData();

        var file = document.getElementById("choose_image").files[0];

        formData.append("Filedata", file);
        var t = file.type.split('/').pop().toLowerCase();
        if (t !== "jpeg" && t !== "jpg" && t !== "png" && t !== "gif") {
            alert('Inserire un file di immagine valido!');
            document.getElementById("choose_image").value = '';
            return false;
        }
        if (file.size > 2048000) {
            alert('Non puoi caricare file più grandi di 2 MB');
            document.getElementById("choose_image").value = '';
            return false;
        }
        return true;
</script>