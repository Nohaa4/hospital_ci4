<main>
    <div class="container-fluid px-3">
        <div class="card mb-4 mt-4">
            <div class="card-body">
                <h2 class="mb-4">Data Jadwal Dokter</h2>

                <!-- Tombol Tambah Jadwal -->
                <a href="/admin/input-data-jadwal" class="btn btn-primary mb-3">Tambah Jadwal</a>

                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama Dokter</th>
                                <th>Spesialis</th>
                                <th>Hari</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_jadwal as $jadwal): ?>
                                <tr>
                                    <td><?= $jadwal['nama_dokter'] ?></td>
                                    <td><?= $jadwal['spesialis'] ?></td>
                                    <td><?= $jadwal['hari'] ?></td>
                                    <td><?= $jadwal['jam_mulai'] ?></td>
                                    <td><?= $jadwal['jam_selesai'] ?></td>
                                    <td>
                                        <?php if (session()->get('ses_level') == "1"): ?>
                                            <a href="<?= base_url('/admin/edit-data-jadwal/' . sha1($jadwal['id_jadwal'])); ?>">
                                                <button type="button" class="btn btn-sm btn-warning">Edit</button>
                                            </a>
                                            <a href="#" onclick="doDelete('<?= sha1($jadwal['id_jadwal']); ?>');">
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
                title: "Hapus Jadwal?",
                text: "Data ini akan terhapus secara permanen!",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            })
            .then(ok => {
                if (ok) {
                    window.location.href = '<?= base_url(); ?>/admin/hapus-data-jadwal/' + idDelete;
                } else {
                    $(this).removeAttr('disabled');
                }
            });
    }
</script>