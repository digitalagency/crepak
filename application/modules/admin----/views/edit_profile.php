<?php
foreach($userData as $user){
    $username   =    $user['username'];
    $firstName  =    $user['first_name'];
    $lastName   =    $user['last_name'];
    $email      =    $user['email'];
}

?>
<!-- breadcrumb -->
<section class="content-header">

    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Profile</li>
    </ol>
</section>
<!-- breadcrumb -->

<!-- Main content -->
<section class="content">
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-info'>
                <div class='box-header'>
                    <h3 class='box-title'>Edit Profile</h3>
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                    <?php if ($this->session->flashdata('success_message') != "") { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('success_message'); ?>
                        </div>
                    <?php } ;?>
                    <?php if ($this->session->flashdata('error_message') != "") { ?>
                        <div class="alert alert-danger alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('error_message'); ?>
                        </div>
                    <?php } ;?>

                    <form role="form" method="post" class="form-horizontal" action="<?php echo base_url('admin/editprofile');?>" enctype="multipart/form-data">
                        <div class="box-body">

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="title">Username*</label>
                                    <input type="text" class="form-control" name="username" placeholder="User Name"  value="<?php echo $username;?>" disabled>
                                    <?php //echo form_error('username','<span class="error-message">','</span>');?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="title">First Name*</label>
                                    <input type="text" class="form-control" name="fname" placeholder="<?php echo lang('create_user_validation_fname_label', ''); ?>"  value="<?php echo $firstName;?>">
                                    <?php echo form_error('fname','<span class="error-message">','</span>');?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="title">Last Name*</label>
                                    <input type="text" class="form-control" name="lname" placeholder="<?php echo lang('create_user_validation_lname_label', ''); ?>"  value="<?php echo $lastName;?>">
                                    <?php echo form_error('lname','<span class="error-message">','</span>');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="title">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="<?php echo lang('create_user_validation_email_label', ''); ?>"  value="<?php echo $email;?>" disabled>

                                    <?php //echo form_error('email','<span class="error-message">','</span>');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="title">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="<?php echo lang('create_user_validation_password_label', ''); ?>"  value="">
                                    <small>Leave blank if you don't want to change password</small><br>
                                    <?php echo form_error('password','<span class="error-message">','</span>');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="title">Retype Password</label>
                                    <input type="password" class="form-control" name="password_confirm" placeholder="<?php echo lang('create_user_validation_password_confirm_label', ''); ?>"  value="">
                                    <small>Leave blank if you don't want to change password</small></br>
                                    <?php echo form_error('password_confirm','<span class="error-message">','</span>');?>
                                </div>
                            </div>




                            <div class="form-group">

                                <div class="col-sm-4">
                                    <input name="btnDo" type="submit" value="Edit" class="btn btn-primary" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div><!-- /.box -->

        </div><!-- /.col-->
    </div>

</section>

<!-- Main content -->
