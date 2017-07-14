<section class="body-bg">
    <div class="container">
        <div class="product-details">
            <div class="related-products text-center">
                <div class="page-title">
                    <h2><?php echo $Category_title;?></h2>

                </div>
                <div class="row">
                    <?php
                        foreach($allproducts as $product)
                        {
                            $prodslug = $product['slug'];
                            if ($language == 'cn')
                            {
                                $prodtitle = $product['title_cn'];
                                $prodexcrept = $product['excrept_cn'];
                                if (empty($product['featured_img_cn'])) {
                                    $prodimage = $product['featured_img'];
                                } else {
                                    $prodimage = $product['featured_img_cn'];
                                }
                            }
                            else
                            {
                                $prodtitle = $product['title'];
                                $prodexcrept = $product['excrept'];
                                if (empty($product['featured_img'])) {
                                    $prodimage = $product['featured_img_cn'];
                                } else {
                                    $prodimage = $product['featured_img'];
                                }
                            }?>

                            <div class="col-sm-4 col-xs-6">
                                <div class="related-produt-item">
                                    <?php
                                    if(!empty($prodimage)){?>
                                        <figure>
                                            <img src="<?php echo base_url().'uploads/products/thumbnail/'.$prodimage; ?>" alt="<?php echo $prodtitle;?>">
                                        </figure>
                                    <?php }
                                    ?>

                                    <div class="figcaption">
                                        <h3><?php echo $prodtitle;?></h3>
                                        <?php echo $prodexcrept;?>
                                        <a class="btn btn-default" href="<?php echo base_url().'product/'.$prodslug; ?>"><?php echo $this->lang->line('view_detail');?>  <i class="fa fa-angle-right"></i></a>
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
