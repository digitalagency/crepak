</div><!--content-wrapper-->
<footer class="main-footer">
        <strong>Copyright &copy; 2015-2017 <a href="<?php echo base_url();?>"><?php echo $this->config->item('site_title','ion_auth');?></a>.</strong> All rights reserved.
      </footer>
<div/><!--Wrapper-->

<!-- jQuery 2.1.4 -->


<!-- jQuery UI 1.11.2 -->
<!--<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>-->
<script src="<?php echo base_url(); ?>scriptscss/admin/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!--File upload-->
<script src="<?php echo base_url(); ?>scriptscss/admin/js/fileinput.min.js"></script>

<!-- Bootstrap 3.3.2 JS -->

<script src="<?php echo base_url(); ?>scriptscss/admin/bootstraps/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>scriptscss/admin/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>scriptscss/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>scriptscss/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>scriptscss/admin/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>scriptscss/admin/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>scriptscss/admin/dist/js/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>scriptscss/admin/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>scriptscss/admin/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>scriptscss/admin/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!--world map and report-->
<script src="<?php echo base_url(); ?>scriptscss/admin/plugins/chartjs/Chart.min.js" type="text/javascript"></script>
<!--<script src="<?php /*echo base_url(); */?>scriptscss/admin/dist/js/pages/dashboard2.js" type="text/javascript"></script>-->
<!--world map and report-->

<script src="//cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>
        <script type="text/javascript">
            $(function () {
                $("#tablelist").dataTable();
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
            });
        jQuery(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
//        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
//        $(".textarea").wysihtml5();


          CKEDITOR.replace( 'editor1', {
              height: 300,
              filebrowserBrowseUrl :'<?php echo base_url() ?>ckeditor/filemanager/browser/default/browser.html',
              filebrowserImageBrowseUrl : '<?php echo base_url() ?>ckeditor/filemanager/browser/default/browser.html?Type=Image',
              filebrowserFlashBrowseUrl :'<?php echo base_url() ?>ckeditor/filemanager/browser/default/browser.html?Type=Flash',
              filebrowserUploadUrl  :'<?php echo base_url() ?>ckeditor/filemanager/connectors/php/upload.php?Type=File',
              filebrowserImageUploadUrl : '<?php echo base_url() ?>ckeditor/filemanager/connectors/php/upload.php?Type=Image',
              filebrowserFlashUploadUrl : '<?php echo base_url() ?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
          } );

            CKEDITOR.replace( 'editor2', {
                height: 300,
                filebrowserBrowseUrl :'<?php echo base_url() ?>ckeditor/filemanager/browser/default/browser.html',
                filebrowserImageBrowseUrl : '<?php echo base_url() ?>ckeditor/filemanager/browser/default/browser.html?Type=Image',
                filebrowserFlashBrowseUrl :'<?php echo base_url() ?>ckeditor/filemanager/browser/default/browser.html?Type=Flash',
                filebrowserUploadUrl  :'<?php echo base_url() ?>ckeditor/filemanager/connectors/php/upload.php?Type=File',
                filebrowserImageUploadUrl : '<?php echo base_url() ?>ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                filebrowserFlashUploadUrl : '<?php echo base_url() ?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
            } );
            CKEDITOR.replace( 'editor3', {});
            CKEDITOR.replace( 'editor4', {});

      });
    </script>
