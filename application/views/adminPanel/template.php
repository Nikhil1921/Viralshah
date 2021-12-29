<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= APP_NAME.' | '.ucwords($title) ?></title>
    <?= link_tag('assets/images/favicon.png','icon','image/x-icon') ?>
    <?= link_tag('assets/plugins/fontawesome-free/css/all.min.css','stylesheet','text/css') ?>
    
    <?php if (isset($dataTables)): ?>
    <?= link_tag('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css','stylesheet','text/css') ?>
    <?= link_tag('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css','stylesheet','text/css') ?>
    
    <?php endif ?>
    
    <?php if (isset($select)): ?>
    <?= link_tag('assets/plugins/select2/css/select2.min.css','stylesheet','text/css') ?>
    <?= link_tag('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css','stylesheet','text/css') ?>
    <?php endif ?>
    <?php if (isset($checkbox)): ?>
    <?= link_tag('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css','stylesheet','text/css') ?>
    <?php endif ?>
    <?= link_tag('assets/plugins/daterangepicker/daterangepicker.css','stylesheet','text/css') ?>

    <?= link_tag('assets/dist/css/adminlte.min.css','stylesheet','text/css') ?>
    <?= link_tag('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css','stylesheet','text/css') ?>
    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <?= anchor('#', '<i class="far fa-user"></i>', 'class="nav-link" data-toggle="dropdown" aria-expanded="false"') ?>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
              <span class="dropdown-header"><?= anchor(admin('profile'), 'Account Details', 'class="dropdown-item"') ?></span>
              <div class="dropdown-divider"></div>
              <?= anchor(admin('profile'), '<i class="fa fa-user mr-2"></i>'.ucwords($this->session->name), 'class="dropdown-item"') ?>
              <div class="dropdown-divider"></div>
              <?= anchor(admin('profile'), '<i class="fa fa-envelope mr-2"></i>'.$this->session->email, 'class="dropdown-item"') ?>
              <div class="dropdown-divider"></div>
              <?= anchor(admin('profile'), '<i class="fa fa-phone mr-2"></i>'.$this->session->mobile, 'class="dropdown-item"') ?>
              <div class="dropdown-divider"></div>
              <?= anchor(admin('logout'), 'Log Out', 'class="dropdown-item dropdown-footer"') ?>
            </div>
          </li>
        </ul>
      </nav>
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <?= anchor(admin(), img(['src' => 'assets/images/favicon.png', 'alt' => '', 'class' => 'brand-image img-circle elevation-3']).strtoupper(APP_NAME), 'class="brand-link"') ?>
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <?= img(['src' => 'assets/images/user.jpg', 'alt' => '', 'class' => 'img-circle elevation-2']) ?>
            </div>
            <div class="info">
              <?= anchor(admin(), ucwords($this->session->name), 'class="d-block"') ?>
            </div>
          </div>
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <?= anchor(admin(), '<i class="nav-icon fas fa-home"></i><p>Dashboard</p>', 'class="nav-link '.(($name == 'dashboard') ? 'active' : '').'"') ?>
              </li>
              <li class="nav-item">
                <?= anchor(admin('task'), '<i class="nav-icon fa fa-users"></i><p>Tasks</p>', 'class="nav-link '.(($name == 'task') ? 'active' : '').'"') ?>
              </li>
              <li class="nav-item">
                <?= anchor(admin('employees'), '<i class="nav-icon fa fa-users"></i><p>Employees</p>', 'class="nav-link '.(($name == 'employees') ? 'active' : '').'"') ?>
              </li>
              <li class="nav-item has-treeview <?= (in_array($name, ['vehicleSender', 'vehicleSenderEmployee'])) ? 'menu-open' : '' ?>">
                <?= anchor(admin(), '<i class="nav-icon fas fa-users"></i><p>Vehicle Sender<i class="right fas fa-angle-left"></i></p>', 'class="nav-link '.((in_array($name, ['vehicleSender', 'vehicleSenderEmployee'])) ? 'active' : '' ).'"') ?>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <?= anchor(admin('vehicleSender'), '<i class="far fa-circle nav-icon"></i><p>Vehicle Sender</p>', 'class="nav-link '.(($name == 'vehicleSender') ? 'active' : '').'"') ?>
                  </li>
                  <li class="nav-item">
                    <?= anchor(admin('vehicleSenderEmployee'), '<i class="far fa-circle nav-icon"></i><p>Vehicle Sender Employee</p>', 'class="nav-link '.(($name == 'vehicleSenderEmployee') ? 'active' : '').'"') ?>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?= (in_array($name, ['city', 'make', 'variant', 'vehicleClass', 'bodyType', 'fuel', 'trim'])) ? 'menu-open' : '' ?>">
                <?= anchor(admin(), '<i class="nav-icon fas fa-car"></i><p>Vehicle Particular<i class="right fas fa-angle-left"></i></p>', 'class="nav-link '.((in_array($name, ['city', 'make', 'variant', 'vehicleClass', 'bodyType', 'fuel'])) ? 'active' : '' ).'"') ?>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <?= anchor(admin('city'), '<i class="far fa-circle nav-icon"></i><p>City</p>', 'class="nav-link '.(($name == 'city') ? 'active' : '').'"') ?>
                  </li>
                  <li class="nav-item">
                    <?= anchor(admin('make'), '<i class="far fa-circle nav-icon"></i><p>Make</p>', 'class="nav-link '.(($name == 'make') ? 'active' : '').'"') ?>
                  </li>
                  <li class="nav-item">
                    <?= anchor(admin('variant'), '<i class="far fa-circle nav-icon"></i><p>Variant</p>', 'class="nav-link '.(($name == 'variant') ? 'active' : '').'"') ?>
                  </li>
                  <li class="nav-item">
                    <?= anchor(admin('trim'), '<i class="far fa-circle nav-icon"></i><p>Trim</p>', 'class="nav-link '.(($name == 'trim') ? 'active' : '').'"') ?>
                  </li>
                  <li class="nav-item">
                    <?= anchor(admin('vehicleClass'), '<i class="far fa-circle nav-icon"></i><p>Vehicle Class</p>', 'class="nav-link '.(($name == 'vehicleClass') ? 'active' : '').'"') ?>
                  </li>
                  <li class="nav-item">
                    <?= anchor(admin('bodyType'), '<i class="far fa-circle nav-icon"></i><p>Body Type</p>', 'class="nav-link '.(($name == 'bodyType') ? 'active' : '').'"') ?>
                  </li>
                  <li class="nav-item">
                    <?= anchor(admin('fuel'), '<i class="far fa-circle nav-icon"></i><p>Fuel</p>', 'class="nav-link '.(($name == 'fuel') ? 'active' : '').'"') ?>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <?= anchor(admin('profile'), '<i class="nav-icon fa fa-user"></i><p>Profile</p>', 'class="nav-link '.(($name == 'profile') ? 'active' : '').'"') ?>
              </li>
              <li class="nav-item">
                <?= anchor(admin('home/backup'), '<i class="nav-icon fas fa-database"></i><p>Backup</p>', 'class="nav-link '.(($name == 'home/backup') ? 'active' : '').'"') ?>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><?= ucwords($title) ?></h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">
                    <?= anchor(admin(), 'Home', '') ?>
                  </li>
                  <li class="breadcrumb-item <?= (!empty($operation)) ? '' : 'active' ?> ">
                    <?= (!empty($operation)) ? anchor($url, ucwords($title), '') : ucwords($title) ?>
                  </li>
                  <?php if (!empty($operation)): ?>
                  <li class="breadcrumb-item active">
                    <?= ucwords($operation) ?>
                  </li>
                  <?php endif ?>
                </ol>
              </div>
            </div>
          </div>
        </section>
        <section class="content">
          <?php if ($this->session->success): ?>
          <div class="alert alert-success alert-messages">
            <?= $this->session->success ?>
          </div>
          <?php endif ?>
          <?php if ($this->session->error): ?>
          <div class="alert alert-danger alert-messages">
            <?= $this->session->error ?>
          </div>
          <?php endif ?>
          <?= $contents ?>
        </section>
      </div>
      <footer class="main-footer no-print">
        <div class="float-right d-none d-sm-block">
          <a href="https://densetek.com" target="_blank" title="Densetek Infotech"><b>Densetek Infotech</b></a>
        </div>
        <strong>Copyright &copy; <?= date("Y") ?>.</strong> All rights
        reserved.
      </footer>
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>
  <input type="hidden" id="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
  <script src="<?= assets('plugins/jquery/jquery.min.js') ?>"></script>
  <script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <?php if (isset($dataTables)): ?>
  <script src="<?= assets('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= assets('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?= assets('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
  <script src="<?= assets('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
  <script src="<?= assets('plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>
  <script type="text/javascript" src="<?= assets('plugins/datatables/dataTables.buttons.min.js') ?>"></script>
  <script type="text/javascript" src="<?= assets('plugins/datatables/pdfmake.min.js') ?>"></script>
  <script type="text/javascript" src="<?= assets('plugins/datatables/vfs_fonts.js') ?>"></script>
  <script type="text/javascript" src="<?= assets('plugins/datatables/buttons.html5.min.js') ?>"></script>
  <script type="text/javascript" src="<?= assets('plugins/datatables/buttons.print.min.js') ?>"></script>
  <script type="text/javascript" src="<?= assets('plugins/datatables/buttons.colVis.min.js') ?>"></script>
  <?php endif ?>
  <?php if (isset($select)): ?>
  <script src="<?= assets('plugins/select2/js/select2.full.min.js') ?>"></script>
  <script type="text/javascript"> $('.select2').select2() </script>
  <?php endif ?>
  <script src="<?= assets('plugins/moment/moment.min.js') ?>"></script>
  <?php if (isset($inputmask)): ?>
  <script src="<?= assets('plugins/inputmask/min/jquery.inputmask.bundle.min.js') ?>"></script>
  <script type="text/javascript"> $('[data-mask]').inputmask() </script>
  <?php endif ?>
  <?php if (isset($daterangepicker)): ?>
  <script src="<?= assets('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
  <script>
    $('.date').datetimepicker({
        format: 'L'
    });
  </script>
  <?php endif ?>
  <!-- jQuery UI -->
  <script src="<?= assets('plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
  <!-- Ekko Lightbox -->
  <script src="<?= assets('plugins/ekko-lightbox/ekko-lightbox.min.js') ?>"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });

      if($('.filter-container').length > 0)
        $('.filter-container').filterizr({gutterPixels: 3});

      $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
  </script>
  <script src="<?= assets('dist/js/adminlte.min.js') ?>"></script>
  <script src="<?= assets('plugins/ckeditor/ckeditor.js') ?>"></script>
  <script src="<?= assets('plugins/daterangepicker/daterangepicker.js') ?>"></script>
  <?php $this->load->view(admin('script')) ?>
</body>
</html>