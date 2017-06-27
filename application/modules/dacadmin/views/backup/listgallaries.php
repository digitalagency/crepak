<!-- breadcrumb -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List of Galleries</li>
    </ol>
</section>
<!-- breadcrumb -->
<!-- Main content -->
<section class="content">
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-info'>

                <div class='box-header'>
                    <h3 class='box-title'>List of Galleries</h3>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="<?php echo base_url('admin/addgallery')?>">Add Gallery </a>
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
                            <th width="20%">Title</th>
                            <th width="20%">Image</th>
                            <th width="15%">Created Date</th>
                            <th width="10%">No of Images</th>
                            <th width="15%">Add Image</th>
                            <th width="5%">Status</th>
                            <th width="15%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($galleries as $gallery){?>
                            <tr>
                                <td><?php echo $gallery['title'].' ('.$gallery['slug'].')'?></td>
                                <td>
                                    <img src="<?php echo base_url().'uploads/'.$gallery['title'].'/'.$gallery['image'];?>" alt="<?php echo $gallery['title'];?>" width="100">
                                </td>
                                <td><?php echo $gallery['created_date']?></td>
                                <td><?php  $count = $this->mymodel->getcount('*','tbl_gallery_image','gallery_id ='.$gallery['id']);
                                        if(!empty($count)){
                                            echo $count;
                                        }
                                        else{
                                            echo 'No images';
                                        }

                                    ?></td>
                                <td><a href="<?php echo base_url('digitalauth/listphoto/'.$gallery['id'])?>"><img src="<?php echo base_url();?>scriptscss/images/gallery.png"></a></td>
                                <td>
                                    <a href="javascript:void(0)" onclick="toggleArticleStatus(<?php echo $gallery['id']; ?>,<?php echo $gallery['status']; ?>)" >
                                        <?php
                                        if($gallery['status']=='1') {
                                            echo '<img src="'.base_url().'scriptscss/images/check.png">';
                                        }else{
                                            echo '<img src="'.base_url().'scriptscss/images/uncheck.png">';
                                        }
                                        ?>
                                    </a>

                                </td>
                                <td>
                                    <a href="<?php echo base_url('digitalauth/editgallery/'.$gallery['id']); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="<?php echo base_url('digitalauth/deletegallery/'.$gallery['id']); ?>"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th width="20%">Title</th>
                            <th width="20%">Image</th>
                            <th width="15%">Created Date</th>
                            <th width="10%">No of Images</th>
                            <th width="15%">Add Image</th>
                            <th width="5%">Status</th>
                            <th width="15%">Action</th>
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
    function toggleArticleStatus(id,stat){
        url = '<?php echo base_url();?>admin/toggleGalleryStatus/'+id+'/' + stat;
        bootbox.confirm("<h4>Change Status</h4><hr><br><?php echo 'Confirm Status Change?'; ?>", function (result) {
            if (result) {
                window.location.replace(url);
            } else {

            }
        });
    }
</script>