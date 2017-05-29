<?php $alertmessage = ''; ?>
<div class="login-box">
    <div class="login-logo">
        <b><img src="<?php echo base_url(); ?>scriptscss/images/crepak-logo.png"
                alt="<?php echo $this->config->item('site_title', 'ion_auth'); ?>"></b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <?php echo $message; ?>
        <?php echo form_open("admin/login"); ?>
        <div class="form-group has-feedback">
            <?php echo form_input($identity); ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php echo form_input($password); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="checkbox icheck">
            <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                <?php echo form_checkbox('remember', '1', isset($_COOKIE['identity']) ? TRUE : FALSE, 'id="remember"'); ?>
            </div>
            Remember Me
        </div>
        <div class="row">

            <div class="col-xs-4">

                <input name="btnlogin" class="btn btn-primary btn-block btn-flat" type="submit" id="btnlogin"
                       value="Login" onclick="f1.submit();"/>
            </div>
            <!-- /.col -->
        </div>
        <?php echo form_close(); ?>
        <a href="#">I forgot my password</a>
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
