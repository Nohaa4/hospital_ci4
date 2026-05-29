<main>
    <div class="container-fluid px-3">
        <div class="card mt-4 mb-4">
            <div class="card-body">
                <h2 class="mb-4">Form Tambah Jadwal Dokter</h2>
                <form action="/admin/simpan-jadwal" method="post">
                    <div class="mb-3">
                        <label for="id_dokter" class="form-label">Nama Dokter</label>
                        <select class="form-select" id="id_dokter" name="id_dokter" required>
                            <option value="">-- Pilih Dokter --</option>
                            <?php foreach ($data_dokter as $dokter): ?>
                                <option value="<?= $dokter['id_dokter'] ?>">
                                    <?= $dokter['nama_dokter'] ?> (<?= $dokter['spesialis'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <select class="form-select" id="hari" name="hari" required>
                            <option value="">-- Pilih Hari --</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                            <option value="Senin s/d Minggu">Senin s/d Minggu</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                    </div>

                    <div class="mb-3">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/admin/master-data-jadwal" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>