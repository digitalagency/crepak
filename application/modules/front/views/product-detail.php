<?php
    foreach($prodDetail as $product){
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
        }
    }
if($cnfilecount>0)
{
    $cnfilevalue = $this->mymodel->get('tbl_postmeta','*','post_id = '.$pid.' and post_meta_key = "product_file_cn"');
    foreach($cnfilevalue as $cnvalue )
    {
        $cnfile = $cnvalue['post_meta_value'];
    }
}

if($filecount >0)
{
    $filevalue = $this->mymodel->get('tbl_postmeta','*','post_id = '.$pid.' and post_meta_key = "product_file"');
    foreach($filevalue as $value )
    {
        $file = $value['post_meta_value'];
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
                                <figure><img src="<?php echo base_url() . 'uploads/products/' . $image; ?>"
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
                                        <?php
                                        if($language == 'cn')
                                        {
                                            if($cnfilecount>0)
                                            {?>

                                                <a href="<?php echo base_url().'download/'.$cnfile;?>" class="btn btn-default">
                                                    <?php echo $download = $this->lang->line('download_file'); ?>
                                                </a>
                                            <?php }
                                        }
                                        else
                                        {
                                            if($filecount >0)
                                            {?>
                                                <a href="<?php echo base_url().'download/'.$file;?>" class="btn btn-default">
                                                    <?php echo $download = $this->lang->line('download_file'); ?>
                                                </a>
                                            <?php }
                                        }
                                        ?>

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
                        <li class="active"><a data-toggle="tab" href="#description"><?php echo $this->lang->line('description');?></a></li>

                        <!--<li><a data-toggle="tab" href="#review"><?php /*echo $this->lang->line('review');*/?></a></li>-->
                        <?php
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
                        if($galcount>0){?>
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
                        <?php }
                        ?>
                    </div>
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
                            <div class="col-sm-4 col-xs-6">
                                <div class="related-produt-item">
                                    <?php
                                    if(!empty($relprodimage)){?>
                                        <figure>
                                            <img src="<?php echo base_url().'uploads/products/thumbnail/'.$relprodimage; ?>" alt="<?php echo $relprodtitle;?>">
                                        </figure>
                                    <?php }
                                    ?>

                                    <div class="figcaption">
                                        <h3><?php echo $relprodtitle;?></h3>

                                        <?php echo $relprodexcrept;?>
                                        <a class="btn btn-default" href="<?php echo base_url().'product/'.$relprodslug; ?>"><?php echo $this->lang->line('view_detail');?>  <i class="fa fa-angle-right"></i></a>
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
