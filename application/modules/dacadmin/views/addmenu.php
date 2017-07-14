<!-- breadcrumb -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Menu</li>
    </ol>
</section>
<!-- breadcrumb -->
<!-- Main content -->
<section class="content">
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-info'>
                <div class='box-header'>
                    <h3 class='box-title'>Add Menu</h3>
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                    <?php if ($this->session->flashdata('success_message') != "") { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('success_message'); ?>
                        </div>
                    <?php } ;?>

                    <form role="form" method="post" class="form-horizontal" action="<?php echo base_url('dacadmin/addmenu');?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="title">Title*</label>
                                    <input type="text" class="form-control" id="menutitle" name="title" placeholder="Name of Menu" onchange="checktitle()">
                                    <?php echo form_error('title','<span class="error-message">','</span>');?>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="slug">Chinese Title</label>
                                    <input type="text" class="form-control" id="articlechinesetitle" name="title_cn" placeholder="Chinese Name of Menu">
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
                                                        $pId = $pm['id'];
                                                        echo '<option value="'.$pm['id'].'">'.$pm['title'].'</option>';
                                                        $secondlevel = $this->mymodel->get('tbl_menu', '*','parent_id =' .$pId);
                                                        foreach($secondlevel as $sl){
                                                            echo '<option value="'.$sl['id'].'" class="secondmenu">'.$sl['title'].'</option>';
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
                                    <label for="slug">Post Link</label>
                                    <select name="page_link" class="form-control" id="article">
                                        <option value="">--Select the Post--</option>
                                        <option value="index">Home</option>
                                        <option value="contact">Contact</option>
                                        <?php
                                        foreach($posttype as $type){
                                            $postType = $type['post_type'];
                                            echo '<option value="'.$postType.'"  class="posttype">'.ucwords($postType).'</option>';
                                            $postList = $this->mymodel->get('tbl_post', '*','post_type ="'.$postType.'" order by id asc');
                                            foreach($postList as $al){

                                                echo '<option value="'.$al['post_type'].'/'.$al['slug'].'">'.ucwords($al['title']).'</optioin>';
                                            }
                                        }

                                        ?>
                                    </select>


                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="Menuorder">Menu Order</label>
                                    <input type="number" class="form-control" id="menu_order" name="menu_order" placeholder="Menu Order(0-9)">
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="exampleInputFile">Status:</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="publish" class="minimal" value="1" checked>
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
    function checktitle() {
        var title = document.getElementById("menutitle").value;
        $.ajax({
            url:"<?php echo base_url('dacadmin/checkmenu/')?>",
            data: {title: title},
            type: 'POST',
            success: function(data){
                var available = data.replace(/[^A-Za-z 0-9 \.,\?""!@#\$%\^&\*\(\)-_=\+;:<>\/\\\|\}\{\[\]`~]*/g, '');
                if(available == 1){

                    bootbox.confirm("<h4>Menu Already Exist</h4>", function(result) {
                        if(result){

                            setTimeout(function(){$("#menutitle").focus();}, 1);
                        }else{
                            setTimeout(function(){$("#menutitle").focus();}, 1);
                        }
                    });
//
                    document.getElementById("addBtn").disabled = true;
                }
                if(available == 0){
                    document.getElementById("addBtn").disabled = false;
                }
            }
        })


    }
</script>
