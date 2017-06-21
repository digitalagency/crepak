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

                    <form method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_company_name'); ?></em></label>
                                    <input type="text" class="form-control"
                                           placeholder="<?php echo $this->lang->line('placeholder_company_name'); ?> ..."
                                           required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_country_name'); ?></em></label>
                                    <select class="select small form-control">
                                        <option value="0">United States ...</option>
                                        <option value="1">Nepal</option>
                                        <option value="2">Australia</option>
                                        <option value="3">Japan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_first_name'); ?></em></label>
                                    <input type="text" class="form-control"
                                           placeholder="<?php echo $this->lang->line('placeholder_first_name'); ?> ..."
                                           required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_last_name'); ?></em></label>
                                    <input type="text" class="form-control"
                                           placeholder="<?php echo $this->lang->line('placeholder_last_name'); ?> ..."
                                           required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_email'); ?></em></label>
                                    <input type="text" class="form-control"
                                           placeholder="<?php echo $this->lang->line('placeholder_email'); ?> ..."
                                           required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_phone'); ?></em></label>
                                    <input type="text" class="form-control"
                                           placeholder="<?php echo $this->lang->line('placeholder_phone'); ?> ..."
                                           required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_distributor'); ?></em></label>
                                    <select class="select small form-control">
                                        <option value="0">Distributor</option>
                                        <option value="1">Nepal</option>
                                        <option value="2">Australia</option>
                                        <option value="3">Japan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_subject'); ?></em></label>
                                    <input type="text" class="form-control"
                                           placeholder="<?php echo $this->lang->line('placeholder_subject'); ?> ..."
                                           required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><em><?php echo $this->lang->line('lable_message'); ?></em></label>
                                    <textarea class="form-control" rows="3"
                                              placeholder="<?php echo $this->lang->line('placeholder_message'); ?> ..."></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-default"><?php echo $this->lang->line('button_submit'); ?> <i
                                        class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>