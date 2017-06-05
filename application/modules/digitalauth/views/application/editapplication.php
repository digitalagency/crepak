<!-- breadcrumb -->
<?php
foreach ($applicationValues as $value) {
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
        <li class="active">Edit Aplication</li>
    </ol>
</section>
<!-- breadcrumb -->
<!-- Main content -->
<section class="content">
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-info'>
                <div class='box-header'>
                    <h3 class='box-title'>Edit Aplication</h3>
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
                          action="<?php echo base_url('digitalauth/application/editapplication') . '/' . $id; ?>"
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
                                                 src="<?php echo base_url() . 'uploads/applications/thumbnail/' . $image ?>"
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
                                                 src="<?php echo base_url() . 'uploads/applications/thumbnail/' . $image_cn ?>"
                                                 alt=""/>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="exampleInputFile">Successful Stories:</label>
                                    <?php


                                    foreach($allstories as $story){
                                        $storyId ='';
                                        foreach($relatedstory as $storyval){
                                            $storyId = unserialize($storyval->post_meta_value);
                                        }

                                        if(!empty($storyId)) {
                                            if (in_array($story->id, $storyId)) {
                                                $selected = "checked";
                                            } else {
                                                $selected = '';
                                            }
                                        }
                                        else{
                                            $selected = '';
                                        }

                                        ?>
                                        <div class="checkbox">
                                            <label>
                                                <input name="stories[]" id="stories<?php echo $story->id;?>" value="<?php echo $story->id;?>" type="checkbox" <?php echo $selected;?>>
                                                <?php echo $story->title.' / '.$story->title_cn;?>
                                            </label>
                                        </div>
                                    <?php }?>

                                </div>


                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="exampleInputFile">Products:</label>
                                    <?php

                                    foreach($allproducts as $product){
                                        $productId='';
                                        foreach($relatedproduct as $productval){
                                            $productId = unserialize($productval->post_meta_value);
                                        }
                                        if(!empty($productId)){
                                            if (in_array($product->id, $productId)) {
                                                $selected =  "checked";
                                            }
                                            else{
                                                $selected = '';
                                            }
                                        }
                                        else{
                                            $selected = '';
                                        }


                                        ?>
                                        <div class="checkbox">
                                            <label>
                                                <input name="products[]" id="products<?php echo $product->id;?>" value="<?php echo $product->id;?>" type="checkbox" <?php echo $selected;?>>
                                                <?php echo $product->title.' / '.$product->title_cn;?>
                                            </label>
                                        </div>
                                    <?php }?>

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
                url: "<?php echo base_url('digitalauth/application/checkapplication/')?>",
                data: {title: title},
                type: 'POST',
                success: function (data) {
                    if (data == 1) {

                        bootbox.confirm("<h4>Application's title Already Exist</h4>", function (result) {
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
