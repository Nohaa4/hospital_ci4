<main>
    <div class="container-fluid px-3">
        <div class="card mt-4 mb-4">
            <div class="card-body">
                <h2 class="mb-4">Form Tambah Data Dokter</h2>
                <form action="/admin/simpan-dokter" method="post">
                    <div class="mb-3">
                        <label for="nama_dokter" class="form-label">Nama Dokter</label>
                        <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" required>
                    </div>
                    <div class="mb-3">
                        <label for="spesialis" class="form-label">Spesialis</label>
                        <input type="text" class="form-control" id="spesialis" name="spesialis" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_tlp" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="no_tlp" name="no_tlp" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/admin/master-data-dokter" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>