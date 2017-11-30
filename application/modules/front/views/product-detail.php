<?php
foreach ($prodDetail as $product) {
    $galfile = $product['slug'];
    $pid = $product['id'];
    //$galfile = $application['slug'];
    if ($language == 'cn') {
        $title = $product['title_cn'];
        $content = $product['content_cn'];
        $excrept = $product['excrept_cn'];
        //$featured_img = $detail['featured_img_cn'];
        if (empty($product['featured_img_cn'])) {
            $image = $product['featured_img'];
        } else {
            $image = $product['featured_img_cn'];
        }
        $benifit = $product['benifit_cn'];
    } else {
        $title = $product['title'];
        $content = $product['content'];
        $excrept = $product['excrept'];
        //$featured_img = $detail['featured_img'];
        if (empty($product['featured_img'])) {
            $image = $product['featured_img_cn'];
        } else {
            $image = $product['featured_img'];
        }
        $benifit = $product['benifit'];
    }
    $keywords = $product['keywords'];

}
if ($cnfilecount > 0) {
    $cnfilevalue = $this->mymodel->get('tbl_postmeta', '*', 'post_id = ' . $pid . ' and post_meta_key = "product_file_cn"');
    foreach ($cnfilevalue as $cnvalue) {
        $cnfile = $cnvalue['post_meta_value'];
    }
}

if ($filecount > 0) {
    $filevalue = $this->mymodel->get('tbl_postmeta', '*', 'post_id = ' . $pid . ' and post_meta_key = "product_file"');
    foreach ($filevalue as $value) {
        $file = $value['post_meta_value'];
    }
}
?>

<section class="body-bg">
    <div class="container">
        <div class="product-details">
            <div class="top-details">

                <div class="row">
                    <div class="col-md-12">
                        <div class="product-info row">
                            <div class="col-md-8">
                                <h3 class="prodtitle"><?php echo $title; ?></h3>
                            </div>
                            <div class="col-md-4">
                                <div class="pdf-share">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($keywords)) { ?>
                            <div class="product-info row">
                                <div class="col-md-12 product-keywords">
                                    <?php echo $keywords ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="product-details-tab">
                <div class="tab-wrap">
                    <div id="description" class="article-details">
                        <div class="row">
                            <div class="col-md-7">
                                <?php echo $content; ?>
                                <?php
                                if (!empty($benifit)) {
                                    ?>
                                    <h4>Features & Benifit</h4>
                                    <?php
                                    echo $benifit;
                                }
                                ?>
                            </div>
                            <?php
                            if (!empty($image)) {
                                ?>

                                <div class="col-md-5">
                                    <div class="product-img">
                                        <figure><img src="<?php echo base_url() . 'uploads/products/' . $image; ?>"
                                                     alt="<?php echo $title; ?>"></figure>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
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
                    if ($language == 'cn') {
                        if ($cnfilecount > 0) {
                            ?>
                            <div id="review" class="article-details">
                                <a href="<?php echo base_url() . 'download/' . $cnfile; ?>" class="btn btn-default">
                                    <?php echo $download = $this->lang->line('download_file'); ?>
                                </a>
                            </div>
                        <?php }
                    } else {
                        if ($filecount > 0) {
                            ?>
                            <div id="review" class="article-details">
                                <a href="<?php echo base_url() . 'download/' . $file; ?>" class="btn btn-default">
                                    <?php echo $download = $this->lang->line('download_file'); ?>
                                </a>
                            </div>
                        <?php }
                    }
                    ?>


                </div>


            </div>

            <div class="related-products text-center">
                <div class="page-title">
                    <h2><?php echo $this->lang->line('related_product');?></h2>
                </div>
                <div class="row">
                    <?php
                    if($relatedproduct)
                    {
                        foreach($relatedproduct as $relprod){
                            $relprodslug = $relprod['slug'];
                            if ($language == 'cn')
                            {
                                $relprodtitle = $relprod['title_cn'];
                                $relprodexcrept = $relprod['excrept_cn'];
                                if (empty($relprod['featured_img_cn'])) {
                                    $relprodimage = $relprod['featured_img'];
                                } else {
                                    $relprodimage = $relprod['featured_img_cn'];
                                }
                            }
                            else
                            {
                                $relprodtitle = $relprod['title'];
                                $relprodexcrept = $relprod['excrept'];
                                if (empty($relprod['featured_img'])) {
                                    $relprodimage = $relprod['featured_img_cn'];
                                } else {
                                    $relprodimage = $relprod['featured_img'];
                                }
                            }?>
                            <div class="col-sm-3 col-xs-3">
                                <div class="application-item">
                                    <?php
                                    if(!empty($relprodimage)){
                                        $img = base_url().'uploads/products/thumbnail/'.$relprodimage;
                                    }
                                    else{
                                        $img = base_url().'scriptscss/images/nopreview.png';
                                    }
                                   ?>
                                        <figure>
                                            <a href="<?php echo base_url().'product/'.$relprodslug; ?>">
                                            <img src="<?php echo $img; ?>" alt="<?php echo $relprodtitle;?>">
                                                </a>
                                        </figure>


                                    <div class="figcaption">
                                        <h3>
                                        <a href="<?php echo base_url().'product/'.$relprodslug; ?>"><?php echo $relprodtitle;?></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    }
                    else
                    {
                        echo '<p>No Related Products Available</p>';
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
</section>