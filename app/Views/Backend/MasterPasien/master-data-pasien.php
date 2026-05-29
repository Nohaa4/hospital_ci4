<main>
    <div class="container-fluid px-3"> <!-- Tambahkan padding luar -->
        <div class="card mb-4 mt-4">
            <div class="card-body">
                <h2 class="mb-4">Data Pasien</h2>

                <!-- Tombol Tambah Pasien -->
                <a href="/admin/input-data-pasien" class="btn btn-primary mb-3">Tambah Data Pasien</a>

                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama Pasien</th>
                                <th>Nomor Jaminan Sosial</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_pasien as $data): ?>
                                <tr>
                                    <td><?= $data['nama_pasien'] ?></td>
                                    <td><?= $data['nomor_jamsos'] ?></td>
                                    <td><?= $data['jenis_kelamin'] === 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
                                    <td><?= $data['alamat'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td>
                                        <?php
                                        if (session()->get('ses_level') == "1") {
                                        ?>
                                            <a href="<?= base_url('/admin/edit-data-pasien/' . sha1($data['id_pasien'])); ?>">
                                                <button type="button" class="btn btn-sm btn-warning">Edit</button>
                                            </a>
                                            <a href="#" onclick="doDelete('<?= sha1($data['id_pasien']); ?>');">
                                                <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                                            </a>
                                        <?php
                                        } else echo "#";
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    function doDelete(idDelete) {
        swal.fire({
                title: "Hapus Data Pasien?",
                text: "Data ini akan terhapus secara permanen!!",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            })
            .then(ok => {
                if (ok) {
                    window.location.href = '<?= base_url(); ?>/admin/hapus-data-pasien/' + idDelete;
                } else {
                    $(this).removeAttr('disabled');
                }
            });
    }
</script>