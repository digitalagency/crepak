<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $this->config->item('site_title','ion_auth');?></title>
    <link href="<?php echo base_url(); ?>scriptscss/admin/bootstraps/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <!--File upload-->
      <link href="<?php echo base_url(); ?>scriptscss/admin/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- FontAwesome 4.3.0 -->
<!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->

      <link href="<?php echo base_url(); ?>scriptscss/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!--<link href="--><?php //echo base_url(); ?><!--scriptscss/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
<!-- Ionicons 2.0.0 -->
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo base_url(); ?>scriptscss/admin/dist/css/adminlte.min.css" rel="stylesheet" type="text/css" />
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link href="<?php echo base_url(); ?>scriptscss/admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>scriptscss/admin/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
<!-- iCheck -->
<link href="<?php echo base_url(); ?>scriptscss/admin/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />

<!-- Date Picker -->
<link href="<?php echo base_url(); ?>scriptscss/admin/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />

<!--datatable-->
<link href="<?php echo base_url(); ?>scriptscss/admin/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url(); ?>scriptscss/admin/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>scriptscss/admin/css/style.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>scriptscss/admin/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
      <script src="<?php echo base_url(); ?>scriptscss/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>

      <link rel="shortcut icon" href="<?php echo base_url(); ?>scriptscss/images/fav-icon.png">
  </head>
  <body class="skin-blue sidebar-mini">

<?php
if(!$this->ion_auth->logged_in() ){
  echo '<div class=" ">';
}
else {
  echo '<div class="wrapper">';
}
 ?>
