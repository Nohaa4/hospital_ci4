<main>
    <div class="container-fluid px-3">
        <div class="card mb-4 mt-4">
            <div class="card-body">
                <h2 class="mb-4">Data Dokter</h2>

                <!-- Tombol Tambah Dokter -->
                <a href="/admin/input-data-dokter" class="btn btn-primary mb-3">Tambah Data Dokter</a>

                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama Dokter</th>
                                <th>Spesialis</th>
                                <th>No Telepon</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_dokter as $dokter): ?>
                                <tr>
                                    <td><?= $dokter['nama_dokter'] ?></td>
                                    <td><?= $dokter['spesialis'] ?></td>
                                    <td><?= $dokter['no_tlp'] ?></td>
                                    <td><?= $dokter['email'] ?></td>
                                    <td>
                                        <?php if (session()->get('ses_level') == "1"): ?>
                                            <a href="<?= base_url('/admin/edit-data-dokter/' . sha1($dokter['id_dokter'])); ?>">
                                                <button type="button" class="btn btn-sm btn-warning">Edit</button>
                                            </a>
                                            <a href="#" onclick="doDelete('<?= sha1($dokter['id_dokter']); ?>');">
                                                <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                                            </a>
                                        <?php else: ?>
                                            #
                                        <?php endif; ?>
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
                title: "Hapus Data Dokter?",
                text: "Data ini akan terhapus secara permanen!!",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            })
            .then(ok => {
                if (ok) {
                    window.location.href = '<?= base_url(); ?>/admin/hapus-data-dokter/' + idDelete;
                } else {
                    $(this).removeAttr('disabled');
                }
            });
    }
</script>