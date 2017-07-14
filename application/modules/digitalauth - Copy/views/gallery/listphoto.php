<!-- breadcrumb -->
<?php foreach($galleryValues as $value){
    $id = $value->id;
    $title = $value->title;
    $title_cn = $value->title_cn;
    $slug = $value->slug;
}?>
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List of Photos for Gallery <?php echo $title .' / '.$title_cn;?></li>
    </ol>
</section>
<!-- breadcrumb -->
<!-- Main content -->
<section class="content">
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-info'>

                <div class='box-header'>
                    <h3 class='box-title'>List of Photos for Gallery "<?php echo $title.' / '.$title_cn;?>"</h3>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="<?php echo base_url('digitalauth/gallery/addimage/'.$id)?>">Add Photos </a>
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

                            <th width="40%">Image</th>
                            <th width="20%">Created Date</th>
                            <th width="20%">Status</th>
                            <th width="20%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                            foreach($imageValues as $gallery){
                                ?>
                                <tr>

                                    <td>
                                        <img src="<?php echo base_url().'uploads/'.$slug.'/'.$gallery->image;?>" alt="<?php echo $title;?>" width="200">
                                    </td>
                                    <td><?php echo $gallery->created_date?></td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="togglePhotoStatus(<?php echo $gallery->id; ?>,<?php echo $gallery->status; ?>,<?php echo $id;?>)" >
                                            <?php
                                            if($gallery->status=='1') {
                                                echo '<img src="'.base_url().'scriptscss/images/check.png">';
                                            }else{
                                                echo '<img src="'.base_url().'scriptscss/images/uncheck.png">';
                                            }
                                            ?>
                                        </a>

                                    </td>
                                    <td>

                                        <a href="<?php echo base_url('digitalauth/gallery/deleteimage/'.$gallery->id.'/'.$id); ?>"><span class="glyphicon glyphicon-remove"></span></a>
                                    </td>
                                </tr>
                            <?php }


                        ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th width="20%">Image</th>
                            <th width="15%">Created Date</th>
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
    function togglePhotoStatus(id,stat,idd){

        url = '<?php echo base_url();?>digitalauth/gallery/toggleImageStatus/'+id+'/' + stat+'/'+idd;
        bootbox.confirm("<h4>Change Status</h4><hr><br><?php echo 'Confirm Status Change?'; ?>", function (result) {
            if (result) {
                window.location.replace(url);
            } else {

            }
        });
    }
</script>