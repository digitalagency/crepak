<!-- breadcrumb -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Application</li>
    </ol>
</section>
<!-- breadcrumb -->
<!-- Main content -->
<section class="content">
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-info'>
                <div class='box-header'>
                    <h3 class='box-title'>Add Application</h3>
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
                          action="<?php echo base_url('digitalauth/application/addapplication'); ?>"
                          enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="title">Title*</label>
                                    <input type="text" class="form-control" id="artilcetitle" name="title"
                                           placeholder="Title of the Product" onchange="titletoslug()">
                                    <?php echo form_error('title', '<span class="error-message">', '</span>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                           placeholder="Slug of the Product">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="slug">Chinese Title : </label>
                                    <input type="text" class="form-control" id="title_cn" name="title_cn"
                                           placeholder="Chinese Title">
                                </div>
                            </div>


                            <div class="form-group">

                                <div class="col-sm-12">
                                    <label>Content:</label>
                            <textarea id="editor1" name="content" rows="10" cols="80">
                            </textarea>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-sm-12">
                                    <label>Chinese Content:</label>
                            <textarea id="editor2" name="content_cn" rows="10" cols="80">
                            </textarea>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label>Excrept:</label>
                            <textarea id="editor3" name="excrept" rows="10" cols="40">
                            </textarea>
                                </div>

                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label>Chinese Excrept:</label>
                            <textarea id="editor4" name="excrept_cn" rows="10" cols="40">
                            </textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="exampleInputFile">Images:</label>
                                    <input type="file" name="images" id="images">
                                </div>
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="exampleInputFile">Chinese Images:</label>
                                    <input type="file" name="images_cn" id="images">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="exampleInputFile">Successful Stories:</label>
                                    <?php foreach($allstories as $story){?>
                                        <div class="checkbox">
                                            <label>
                                                <input name="stories[]" id="stories<?php echo $story->id;?>" value="<?php echo $story->id;?>" type="checkbox">
                                                <?php echo $story->title.' / '.$story->title_cn;?>
                                            </label>
                                        </div>
                                    <?php }?>

                                </div>



                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <label for="exampleInputFile">Products:</label>
                                    <?php foreach($allproducts as $product){?>
                                        <div class="checkbox">
                                            <label>
                                                <input name="products[]" id="products<?php echo $product->id;?>" value="<?php echo $product->id;?>" type="checkbox">
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
                                            <input type="radio" name="status" id="publish" class="minimal" value="1"
                                                   checked>
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
                                    <input name="btnDo" id="addBtn" type="submit" value="Add" class="btn btn-primary"/>
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
        var title = document.getElementById("artilcetitle").value;
        // alert(title);
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
        var slug = title.toLowerCase().trim().split(/\s+/).join('-');
        $('#slug').val(slug);

    }
</script>
