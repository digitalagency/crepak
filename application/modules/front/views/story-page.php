<section class="body-bg">
    <div class="container">
        <div class="product-details">
            <div class="related-products text-center">
                <div class="page-title">
                    <h2><?php echo $this->lang->line('application');?></h2>
                    <p><?php echo $this->lang->line('application_text');?></p>
                </div>
                <div class="row">
                    <?php

                    foreach($allstories as $story){
                        $slug = $story['slug'];
                        if ($language == 'cn')
                        {
                            $title = $story['title_cn'];
                            $excrept = $story['excrept_cn'];
                            if (empty($story['featured_img_cn'])) {
                                $image = $story['featured_img'];
                            } else {
                                $image = $story['featured_img_cn'];
                            }
                        }
                        else
                        {
                            $title = $story['title'];
                            $excrept = $story['excrept'];
                            if (empty($story['featured_img'])) {
                                $image = $story['featured_img_cn'];
                            } else {
                                $image = $story['featured_img'];
                            }
                        }?>
                        <div class="col-sm-4 col-xs-6">
                            <div class="related-produt-item">
                                <?php
                                if(!empty($image)){?>
                                    <figure>
                                        <img src="<?php echo base_url().'uploads/stories/thumbnail/'.$image; ?>" alt="<?php echo $title;?>">
                                    </figure>
                                <?php }
                                ?>

                                <div class="figcaption">
                                    <h3><?php echo $title;?></h3>
                                    <p><?php echo $excrept;?></p>
                                    <a class="btn btn-default" href="<?php echo base_url().'story/'.$slug; ?>"><?php echo $this->lang->line('view_detail');?>  <i class="fa fa-angle-right"></i></a>
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
