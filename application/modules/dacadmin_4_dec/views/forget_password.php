<?php $alertmessage = ''; ?>
<div class="login-box">
    <div class="login-logo">
        <b><img src="<?php echo base_url(); ?>scriptscss/images/crepak-logo.png"
                alt="<?php echo $this->config->item('site_title', 'ion_auth'); ?>"></b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Forgot Password</p>
        <?php echo $message; ?>
        <?php echo form_open("dacadmin/forgotpassword"); ?>

        <div class="form-group has-feedback">
            <?php echo form_input($identity); ?>
            <span class="glyphicon glyphicon-envelope  form-control-feedback"></span>
        </div>


        <div class="row">


            <div class="col-xs-4">

                <input name="btnlogin" class="btn btn-block btn-warning" type="submit" id="btnlogin"
                       value="Send Email" onclick="f1.submit();"/>
            </div>
            <!-- /.col -->
            <div class="col-xs-6 pull-right">
                <a class="btn btn-primary btn-block btn-flat" href="<?php echo base_url('dacadmin');?>">Login</a>
            </div>
        </div>
        <?php echo form_close(); ?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
