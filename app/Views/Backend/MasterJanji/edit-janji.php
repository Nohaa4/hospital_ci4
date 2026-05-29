<main>
    <div class="container-fluid px-3">
        <div class="card mt-4 mb-4">
            <div class="card-body">
                <h2 class="mb-4">Form Edit Janji Temu</h2>
                <form action="/admin/update-janji" method="post">
                    <input type="hidden" name="id_janji" value="<?= $data_janji['id_janji'] ?>">

                    <div class="mb-3">
                        <label for="nama_pasien" class="form-label">ID Pasien</label>
                        <input type="text" class="form-control" id="id_pasien" name="id_pasien"
                            value="<?= $data_janji['id_pasien'] ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="id_jadwal" class="form-label">Pilih Jadwal Dokter</label>
                        <select class="form-select" id="id_jadwal" name="id_jadwal" required>
                            <option value="">-- Pilih Jadwal --</option>
                            <?php foreach ($list_jadwal as $jadwal): ?>
                                <option value="<?= $jadwal['id_jadwal'] ?>"
                                    <?= $data_janji['id_jadwal'] == $jadwal['id_jadwal'] ? 'selected' : '' ?>>
                                    <?= $jadwal['nama_dokter'] ?> (<?= $jadwal['spesialis'] ?>) - <?= $jadwal['hari'] ?>, <?= $jadwal['jam_mulai'] ?> - <?= $jadwal['jam_selesai'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Kunjungan</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="<?= $data_janji['tanggal'] ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="/admin/master-data-janji" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>