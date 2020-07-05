

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2><span>AGGIUNGI</span></h2>
                </div>
                <div class="col-sm-6">


                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="post" action="{$path}Admin/AggiuntaImmobile">
        <div class="row">
            <div class="col-md-6">

                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Immobile</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Nome</label>
                            <input type="text" id="inputName" class="form-control" name="nome">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Città</label>
                            <input type="text" id="inputName" class="form-control" name="comune">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Indirizzo</label>
                            <input type="text" id="inputName" class="form-control" name="indirizzo">
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Tipologia</label>
                            <select class="form-control custom-select"  name="tipologia">
                                <option selected disabled>Tutte le tipologie</option>
                                <option>Monolocale</option>
                                <option>Bilocale</option>
                                <option>Villa</option>
                                <option>Mansarda</option>
                                <option>Garage</option>
                                <option>Locale</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputName">Dimensione</label>
                            <input type="text" id="inputName" class="form-control" name="grandezza">
                        </div>

                        <div class="form-group">
                            <label for="inputName">Prezzo</label>
                            <input type="text" id="inputName" class="form-control" name="prezzo">
                        </div>

                        <div class="form-group">
                            <label for="inputStatus">Vendita/Affitto</label>
                            <select class="form-control custom-select" name="tipoAnnuncio">
                                <option selected disabled>Vendita/Affitto</option>
                                <option>Vendita</option>
                                <option>Affitto</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Descrizione">Descrizione</label>
                            <textarea id="Descrizione" class="form-control" rows="4" name="descrizione"> </textarea>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <div class="col-md-6">


            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancella</a>
                <input type="submit" value="Conferma" class="btn btn-success float-right">
            </div>
        </div>
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
