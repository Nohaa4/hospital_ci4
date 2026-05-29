<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Kaliabang Hospital</title>
    <style>
        body.bg-primary {
            background: url('/Assets/img/hospital.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.95);
            /* semi-transparent background */
        }
    </style>
    <link href="/Assets/css/styles.css" rel="stylesheet">
    <link href="/Assets/css/sweetalert2.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login Admin</h3>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="<?= base_url('/admin/autentikasi-login'); ?>" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" name="username" placeholder="Username" />
                                            <label>Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="password" name="password" placeholder="Password" />
                                            <label>Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" />
                                            <label class="form-check-label" for="remember">Remember Me</label>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary shadow rounded-pill w-100">
                                                <i class="fas fa-sign-in-alt me-2"></i>Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2025</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/Assets/js/sweetalert2.min.js"></script>
    <script src="/Assets/js/chart-area-demo.js"></script>
    <script src="/Assets/js/chart-bar-demo.js"></script>
    <script src="/Assets/js/chart-pie-demo.js"></script>
    <script src="/Assets/js/datatables-demo.js"></script>
    <script src="/Assets/js/scripts.js"></script>
    <script src="/Assets/js/datatables-simple-demo.js"></script>
    <script>
        ! function($) {
            $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function() {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function() {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>
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