<?php
foreach ($categoryValues as $value) {
    $id = $value->id;
    $title = $value->title;
    $title_cn = $value->title_cn;
    $aticle = $value->content;
    $aticle_cn = $value->content_cn;
    $excrept = $value->excrept;
    $excrept_cn = $value->excrept_cn;
    $image = $value->featured_img;
    $image_cn = $value->featured_img_cn;
    $status = $value->status;
    $slug = $value->slug;
}
?>
<!-- breadcrumb -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit News Category</li>
    </ol>
</section>
<!-- breadcrumb -->
<!-- Main content -->
<section class="content">
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-info'>
                <div class='box-header'>
                    <h3 class='box-title'>Edit News Category</h3>
                </div>
                <!-- /.box-header -->
                <div class='box-body pad'>
                    <?php if ($this->session->flashdata('success_message') != "") { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('success_message'); ?>
                        </div>
                    <?php }; ?>
                    <?php if ($this->session->flashdata('error_message') != "") { ?>
                        <div class="alert alert-danger alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('error_message'); ?>
                        </div>
                    <?php }; ?>

                    <form role="form" method="post" class="form-horizontal"
                          action="<?php echo base_url('dacadmin/news/editnewscategory') . '/' . $id; ?>"
                          enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="title">Title*</label>
                                    <input type="text" class="form-control" id="artilcetitle" name="title"
                                           placeholder="Title of the Cateogry" onchange="titletoslug()"
                                           value="<?php echo $title; ?>">
                                    <?php echo form_error('title', '<span class="error-message">', '</span>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                           placeholder="Slug of the Category" value="<?php echo $slug; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="slug">Chinese Title : </label>
                                    <input type="text" class="form-control" id="title_cn" name="title_cn"
                                           placeholder="Chinese Title" value="<?php echo $title_cn; ?>">
                                </div>
                            </div>



                            <div class="form-group">

                                <div class="col-sm-4">
                                    <input name="btnDo" id="addBtn" type="submit" value="Edit" class="btn btn-primary"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.box -->

        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section><!-- /.content -->
<script src="<?php echo base_url(); ?>scriptscss/admin/bootstraps/js/bootbox.min.js" type="text/javascript"></script>
<script>
    function titletoslug() {
        var orgtitle = '<?php echo $title ?>';
        var title = document.getElementById("artilcetitle").value;
        if (orgtitle != title) {
            $.ajax({
                url: "<?php echo base_url('dacadmin/category/checkcategory/')?>",
                data: {title: title},
                type: 'POST',
                success: function (data) {
                    if (data == 1) {

                        bootbox.confirm("<h4>Title Already Exist</h4>", function (result) {
                            if (result) {

                                setTimeout(function () {
                                    $("#artilcetitle").focus();
                                }, 1);
                            } else {
                                setTimeout(function () {
                                    $("#artilcetitle").focus();
                                }, 1);
                            }
                        });
//
                        document.getElementById("addBtn").disabled = true;
                    }
                    else {
                        document.getElementById("addBtn").disabled = false;
                    }
                }
            })
        }
        var slug = title.toLowerCase().trim().split(/\s+/).join('-');
        $('#slug').val(slug);

    }
</script>