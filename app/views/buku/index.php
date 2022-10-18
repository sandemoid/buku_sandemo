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
                                <a href="<?= base_url; ?>/buku/create" class="btn float-left btn btn-primary mr-2">Tambah Buku</a>
                                <a href="<?= base_url; ?>/buku/laporan" class="btn float-left btn btn-info mr-2">Laporan Buku</a>
                                <a href="<?= base_url; ?>/buku/lihatlaporan" class="btn float-left btn btn-success">Lihat Laporan Buku</a>
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Judul</th>
                                        <th>Penerbit</th>
                                        <th>Pengarang</th>
                                        <th>Tahun</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th style="width: 150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data['buku'] as $row) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['judul']; ?></td>
                                            <td><?= $row['penerbit']; ?></td>
                                            <td><?= $row['pengarang']; ?></td>
                                            <td><?= $row['tahun']; ?></td>
                                            <td>
                                                <span class="badge bg-warning"><?= $row['nama_kategori']; ?></span>
                                            </td>
                                            <td>Rp. <?= number_format($row['harga'], 0, ",", ".") ?></td>
                                            <td>
                                                <a href="<?= base_url; ?>/buku/edit/<?= $row['id'] ?>" class="btn btn-block btn-info">Edit</a>
                                                <a href="<?= base_url; ?>/buku/delete/<?= $row['id'] ?>" class="btn btn-block btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
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