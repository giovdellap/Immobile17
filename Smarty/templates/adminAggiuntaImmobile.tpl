

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
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Aggiungi Immobile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Immobile</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Nome</label>
                            <input type="text" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Città</label>
                            <input type="text" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Indirizzo</label>
                            <input type="text" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Tipologia</label>
                            <select class="form-control custom-select">
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
                            <input type="text" id="inputName" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="inputName">Prezzo</label>
                            <input type="text" id="inputName" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="inputStatus">Vendita/Affitto</label>
                            <select class="form-control custom-select">
                                <option selected disabled>Vendita/Affitto</option>
                                <option>Vendita</option>
                                <option>Affitto</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="Descrizione">Descrizione</label>
                            <textarea id="Descrizione" class="form-control" rows="4"></textarea>
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
