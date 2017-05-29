<?php
 $currentUser = $this->session->userdata('user_id');
 $username = $this->mymodel->getValue('users','username','id',$currentUser);

  ?>

<header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url('admin/')?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?php echo  substr(ucfirst($username),0, 3)?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?php echo ucfirst($username);?></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url(); ?>scriptscss/images/innerlogo.jpg" class="user-image" alt="user2-160x160"/>
                <span class="hidden-xs"><?php echo ucfirst($username);?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <?php
                  $first_name1 = $last_name1 = $last_login ="";
                   $currentUser = $this->session->userdata('user_id');
                   $username = $this->mymodel->getValue('users','first_name','id',$currentUser);
                   $userData = $this->mymodel->get('users','*','id='.$currentUser);
                   foreach ($userData as $key) {
                     $first_name1 = $key['first_name'];
                     $last_name1 = $key['last_name'];
                     $last_login = $key['last_login'];
                   }
                   ?>
                  <img src="<?php echo base_url(); ?>scriptscss/images/innerlogo.jpg" class="img-circle" alt="user2-160x160" />
                  <p>
                    <?php echo $first_name1." ".$last_name1;?>

                    <small>Logged in since <?php echo date("H:i:s", $last_login);?></small>
                  </p>


                </li>
                <!-- Menu Body -->

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url('admin/editprofile');?>" class="btn btn-default btn-flat">Edit Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url('admin/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->

          </ul>
        </div>
      </nav>
    </header>
