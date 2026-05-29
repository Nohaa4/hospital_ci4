<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2025</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/Assets/js/chart-area-demo.js"></script>
<script src="/Assets/js/chart-bar-demo.js"></script>
<script src="/Assets/js/chart-pie-demo.js"></script>
<script src="/Assets/js/datatables-demo.js"></script>
<script src="/Assets/js/scripts.js"></script>
<script src="/Assets/js/sweetalert2.min.js"></script>
<script src="/Assets/js/datatables-simple-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<?php if (session()->getFlashdata('success')) : ?>
    <script type="text/javascript">
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '<?= session()->getFlashdata('success'); ?>'
        });
    </script>
<?php endif; ?>
<?php if (session()->getFlashdata('error')) : ?>
    <script type="text/javascript">
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: '<?= session()->getFlashdata('error'); ?>'
        });
    </script>
<?php endif; ?>
<?php if (session()->getFlashdata('warning')) : ?>
    <script type="text/javascript">
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan!',
            text: '<?= session()->getFlashdata('warning'); ?>'
        });
    </script>
<?php endif; ?>
<?php if (session()->getFlashdata('info')) : ?>
    <script type="text/javascript">
        Swal.fire({
            icon: 'info',
            title: 'Info',
            text: '<?= session()->getFlashdata('info'); ?>'
        });
    </script>
<?php endif; ?>
</body>

</html>