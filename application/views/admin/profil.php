<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil</h1>
    </div>
    <?= $this->session->flashdata('pesan'); ?>

    <!-- Content Row -->
    <div class="row">

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Profil</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <img class="rounded-circle mb-3" width="100px" src="<?= base_url() ?>./public/files/<?= $user['gambar'] ?>" alt="Foto Profil">
                    <div class="form-group mb-3">
                        <b>Nama</b>
                        <p><?= $user['nama'] ?></p>
                    </div>
                    <div class="form-group mb-3">
                        <b>Email</b>
                        <p><?= $user['email'] ?></p>
                    </div>
                    <div class="form-group mb-3">
                        <b>Username</b>
                        <p><?= $user['username'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Update Profil</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="<?= base_url() ?>admin/profil" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" type="text" name="nama" value="<?= $user['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" name="email" value="<?= $user['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" value="<?= $user['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <div class="custom-file">
                                <input type="file" name="gambar" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>


    </div>