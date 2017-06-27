<!-- breadcrumb -->
<?php
foreach ($MenuValue as $value) {
    $id             =$value['id'];
    $parent_id      =$value['parent_id'];
    $title          = $value['title'];
    $title_cn       = $value['title_cn'];
    $page_link      = $value['page_link'];
    $status         = $value['status'];
    $menu_order     = $value['menu_order'];
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

                    <form role="form" method="post" class="form-horizontal" action="<?php echo base_url('dacadmin/editmenu').'/'.$id;;?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="title">Title*</label>
                                    <input type="text" class="form-control" id="menutitle" name="title" placeholder="Name of Menu" onchange="titletoslug()" value="<?php echo $title;?>">
                                    <?php echo form_error('title','<span class="error-message">','</span>');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="slug">Chinese Title</label>
                                    <input type="text" class="form-control" id="articlechinesetitle" name="title_cn" placeholder="Chinese Name of Menu" value="<?php echo $title_cn;?>">
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

                                                $secondlevel = $this->mymodel->get('tbl_menu', '*','parent_id =' .$pm['id']);
                                                foreach($secondlevel as $sl){
                                                    if($sl['id']==$parent_id){
                                                        $selected ='selected';
                                                    }
                                                    elseif($sl['id']==$id){
                                                        $selected ='disabled';
                                                    }
                                                    else{
                                                        $selected ='';
                                                    }
                                                    echo '<option value="'.$sl['id'].'" '.$selected.'  class="secondmenu">'.$sl['title'].'</option>';
                                                }
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


                                    <select name="page_link" class="form-control" id="article">
                                            <option value="">--Select an Post--</option>
                                            <option value="index" <?php echo ($page_link == 'index'?'selected':'');?>>Home</option>
                                            <option value="contact" <?php echo ($page_link == 'contact'?'selected':'');?>>Contact</option>
                                            <?php
                                            foreach($posttype as $type){
                                                $postType = $type['post_type'];
                                                if($page_link == $postType){
                                                    $selected = 'selected';
                                                }else{
                                                    $selected = '';
                                                }
                                                echo '<option value="'.$postType.'" '.$selected.'  class="posttype">'.ucwords($postType).'</option>';
                                                $postList = $this->mymodel->get('tbl_post', '*','post_type ="'.$postType.'" order by id asc');
                                                foreach($postList as $al){
                                                    $optval = $al['post_type'].'/'.$al['slug'];
                                                    if($page_link == $optval){
                                                        $selected = 'selected';
                                                    }else{
                                                        $selected = '';
                                                    }

                                                    echo '<option value="'.$optval.'" '.$selected.'>'.ucwords($al['title']).'</optioin>';
                                                }
                                            }
                                            ?>
                                        </select>

                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="Menuorder">Menu Order</label>
                                    <input type="number" class="form-control" id="menu_order" name="menu_order" placeholder="Menu Order(0-9)" value="<?php echo $menu_order;?>">
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
                url: "<?php echo base_url('dacadmin/checkmenu/')?>",
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
