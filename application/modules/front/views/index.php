<!-- Banner start -->
<div class="container-flud">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <!--<ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>-->
        <div class="carousel-inner" role="listbox">
            <?php

            foreach ($allbanners as $key => $value) {

                if ($language == 'cn') {
                    $title = $value['title_cn'];
                    $excrept = $value['excrept_cn'];
                    if (empty($value['featured_img_cn'])) {
                        $image = $value['featured_img'];
                    } else {
                        $image = $value['featured_img_cn'];
                    }
                } else {
                    $title = $value['title'];
                    $excrept = $value['excrept'];
                    if (empty($value['featured_img'])) {
                        $image = $value['featured_img_cn'];
                    } else {
                        $image = $value['featured_img'];
                    }

                }

                ?>
                <div class="item <?php echo $key == '0' ? 'active' : ''; ?>">
                    <img src="<?php echo base_url() . 'uploads/banners/' . $image; ?>" alt="<?php echo $title; ?>">

                    <!--<div class="container">
                        <div class="carousel-caption wow fadeIn">
                            <h1><?php /*echo $title; */?></h1>
                            <?php /*echo $excrept; */?>
                            <?php
/*                            $relatedPrdCount = $this->mymodel->getcount('*', 'tbl_postmeta', 'post_id =' . $value['id']);
                            if ($relatedPrdCount > 0) {
                                $relatedPrdId = $this->mymodel->getValue('tbl_postmeta', 'post_meta_value', 'post_id', $value['id']);
                                $relatedPrd = $this->mymodel->getValue('tbl_post', 'slug', 'id', $relatedPrdId); */?>
                                <a class="btn btn-default"
                                   href="<?php /*echo base_url() . 'product/' . $relatedPrd; */?>"><?php /*echo $this->lang->line('shop_now') */?>
                                    <i
                                        class="fa fa-angle-right"></i></a>
                            <?php /*}
                            */?>
                        </div>
                    </div>-->
                </div>
            <?php }
            ?>


        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><i class="fa fa-angle-left"></i></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><i class="fa fa-angle-right"></i></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- /.carousel -->

</div>

<!-- Banner end -->

<!-- Video section start -->

<section class="crepak-video">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="crepakvideo clearfix">
                    <div class="row">
                        <?php

                        foreach ($videos as $video) {
                            $vidId = $video['id'];
                            $chinesevidCount = $this->mymodel->getcount('*', 'tbl_postmeta', 'post_meta_key = "video_cn" and post_id =' . $vidId);
                            if ($chinesevidCount > 0) {
                                $chineseVideoVal = $this->mymodel->get('tbl_postmeta', '*', 'post_meta_key = "video_cn" and post_id =' . $vidId);
                                foreach ($chineseVideoVal as $chinesevid) {
                                    $chinesevid['post_meta_value'];
                                    $chinesevidurl = "https://(.+?)\.youtube\.com\/embed";
                                    if (!preg_match("~$chinesevidurl~", $chinesevid['post_meta_value'])) {
                                        //if url pattern didnt match
                                        $string = $chinesevid['post_meta_value'];
                                        $search = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
                                        $replace = "youtube.com/embed/$1";
                                        $chinesevidurl = preg_replace($search, $replace, $string);
                                    } else {
                                        //if url pattern matched
                                        $chinesevidurl = $chinesevid['post_meta_value'];
                                    }
                                }
                            }
                            $vidCount = $this->mymodel->getcount('*', 'tbl_postmeta', 'post_meta_key = "video" and post_id =' . $vidId);
                            if ($vidCount > 0) {
                                $VideoVal = $this->mymodel->get('tbl_postmeta', '*', 'post_meta_key = "video" and post_id =' . $vidId);
                                foreach ($VideoVal as $vid) {
                                    $vid['post_meta_value'];
                                    $vidurl = "https://(.+?)\.youtube\.com\/embed";
                                    if (!preg_match("~$vidurl~", $vid['post_meta_value'])) {
                                        //if url pattern didnt match
                                        $string = $vid['post_meta_value'];
                                        $search = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
                                        $replace = "youtube.com/embed/$1";
                                        $vidurl = preg_replace($search, $replace, $string);
                                    } else {
                                        //if url pattern matched
                                        $vidurl = $vid['post_meta_value'];
                                    }
                                }
                            }
                            if ($language == 'cn') {
                                $vidtitle = $video['title_cn'];
                                $videxcrept = $video['excrept_cn'];

                                if (!empty($chinesevidurl)) {
                                    $vidlink = $chinesevidurl;
                                } else {
                                    $vidlink = $vidurl;
                                }
                            } else {
                                $vidtitle = $video['title'];
                                $videxcrept = $video['excrept'];

                                if (!empty($vidurl)) {
                                    $vidlink = $vidurl;
                                } else {
                                    $vidlink = $chinesevidurl;
                                }
                            }
                            ?>
                            <div class="col-md-5 col-md-offset-1 col-sm-6">
                                <div class="video-info">
                                    <h3><?php echo $vidtitle; ?></h3>

                                    <?php echo $videxcrept; ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="video">
                                    <iframe width="560" height="230" src="<?php echo $vidlink ?>"
                                            frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        <?php }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video section start -->


<!-- Application start -->

<section class="application">
    <div class="container">
        <div class="title">
            <h2><?php echo $this->lang->line('application') ?></h2>

            <p><?php echo $this->lang->line('application_text') ?></p>
        </div>
        <div class="row">
            <?php

            foreach($allapplications as $application){
                $slug = $application['slug'];
                if ($language == 'cn')
                {
                    $title = $application['title_cn'];
                    $excrept = $application['excrept_cn'];
                    if (empty($application['featured_img_cn'])) {
                        $image = $application['featured_img'];
                    } else {
                        $image = $application['featured_img_cn'];
                    }
                }
                else
                {
                    $title = $application['title'];
                    $excrept = $application['excrept'];
                    if (empty($application['featured_img'])) {
                        $image = $application['featured_img_cn'];
                    } else {
                        $image = $application['featured_img'];
                    }
                }?>
                <div class="col-md-4 col-sm-6">
                    <div class="application-item">
                        <?php
                        if(!empty($image)){?>
                            <figure>
                                <img src="<?php echo base_url().'uploads/applications/thumbnail/'.$image; ?>" alt="<?php echo $title;?>">
                            </figure>
                        <?php }
                        ?>

                        <figcaption>
                            <h4><?php echo $title;?></h4>

                            <?php echo $excrept;?>
                            <a class="more" href="<?php echo base_url().'applications/'.$slug; ?>"><?php echo $this->lang->line('learn_more') ?> <i
                                    class="fa fa-angle-right"></i></a>
                        </figcaption>
                    </div>
                </div>
           <?php  }
            ?>

        </div>
    </div>
</section>

<!-- Application end -->


<!-- News and Events start -->

<section class="news-events">
    <div class="container">
        <div class="title text-center">
            <h2><?php echo $this->lang->line('news_events') ?></h2>
        </div>
        <?php
            foreach($allnews as $news){
                $datetime = $news['post_date'];
                $date = date("d M Y", strtotime($datetime));
                $slug = $news['slug'];
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

                <div class="col-sm-6 no-padding">
                    <div class="news-item clearfix">
                        <div class="row">
                            <div class="col-md-4">

                                <?php
                                if(!empty($image)){?>
                                    <figure>
                                        <img src="<?php echo base_url().'uploads/news/thumbnail/'.$image; ?>" alt="<?php echo $title;?>">
                                    </figure>
                                <?php }
                                ?>
                            </div>
                            <div class="col-md-8">
                                <figcaption>
                                    <h3><?php echo $title;?></h3>
                                    <span><i class="fa fa-clock-o"></i><?php echo $date?></span>
                                    <?php
                                        echo $excrept;
                                    ?>

                                    <a class="more" href="<?php echo base_url().'news/'.$slug;?>"><?php echo $this->lang->line('learn_more') ?> <i
                                            class="fa fa-angle-right"></i></a>
                                </figcaption>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        ?>

    </div>
</section>


<!-- News and Events end -->