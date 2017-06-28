<!-- breadcrumb -->
<?php
foreach ($productValues as $value) {
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
    $post_parent = $value->post_parent;
}
?>
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Product</li>
    </ol>
</section>
<!-- breadcrumb -->
<!-- Main content -->
<section class="content">
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-info'>
                <div class='box-header'>
                    <h3 class='box-title'>Edit Product</h3>
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
                          action="<?php echo base_url('dacadmin/product/editproduct') . '/' . $id; ?>"
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
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="slug">Category : </label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select the Category</option>
                                        <?php
                                        foreach ($allcategories as $category) {
                                            if ($post_parent == $category->id) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                            ?>

                                            <option
                                                value="<?php echo $category->id ?>" <?php echo $selected; ?>><?php echo $category->title . ' / ' . $category->title_cn; ?></option>
                                        <?php }
                                        ?>
                                    </select>


                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-12">
                                    <label>Content:</label>
                                    <textarea id="editor1" name="content" rows="10" cols="80">
                                      <?php echo $aticle; ?>
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-sm-12">
                                    <label>Chinese Content:</label>
                            <textarea id="editor2" name="content_cn" rows="10" cols="80">
                                <?php echo $aticle_cn; ?>
                            </textarea>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-sm-12 col-md-6 col-xs-12"
                                ">
                                <label>Excrept:</label>
                            <textarea id="editor3" name="excrept" rows="10" cols="40">
                                <?php echo $excrept; ?>
                            </textarea>
                            </div>

                            <div class="col-sm-12 col-md-6 col-xs-12">
                                <label>Chinese Excrept:</label>
                            <textarea id="editor4" name="excrept_cn" rows="10" cols="40">
                                <?php echo $excrept_cn; ?>
                            </textarea>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="exampleInputFile">Images:</label>
                                    <input type="file" name="images" id="images">
                                    <?php if (!empty($image)) { ?>
                                        <div class="imageview">
                                            <img class="img-responsive"
                                                 src="<?php echo base_url() . 'uploads/products/thumbnail/' . $image ?>"
                                                 alt=""/>
                                        </div>

                                    <?php } ?>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="exampleInputFile">Chinese Images:</label>
                                    <input type="file" name="images_cn" id="images">
                                    <?php if (!empty($image_cn)) { ?>
                                        <div class="imageview">
                                            <img class="img-responsive"
                                                 src="<?php echo base_url() . 'uploads/products/thumbnail/' . $image_cn ?>"
                                                 alt=""/>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="exampleInputFile">File (Downloadable):</label>
                                    <input type="file" name="pfile" id="pfile">
                                    <?php

                                    if (!empty($prodfile[0]->post_meta_value)) {
                                        ?>
                                        <div class="fileview">
                                            <a href="<?php echo base_url('dacadmin/download') .'/'.  $prodfile[0]->post_meta_value; ?>"
                                               class="btn btn-app">
                                                <i class="fa fa-file-archive-o"></i>
                                                Notifications
                                            </a>
                                        </div>

                                    <?php } ?>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="exampleInputFile">Chinese File (Downloadable):</label>
                                    <input type="file" name="pfile_cn" id="pfile_cn">
                                    <?php if (!empty($prodfile_cn[0]->post_meta_value)) { ?>
                                        <div class="fileview">
                                            <a href="<?php echo base_url('dacadmin/download') . '/' . $prodfile_cn[0]->post_meta_value; ?>"
                                               class="btn btn-app">
                                                <i class="fa fa-file-archive-o"></i>
                                                Notifications
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="exampleInputFile">Status:</label>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="publish" class="minimal"
                                                   value="1" <?php echo ($status == '1') ? 'checked' : '' ?>>
                                            Publish
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="unpublish" class="minimal"
                                                   value="0" <?php echo ($status == '0') ? 'checked' : '' ?>>
                                            Unpublish
                                        </label>
                                    </div>
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
                url: "<?php echo base_url('dacadmin/product/checkproduct/')?>",
                data: {title: title},
                type: 'POST',
                success: function (data) {
                    var available = data.replace(/[^A-Za-z 0-9 \.,\?""!@#\$%\^&\*\(\)-_=\+;:<>\/\\\|\}\{\[\]`~]*/g, '');
                    if (available == 1) {

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
                    if (available ==0 ) {
                        document.getElementById("addBtn").disabled = false;
                    }
                }
            })
        }
        var slug = title.toLowerCase().trim().split(/\s+/).join('-');
        $('#slug').val(slug);

    }
</script>
