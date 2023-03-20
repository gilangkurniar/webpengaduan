<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">Selamat Datang di <span>Layanan Pengaduan Masyarakat</span></h2>
                <p class="animate__animated fanimate__adeInUp">Website ini merupakan website untuk layanan pengaduan masyarakat. Jika Anda memiliki keluhan terkait fasilitas perlengkapan jalan di Jalan Nasional Wilayah BPTD Banten, silahkan buat pengaduan Anda disini.</p>
                <a href="#contact" class="btn-get-started animate__animated animate__fadeInUp scrollto">Buat Pengaduan</a>
            </div>
        </div>

    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
            <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
            <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
    </svg>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>Pengaduan</h2>
                <p>Buat Pengaduan</p>
            </div>


            <div class="col-lg-12" data-aos="fade-left">

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mt-3">
                        <b>Nama Lengkap</b>
                        <input style="margin-bottom:5px" class="form-control mt-3" name="nama" rows="5" placeholder="Nama Lengkap" autocomplete="off"></input>
                        <?= form_error('nama') ?>
                    </div>
                    <div class="form-group mt-3">
                        <b>Jenis Kelamin</b>
                        <select name="jk" class="form-control mt-3">
                            <option value="Laki-laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jk') ?>
                    </div>
                    <div class="form-group mt-3">
                        <b>Nomor Telepon</b>
                        <input style="margin-bottom:5px" type="number" class="form-control mt-3" name="notelp" rows="5" placeholder="Nomor Telepon" autocomplete="off"></input>
                        <?= form_error('notelp') ?>
                    </div>
                    <div class="form-group mt-3">
                        <b>Alamat Kejadian</b>
                        <input style="margin-bottom:5px" type="text" class="form-control mt-3" name="alamat" rows="5" placeholder="Alamat Kejadian" autocomplete="off"></input>
                        <?= form_error('alamat') ?>
                    </div>
                    <div class="form-group mt-3">
                        <b>Kategori Pengaduan</b>
                        <select name="kategori" class="form-control mt-3">
                            <option value="Penerangan Jalan Umum">Penerangan Jalan Umum</option>
                            <option value="Jalan">Jalan</option>
                            <option value="Alat Pemberitahu Isyarat Lalu Lintas">Alat Pemberitahu Isyarat Lalu Lintas</option>
                            <option value="Markah Jalan">Markah Jalan</option>
                            <option value="Rambu Lalu Lintas">Rambu Lalu Lintas</option>
                            <option value="Alat Pengendali dan Pengaman Pengguna Jalan">Alat Pengendali dan Pengaman Pengguna Jalan</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <b>Deskripsi</b>
                        <textarea style="margin-bottom:5px" class="form-control mt-3" name="deskripsi" rows="5" placeholder="Deskripsi Pengaduan" autocomplete="off"></textarea>
                        <?= form_error('deskripsi') ?>
                    </div>
                    <div class="form-group mt-3">
                        <b>Tambahkan gambar atau video</b>
                        <input style="margin-bottom:5px" type="file" name="attach" class="form-control mt-3">
                        <span>* Format file hanya mendukung format .jpg, .png, dan .mp4 serta ukuran file tidak bisa lebih dari 2MB.</span>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
                    </div>
                </form>

            </div>


        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->