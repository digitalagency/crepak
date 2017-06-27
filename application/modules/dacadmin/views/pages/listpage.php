<!-- breadcrumb -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List of Pages</li>
    </ol>
</section>
<!-- breadcrumb -->
<!-- Main content -->
<section class="content">
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-info'>

                <div class='box-header'>
                    <h3 class='box-title'>List of Pages</h3>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="<?php echo base_url('dacadmin/pages/addpage')?>">Add Page </a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php if ($this->session->flashdata('success_message') != "") { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('success_message'); ?>
                        </div>
                    <?php } ;?>
                    <table id="tablelist" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Chinese Title</th>
                            <th>Image</th>
                            <th>Chinese Image</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($articles as $article){
//                            echo '<pre>';
//                            print_r($article);
//                            echo '</pre>'

                            ?>
                            <tr>
                                <td><?php echo $article->title.' ('.$article->slug.')'?></td>
                                <td><?php echo $article->title_cn;?></td>
                                <td>
                                    <?php
                                    if($article->featured_img!=''){?>
                                        <img src="<?php echo base_url().'uploads/pages/thumbnail/'.$article->featured_img?>" width="150" alt="">
                                    <?php    }
                                    ?>

                                    <?php //echo $article['featured_img']?>
                                </td>
                                <td>
                                    <?php
                                    if($article->featured_img_cn!=''){?>
                                        <img src="<?php echo base_url().'uploads/pages/thumbnail/'.$article->featured_img_cn?>" width="150" alt="">
                                    <?php    }
                                    ?>

                                    <?php //echo $article['featured_img_cn']?></td>
                                <td><?php echo $article->post_date?></td>
                                <td>
                                    <a href="javascript:void(0)" onclick="togglePageStatus(<?php echo $article->id; ?>,<?php echo $article->status; ?>)" >
                                        <?php
                                        if($article->status=='1') {
                                            echo '<img src="'.base_url().'scriptscss/images/check.png">';
                                        }else{
                                            echo '<img src="'.base_url().'scriptscss/images/uncheck.png">';
                                        }
                                        ?>
                                    </a>

                                </td>
                                <td>
                                    <a href="<?php echo base_url('dacadmin/pages/editpage/'.$article->id); ?>" title="Edit <?php echo $article->title;?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="<?php echo base_url('dacadmin/pages/deletepage/'.$article->id); ?>" title="Delete <?php echo $article->title;?>"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Chinese Title</th>
                            <th>Image</th>
                            <th>Chinese Image</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col-->
    </div><!-- ./row -->
</section><!-- /.content -->

<!-- Main content -->
<script src="<?php echo base_url(); ?>scriptscss/admin/bootstraps/js/bootbox.min.js" type="text/javascript"></script>
<script>
    function togglePageStatus(id,stat){
        url = '<?php echo base_url();?>dacadmin/pages/togglePageStatus/'+id+'/' + stat;
        bootbox.confirm("<h4>Change Status</h4><hr><br><?php echo 'Confirm Status Change?'; ?>", function (result) {
            if (result) {
                window.location.replace(url);
            } else {

            }
        });
    }
</script>