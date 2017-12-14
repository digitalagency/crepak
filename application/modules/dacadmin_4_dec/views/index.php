<!-- breadcrumb -->
<section class="content-header">
<h1>
Dashboard
<small>Control panel</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Dashboard</li>
</ol>
</section>
<!-- breadcrumb -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php
                        if($menucount>0){
                            echo $menucount;
                        }
                        else{
                            echo '0';
                        }
                        ?></h3>
                    <p>Menus</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url('dacadmin/listmenus')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php
                        if($pagecount>0){
                            echo $pagecount;
                        }
                        else{
                            echo '0';
                        }
                        ?></h3>
                    <p>Pages</p>
                </div>
                <div class="icon">
                    <i class="ion ion-edit"></i>
                </div>
                <a href="<?php echo base_url('dacadmin/pages/listpages')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php
                        if($categorycount>0){
                            echo $categorycount;
                        }
                        else{
                            echo '0';
                        }?>
                        <sup style="font-size: 20px">/
                            <?php
                            if($productcount>0){
                                echo $productcount;
                            }
                            else{
                                echo '0';
                            }
                            ?>
                        </sup></h3>
                    <p>Category/Products</p>
                </div>
                <div class="icon">
                    <i class="ion ion-camera"></i>
                </div>
                <a href="<?php echo base_url('dacadmin/category/listcategories')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->



        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
    </div>
</section>
