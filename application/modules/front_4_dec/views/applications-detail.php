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
                <?php
                if (!empty($image)) {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-img">
                                <figure><img src="<?php echo base_url() . 'uploads/applications/' . $image; ?>"
                                             alt="<?php echo $title; ?>"></figure>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-info">
                            <h3><?php echo $title; ?></h3>
                        </div>

                    </div>
                </div>
            </div>

            <div class="product-details-tab">
                <div class="tab-wrap">
                    <div id="description" class="article-details">
                        <?php
                        echo $content;
                        ?>
                    </div>

                    <?php
                    if ($galcount > 0) {
                        ?>
                        <div id="relatedgallery" class="article-details">
                            <h4>Gallery</h4>
                            <ul class="related">
                                <?php
                                foreach ($galleryImg as $gImg) {
                                    $galImage = $gImg['image']; ?>
                                    <li>
                                        <a href="<?php echo base_url() . 'uploads/' . $galfile . '/' . $galImage; ?>"
                                           class="appgallery" data-fancybox-group="<?php echo $galfile; ?>">
                                            <img
                                                src="<?php echo base_url() . 'uploads/' . $galfile . '/thumbnail/' . $galImage; ?>"
                                                alt="">
                                        </a>
                                    </li>
                                <?php }
                                ?>
                            </ul>
                        </div>
                    <?php }
                    if ($apprelatedproduct) {
                        ?>
                        <div id="relatedproduct" class="article-details">
                            <h4>Crepak tag solution for <?php echo $title ?></h4>
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
                                                        <span><?php echo $productTitle; ?></span>
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
                    if ($apprelatedstory) {
                        ?>
                        <div id="relatedstory" class="article-details">
                            <h4>Successful story</h4>

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
                                                        <span><?php echo $storyTitle; ?></span>
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
                    ?>
                </div>
            </div>

            <div class="related-products text-center">
                <div class="page-title">
                    <h2><?php echo $this->lang->line('related_application'); ?></h2>
                </div>
                <div class="row">
                    <?php
                    foreach ($relatedApplications as $relapp) {
                        $relappslug = $relapp['slug'];
                        if ($language == 'cn') {
                            $relapptitle = $relapp['title_cn'];
                            $relappexcrept = $relapp['excrept_cn'];
                            if (empty($relapp['featured_img_cn'])) {
                                $relappimage = $relapp['featured_img'];
                            } else {
                                $relappimage = $relapp['featured_img_cn'];
                            }
                        } else {
                            $relapptitle = $relapp['title'];
                            $relappexcrept = $relapp['excrept'];
                            if (empty($relapp['featured_img'])) {
                                $relappimage = $relapp['featured_img_cn'];
                            } else {
                                $relappimage = $relapp['featured_img'];
                            }
                        }
                        $homeicon = $relapp['homeicon'];
                        ?>
                        <div class="col-sm-3 col-xs-3">
                            <div class="application-item">
                                <?php
                                /*if(!empty($homeicon)){
                                    $img = base_url().'uploads/applications/thumbnail/'.$homeicon;
                                }
                                else*/if(!empty($relappimage)){
                                    $img = base_url().'uploads/applications/thumbnail/'.$relappimage;
                                }
                                else{
                                    $img = base_url().'scriptscss/images/nopreview.png';
                                }
                                    ?>
                                    <figure>
                                        <a href="<?php echo base_url() . 'applications/' . $relappslug; ?>">
                                        <img src="<?php echo $img; ?>"
                                            alt="<?php echo $relapptitle; ?>">
                                            </a>
                                    </figure>
                                <?php
                                ?>

                                <div class="figcaption">
                                    <h3>
                                        <a href="<?php echo base_url() . 'applications/' . $relappslug; ?>">
                                            <?php echo $relapptitle; ?>
                                        </a>
                                    </h3>
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
