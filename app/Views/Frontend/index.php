<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Frontend - Kaliabang Hospital</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/new/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">
                <img src="<?= base_url('new/img/logo_hospital.png')?>" alt="Logo" style="height: 100px; margin-top: 10px;">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="#reservasi">Reservasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/login">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead"> 
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Selamat Datang di Kaliabang Hospital</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Kaliabang Hospital hadir untuk memberikan pelayanan kesehatan terbaik dengan fasilitas lengkap dan tenaga medis profesional. Kesehatan Anda adalah prioritas kami.</p>
                    <a class="btn btn-primary btn-xl" href="#about">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </header>

    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Kesehatan Anda Prioritas Kami!</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">
                        Kaliabang Hospital hadir dengan pelayanan kesehatan terbaik untuk Anda dan keluarga. Dengan tenaga medis profesional dan fasilitas modern, kami siap melayani Anda dengan sepenuh hati, 24 jam setiap hari. Percayakan kesehatan Anda kepada kami!
                    </p>
                    <a class="btn btn-light btn-xl" href="#services">Lihat Layanan Kami</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Layanan Kami</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Layanan Kesehatan Berkualitas</h3>
                        <p class="text-muted mb-0">Kami menyediakan layanan kesehatan dengan fasilitas terbaik untuk perawatan optimal.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Teknologi Medis Terkini</h3>
                        <p class="text-muted mb-0">Dengan peralatan medis canggih, kami memberikan diagnosis dan perawatan yang akurat.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Layanan Internasional</h3>
                        <p class="text-muted mb-0">Kami melayani pasien internasional dengan komunikasi yang nyaman dan mudah diakses.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Pelayanan Ramah & Peduli</h3>
                        <p class="text-muted mb-0">Setiap pasien kami layani dengan penuh perhatian dan kasih sayang, karena kami peduli dengan kesehatan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
        <section class="page-section" id="reservasi">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Form Reservasi</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Isi data Anda dengan lengkap dan pilih jadwal spesialis yang tersedia.</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-8">
                        <form action="/reservasi/simpan" method="post">
                            <div class="mb-3">
                                <label for="spesialis" class="form-label">Pilih Spesialis</label>
                                <select class="form-select" id="spesialis" required onchange="filterDokter()">
                                    <option value="">-- Pilih Spesialis --</option>
                                    <?php
                                    $spesialisList = [];
                                    foreach ($jadwal_spesialis as $jadwal) {
                                        $spesialisList[$jadwal['spesialis']] = true;
                                    }
                                    foreach (array_keys($spesialisList) as $spesialis) {
                                        echo "<option value=\"$spesialis\">$spesialis</option>";
                                    } ?>
                                </select>
                            </div>

                            <div class="mb-3" id="dokter-jadwal-group"style="display: none;">
                                <label for="id_jadwal" class="form-label">Pilih Dokter dan Jadwal</label>
                                <select class="form-select" id="id_jadwal" name="id_jadwal" required>
                                    <option value="">-- Pilih Dokter --</option>
                                    <?php foreach ($jadwal_spesialis as $jadwal): ?>
                                        <option value="<?= $jadwal['id_jadwal'] ?>"
                                            data-spesialis="<?= $jadwal['spesialis'] ?>">
                                        <?= $jadwal['nama_dokter'] ?> (<?= $jadwal['hari'] ?>, <?= $jadwal['jam_mulai'] ?> - <?= $jadwal['jam_selesai'] ?>)
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const spesialisSelect = document.getElementById('spesialis');
                                    if (spesialisSelect) {
                                        spesialisSelect.addEventListener('change', filterDokter);
                                    }
                                });
                            function filterDokter() {
                                const selectedSpesialis = document.getElementById('spesialis').value;
                                const dokterSelect = document.getElementById('id_jadwal');
                                const options = dokterSelect.querySelectorAll('option');
                                const group = document.getElementById('dokter-jadwal-group');

                                // Kosongkan dulu pilihan
                                dokterSelect.value = "";

                                // Tampilkan group jika spesialis dipilih
                                group.style.display = selectedSpesialis ? 'block' : 'none';

                                options.forEach(opt => {
                                    const spesialis = opt.getAttribute('data-spesialis');
                                    if (!spesialis) return; // Lewati option pertama (placeholder)
                                    opt.style.display = (spesialis === selectedSpesialis) ? 'block' : 'none';
                                });
                            }
                            </script>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Kunjungan</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nama_pasien" name="nama_pasien" type="text" placeholder="Nama Lengkap" required />
                                <label for="nama_pasien">Nama Pasien</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nomor_jamsos" name="nomor_jamsos" type="text" placeholder="Nomor Jaminan Sosial" required pattern="\d+" inputmode="numeric"/>
                                <label for="nomor_jamsos">Nomor Jaminan Sosial</label>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" style="height: 100px" required></textarea>
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Email Aktif" required />
                                <label for="email">Email</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-xl" type="submit">Kirim Reservasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Contact -->
        <section class="page-section bg-primary" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="text-white mt-0">Kontak Kami</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-5">
                            Hubungi kami untuk informasi lebih lanjut atau pertanyaan terkait layanan kami.
                        </p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center text-white">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <h5><i class="bi bi-telephone-fill me-2"></i> Telepon</h5>
                            <p>(021) 8000063</p>
                        </div>
                        <div class="mb-4">
                            <h5><i class="bi bi-envelope-fill me-2"></i> Email</h5>
                            <p>kaliabanghospital@mail.com</p>
                        </div>
                        <div class="mb-4">
                            <h5><i class="bi bi-geo-alt-fill me-2"></i> Alamat</h5>
                            <p>Jl. Raya Kaliabang No.8, Perwira, Kec. Bekasi Utara, Kota Bks, Jawa Barat 17122</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5">
                <div class="small text-center text-muted">Copyright &copy; 2025 - Kaliabang Hospital</div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.getElementById('tanggal_kunjungan').addEventListener('change', function() {
                const selectedDate = new Date(this.value);
                const day = selectedDate.toLocaleDateString('id-ID', {
                    weekday: 'long'
                }).toLowerCase(); // e.g., 'senin'
                const jadwalOptions = document.querySelectorAll('#id_jadwal option');

                jadwalOptions.forEach(option => {
                    const hariJadwal = option.getAttribute('data-hari');
                    if (!hariJadwal || hariJadwal === day) {
                        option.hidden = false;
                    } else {
                        option.hidden = true;
                    }
                });

                // Reset pilihan jadwal jika tidak sesuai
                document.getElementById('id_jadwal').value = "";
            });
        </script>
        <?php if (session()->getFlashdata('success')) : ?>
            <script type="text/javascript">
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '<?= session()->getFlashdata('success'); ?>'
                });
            </script>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <script type="text/javascript">
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: '<?= session()->getFlashdata('error'); ?>'
                });
            </script>
        <?php endif; ?>
        <?php if (session()->getFlashdata('warning')) : ?>
            <script type="text/javascript">
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan!',
                    text: '<?= session()->getFlashdata('warning'); ?>'
                });
            </script>
        <?php endif; ?>
        <?php if (session()->getFlashdata('info')) : ?>
            <script type="text/javascript">
                Swal.fire({
                    icon: 'info',
                    title: 'Info',
                    text: '<?= session()->getFlashdata('info'); ?>'
                });
            </script>
        <?php endif; ?>

</body>

</html>