<section class="body-bg">
    <div class="container">
        <div class="product-details">
            <div class="related-products text-center">
                <div class="page-title">
                    <h2>Search for : <?php echo $searchValue?></h2>

                </div>
                <div class="row">
                    <?php
                   if($searchcount>0){
                       foreach($searchResult as $search){
                           $slug = $search['slug'];
                           $posttype = $search['post_type'];
                           if($posttype == 'applications'){
                               $filename = 'applications';
                           }
                           elseif($posttype == 'banners'){
                               $filename = 'banners';
                           }
                           elseif($posttype == 'category'){
                               $filename = 'categories';
                           }
                           elseif($posttype == 'news'){
                               $filename = 'news';
                           }
                           elseif($posttype == 'pages'){
                               $filename = 'pages';
                           }
                           elseif($posttype == 'product'){
                                $filename = 'products';
                           }
                           elseif($posttype == 'story'){
                               $filename = 'stories';
                           }


                           if ($language == 'cn')
                           {
                               $title = $search['title_cn'];
                               $excrept = $search['excrept_cn'];
                               if (empty($search['featured_img_cn'])) {
                                   $image = $search['featured_img'];
                               } else {
                                   $image = $search['featured_img_cn'];
                               }
                           }
                           else
                           {
                               $title = $search['title'];
                               $excrept = $search['excrept'];
                               if (empty($search['featured_img'])) {
                                   $image = $search['featured_img_cn'];
                               } else {
                                   $image = $search['featured_img'];
                               }
                           }?>
                           <div class="col-sm-4 col-xs-6">
                               <div class="related-produt-item">
                                   <?php
                                   if(!empty($image)){?>
                                       <figure>
                                           <img src="<?php echo base_url().'uploads/'.$filename.'/thumbnail/'.$image; ?>" alt="<?php echo $title;?>">
                                       </figure>
                                   <?php }
                                   ?>

                                   <div class="figcaption">
                                       <h3><?php echo $title;?></h3>
                                       <p><?php echo $excrept;?></p>
                                       <a class="btn btn-default" href="<?php echo base_url().$posttype.'/'.$slug; ?>"><?php echo $this->lang->line('view_detail');?>  <i class="fa fa-angle-right"></i></a>
                                   </div>
                               </div>
                           </div>
                       <?php }
                   }
                    else{
                        echo '<p>No search result found</p>';
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
