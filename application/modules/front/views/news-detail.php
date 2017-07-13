<?php
foreach($newsDetail as $detail){
    $datetime = $detail['post_date'];
    $date = date("d M Y", strtotime($datetime));
    if($language == 'cn'){
        $title = $detail['title_cn'];
        $content = $detail['content_cn'];
        $excrept = $detail['excrept_cn'];
        //$featured_img = $detail['featured_img_cn'];
        if (empty($detail['featured_img_cn'])) {
            $image = $detail['featured_img'];
        } else {
            $image = $detail['featured_img_cn'];
        }
    }else{
        $title = $detail['title'];
        $content = $detail['content'];
        $excrept = $detail['excrept'];
        //$featured_img = $detail['featured_img'];
        if (empty($detail['featured_img'])) {
            $image = $detail['featured_img_cn'];
        } else {
            $image = $detail['featured_img'];
        }
    }



}

?>
<section class="body-bg">
    <div class="container">
        <div class="product-details clearfix d-news">
            <div class="col-md-7">
                <!-- Nav tabs content -->
                <div class="tab-content t-right">
                    <div id="first" class=" fade in ">
                        <div class="tp-info">
                            <figure><img src="<?php echo base_url().'uploads/news/'.$image; ?>" alt="<?php echo $title;?>" class="img-responsive"></figure>
                            <figcaption>
                                <h2><?php echo $title;?></h2>
                                <span class="clock"><i class="fa fa-clock-o"></i><?php echo $date;?></span>
                            </figcaption>
                        </div>
                        <?php echo $content;?>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="tab-wrap">
                    <div class="row">
                        <!-- Nav left -->
                        <ul class="nav nav-tabs" id="leftTabs">
                            <?php
                                foreach($newscategory as $key => $newscat){
                                    ?>
                                    <li class = "<?php echo ($key==0)?'active':'';?>">
                                        <a data-toggle="tab" href="#<?php echo $newscat['slug']?>">
                                            <?php
                                            if($language == 'cn'){
                                                echo $newscat['title_cn'] ;
                                            }
                                            else{
                                                echo $newscat['title'];
                                            }
                                            ?>
                                        </a>
                                    </li>
                            <?php } ?>
                        </ul>
                        <!-- Nav content -->
                        <div class="tab-content">
                            <?php
                                foreach($newscategory as $key=>$categ){?>
                                <div class="tab-pane fade in <?php echo ($key==0)?'active':'';?>" id="<?php echo $categ['slug']?>">
                                <?php
                                $newsCatId = $categ['id'];
                                $getallnews = $this->mymodel->get('tbl_post', '*', 'post_parent = '.$newsCatId.' and post_type = "news" and status = "1" order by id desc');
                                if($getallnews){?>
                                    <ul class="new-tab">
                                        <?php
                                        foreach($getallnews as $subnews){
                                            $subslug = $subnews['slug'];
                                            $datetime = $subnews['post_date'];
                                            $subdate = date("d M Y", strtotime($datetime));
                                            if($language == 'cn')
                                            {
                                                $subtitle = $subnews['title_cn'];
                                                $excrept = $subnews['excrept_cn'];
                                                if (empty($subnews['featured_img_cn'])) {
                                                    $subimage = $subnews['featured_img'];
                                                } else {
                                                    $subimage = $subnews['featured_img_cn'];
                                                }
                                            }
                                            else
                                            {
                                                $subtitle = $subnews['title'];
                                                $excrept = $subnews['excrept'];
                                                if (empty($subnews['featured_img'])) {
                                                    $subimage = $subnews['featured_img_cn'];
                                                } else {
                                                    $subimage = $subnews['featured_img'];
                                                }
                                            }
                                            ?>
                                            <li>
                                                <a href="<?php echo base_url().'news/'.$subslug; ?>" >
                                                    <div class="news-item clearfix">
                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <figure><img src="<?php echo base_url().'uploads/news/thumbnail/'.$subimage; ?>" alt="<?php echo $subtitle;?>" class="img-responsive"></figure>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <figcaption>
                                                                    <span class="clock"><i class="fa fa-clock-o"></i><?php echo $subdate;?></span>
                                                                    <h4><?php echo $subtitle?></h4>
                                                                </figcaption>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php }
                                        ?>
                                    </ul>
                                <?php }
                                else{
                                    echo '<h3>No News available</h3>';
                                }
                                ?>
                                </div>
                                <?php }

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
