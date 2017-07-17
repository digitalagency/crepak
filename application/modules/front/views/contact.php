<section class="body-bg">
    <div class="container">
        <div class="product-details">
            <div class="contact-wrap">
                <div class="page-title text-center">
                    <h2><?php echo $this->lang->line('contact_us'); ?></h2>
                </div>
                <div class="contact-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.760681304124!2d114.14958771441334!3d22.287053585330437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404007db6b3eeaf%3A0x9548eb9985675274!2sSan+Toi+Building%2C+137-139+Connaught+Rd+Central%2C+Sheung+Wan%2C+Hong+Kong!5e0!3m2!1sen!2snp!4v1496917752276"
                        width="600" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="inquery-form">
                    <h4 class="text-center"><?php echo $this->lang->line('inquiry_form'); ?></h4>
                    <?php if ($this->session->flashdata('success_message') != "") { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('success_message'); ?>
                        </div>
                    <?php }; ?>

                    <form method="post" action="<?php echo base_url() . 'contact' ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_company_name'); ?></em></label>
                                    <input type="text" class="form-control" name="company_name"
                                           placeholder="<?php echo $this->lang->line('placeholder_company_name'); ?> ..."
                                        >
                                    <?php echo form_error('company_name', '<span class="text-danger">', '</span>'); ?>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_country_name'); ?></em></label>
                                    <select class="select small form-control" name="country">
                                        <option value="United States">United States ...</option>
                                        <option value="China">China</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Japan">Japan</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_first_name'); ?></em></label>
                                    <input type="text" class="form-control" name="first_name"
                                           placeholder="<?php echo $this->lang->line('placeholder_first_name'); ?> ..."
                                        >
                                    <?php echo form_error('first_name', '<span class="text-danger">', '</span>'); ?>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_last_name'); ?></em></label>
                                    <input type="text" class="form-control" name="last_name"
                                           placeholder="<?php echo $this->lang->line('placeholder_last_name'); ?> ..."
                                        >
                                    <?php echo form_error('last_name', '<span class="text-danger">', '</span>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_email'); ?></em></label>
                                    <input type="email" class="form-control" name="emailid"
                                           placeholder="<?php echo $this->lang->line('placeholder_email'); ?> ..."
                                        >
                                    <?php echo form_error('emailid', '<span class="text-danger">', '</span>'); ?>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_phone'); ?></em></label>
                                    <input type="text" class="form-control" name="phone_number"
                                           placeholder="<?php echo $this->lang->line('placeholder_phone'); ?> ..."
                                        >
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_subject'); ?></em></label>
                                    <input type="text" class="form-control" name="subject"
                                           placeholder="<?php echo $this->lang->line('placeholder_subject'); ?> ..."
                                        >
                                    <?php echo form_error('subject', '<span class="text-danger">', '</span>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_message'); ?></em></label>
                                    <textarea class="form-control" rows="3" name="message"
                                              placeholder="<?php echo $this->lang->line('placeholder_message'); ?> ..."></textarea>
                                    <?php echo form_error('message', '<span class="text-danger">', '</span>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">

                                <button class="btn btn-default"
                                        name="contact_submit"><?php echo $this->lang->line('button_submit'); ?> <i
                                        class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>