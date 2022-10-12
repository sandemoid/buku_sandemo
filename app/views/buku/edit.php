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
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $data['title'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <form role="form" action="<?= base_url; ?>/buku/updateBuku" method="POST" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="id" value="<?= $data['buku']['id'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" class="form-control" placeholder="masukkan judul..." name="judul" value="<?= $data['buku']['judul'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input type="text" class="form-control" placeholder="masukkan penerbit..." name="penerbit" value="<?= $data['buku']['penerbit'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <input type="text" class="form-control" placeholder="masukkan pengarang..." name="pengarang" value="<?= $data['buku']['pengarang'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="umber" class="form-control" placeholder="masukkan tahun..." name="tahun" value="<?= $data['buku']['tahun'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori_id">
                                        <option value="">Pilih</option>
                                        <?php foreach ($data['kategori'] as $row) : ?>
                                            <option value="<?= $row['id']; ?>" <?php if ($data['buku']['kategori_id'] == $row['id']) {
                                                                                    echo "selected";
                                                                                } ?>><?= $row['nama_kategori']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="umber" class="form-control" placeholder="masukkan tahun..." name="harga" value="<?= $data['buku']['harga'] ?>">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->