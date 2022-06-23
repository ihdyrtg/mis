<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0"><?php echo $page; ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- <div class="card-header">
                    <h3 class="card-title">DataTable with minimal features & hover style</h3>
                </div> -->
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20">No.</th>
                                <th>Nama Barang</th>
                                <th>Tersedia</th>
                                <th>Rusak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($tersedia as $t) : ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $t['nama_barang']; ?></td>
                                    <td><?php echo $t['jml_tersedia']; ?> <?php echo $t['satuan']; ?></td>
                                    <td><?php echo $t['jml_rusak']; ?> <?php echo $t['satuan']; ?></td>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th><?php echo $jml_barang; ?></th>
                                <th><?php echo $jml_bagus['bagus']; ?></th>
                                <th><?php echo $jml_rusak['rusak']; ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->