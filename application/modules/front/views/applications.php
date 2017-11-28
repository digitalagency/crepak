<section class="body-bg">
    <div class="container">
        <div class="product-details">
            <div class="related-products text-center">
                <div class="page-title">
                    <h2><?php echo $this->lang->line('application'); ?></h2>

                    <p><?php echo $this->lang->line('application_text'); ?></p>
                </div>
                <div class="row">
                    <?php

                    foreach ($allapplications as $application) {
                        $slug = $application['slug'];
                        if ($language == 'cn') {
                            $title = $application['title_cn'];
                            $excrept = $application['excrept_cn'];
                            if (empty($application['featured_img_cn'])) {
                                $image = $application['featured_img'];
                            } else {
                                $image = $application['featured_img_cn'];
                            }
                        } else {
                            $title = $application['title'];
                            $excrept = $application['excrept'];
                            if (empty($application['featured_img'])) {
                                $image = $application['featured_img_cn'];
                            } else {
                                $image = $application['featured_img'];
                            }
                        }
                        $homeicon = $application['homeicon'];
                        ?>
                        <div class="col-sm-4 col-xs-6">
                            <div class="related-produt-item ">
                                <?php
                                if (!empty($image)) {
                                    $img = base_url() . 'uploads/applications/thumbnail/' . $image;
                                } else {
                                    $img = base_url() . 'scriptscss/images/nopreview.png';
                                }
                                ?>
                                <figure>
                                    <a href="<?php echo base_url() . 'applications/' . $slug; ?>">
                                        <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
                                    </a>
                                </figure>

                                <div class="figcaption">
                                    <h4>
                                        <a href="<?php echo base_url() . 'applications/' . $slug; ?>">
                                            <?php echo $title; ?>
                                        </a>
                                    </h4>

                                    <p><?php echo $excrept; ?></p>
                                    <a class="btn btn-default"
                                       href="<?php echo base_url() . 'applications/' . $slug; ?>"><?php echo $this->lang->line('view_detail'); ?>
                                        <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
