<?php
foreach ($applicationdetail as $application) {
    $galfile = $application['slug'];
    if ($language == 'cn') {
        $title = $application['title_cn'];
        $content = $application['content_cn'];
        $excrept = $application['excrept_cn'];
        //$featured_img = $detail['featured_img_cn'];
        if (empty($application['featured_img_cn'])) {
            $image = $application['featured_img'];
        } else {
            $image = $application['featured_img_cn'];
        }
    } else {
        $title = $application['title'];
        $content = $application['content'];
        $excrept = $application['excrept'];
        //$featured_img = $detail['featured_img'];
        if (empty($application['featured_img'])) {
            $image = $application['featured_img_cn'];
        } else {
            $image = $application['featured_img'];
        }
    }
}
?>

<section class="body-bg">
    <div class="container">
        <div class="product-details">
            <div class="top-details">
                <div class="row">


                    <?php
                    if (!empty($image)) {
                        ?>
                        <div class="col-md-5">
                            <div class="product-img">
                                <figure><img src="<?php echo base_url() . 'uploads/applications/' . $image; ?>"
                                             alt="<?php echo $title; ?>"></figure>
                            </div>
                        </div>
                    <?php } ?>


                    <div class="col-md-7">
                        <div class="product-info">
                            <h3><?php echo $title; ?></h3>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="product-info-left">
                                        <?php echo $excrept; ?>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="download-pdf">
                                        <div class="pdf-share">
                                            <h4>Share On:</h4>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                                <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-details-tab">
                <div class="tab-wrap">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab"
                                              href="#description"><?php echo $this->lang->line('description'); ?></a>
                        </li>

                        <!--<li><a data-toggle="tab"
                               href="#menu1"><?php /*echo $this->lang->line('additional_information'); */ ?></a></li>-->

                        <!--<li><a data-toggle="tab" href="#review"><?php /*echo $this->lang->line('review'); */?></a></li>-->
                        <?php
                        if ($apprelatedstory) {
                            ?>
                            <li><a data-toggle="tab" href="#relatedstory"><?php echo $this->lang->line('related_stories');?></a></li>
                        <?php }
                        if ($apprelatedproduct) {
                            ?>
                            <li><a data-toggle="tab" href="#relatedproduct"><?php echo $this->lang->line('related_products');?></a></li>
                        <?php }
                        if($galcount>0){?>
                            <li><a data-toggle="tab" href="#relatedgallery"><?php echo $this->lang->line('gallery');?></a></li>
                        <?php }
                        ?>
                    </ul>

                    <div class="tab-content">
                        <div id="description" class="tab-pane fade in active">
                            <?php
                            echo $content;
                            ?>
                        </div>

                        <div id="review" class="tab-pane fade">
                            <h3>Review</h3>

                            <p>Some content in menu 2.</p>
                        </div>

                        <?php
                        if ($apprelatedstory) {
                            ?>
                            <div id="relatedstory" class="tab-pane fade">
                                <ul class="related">
                                    <?php
                                    foreach ($apprelatedstory as $relatedstory) {
                                        $storyIds = unserialize($relatedstory['post_meta_value']);
                                        foreach ($storyIds as $sid) {
                                            $getstory = $this->mymodel->get('tbl_post', '*', 'post_type = "story" and id = ' . $sid);
                                            foreach ($getstory as $story) {
                                                $storyslug = $story['slug'];
                                                if ($language == 'cn') {

                                                    if (empty($story['title_cn'])) {
                                                        $storyTitle = $story['title'];
                                                    } else {
                                                        $storyTitle = $story['title_cn'];
                                                    }
                                                    if (empty($story['featured_img_cn'])) {
                                                        $storyimage = $story['featured_img'];
                                                    } else {
                                                        $storyimage = $story['featured_img_cn'];
                                                    }
                                                } else {

                                                    if (empty($story['title'])) {
                                                        $storyTitle = $story['title_cn'];
                                                    } else {
                                                        $storyTitle = $story['title'];
                                                    }
                                                    if (empty($story['featured_img'])) {
                                                        $storyimage = $story['featured_img_cn'];
                                                    } else {
                                                        $storyimage = $story['featured_img'];
                                                    }
                                                } ?>

                                                <li>
                                                    <?php
                                                    if (!empty($storyimage)) {
                                                        ?>
                                                        <a href="<?php echo base_url() . 'story/' . $storyslug ?>">
                                                            <img
                                                                src="<?php echo base_url() . 'uploads/stories/thumbnail/' . $storyimage ?>"
                                                                alt="<?php echo $storyTitle; ?>">
                                                        </a>
                                                    <?php } else {
                                                        ?>
                                                        <a href="<?php echo base_url() . 'story/' . $storyslug ?>">
                                                            <?php echo $storyTitle; ?>
                                                        </a>
                                                    <?php }

                                                    ?>
                                                </li>

                                            <?php }
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        <?php }
                        if ($apprelatedproduct) {
                            ?>
                            <div id="relatedproduct" class="tab-pane fade">
                                <ul class="related">
                                    <?php
                                    foreach ($apprelatedproduct as $relatedproduct) {
                                        $productIds = unserialize($relatedproduct['post_meta_value']);
                                        foreach ($productIds as $pid) {
                                            $getproduct = $this->mymodel->get('tbl_post', '*', 'post_type = "product" and id = ' . $pid);
                                            foreach ($getproduct as $product) {
                                                $productslug = $product['slug'];
                                                if ($language == 'cn') {

                                                    if (empty($product['title_cn'])) {
                                                        $productTitle = $product['title'];
                                                    } else {
                                                        $productTitle = $product['title_cn'];
                                                    }
                                                    if (empty($product['featured_img_cn'])) {
                                                        $productimage = $product['featured_img'];
                                                    } else {
                                                        $productimage = $product['featured_img_cn'];
                                                    }
                                                } else {

                                                    if (empty($product['title'])) {
                                                        $productTitle = $product['title_cn'];
                                                    } else {
                                                        $productTitle = $product['title'];
                                                    }
                                                    if (empty($product['featured_img'])) {
                                                        $productimage = $product['featured_img_cn'];
                                                    } else {
                                                        $productimage = $product['featured_img'];
                                                    }
                                                } ?>

                                                <li>
                                                    <?php
                                                    if (!empty($productimage)) {
                                                        ?>
                                                        <a href="<?php echo base_url() . 'product/' . $productslug ?>">
                                                            <img
                                                                src="<?php echo base_url() . 'uploads/products/thumbnail/' . $productimage ?>"
                                                                alt="<?php echo $productTitle; ?>">
                                                        </a>
                                                    <?php } else {
                                                        ?>
                                                        <a href="<?php echo base_url() . 'product/' . $productslug ?>">
                                                            <?php echo $productTitle; ?>
                                                        </a>
                                                    <?php }

                                                    ?>
                                                </li>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        <?php }
                        if($galcount>0){
                        ?>
                            <div id="relatedgallery" class="tab-pane fade">
                                <ul class="related">
                                <?php
                                foreach($galleryImg as $gImg)
                                {
                                    $galImage = $gImg['image'];?>
                                    <li>
                                        <a href="<?php echo base_url() . 'uploads/'.$galfile.'/'.$galImage; ?>" class="appgallery" data-fancybox-group="<?php echo $galfile;?>" >
                                            <img src="<?php echo base_url() . 'uploads/'.$galfile.'/thumbnail/'.$galImage; ?>" alt="">
                                        </a>
                                    </li>
                                <?php }
                                ?>
                                </ul>
                            </div>
                        <?php }?>

                    </div>
                </div>
            </div>


            <div class="related-products text-center">
                <div class="page-title">
                    <h2><?php echo $this->lang->line('related_application'); ?></h2>
                </div>
                <div class="row">
                    <?php
                        foreach($relatedApplications as $relapp){
                            $relappslug = $relapp['slug'];
                            if ($language == 'cn')
                            {
                                $relapptitle = $relapp['title_cn'];
                                $relappexcrept = $relapp['excrept_cn'];
                                if (empty($relapp['featured_img_cn'])) {
                                    $relappimage = $relapp['featured_img'];
                                } else {
                                    $relappimage = $relapp['featured_img_cn'];
                                }
                            }
                            else
                            {
                                $relapptitle = $relapp['title'];
                                $relappexcrept = $relapp['excrept'];
                                if (empty($relapp['featured_img'])) {
                                    $relappimage = $relapp['featured_img_cn'];
                                } else {
                                    $relappimage = $relapp['featured_img'];
                                }
                            }?>
                            <div class="col-sm-4 col-xs-6">
                                <div class="related-produt-item">
                                    <?php
                                    if(!empty($relappimage)){?>
                                        <figure>
                                            <img src="<?php echo base_url().'uploads/applications/thumbnail/'.$relappimage; ?>" alt="<?php echo $relapptitle;?>">
                                        </figure>
                                    <?php }
                                    ?>

                                    <div class="figcaption">
                                        <h3><?php echo $relapptitle;?></h3>

                                        <?php echo $excrept;?>
                                        <a class="btn btn-default" href="<?php echo base_url().'applications/'.$relappslug; ?>"><?php echo $this->lang->line('view_detail');?>  <i class="fa fa-angle-right"></i></a>
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
