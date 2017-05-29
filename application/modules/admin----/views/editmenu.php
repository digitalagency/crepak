<!-- breadcrumb -->
<?php
foreach ($MenuValue as $value) {
    $id             =$value['id'];
    $parent_id      =$value['parent_id'];
    $title          = $value['title'];
    $slug           = $value['slug'];
    $article_link   = $value['article_link'];
    $page_link      = $value['page_link'];
    $external       = $value['external'];
    $exteral_link   = $value['exteral_link'];
    $status             = $value['status'];
}
?>
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Menu</li>
    </ol>
</section>
<!-- breadcrumb -->
<!-- Main content -->
<section class="content">
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-info'>
                <div class='box-header'>
                    <h3 class='box-title'>Edit Menu</h3>
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                    <?php if ($this->session->flashdata('success_message') != "") { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('success_message'); ?>
                        </div>
                    <?php } ;?>

                    <form role="form" method="post" class="form-horizontal" action="<?php echo base_url('admin/editmenu').'/'.$id;;?>" enctype="multipart/form-data">
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
                                <div class="col-sm-6">
                                    <label for="slug">Parent Menu</label>

                                    <?php if($parentcount==0){?>
                                        <select name="parentmenu" id="parentmenu" class="form-control" disabled="">
                                            <option value="">--No Parent to select--</option>
                                        </select>
                                    <?php }
                                    else{?>
                                        <select name="parentmenu" id="parentmenu" class="form-control" >
                                            <option value="">--Select a parent--</option>
                                            <?php
                                            foreach($ParentMenu as $pm){
                                                if($pm['id']==$parent_id){
                                                    $selected ='selected';
                                                }
                                                elseif($pm['id']==$id){
                                                    $selected ='disabled';
                                                }
                                                else{
                                                    $selected ='';
                                                }
                                                //$selected = ($pm['id']==$parent_id)?'selected':'';
                                                echo '<option value="'.$pm['id'].'"'.$selected.'>'.$pm['title'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    <?php }
                                    ?>

                                    <!--                                    <input type="text" class="form-control" id="parent_menu" name="parent_menu" placeholder="Parent Menu">-->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="slug">Article Link</label>

                                    <?php if($Articlecount==0){?>
                                        <select name="" id="" class="form-control" disabled="">
                                            <option value="">--No Article to select--</option>
                                        </select>
                                    <?php }
                                    else{?>
                                        <select name="article_link" id="article" class="form-control" >
                                            <option value="">--Select an Article--</option>
                                            <?php
                                            foreach($ArticleList as $al){
                                                $select = ($article_link==$al['slug'])?'selected':'';
                                                echo '<option value="'.$al['slug'].'"'.$select.'>'.$al['title'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="slug">Page Link</label>
                                    <input type="text" class="form-control" id="page_link" name="page_link" placeholder="Page Link Eg: contact , gallery" value="<?php echo $page_link; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="exampleInputFile">External Url:</label>
                                    <div class="checkbox">
                                        <label>

                                            <input type="checkbox" name="externalurl" id="externalurl" value="1"  <?php echo $check = ($external!=0)?'checked':''?>>
                                            External url
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group externalLink <?php echo $hide = ($external!=0)?'':'hide'?>">
                                <div class="col-sm-6">

                                    <label for="slug">Exterl Link</label>
                                    <input type="text" class="form-control" id="exteral_link" name="exteral_link" placeholder="http://abc.com" value="<?php echo $exteral_link;?>">

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="exampleInputFile">Status:</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="publish" value="1" class="minimal" <?php echo ($status=='1')?'checked':''?>>
                                            Publish
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="unpublish" value="0" class="minimal" <?php echo ($status=='0')?'checked':''?>>
                                            Unpublish
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input name="btnDo" id="addBtn" type="submit" value="Edit" class="btn btn-primary" />
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
    $(document).ready(function(){
        $('#externalurl').click(function(){
            if($(this).prop("checked") == true){

                $(".externalLink").removeClass("hide");
            }
            else if($(this).prop("checked") == false){
                $(".externalLink").addClass("hide");

            }
        });
    });
    function titletoslug() {
        var orgtitle = '<?php echo $title ?>';
        var title = document.getElementById("artilcetitle").value;
        if(orgtitle!=title) {
            $.ajax({
                url: "<?php echo base_url('admin/checkmenu/')?>",
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
