<html>
<head>
  <title>SI Adm Keuangan | PT. Dua Daya Sakti</title>
  <link rel="stylesheet" href="<?php echo $base_url; ?>dist/css/bootstrap.min.css" id="bootstrap-css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>dist/css/font.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>dist/css/mystyle.css">
  <script src="<?php echo $base_url; ?>bower_components/jquery/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <script src="<?php echo $base_url; ?>dist/ajax/perhitungan.js"></script>
  
  <script type="text/javascript">
    window.setTimeout("waktu()",1000);
    function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()",1000);
        document.getElementById("jam").innerHTML = tanggal.getHours() + ":";
        document.getElementById("menit").innerHTML = tanggal.getMinutes() + ":";
        document.getElementById("detik").innerHTML = tanggal.getSeconds() + "&nbsp";
    }
  </script>

</head>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>SI Adm Keuangan </b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
              <?php $sql2 = mysqli_query ($GLOBALS['db'],"SELECT b.* FROM HEADER a JOIN MENU b on a.id_header=b.id_header join menu_parent c on c.id_menu=b.id_menu where  c.id_parent in (select id_parent from detail_group where id_jabatan = '$_SESSION[id_jabatan]') GROUP BY b.id_menu"); while($qry2 = mysqli_fetch_array($sql2)){ ?>
                <li class="dropdown">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><?php echo $qry2[2]; ?></span></a>
                  <ul class="dropdown-menu" role="menu">
              <?php $sql3 = mysqli_query ($GLOBALS['db'],"SELECT * FROM MENU_PARENT WHERE ID_MENU = $qry2[0] and id_parent_child=0 and id_parent in (select id_parent from detail_group where id_jabatan = '$_SESSION[id_jabatan]' ) "); while($qry3 = mysqli_fetch_array($sql3)){ ?>
                 <li class="<?php echo actived($_GET['page'],$qry3[2]); ?>"><a href="<?php echo $qry3[2]; ?>">
                    <?php echo str_replace("_"," ",$qry3[2]); ?></a>
                  </li>
              <?php } ?>
                  </ul>
                </li>    
              <?php }  ?>
          </ul>
        </div>

      <!-- Sidebar toggle button-->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications Menu -->
          <?php if($_SESSION['jabatan'] == 'Kasir'){ 
          //   require_once('app\views\layout\notifikasi_kasir.php'); 
          // } 
          // if($_SESSION['jabatan'] == 'Sales'){ 
          //   require_once('app\views\layout\notifikasi_sales.php'); 
          // }
          // if($_SESSION['jabatan'] == 'Direktur Keuangan'){ 
          //   require_once('app\views\layout\notifikasi_direktur.php'); 
          // }
          // if($_SESSION['jabatan'] == 'Staff Keuangan'){ 
          //   require_once('app\views\layout\notifikasi_keuangan.php'); 
          // }
          // if($_SESSION['jabatan'] == 'Manajer Marketing'){ 
          //   require_once('app\views\layout\notifikasi_manager.php'); 
          // } ?>

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo $base_url; ?>dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['nama']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo $base_url; ?>dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['nama']; ?>
                  <small><?php echo $_SESSION['jabatan']; ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="app/config/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-clock-o"></i> &nbspTimeline</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php
          if(isset($_GET['page'])){
           echo str_replace("_"," ",$_GET['page']);
          }
        ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Dashboard"><i class="fa fa-home"></i>Home  </a></li>

          <?php
          if(isset($_GET['page'])){
            $page = $_GET['page'];
            $ids=0;
            $sql =  mysqli_query ($GLOBALS['db'],"SELECT A.nama_menu,B.nama_parent,B.id_parent_child FROM MENU A JOIN menu_parent B ON A.id_menu=B.id_menu WHERE B.nama_parent='$page'");
            while($qry = mysqli_fetch_array($sql)){
              $ids=$qry[2];
            }
            if($ids!=0){
              $sql = mysqli_query ($GLOBALS['db'],"SELECT A.nama_menu,B.nama_parent,B.id_parent_child FROM MENU A JOIN menu_parent B ON A.id_menu=B.id_menu WHERE B.id_parent=$ids"); 
              while($qry = mysqli_fetch_array($sql)){
                echo ' > '.$qry[0].' > <a href="'.$qry[1].'" > '.str_replace("_"," ",$qry[1]).'</a>';
              }
            }else{
              $sql = mysqli_query ($GLOBALS['db'],"SELECT A.nama_menu,B.nama_parent FROM MENU A JOIN menu_parent B ON A.id_menu=B.id_menu WHERE B.nama_parent='$page'"); 
              while($qry = mysqli_fetch_array($sql)){
                echo ' > '.$qry[0].' > <a href="'.$_GET['page'].'" > '.str_replace("_"," ",$_GET['page']).'</a>';
              }
            }
            
          }
          if(isset($_GET['act'])){
            echo '&nbsp&nbsp>&nbsp&nbsp'.ucfirst($_GET['act']);
          }
        ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
    <!--php page-->
      <?php
        $page = new Page();
        if(isset($_GET['page'])){
          $page->display_views($_GET['page']);
        }
      ?>
    <!--php page-->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->

    <div class="pull-right hidden-xs">
       
 

    </div>
    &nbsp
    <div class="pull-right" id="detik"></div>
   
    <div class="pull-right" id="menit"></div>
     <div class="pull-right" id="jam"></div>
    
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">PT. Dua Daya Sakti</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Aktivitas Terbaru</h3>
        <ul class="control-sidebar-menu">
          <?php
            // $sql =  mysqli_query ($GLOBALS['db'],"SELECT 'Pemesanan',no_spr, tanggal_pemesanan a from pemesanan where nik = '$_SESSION[nik]' UNION SELECT 'Konsumen',no_ktp, tanggal_tambah a from konsumen where nik = '$_SESSION[nik]' UNION SELECT 'Approve SPR', no_spr, tanggal_approve a from approval where nik = '$_SESSION[nik]' and status_approve = 'Approve' UNION SELECT 'Tolak SPR', no_spr, tanggal_approve a from approval where nik = '$_SESSION[nik]' and status_approve = 'Tolak' order by a desc limit 12");
            // while($qry = mysqli_fetch_array($sql)){
          ?>
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-circle-o bg-red"></i>
              <div class="menu-info">
               <!--  <h4 class="control-sidebar-subheading"><?php \ $qry0]; ?> - <?php  $qry[]; ?></h4> -->
               <!--  <p>Pada Tanggal <?php  $qry[]; ?></p> -->
              </div>
            </a>
          </li>
    <!--     <?php } ?> -->
        </ul>
      </div>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<script src="<?php echo $base_url; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url; ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $base_url; ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo $base_url; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo $base_url; ?>dist/js/adminlte.min.js"></script>

<script src="<?php echo $base_url; ?>bower_components/fastclick/lib/fastclick.js"></script>

<script src="<?php echo $base_url; ?>dist/ajax/ajax.js"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      "order": [1, 'asc'],
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#example3').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#example5').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#example6').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#example7').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#example9').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

</script>
</body>
</html>