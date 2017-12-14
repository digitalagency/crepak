<section class="body-bg">
    <div class="container">
        <div class="product-details">
            <div class="product-details-tab news-list">
                <div class="tab-wrap">
                    <ul class="nav nav-tabs">

                        <?php foreach ($newscategory as $key => $newscat) {
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
                        <?php }
                        ?>

                    </ul>

                    <div class="tab-content">
                        <?php foreach ($newscategory as $key => $newscat) {?>
                        <div id="<?php echo $newscat['slug']?>" class="tab-pane fade in <?php echo ($key==0)?'active':'';?>">
                            <?php
                            $newsCatId = $newscat['id'];
                                $getallnews = $this->mymodel->get('tbl_post', '*', 'post_parent = '.$newsCatId.' and post_type = "news" and status = "1" order by id desc');
                            if($getallnews){
                                echo '<div class="row">';
                                foreach($getallnews as $news){
                                    $slug = $news['slug'];
                                    $datetime = $news['post_date'];
                                    $date = date("d M Y", strtotime($datetime));
                                    if($language == 'cn')
                                    {
                                        $title = $news['title_cn'];
                                        $excrept = $news['excrept_cn'];
                                        if (empty($news['featured_img_cn'])) {
                                            $image = $news['featured_img'];
                                        } else {
                                            $image = $news['featured_img_cn'];
                                        }
                                    }
                                    else
                                    {
                                        $title = $news['title'];
                                        $excrept = $news['excrept'];
                                        if (empty($news['featured_img'])) {
                                            $image = $news['featured_img_cn'];
                                        } else {
                                            $image = $news['featured_img'];
                                        }
                                    }?>
                                    <div class="col-md-4 col-sm-6 no-padding">
                                        <div class="news-item clearfix">
                                            <figure>
                                                <a href="<?php echo base_url().'news/'.$slug; ?>">
                                                   <img src="<?php echo base_url().'uploads/news/thumbnail/'.$image; ?>" alt="<?php echo $title?>">
                                                </a>
                                            </figure>
                                            <figcaption>
                                                <span class="clock"><i class="fa fa-clock-o"></i><?php echo $date;?></span>

                                                <p><?php echo $title;?></p>
                                                <a class="more" href="<?php echo base_url().'news/'.$slug; ?>">
                                                    <?php echo $this->lang->line('learn_more') ?> <i class="fa fa-angle-right"></i>
                                                </a>
                                            </figcaption>
                                        </div>
                                    </div>
                               <?php  }
                                echo '</div>';
                            }
                            else{
                                echo '<p>No News available</p>';
                            }
                            ?>
                        </div>
                        <?php }?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
