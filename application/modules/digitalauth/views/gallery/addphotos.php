<!-- breadcrumb -->
<?php foreach($galleryValues as $value){
    $id = $value->id;
    $title = $value->title;
    $title_cn = $value->title_cn;
}?>
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Photos for Gallery <?php echo $title .' / '.$title_cn;?></li>
    </ol>
</section>
<!-- breadcrumb -->
<!-- Main content -->
<section class="content">
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-info'>
                <div class='box-header'>
                    <h3 class='box-title'>Add Photos for Gallery " <?php echo $title .' / '.$title_cn;?> "</h3>
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                    <?php if ($this->session->flashdata('success_message') != "") { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('success_message'); ?>
                        </div>
                    <?php } ;?>
                    <?php if ($this->session->flashdata('error_message') != "") { ?>
                        <div class="alert alert-danger alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('error_message'); ?>
                        </div>
                    <?php } ;?>

                    <form role="form" method="post" class="form-horizontal" action="<?php echo base_url('digitalauth/gallery/addimage/'.$id);?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="exampleInputFile">Images:</label>
                                    <input type="file" name="images[]" id="images" onchange="preview_image(event);" required multiple>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="image_preview"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="exampleInputFile">Status:</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="publish" value="1" class="minimal" checked/>
                                            Publish
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="unpublish" class="minimal" value="0">
                                            Unpublish
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input name="btnDo" id="addBtn" type="submit" value="Add" class="btn btn-primary" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div><!-- /.box -->

        </div><!-- /.col-->
    </div><!-- ./row -->
</section><!-- /.content -->
<script src="<?php echo base_url(); ?>scriptscss/admin/bootstraps/js/bootbox.min.js" type="text/javascript"></script>

<script>
    function preview_image(event)
    {

        var total_file=document.getElementById("images").files.length;

        for(var i=0;i<total_file;i++)
        {
            $('#image_preview').append("<a class='imageview' id='imageview"+i+"'><div class='imageremover' onclick='removeImg("+i+")'>X</div><img src="+URL.createObjectURL(event.target.files[i])+"></div>");
        }
    }
    function removeImg(i){
        $('#imageview'+i).remove();
    }
</script>
