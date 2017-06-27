<!-- breadcrumb -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List of News Categories</li>
    </ol>
</section>
<!-- breadcrumb -->

<!-- Main content -->
<section class="content">
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-info'>

                <div class='box-header'>
                    <h3 class='box-title'>List of News Category</h3>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="<?php echo base_url('dacadmin/news/addnewscategory')?>">Add News Category </a>
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
                            <th>Title</th>
                            <th>Chinese Title</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($newscateogry as $news){

                            ?>
                            <tr>
                                <td><?php echo $news->title.' ('.$news->slug.')'?></td>
                                <td><?php echo $news->title_cn;?></td>


                                <td><?php echo $news->post_date?></td>

                                <td>
                                    <a href="<?php echo base_url('dacadmin/news/editnewscategory/'.$news->id); ?>" title="Edit <?php echo $news->title;?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="<?php echo base_url('dacadmin/news/deletnewscategory/'.$news->id); ?>" title="Delete <?php echo $news->title;?>"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Chinese Title</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col-->
    </div><!-- ./row -->
</section><!-- /.content -->