 <?php
 ob_start();
 $base_url = 'http://localhost/ujikompetensi/';
$GLOBALS['base'] = 'http://localhost/ujikompetensi/';
?>
  <link rel="stylesheet" href="<?php echo $base_url; ?>dist/css/bootstrap.min.css" id="bootstrap-css">
<?php


if(isset($_GET['file'])){
 require_once('app/views/report/'.$_GET['file'].'.php');
}

?>

<script src="<?php echo $base_url; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

