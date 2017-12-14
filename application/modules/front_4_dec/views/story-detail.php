<?php
foreach ($storydetail as $story) {
    $galfile = $story['slug'];
    if ($language == 'cn') {
        $title = $story['title_cn'];
        $content = $story['content_cn'];
        $excrept = $story['excrept_cn'];
        //$featured_img = $detail['featured_img_cn'];
        if (empty($story['featured_img_cn'])) {
            $image = $story['featured_img'];
        } else {
            $image = $story['featured_img_cn'];
        }
    } else {
        $title = $story['title'];
        $content = $story['content'];
        $excrept = $story['excrept'];
        //$featured_img = $detail['featured_img'];
        if (empty($story['featured_img'])) {
            $image = $story['featured_img_cn'];
        } else {
            $image = $story['featured_img'];
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
                                <figure><img src="<?php echo base_url() . 'uploads/stories/' . $image; ?>"
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

                    </div>
                </div>
            </div>
            <div class="related-products text-center">
                <div class="page-title">
                    <h2><?php echo $this->lang->line('related_application'); ?></h2>
                </div>
                <div class="row">
                    <?php
                        foreach($relatedstory as $relstory){
                            $relappslug = $relstory['slug'];
                            if ($language == 'cn')
                            {
                                $relapptitle = $relstory['title_cn'];
                                $relappexcrept = $relstory['excrept_cn'];
                                if (empty($relstory['featured_img_cn'])) {
                                    $relappimage = $relstory['featured_img'];
                                } else {
                                    $relappimage = $relstory['featured_img_cn'];
                                }
                            }
                            else
                            {
                                $relapptitle = $relstory['title'];
                                $relappexcrept = $relstory['excrept'];
                                if (empty($relstory['featured_img'])) {
                                    $relappimage = $relstory['featured_img_cn'];
                                } else {
                                    $relappimage = $relstory['featured_img'];
                                }
                            }?>
                            <div class="col-sm-4 col-xs-6">
                                <div class="related-produt-item">
                                    <?php
                                    if(!empty($relappimage)){?>
                                        <figure>
                                            <img src="<?php echo base_url().'uploads/stories/thumbnail/'.$relappimage; ?>" alt="<?php echo $relapptitle;?>">
                                        </figure>
                                    <?php }
                                    ?>

                                    <div class="figcaption">
                                        <h3><?php echo $relapptitle;?></h3>

                                        <?php echo $excrept;?>
                                        <a class="btn btn-default" href="<?php echo base_url().'story/'.$relappslug; ?>"><?php echo $this->lang->line('view_detail');?>  <i class="fa fa-angle-right"></i></a>
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
