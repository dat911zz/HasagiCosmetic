<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/images/admin-logo/Logo.png">
    <link rel="icon" type="image/png" href="../../assets/images/admin-logo/Logo.png">
    <title><?= $title ?></title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Preload js-->
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../assets/css/admin/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/admin/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/admin/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/admin/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
    <!-- SweetAlert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Preload -->
    <link href="../../assets/css/admin/PreLoad.css" rel="stylesheet" />
    <!-- Custom CSS-->
    <link href="../../assets/css/admin/CustomLayout.css" rel="stylesheet" />

    <link rel="stylesheet" href="../../assets/css/stylechat.css">
    <!--Bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!--Datatable-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
</head>
<body class="g-sidenav-show  bg-gray-100">
    <?= $this->include('partials/admin/admin_sidenav') ?>
    <div class="precontainer">
        <div class="prelogo">
            <img src="../../assets/images/admin-logo/Logo.png" alt="Logo" />
        </div>
        <div class="preloader">
            <hr /><hr /><hr /><hr />
        </div>
    </div>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?= $this->include('partials/admin/admin_header') ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4" style="min-height: 100vh">
            <?= $this->renderSection('content') ?>
        </div>
        <?= $this->include('partials/admin/admin_footer') ?>
    </main>
    <!-- @Html.Partial("Plugin") -->
    <!--   Core JS Files   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }</script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
    <script src="../../assets/js/Preload.js"></script>
    <script src="../../assets/js/ModalConf.js"></script>
    <script src="../../assets/js/admin.js"></script>
</body>
</html>