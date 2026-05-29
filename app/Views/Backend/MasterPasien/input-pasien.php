<main>
    <div class="container-fluid px-3">
        <div class="card mt-4 mb-4">
            <div class="card-body">
                <h2 class="mb-4">Form Tambah Data Pasien</h2>
                <form action="/admin/simpan-pasien" method="post">
                    <div class="mb-3">
                        <label for="nama_pasien" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_jamsos" class="form-label">Nomor Jaminan Sosial</label>
                        <input type="text" class="form-control" id="nomor_jamsos" name="nomor_jamsos" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/admin/master-data-pasien" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>