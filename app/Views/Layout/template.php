<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title?></title>
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link href="<?= base_url() ?>assets/backend/vendors/sweetalert2/sweetalert2.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/backend/vendors/sweetalert2/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/toastr/toastr.min.css">
  
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav style="background-color:RGB(40, 178, 170);" class="main-header navbar navbar-expand navbar-light navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <!-- <a href="" style="color: RGB(245, 245, 245);" class="nav-link"> Point Of sale Build(codeigniter 4)</a> -->
          <a href="" style="color: RGB(245, 245, 245);" class="nav-link"> Branch <?php 
              $brach = session()->get('groupBranch');
               if ($brach == 'C') {
                   echo 'Cikupa';
               }elseif ($brach == 'B') {
                echo 'Balaraja';
               }else {
                echo 'HO';
               }
           ?></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside style="background-color:RGB(40, 178, 170);" class="main-sidebar sidebar-light elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <img src="<?= base_url() ?>assets/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image">
        <span style="color: RGB(245, 245, 245); font-style: bold;" class="brand-text font-weight-dark">Local Order</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
          <img src="<?= base_url() ?>assets/backend/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a style="color: RGB(245, 245, 245);" href="" class="d-block">| <i class="fa fa-user"> <?= session()->get('UserName');?> </i></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <?= $this->include('layout/navbar')?>
            </ul>
          </li>
        </ul>
      </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <script src="<?= base_url() ?>assets/backend/plugins/jquery/jquery.min.js"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?= $this->renderSection('content') ?>
      <!-- Main content -->
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.0.0
      </div>
      <strong>Copyright &copy; 2024 <a class="text-info" href="">CI 4</a>.</strong> All rights reserved.
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/backend/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>assets/backend/dist/js/demo.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/vendors/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/select2/js/select2.full.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/toastr/toastr.min.js"></script>
  <!-- Page specific script -->

  <script>
    function _0x4dea(_0x57e5ac,_0x12548f){var _0x6cb2ec=_0x6cb2();
    return _0x4dea=function(_0x4dea21,_0x46fc46){_0x4dea21=_0x4dea21-0xf8;
    var _0x45b490=_0x6cb2ec[_0x4dea21];return _0x45b490;},_0x4dea(_0x57e5ac,_0x12548f);}
    var _0x9ac837=_0x4dea;function _0x6cb2(){
    var _0x41a00a=['1516110ujLdtP','fire','2956196IAzsgp','data','48OKHAnP','2021142WXMqYf','success','flash','40238nWVRMm','11162669tmmUeH','1654743OaHgpz','#flash','18580864uCezwF'];_0x6cb2=function(){return _0x41a00a;};return _0x6cb2();}
    (function(_0x1590f9,_0x3afcf0){
    var _0x259951=_0x4dea,_0x1176de=_0x1590f9();while(!![]){try{
    var _0x216213=parseInt(_0x259951(0x100))/0x1*(parseInt(_0x259951(0x104))/0x2)+parseInt(_0x259951(0xf9))/0x3+-parseInt(_0x259951(0xfe))/0x4+-parseInt(_0x259951(0xfc))/0x5+-parseInt(_0x259951(0x101))/0x6+-parseInt(_0x259951(0xf8))/0x7+parseInt(_0x259951(0xfb))/0x8;
    if(_0x216213===_0x3afcf0)break;else _0x1176de['push'](_0x1176de['shift']());}
    catch(_0x91520b){_0x1176de['push'](_0x1176de['shift']());}}}(_0x6cb2,0xd373a));
    var flash=$(_0x9ac837(0xfa))[_0x9ac837(0xff)](_0x9ac837(0x103));flash&&Swal[_0x9ac837(0xfd)]({'icon':_0x9ac837(0x102),'title':_0x9ac837(0x102),'text':flash});
 </script>
 <script>
   var _0x444dfe=_0x55c7;function _0x55c7(_0x140575,_0x3b4116){var _0x1d03d1=_0x1d03();return _0x55c7=function(_0x55c7e5,_0x411261){_0x55c7e5=_0x55c7e5-0xd2;var _0x222ad8=_0x1d03d1[_0x55c7e5];return _0x222ad8;},_0x55c7(_0x140575,_0x3b4116);}(function(_0x471389,_0x1d9d02){var _0x19ad76=_0x55c7,_0x56ca94=_0x471389();while(!![]){try{var _0x192a70=-parseInt(_0x19ad76(0xd2))/0x1+-parseInt(_0x19ad76(0xd5))/0x2*(parseInt(_0x19ad76(0xd7))/0x3)+-parseInt(_0x19ad76(0xe0))/0x4*(parseInt(_0x19ad76(0xd4))/0x5)+-parseInt(_0x19ad76(0xdf))/0x6*(-parseInt(_0x19ad76(0xd6))/0x7)+parseInt(_0x19ad76(0xdb))/0x8*(-parseInt(_0x19ad76(0xd8))/0x9)+parseInt(_0x19ad76(0xdc))/0xa+-parseInt(_0x19ad76(0xdd))/0xb*(-parseInt(_0x19ad76(0xe1))/0xc);if(_0x192a70===_0x1d9d02)break;else _0x56ca94['push'](_0x56ca94['shift']());}catch(_0x3efd91){_0x56ca94['push'](_0x56ca94['shift']());}}}(_0x1d03,0xc26a5));var flasher=$('#flasher')[_0x444dfe(0xda)](_0x444dfe(0xd9));function _0x1d03(){var _0x4f9a02=['error','6Phcrah','71848vQPtQh','4836BdRvNC','1437893IpLtcp','fire','440UWgREI','1840450LKntDb','6499486iLGPBH','3QfosvC','741411NeqZxj','flasher','data','32rIljtt','10717050xCKtpU','83644uQLDbR'];_0x1d03=function(){return _0x4f9a02;};return _0x1d03();}flasher&&Swal[_0x444dfe(0xd3)]({'icon':_0x444dfe(0xde),'title':_0x444dfe(0xde),'text':flash});
 </script>
 <script>
  var _0x34d160=_0x4c0f;(function(_0x2b81c6,_0x15f200){var _0x5ba91a=_0x4c0f,_0x2e817d=_0x2b81c6();while(!![]){try{var _0x29e17b=-parseInt(_0x5ba91a(0x191))/0x1+parseInt(_0x5ba91a(0x187))/0x2+-parseInt(_0x5ba91a(0x18d))/0x3+parseInt(_0x5ba91a(0x193))/0x4*(parseInt(_0x5ba91a(0x184))/0x5)+-parseInt(_0x5ba91a(0x181))/0x6*(parseInt(_0x5ba91a(0x183))/0x7)+-parseInt(_0x5ba91a(0x17e))/0x8*(-parseInt(_0x5ba91a(0x18e))/0x9)+-parseInt(_0x5ba91a(0x18a))/0xa*(-parseInt(_0x5ba91a(0x182))/0xb);if(_0x29e17b===_0x15f200)break;else _0x2e817d['push'](_0x2e817d['shift']());}catch(_0x4357e3){_0x2e817d['push'](_0x2e817d['shift']());}}}(_0x84cc,0x734e4),$(document)['on'](_0x34d160(0x188),_0x34d160(0x18b),function(_0x3cf93a){var _0x6bf211=_0x34d160;_0x3cf93a[_0x6bf211(0x17c)]();var _0x57ffb2=$(this)[_0x6bf211(0x190)](_0x6bf211(0x18f));Swal[_0x6bf211(0x192)]({'title':_0x6bf211(0x18c),'text':_0x6bf211(0x186),'icon':'info','showCancelButton':!![],'confirmButtonColor':_0x6bf211(0x180),'cancelButtonColor':_0x6bf211(0x17b),'confirmButtonText':_0x6bf211(0x185)})[_0x6bf211(0x17d)](_0x41b7ef=>{var _0x4b3641=_0x6bf211;_0x41b7ef[_0x4b3641(0x189)]&&(window[_0x4b3641(0x17f)]=_0x57ffb2);});}));function _0x4c0f(_0x417c0c,_0x2ac620){var _0x84ccf5=_0x84cc();return _0x4c0f=function(_0x4c0f5b,_0x20d93e){_0x4c0f5b=_0x4c0f5b-0x17b;var _0x3df323=_0x84ccf5[_0x4c0f5b];return _0x3df323;},_0x4c0f(_0x417c0c,_0x2ac620);}function _0x84cc(){var _0x4fc391=['252762tgxsTZ','99gzBvrs','56FAyLTk','2228605xLQMFI','Ya,\x20Hapus!','Data\x20Akan\x20Dihapus!','1638978HdPFyw','click','isConfirmed','648770bxParF','#btn-hapus','Apakah\x20Anda\x20yakin?','2209455sIYkcF','27UppoSb','href','attr','903562tiANSY','fire','4vTqpaq','#d33','preventDefault','then','1600672Szxlyf','location','#3085d6'];_0x84cc=function(){return _0x4fc391;};return _0x84cc();}
 </script>
<script>
function _0x7b77(){var _0x1bad66=['Ya,\x20Logout!','Akan\x20Logout!','91vVEDoC','click','info','316716zVVlsi','3294156DaRkPA','then','isConfirmed','preventDefault','92981qmglJZ','attr','882930VysPxm','58468osJDfu','#3085d6','60rUPBxD','6nsTxsK','761849qQtXLw','#btn-keluar','55cIEEym','223164qXLiGp','#d33','Apakah\x20Anda\x20yakin?','href','64AcFIOR'];_0x7b77=function(){return _0x1bad66;};return _0x7b77();}function _0x19ec(_0x3d405e,_0x2de86f){var _0x7b774b=_0x7b77();return _0x19ec=function(_0x19ec9e,_0x1520f1){_0x19ec9e=_0x19ec9e-0x93;var _0x4b6c5f=_0x7b774b[_0x19ec9e];return _0x4b6c5f;},_0x19ec(_0x3d405e,_0x2de86f);}var _0x8b93f2=_0x19ec;(function(_0x3d4be7,_0x38439c){var _0x6707e=_0x19ec,_0x3953df=_0x3d4be7();while(!![]){try{var _0x366897=-parseInt(_0x6707e(0x9e))/0x1*(parseInt(_0x6707e(0xa4))/0x2)+parseInt(_0x6707e(0xa0))/0x3+-parseInt(_0x6707e(0xa1))/0x4*(-parseInt(_0x6707e(0xa7))/0x5)+parseInt(_0x6707e(0x99))/0x6*(-parseInt(_0x6707e(0x96))/0x7)+-parseInt(_0x6707e(0x93))/0x8*(-parseInt(_0x6707e(0xa8))/0x9)+-parseInt(_0x6707e(0xa3))/0xa*(-parseInt(_0x6707e(0xa5))/0xb)+parseInt(_0x6707e(0x9a))/0xc;if(_0x366897===_0x38439c)break;else _0x3953df['push'](_0x3953df['shift']());}catch(_0x4fec08){_0x3953df['push'](_0x3953df['shift']());}}}(_0x7b77,0x5c603),$(document)['on'](_0x8b93f2(0x97),_0x8b93f2(0xa6),function(_0x5e02f4){var _0x75c471=_0x8b93f2;_0x5e02f4[_0x75c471(0x9d)]();var _0x6d760c=$(this)[_0x75c471(0x9f)](_0x75c471(0xab));Swal['fire']({'title':_0x75c471(0xaa),'text':_0x75c471(0x95),'icon':_0x75c471(0x98),'showCancelButton':!![],'confirmButtonColor':_0x75c471(0xa2),'cancelButtonColor':_0x75c471(0xa9),'confirmButtonText':_0x75c471(0x94)})[_0x75c471(0x9b)](_0xee457b=>{var _0x4e9b23=_0x75c471;_0xee457b[_0x4e9b23(0x9c)]&&(window['location']=_0x6d760c);});}));
</script>
<script>
    /** add active class and stay opened when selected */
    var url = window.location;
    // for sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function() {
      return this.href == url;
    }).addClass('active');
    // for treeview
    $('ul.nav-treeview a').filter(function() {
      return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');

    document.addEventListener('keydown', function(e) {
    if (e.keyCode === 123 || (e.ctrlKey && e.shiftKey && e.keyCode === 73) || (e.ctrlKey && e.shiftKey && e.keyCode === 74)) {
        e.preventDefault();
    }
});
  </script>
</body>

</html>