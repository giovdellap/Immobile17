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
                <h3 class="card-title">Immobile17</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%"> ID          </th>
                        <th style="width: 15%"> Nome       </th>
                        <th style="width: 15%"> Città      </th>
                        <th style="width: 15%"> CAP        </th>
                        <th style="width: 15%"> Provincia  </th>
                        <th style="width: 15%"> Indirizzo  </th>
                        <th style="width: 15%">  </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> {$agenzia->getId()}          </td>
                        <td> {$agenzia->getNome()}        </td>
                        <td> {$agenzia->getCitta()}       </td>
                        <td> {$agenzia->getCAP()}         </td>
                        <td> {$agenzia->getProvincia()}   </td>
                        <td> {$agenzia->getIndirizzo()}   </td>
                        <td >
                            <a class="btn btn-info btn-xs" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>

                            </a>
                        </td>
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