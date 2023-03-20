<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Laporan Pengaduan</h1>
    <p class="mb-4">Berikut adalah daftar laporan pengaduan yang telah masuk.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Laporan</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th>Kategori Pengaduan</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getAllPengaduan as $g) : ?>
                            <tr>
                                <td width="15%"><?= $g['tanggal'] ?> pukul <?= $g['jam'] ?></td>
                                <td><?= $g['nama'] ?></td>
                                <td><?= $g['jk'] ?></td>
                                <td><?= $g['notelp'] ?></td>
                                <td><?= $g['alamat'] ?></td>
                                <td><?= $g['kategori'] ?></td>
                                <td>
                                    <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#detailModal<?= $g['id_pengaduan'] ?>">Detail</a>
                                    <a href="<?= base_url() ?>admin/hapuspengaduan/<?= $g['id_pengaduan'] ?>" class="badge badge-danger" onclick="return confirm('Apa Anda yakin?')">Hapus</a>
                                </td>

                                <!-- Modal Detail -->
                                <div class="modal fade" id="detailModal<?= $g['id_pengaduan'] ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Laporan dari <?= $g['nama'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <b>Nama Lengkap</b>
                                                        <p><?= $g['nama'] ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
                                                        <b>Jenis Kelamin</b>
                                                        <p><?= $g['jk'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <b>No. Telepon</b>
                                                        <p><?= $g['notelp'] ?></p>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
                                                        <b>Alamat</b>
                                                        <p><?= $g['alamat'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <b>Kategori pengaduan</b>
                                                    <p><?= $g['kategori'] ?></p>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <b>Deskripsi pengaduan</b>
                                                    <p><?= $g['deskripsi'] ?></p>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <b>Gambar</b>
                                                    <div class="mt-2 mb-4">
                                                        <img src="<?= base_url() ?>public/files/<?= $g['attach'] ?>" width="150px" alt=" Gambar Kosong">
                                                    </div>
                                                    <b>Video</b>
                                                    <div>
                                                        <video width="300" height="auto" controls>
                                                            <source src="<?= base_url() ?>public/files/<?= $g['attach'] ?>" type="video/mp4" alt="video">
                                                        </video>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>