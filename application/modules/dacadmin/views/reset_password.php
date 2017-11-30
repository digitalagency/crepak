<?php $alertmessage = ''; ?>
<div class="login-box">
    <div class="login-logo">
        <b><img src="<?php echo base_url(); ?>scriptscss/images/crepak-logo.png"
                alt="<?php echo $this->config->item('site_title', 'ion_auth'); ?>"></b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <?php echo $message; ?>

        <?php echo form_open('dacadmin/reset_password/' . $code);?>
        <div id="about_page" class="loginpage">
            <div class="container">
                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6">
                        <div class="loginwrap">
                            <h2><?php echo lang('reset_password_heading');?></h2>
                            <div id="infoMessage"><?php echo $message;?></div>
                            <div class="form-group">
                                <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
                                <?php echo form_input($new_password ,'',array('class'=>'form-control'));?>
                            </div>
                            <div class="form-group">
                                <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                                <?php echo form_input($new_password_confirm ,'',array('class'=>'form-control'));?>
                            </div>
                            <?php echo form_input($user_id);?>
                            <?php echo form_hidden($csrf); ?>

                            <?php echo form_submit('submit', lang('reset_password_submit_btn'),array('class'=>'btn btn-default'));?>
                            <a href="<?php echo base_url('auth/login')?>">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo form_close();?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
