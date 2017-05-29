<!-- breadcrumb -->
<?php
  foreach ($articleValues as $value) {
      $id   =$value['id'];
    $title  = $value['title'];
    $slug   = $value['slug'];
    $aticle = $value['article'];
    $image  = $value['image'];
    $status = $value['status'];
  }
?>
<section class="content-header">
<h1>
Dashboard
<small>Control panel</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Edit Article</li>
</ol>
</section>
<!-- breadcrumb -->
<!-- Main content -->
        <section class="content">
          <div class='row'>
            <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                  <h3 class='box-title'>Add Article</h3>
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

                  <form role="form" method="post" class="form-horizontal" action="<?php echo base_url('admin/editarticle').'/'.$id;?>" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <div class="col-sm-6">
                          <label for="title">Title*</label>
                          <input type="text" class="form-control" id="artilcetitle" name="title" placeholder="Title of an Article" onchange="titletoslug()" value="<?php echo $title;?>">
                            <?php echo form_error('title','<span class="error-message">','</span>');?>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-6">
                          <label for="slug">Slug</label>
                          <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug of an Article" value="<?php echo $slug;?>">
                        </div>
                      </div>
                      <div class="form-group">

                        <div class="col-sm-12">
                            <label>Content:</label>
                            <textarea id="editor1" name="content" rows="10" cols="80">
                              <?php echo $aticle;?>
                            </textarea>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="exampleInputFile">Images:</label>
                                <input type="file" name="images" id="images">


                            </div>
                        </div>
                        <?php if(!empty($image)){?>
                            <div class="form-group col-sm-12">
                                <img src="<?php echo base_url().'uploads/articles/'.$image?>" alt="" width="50%" />
                            </div>
                       <?php }?>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="exampleInputFile">Status:</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="publish" class="minimal" value="1" <?php echo ($status=='1')?'checked':''?>>
                                        Publish
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="unpublish" class="minimal" value="0" <?php echo ($status=='0')?'checked':''?>>
                                        Unpublish
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">

                        <div class="col-sm-4">
                            <input name="btnDo" type="submit" value="Edit" class="btn btn-primary" />
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
          function titletoslug() {
              var orgtitle = '<?php echo $title ?>';
              var title = document.getElementById("artilcetitle").value;
              if(orgtitle!=title){
                  $.ajax({
                      url:"<?php echo base_url('admin/checkartilce/')?>",
                      data: {title: title},
                      type: 'POST',
                      success: function(data){
                          if(data == 1){

                              bootbox.confirm("<h4>Title Already Exist</h4>", function(result) {
                                  if(result){

                                      setTimeout(function(){$("#artilcetitle").focus();}, 1);
                                  }else{
                                      setTimeout(function(){$("#artilcetitle").focus();}, 1);
                                  }
                              });
//
                              document.getElementById("addBtn").disabled = true;
                          }
                          else{
                              document.getElementById("addBtn").disabled = false;
                          }
                      }
                  })
              }
             var slug = title.toLowerCase().trim().split(/\s+/).join('-');
             $('#slug').val(slug);

          }
        </script>
