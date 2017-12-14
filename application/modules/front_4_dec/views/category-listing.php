<section class="body-bg">
    <div class="container">
        <div class="product-details">
            <div class="related-products text-center">
                <div class="page-title">
                    <h2><?php echo $this->lang->line('category_title');?></h2>
                </div>
                <div class="row">
                    <?php
                        foreach($getallcategories as $category)
                        {
                            $catslug = $category['slug'];
                            if ($language == 'cn')
                            {
                                $cattitle = $category['title_cn'];
                                $catexcrept = $category['excrept_cn'];
                                if (empty($category['featured_img_cn'])) {
                                    $catimage = $category['featured_img'];
                                } else {
                                    $catimage = $category['featured_img_cn'];
                                }
                            }
                            else
                            {
                                $cattitle = $category['title'];
                                $catexcrept = $category['excrept'];
                                if (empty($category['featured_img'])) {
                                    $catimage = $category['featured_img_cn'];
                                } else {
                                    $catimage = $category['featured_img'];
                                }
                            }?>
                            <div class="col-sm-4 col-xs-6">
                                <div class="related-produt-item">
                                    <?php
                                    if(!empty($catimage)){?>
                                        <figure>
                                            <img src="<?php echo base_url().'uploads/categories/thumbnail/'.$catimage; ?>" alt="<?php echo $cattitle;?>">
                                        </figure>
                                    <?php }
                                    ?>

                                    <div class="figcaption">
                                        <h3><?php echo $cattitle;?></h3>
                                        <?php echo $catexcrept; ?>
                                        <a class="btn btn-default" href="<?php echo base_url().'category/'.$catslug; ?>"><?php echo $this->lang->line('view_detail');?>  <i class="fa fa-angle-right"></i></a>
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
