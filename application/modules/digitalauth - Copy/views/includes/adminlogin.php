
</div><!--Wrapper-->
<footer class="login-footer">
    <strong>Copyright &copy; 2015-2017 <a href="<?php echo base_url();?>"><?php echo $this->config->item('site_title','ion_auth');?></a>.</strong> All rights reserved.
</footer>

<script src="<?php echo base_url(); ?>scriptscss/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url(); ?>scriptscss/admin/bootstraps/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>scriptscss/admin/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
