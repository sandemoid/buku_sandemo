<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $data['title']; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php Flasher::Message(); ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $data['title'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <a href="<?= base_url; ?>/user/create" class="btn float-left btn btn-primary">Tambah User</a>
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th style="width: 150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data['user'] as $row) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['username']; ?></td>
                                            <td>
                                                <a href="<?= base_url; ?>/user/edit/<?= $row['id'] ?>" class="btn btn-block btn-info">Edit</a>
                                                <a href="<?= base_url; ?>/user/delete/<?= $row['id'] ?>" class="btn btn-block btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->