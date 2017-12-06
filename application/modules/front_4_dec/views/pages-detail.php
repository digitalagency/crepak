<section class="body-bg">
    <div class="container">
        <div class="product-details clearfix d-news">
            <div class="col-md-12">
                <?php
                if ($pageDetail) {
                    foreach ($pageDetail as $detail) {

                        if ($language == 'cn') {
                            if (!empty($detail['title_cn'])) {
                                $title = $detail['title_cn'];
                            } else {
                                $title = $detail['title'];
                            }

                            $content = $detail['content_cn'];
                            if (!empty($detail['featured_img_cn'])) {
                                $featuredImage = $detail['featured_img_cn'];
                            } else {
                                $featuredImage = $detail['featured_img'];
                            }

                        } else {
                            $title = $detail['title'];
                            $content = $detail['content'];
                            $featuredImage = $detail['featured_img'];
                        }

                        ?>
                        <div class="page-title text-center">
                            <h2>
                                <?php echo $title; ?>
                            </h2>
                        </div>
                        <div class="page_content">
                            <?php echo $content; ?>
                        </div>
                    <?php }
                } else { ?>
                    <div class="errorimg">
                        <img src="<?php echo base_url() . 'scriptscss/theme/images/pagenotfound.png' ?>"
                             alt="Page not found">
                    </div>
                <?php }

                ?>
            </div>
        </div>
    </div>
</section>
