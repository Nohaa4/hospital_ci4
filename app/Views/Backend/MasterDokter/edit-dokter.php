<main>
    <div class="container-fluid px-3">
        <div class="card mt-4 mb-4">
            <div class="card-body">
                <h2 class="mb-4">Form Edit Data Dokter</h2>
                <form action="/admin/update-dokter" method="post">
                    <div class="mb-3">
                        <label for="nama_dokter" class="form-label">Nama Dokter</label>
                        <input type="text" class="form-control" id="nama_dokter" name="nama_dokter"
                            value="<?= $data_dokter['nama_dokter']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="spesialis" class="form-label">Spesialis</label>
                        <input type="text" class="form-control" id="spesialis" name="spesialis"
                            value="<?= $data_dokter['spesialis']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_tlp" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="no_tlp" name="no_tlp"
                            value="<?= $data_dokter['no_tlp']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?= $data_dokter['email']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/admin/master-data-dokter" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>