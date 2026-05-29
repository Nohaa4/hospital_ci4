<main>
    <div class="container-fluid px-3">
        <div class="card mt-4 mb-4">
            <div class="card-body">
                <h2 class="mb-4">Form Edit Jadwal Dokter</h2>
                <form action="/admin/update-jadwal" method="post">
                    <div class="mb-3">
                        <label for="id_dokter" class="form-label">Nama Dokter</label>
                        <select class="form-select" id="id_dokter" name="id_dokter" required>
                            <option value="">-- Pilih Dokter --</option>
                            <?php foreach ($data_dokter as $dokter): ?>
                                <option value="<?= $dokter['id_dokter'] ?>"
                                    <?= $dokter['id_dokter'] == $data_jadwal['id_dokter'] ? 'selected' : '' ?>>
                                    <?= $dokter['nama_dokter'] ?> (<?= $dokter['spesialis'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <select class="form-select" id="hari" name="hari" required>
                            <option value="">-- Pilih Hari --</option>
                            <?php
                            $hari_list = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu', 'Senin s/d Minggu'];
                            foreach ($hari_list as $hari): ?>
                                <option value="<?= $hari ?>"
                                    <?= $data_jadwal['hari'] == $hari ? 'selected' : '' ?>>
                                    <?= $hari ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                            value="<?= $data_jadwal['jam_mulai'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"
                            value="<?= $data_jadwal['jam_selesai'] ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/admin/master-data-jadwal" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>