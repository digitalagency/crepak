<?php
 $currentUser = $this->session->userdata('user_id');
 $username = $this->mymodel->getValue('users','username','id',$currentUser);
?>
<aside class="main-sidebar">
       <!-- sidebar: style can be found in sidebar.less -->
       <section class="sidebar">
         <!-- Sidebar user panel -->
         <div class="user-panel">
           <div class="pull-left image">
             <img src="<?php echo base_url(); ?>scriptscss/images/innerlogo.jpg" class="img-circle" alt="user2-160x160" />
           </div>
           <div class="pull-left info">
             <p><?php echo ucfirst($username); ?></p>

             <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
           </div>
         </div>
         <!-- search form -->
         <form action="#" method="get" class="sidebar-form">
           <div class="input-group">
             <input type="text" name="q" class="form-control" placeholder="Search..."/>
             <span class="input-group-btn">
               <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
             </span>
           </div>
         </form>
         <!-- /.search form -->
         <!-- sidebar menu: : style can be found in sidebar.less -->
         <ul class="sidebar-menu">
           <li class="header">MAIN NAVIGATION</li>
           <li class="treeview <?php if($this->uri->segment(2)==""||$this->uri->segment(2)=="main")echo "active"?>">
             <a href="<?php echo base_url('digitalauth')?>">
               <i class="fa fa-dashboard"></i> <span>Dashboard</span>
             </a>
             <!--<ul class="treeview-menu">
               <li class="<?php /*if($this->uri->segment(2)=="")echo "active"*/?>"><a href="<?php /*echo base_url('admin')*/?>"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
               <li class="<?php /*if($this->uri->segment(2)=="main")echo "active"*/?>"><a href="<?php /*echo base_url('admin/main')*/?>"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
             </ul>-->

           </li>
           <li class="treeview <?php if ($this->uri->segment(2) == "addmenu"||$this->uri->segment(2) == "listmenus"||$this->uri->segment(2) == "editmenu") echo "active"; ?>">
             <a href="#">
               <i class="fa fa-files-o"></i> <span>Menu</span>
               <i class="fa fa-angle-left pull-right"></i>
             </a>
             <ul class="treeview-menu">
               <li class="<?php if($this->uri->segment(2)=="addmenu")echo "active"?>"><a href="<?php echo base_url('digitalauth/addmenu')?>"><i class="fa fa-circle-o"></i> Add Menu</a></li>
               <li class="<?php if($this->uri->segment(2)=="listmenus")echo "active"?>"><a href="<?php echo base_url('digitalauth/listmenus')?>"><i class="fa fa-circle-o"></i> List of Menus</a></li>
             </ul>
           </li>

          <!-- <li class="treeview <?php /*if ($this->uri->segment(2) == "addarticle"||$this->uri->segment(2) == "listarticles"||$this->uri->segment(2) == "editarticle") echo "active"; */?>">
             <a href="#">
               <i class="fa fa-edit"></i> <span>Articles</span>
               <i class="fa fa-angle-left pull-right"></i>
             </a>
             <ul class="treeview-menu">
               <li class="<?php /*if($this->uri->segment(2)=="addarticle")echo "active"*/?>"><a href="<?php /*echo base_url('digitalauth/addarticle')*/?>"><i class="fa fa-circle-o"></i> Add article</a></li>
               <li class="<?php /*if($this->uri->segment(2)=="listarticles")echo "active"*/?>"><a href="<?php /*echo base_url('digitalauth/listarticles')*/?>"><i class="fa fa-circle-o"></i> List Articles</a></li>
             </ul>
           </li>

           <li class="treeview <?php /*if ($this->uri->segment(2) == "addgallery"||$this->uri->segment(2) == "listgallaries"||$this->uri->segment(2) == "editgallery"||$this->uri->segment(2) == "addphotos"||$this->uri->segment(2) == "listphoto") echo "active"; */?>">
             <a href="#">
               <i class="fa fa-image"></i> <span>Gallery</span>
               <i class="fa fa-angle-left pull-right"></i>
             </a>
             <ul class="treeview-menu">
               <li class="<?php /*if($this->uri->segment(2)=="addgallery")echo "active"*/?>"><a href="<?php /*echo base_url('digitalauth/addgallery')*/?>"><i class="fa fa-circle-o"></i> Add Gallery</a></li>
               <li class="<?php /*if($this->uri->segment(2)=="listgallaries")echo "active"*/?>"><a href="<?php /*echo base_url('digitalauth/listgallaries')*/?>"><i class="fa fa-circle-o"></i> List Galleries</a></li>
             </ul>
           </li>
-->

          <!-- <li class="treeview ">
             <a href="#">
               <i class="fa fa-edit"></i> <span>Pages</span>
               <i class="fa fa-angle-left pull-right"></i>
             </a>
             <ul class="treeview-menu">
               <li class="<?php /*if($this->uri->segment(2)=="addpage")echo "active"*/?>"><a href="<?php /*echo base_url('digitalauth/addpage')*/?>"><i class="fa fa-circle-o"></i> Add Page</a></li>
               <li class="<?php /*if($this->uri->segment(2)=="listpages")echo "active"*/?>"><a href="<?php /*echo base_url('digitalauth/listpages')*/?>"><i class="fa fa-circle-o"></i> List Pages</a></li>
             </ul>
           </li>-->

             <li class="treeview <?php if ($this->uri->segment(3) == "addpage"||$this->uri->segment(3) == "listpages"||$this->uri->segment(3) == "editpage") echo "active"; ?>">
                 <a href="#">
                     <i class="fa fa-file"></i> <span>Pages</span>
                     <i class="fa fa-angle-left pull-right"></i>
                 </a>
                 <ul class="treeview-menu">
                     <li class="<?php if($this->uri->segment(3)=="addpage")echo "active"?>"><a href="<?php echo base_url('digitalauth/pages/addpage')?>"><i class="fa fa-circle-o"></i> Add Page</a></li>
                     <li class="<?php if($this->uri->segment(3)=="listpages")echo "active"?>"><a href="<?php echo base_url('digitalauth/pages/listpages')?>"><i class="fa fa-circle-o"></i> List of Pages</a></li>
                 </ul>
             </li>

             <li class="treeview <?php if ($this->uri->segment(3) == "addnews"||$this->uri->segment(3) == "listnews"||$this->uri->segment(3) == "editnews"||$this->uri->segment(3) == "addnewscategory"||$this->uri->segment(3) == "categories"||$this->uri->segment(3) == "editnewscategory") echo "active"; ?>">
                 <a href="#">
                     <i class="fa fa-newspaper-o"></i> <span>News & Events</span>
                     <i class="fa fa-angle-left pull-right"></i>
                 </a>
                 <ul class="treeview-menu">
                     <li class="<?php if($this->uri->segment(3)=="addnews")echo "active"?>"><a href="<?php echo base_url('digitalauth/news/addnews')?>"><i class="fa fa-circle-o"></i> Add News</a></li>
                     <li class="<?php if($this->uri->segment(3)=="listnews")echo "active"?>"><a href="<?php echo base_url('digitalauth/news/listnews')?>"><i class="fa fa-circle-o"></i> List of News</a></li>
                     <li class="<?php if($this->uri->segment(3)=="categories")echo "active"?>"><a href="<?php echo base_url('digitalauth/news/categories')?>"><i class="fa fa-circle-o"></i> News Categories</a></li>
                 </ul>
             </li>

             <li class="treeview <?php if ($this->uri->segment(3) == "addstory"||$this->uri->segment(3) == "liststories"||$this->uri->segment(3) == "editstory") echo "active"; ?>">
                 <a href="#">
                     <i class="fa fa-newspaper-o"></i> <span>Successful Stories</span>
                     <i class="fa fa-angle-left pull-right"></i>
                 </a>
                 <ul class="treeview-menu">
                     <li class="<?php if($this->uri->segment(3)=="addstory")echo "active"?>"><a href="<?php echo base_url('digitalauth/successstory/addstory')?>"><i class="fa fa-circle-o"></i> Add Successful Story</a></li>
                     <li class="<?php if($this->uri->segment(3)=="liststories")echo "active"?>"><a href="<?php echo base_url('digitalauth/successstory/liststories')?>"><i class="fa fa-circle-o"></i> List of Successful Stories</a></li>

                 </ul>
             </li>

             <li class="treeview <?php if ($this->uri->segment(3) == "addapplication"||$this->uri->segment(3) == "listapplications"||$this->uri->segment(3) == "editapplication") echo "active"; ?>">
                 <a href="#">
                     <i class="fa fa-cloud"></i> <span>Applications</span>
                     <i class="fa fa-angle-left pull-right"></i>
                 </a>
                 <ul class="treeview-menu">
                     <li class="<?php if($this->uri->segment(3)=="addapplication")echo "active"?>"><a href="<?php echo base_url('digitalauth/application/addapplication')?>"><i class="fa fa-circle-o"></i> Add Application</a></li>
                     <li class="<?php if($this->uri->segment(3)=="listapplications")echo "active"?>"><a href="<?php echo base_url('digitalauth/application/listapplications')?>"><i class="fa fa-circle-o"></i> List of Applications</a></li>
                 </ul>
             </li>


             <li class="treeview <?php if ($this->uri->segment(3) == "addcategory"||$this->uri->segment(3) == "listcategories"||$this->uri->segment(3) == "editcategory") echo "active"; ?>">
                 <a href="#">
                     <i class="fa fa-edit"></i> <span>Categories</span>
                     <i class="fa fa-angle-left pull-right"></i>
                 </a>
                 <ul class="treeview-menu">
                     <li class="<?php if($this->uri->segment(3)=="addcategory")echo "active"?>"><a href="<?php echo base_url('digitalauth/category/addcategory')?>"><i class="fa fa-circle-o"></i> Add Category</a></li>
                     <li class="<?php if($this->uri->segment(3)=="listcategories")echo "active"?>"><a href="<?php echo base_url('digitalauth/category/listcategories')?>"><i class="fa fa-circle-o"></i> List of Categories</a></li>
                 </ul>
             </li>

             <li class="treeview <?php if ($this->uri->segment(3) == "addproduct"||$this->uri->segment(3) == "listproducts"||$this->uri->segment(3) == "editproduct") echo "active"; ?>">
                 <a href="#">
                     <i class="fa fa-cart-plus"></i> <span>Products</span>
                     <i class="fa fa-angle-left pull-right"></i>
                 </a>
                 <ul class="treeview-menu">
                     <li class="<?php if($this->uri->segment(3)=="addproduct")echo "active"?>"><a href="<?php echo base_url('digitalauth/product/addproduct')?>"><i class="fa fa-circle-o"></i> Add Product</a></li>
                     <li class="<?php if($this->uri->segment(3)=="listproducts")echo "active"?>"><a href="<?php echo base_url('digitalauth/product/listproducts')?>"><i class="fa fa-circle-o"></i> List of Products</a></li>
                 </ul>
             </li>



         </ul>
       </section>
       <!-- /.sidebar -->
     </aside>
<div class="content-wrapper">
