<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Reservasi - Kaliabang Hospital</title>
    <link rel="icon" href="/new/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Optional custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Bukti Reservasi Janji Temu</h3>
                    </div>
                    <div class="card-body text-center p-5">
                        <p class="mb-4">Silakan tunjukkan QR Code ini saat datang ke Kaliabang Hospital.</p>

                        <div class="mb-4">
                            <img src="data:image/png;base64,<?= $qr_image ?>" alt="QR Code"
                                class="img-fluid border rounded p-2 shadow" style="max-width: 250px;">
                        </div>

                        <div class="text-start bg-light p-4 rounded shadow-sm mb-4">
                            <p class="mb-2"><strong>Nama Pasien:</strong> <?= $data['nama_pasien'] ?></p>
                            <p class="mb-2"><strong>Nomor Antrian:</strong> <?= $data['nomor_antrian'] ?></p>
                            <p class="mb-2"><strong>Dokter:</strong> <?= $data['nama_dokter'] ?> (<?= $data['spesialis'] ?>)</p>
                            <p class="mb-2"><strong>Tanggal Kunjungan:</strong> <?= date('d-m-Y', strtotime($data['tanggal'])) ?></p>
                            <p class="mb-0"><strong>Hari & Jam:</strong> <?= $data['hari'] ?> | <?= $data['jam_mulai'] ?> - <?= $data['jam_selesai'] ?></p>
                        </div>

                        <a href="/frontend/index" class="btn btn-outline-primary px-4">
                            <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                        </a>
                        <a href="#" id="downloadBtn" class="btn btn-success px-4 mt-3">
                            <i class="bi bi-download"></i> Unduh Bukti Pendaftaran
                        </a>
                        <canvas id="downloadCanvas" style="display:none;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('downloadBtn').addEventListener('click', function() {
            const canvas = document.getElementById('downloadCanvas');
            const ctx = canvas.getContext('2d');
            const qrImg = document.querySelector('img[alt="QR Code"]');

            const width = 600;
            const height = 700;
            canvas.width = width;
            canvas.height = height;

            // Background putih
            ctx.fillStyle = "#ffffff";
            ctx.fillRect(0, 0, width, height);

            // Judul
            ctx.fillStyle = "#000000";
            ctx.font = "24px Arial";
            ctx.fillText("Bukti Reservasi Janji Temu", 150, 40);

            // Gambar QR Code di tengah
            const img = new Image();
            img.src = qrImg.src;
            img.onload = function() {
                ctx.drawImage(img, (width - 200) / 2, 60, 200, 200);

                // Tambahkan detail pasien
                ctx.font = "18px Arial";
                ctx.fillText("Nama Pasien: <?= $data['nama_pasien'] ?>", 50, 290);
                ctx.fillText("Nomor Antrian: <?= $data['nomor_antrian'] ?>", 50, 320);
                ctx.fillText("Dokter: <?= $data['nama_dokter'] ?> (<?= $data['spesialis'] ?>)", 50, 350);
                ctx.fillText("Tanggal Kunjungan: <?= date('d-m-Y', strtotime($data['tanggal'])) ?>", 50, 380);
                ctx.fillText("Hari & Jam: <?= $data['hari'] ?> | <?= $data['jam_mulai'] ?> - <?= $data['jam_selesai'] ?>", 50, 410);

                // Unduh sebagai gambar
                const link = document.createElement('a');
                link.download = 'bukti_reservasi_<?= preg_replace("/[^a-zA-Z0-9]/", "_", $data["nama_pasien"]) ?>.png';
                link.href = canvas.toDataURL();
                link.click();
            };
        });
    </script>
</body>

</html>