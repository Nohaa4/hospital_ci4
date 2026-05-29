<main>
    <div class="container-fluid px-3">
        <div class="card mb-4 mt-4">
            <div class="card-body">
                <h2 class="mb-4">Data Janji Temu Pasien</h2>

                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>Spesialis</th>
                                <th>Hari</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Jam</th>
                                <th>Nomor Antrian</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_janji as $janji): ?>
                                <tr>
                                    <td><?= $janji['nama_pasien'] ?></td>
                                    <td><?= $janji['nama_dokter'] ?></td>
                                    <td><?= $janji['spesialis'] ?></td>
                                    <td><?= $janji['hari'] ?></td>
                                    <td><?= $janji['tanggal'] ?></td>
                                    <td><?= $janji['jam_mulai'] ?> - <?= $janji['jam_selesai'] ?></td>
                                    <td><?= $janji['nomor_antrian'] ?></td>
                                    <td>
                                        <?php if ($janji['status'] == 'selesai'): ?>
                                            <span class="badge bg-success">Selesai</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark">Menunggu</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (session()->get('ses_level') == "1"): ?>
                                            <a href="<?= base_url('/admin/edit-data-janji/' . sha1($janji['id_janji'])); ?>">
                                                <button type="button" class="btn btn-sm btn-warning">Edit</button>
                                            </a>
                                            <a href="#" onclick="doDelete('<?= sha1($janji['id_janji']); ?>');">
                                                <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                                            </a>
                                            <?php if ($janji['status'] == 'menunggu'): ?>
                                                <a href="<?= base_url('/admin/ubah-status-janji/' . sha1($janji['id_janji'])); ?>">
                                                    <button type="button" class="btn btn-sm btn-success">Tandai Selesai</button>
                                                </a>
                                            <?php endif; ?>
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
                title: "Hapus Janji?",
                text: "Data ini akan terhapus secara permanen!",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            })
            .then(ok => {
                if (ok) {
                    window.location.href = '<?= base_url(); ?>/admin/hapus-data-janji/' + idDelete;
                } else {
                    $(this).removeAttr('disabled');
                }
            });
    }
</script>