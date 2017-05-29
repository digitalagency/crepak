<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {
    public $data;
    function __construct()
      {
          parent::__construct();
          $this->load->database();
          $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
           $this->lang->load('auth');
      }

    function index()
      {
        if(!$this->ion_auth->logged_in() ){
          redirect('admin/login', 'refresh');
        }
        // elseif($this->ion_auth->logged_in() && $this->ion_auth->is_admin()){
        //   $this->_render_page('welcome_admin');
        // //  $this->load->view('includes/sub_header');
        //   // $this->load->view('includes/sidebar');
        // }
        else{
            $this->data['menucount'] = $this->mymodel->getcount('*','tbl_menu');
            $this->data['gallerycount'] = $this->mymodel->getcount('*','tbl_gallery');
            $this->data['imagecount'] = $this->mymodel->getcount('*','tbl_gallery_image');
            $this->data['articlecount'] = $this->mymodel->getcount('*','tbl_article');
          $this->_render_page('welcome_admin');
        }
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');

      }

    function main(){
        if(!$this->ion_auth->logged_in() ){
            redirect('admin/login', 'refresh');
        }

        else{
            $this->data['menucount'] = $this->mymodel->getcount('*','tbl_menu');
            $this->data['gallerycount'] = $this->mymodel->getcount('*','tbl_gallery');
            $this->data['imagecount'] = $this->mymodel->getcount('*','tbl_gallery_image');
            $this->data['articlecount'] = $this->mymodel->getcount('*','tbl_article');
            $this->_render_page('main');
        }
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function addmenu(){
        if(!$this->ion_auth->logged_in() ){
            redirect('admin/login', 'refresh');
        }
        $this->form_validation->set_rules('title', $this->lang->line(''), 'required');
        if ($this->form_validation->run() == TRUE) {

            $title = $this->input->post('title');
            $slug = $this->input->post('slug');
            $article_link = $this->input->post('article_link');
            $page_link = $this->input->post('page_link');
            $parentmenu = $this->input->post('parentmenu');
            $external = $this->input->post('externalurl');
            $exteral_link = $this->input->post('exteral_link');
            $status = $this->input->post('status');
            if(!empty($parentmenu)){
                $parent_menu = $parentmenu;
            }else{
                $parent_menu = '0';
            }
            if(!empty($external)){
                $external_val = $external;
                $el = $exteral_link;
            }else{
                $external_val = '0';
                $el = '';
            }
            $menu = array(
                'title'   => $title,
                'slug'    => $slug,
                'parent_id'    => $parent_menu,
                'article_link' => $article_link,
                'page_link'   => $page_link,
                'external'  => $external_val,
                'exteral_link' => $el,
                'status' => $status,
                'created_date' => date("Y-m-d"),
            );
            if($this->mymodel->add('tbl_menu',$menu)){
                $this->session->set_flashdata('success_message', 'Menu added successfully.');
                redirect("admin/addmenu");
            }

        }
        $this->data['ParentMenu']  = $this->mymodel->get('tbl_menu', '*','parent_id =0');
        $this->data['parentcount'] = $this->mymodel->getcount('*','tbl_menu','parent_id =0');
        $this->data['ArticleList']  = $this->mymodel->get('tbl_article', '*','status =1');
        $this->data['Articlecount'] = $this->mymodel->getcount('*','tbl_article','status =1');
        $this->_render_page('addmenu',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function listmenus(){
        if(!$this->ion_auth->logged_in() ){
            redirect('admin/login', 'refresh');
        }
        $this->data['menus'] = $this->mymodel->get('tbl_menu', '*');
        $this->_render_page('listmenus',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function editmenu($id){
        if(!$this->ion_auth->logged_in() ){
            redirect('admin/login', 'refresh');
        }
        if ($this->input->post('btnDo') == 'Edit' ) {
            $this->form_validation->set_rules('title', $this->lang->line(''), 'required');
            if ($this->form_validation->run() == TRUE) {
                $title = $this->input->post('title');
                $slug = $this->input->post('slug');
                $article_link = $this->input->post('article_link');
                $page_link = $this->input->post('page_link');
                $parentmenu = $this->input->post('parentmenu');
                $external = $this->input->post('externalurl');
                $exteral_link = $this->input->post('exteral_link');
                $status = $this->input->post('status');
                if(!empty($parentmenu)){
                    $parent_menu = $parentmenu;
                }else{
                    $parent_menu = '0';
                }
                if(!empty($external)){
                    $external_val = $external;
                    $el = $exteral_link;
                }else{
                    $external_val = '0';
                    $el = '';
                }
                $menu = array(
                    'title'   => $title,
                    'slug'    => $slug,
                    'parent_id'    => $parent_menu,
                    'article_link' => $article_link,
                    'page_link'   => $page_link,
                    'external'  => $external_val,
                    'exteral_link' => $el,
                    'status' => $status,
                    'created_date' => date("Y-m-d"),
                );
                if($this->mymodel->edit("tbl_menu", $menu, 'id', $id)){
                    $this->session->set_flashdata('success_message', 'Article edited successfully.');
                    redirect("admin/editmenu/".$id);
                }

            }
        }
        $this->data['ParentMenu']   = $this->mymodel->get('tbl_menu', '*','parent_id =0');
        $this->data['parentcount']  = $this->mymodel->getcount('*','tbl_menu','parent_id =0');
        $this->data['ArticleList']  = $this->mymodel->get('tbl_article', '*','status =1');
        $this->data['Articlecount'] = $this->mymodel->getcount('*','tbl_article','status =1');
        $this->data['MenuValue']    = $this->mymodel->get('tbl_menu','*','id ='.$id);
        $this->_render_page('editmenu',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function deletemenu($id){
        if(!$this->ion_auth->logged_in() ){
            redirect('admin/login', 'refresh');
        }
        if($this->mymodel->delete("tbl_menu", 'id', $id)){
            $this->session->set_flashdata('success_message', 'Menu Deleted successfully.');
            redirect("admin/listmenus");
        }
    }

    function checkmenu(){
        $title = $_POST['title'];
        $count = $this->mymodel->getCount('LCASE(title)','tbl_menu','title =LCASE("'.$title.'")');
        if($count>0){
            echo '1';
            die();
        }
        else{
            echo '0';
            die();
        }

    }

    function toggleMenuStatus($id, $stat){
        $reurl = 'admin/listmenus';
        if($stat=='1'){
            $additional_data = array(
                'status' => "0"
            );
        }
        else{
            $additional_data = array(
                'status' => "1"
            );
        }
        if($this->mymodel->edit("tbl_menu", $additional_data, 'id', $id)){
            redirect($reurl);
            die();
        }
    }

    function addarticle(){
        if(!$this->ion_auth->logged_in() ){
          redirect('admin/login', 'refresh');
        }
        $this->form_validation->set_rules('title', $this->lang->line(''), 'required');

          if ($this->form_validation->run() == TRUE) {
              $image = '';
              $title = $this->input->post('title');
              $slug = $this->input->post('slug');
              $article = $this->input->post('content');
              $status = $this->input->post('status');
              $folder_file = 'articles';
              $target = 'uploads';
              $path        =  './uploads/'.$folder_file.'/';
              if(!is_dir($path)):
                  mkdir($path);
                  chmod($path, 0755);
              endif;
              if($_FILES['images']['size'] != 0){
                  //$this->callback_image_upload('father_image');
                  $imgSize = getimagesize($_FILES["images"]['tmp_name']);
                  if($imgSize[0] > 2048 || $imgSize[1] > 2048){
                      $message = "Image height or width is larger than 2048px.";
                      $this->session->set_flashdata('error_message', $message);
                      redirect("admin/addarticle/");
                  }
                  $thumb = array('dest' => $target . '/' . $folder_file, 'size' => array('w' => '', 'h' => ''), 'ratio' => true);
                  $result = upload_image('images', $target, $thumb, $folder_file);
                  if (isset($result['fullname'])) {
                  $image =  $result['fullname'];
                  }


              }
              $article = array(
                  'title'   => $title,
                  'slug'    => $slug,
                  'article' => $article,
                  'image'   => $image,
                  'status'  => $status,
                  'created_date' => date("Y-m-d"),
              );

              if($this->mymodel->add('tbl_article',$article)){
                  $this->session->set_flashdata('success_message', 'Article added successfully.');
                  redirect("admin/addarticle");
              }


          }
          else{

          }
        $this->_render_page('addarticle',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
      }

    function editarticle($id){
      if(!$this->ion_auth->logged_in() ){
        redirect('admin/login', 'refresh');
      }
        if ($this->input->post('btnDo') == 'Edit' ) {

            $this->form_validation->set_rules('title', $this->lang->line(''), 'required');
            if ($this->form_validation->run() == TRUE) {
                $image = '';
                $title = $this->input->post('title');
                $slug = $this->input->post('slug');
                $article = $this->input->post('content');
                $status = $this->input->post('status');
                $folder_file = 'articles';
                $target = 'uploads';
                $path        =  './uploads/'.$folder_file.'/';
                if(!is_dir($path)):
                    mkdir($path);
                    chmod($path, 0755);
                endif;

                if($_FILES['images']['size'] != 0){
                    //$this->callback_image_upload('father_image');
                    $imgSize = getimagesize($_FILES["images"]['tmp_name']);
                    if($imgSize[0] > 2048 || $imgSize[1] > 2048){
                        $message = "Image height or width is larger than 2048px.";
                        $this->session->set_flashdata('error_message', $message);
                        redirect("admin/addarticle/");
                    }
                    $thumb = array('dest' => $target . '/' . $folder_file, 'size' => array('w' => '', 'h' => ''), 'ratio' => true);
                    $result = upload_image('images', $target, $thumb, $folder_file);
                    if (isset($result['fullname'])) {
                        $image =  $result['fullname'];
                    }
                }
                if($image!=''){
                    $article = array(
                        'title' => $title,
                        'slug' => $slug,
                        'article' => $article,
                        'image' => $image,
                        'status'  => $status,
                        'created_date' => date("Y-m-d"),
                    );
                }
                else{
                    $article = array(
                        'title' => $title,
                        'slug' => $slug,
                        'article' => $article,
                        'status'  => $status,
                        'created_date' => date("Y-m-d"),
                    );
                }
                if($this->mymodel->edit("tbl_article", $article, 'id', $id)){
                    $this->session->set_flashdata('success_message', 'Article edited successfully.');
                    redirect("admin/editarticle/".$id);
                }
            }
        }

      $this->data['articleValues'] = $this->mymodel->get('tbl_article', '*','id ='.$id);
      $this->_render_page('editarticle',$this->data);
      $this->load->view('includes/adminscript');
      $this->load->view('includes/footer');
    }

    function listarticles(){
        if(!$this->ion_auth->logged_in() ){
          redirect('admin/login', 'refresh');
        }
        $this->data['articles'] = $this->mymodel->get('tbl_article', '*');

        $this->_render_page('listarticles',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function deletearticle($id){
        $image = $this->mymodel->getValue('tbl_article','image','id',$id);
        if(!empty($image)){
            $imagepath = './uploads/articles/'.$image;
            @unlink($imagepath);
        }
        if($this->mymodel->delete("tbl_article", 'id', $id)){
            $this->session->set_flashdata('success_message', 'Article Deleted successfully.');
            redirect("admin/listarticles");
        }
    }

    function checkartilce(){
        $title = $_POST['title'];
       $count = $this->mymodel->getCount('LCASE(title)','tbl_article','title =LCASE("'.$title.'")');
      if($count>0){
          echo '1';
          die();
      }
        else{
            echo '0';
            die();
        }

    }

    function toggleArticleStatus($id, $stat){
        $reurl = 'admin/listarticles';
        if($stat=='1'){
            $additional_data = array(
                'status' => "0"
            );
        }
        else{
            $additional_data = array(
                'status' => "1"
            );
        }
        if($this->mymodel->edit("tbl_article", $additional_data, 'id', $id)){
            redirect($reurl);
            die();
        }
    }

    function addgallery(){
        if(!$this->ion_auth->logged_in() ){
            redirect('admin/login', 'refresh');
        }
        $this->form_validation->set_rules('title', $this->lang->line(''), 'required');

        if ($this->form_validation->run() == TRUE) {
            $image = '';
            $title = $this->input->post('title');
            $slug = $this->input->post('slug');
            $status = $this->input->post('status');
            $folder_file = $title;
            $target = 'uploads';
            $path        =  './uploads/'.$folder_file.'/';

            if($_FILES['galleryimages']['size'] != 0){
                //$this->callback_image_upload('father_image');
                $imgSize = getimagesize($_FILES["galleryimages"]['tmp_name']);
                if($imgSize[0] > 2048 || $imgSize[1] > 2048){
                    $message = "Image height or width is larger than 2048px.";
                    $this->session->set_flashdata('error_message', $message);
                    redirect("admin/addgallery/");
                }
                if(!is_dir($path)):
                    mkdir($path);
                    chmod($path, 0755);
                endif;
                $thumb = array('dest' => $target . '/' . $folder_file, 'size' => array('w' => '', 'h' => ''), 'ratio' => true);
                $result = upload_image('galleryimages', $target, $thumb, $folder_file);
                if (isset($result['fullname'])) {
                    $image =  $result['fullname'];
                }
            }
            $gallery = array(
                'title'   => $title,
                'slug'    => $slug,
                'image'   => $image,
                'status'  => $status,
                'created_date' => date("Y-m-d"),
            );

            if($this->mymodel->add('tbl_gallery',$gallery)){
                $this->session->set_flashdata('success_message', 'Gallery added successfully.');
                redirect("admin/addgallery");
            }
        }
        else{

        }
        $this->_render_page('addgallery',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function listgallaries(){
        if(!$this->ion_auth->logged_in() ){
            redirect('admin/login', 'refresh');
        }
        $this->data['galleries'] = $this->mymodel->get('tbl_gallery', '*');
        $this->_render_page('listgallaries',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function deletegallery($id){
        $image = $this->mymodel->getValue('tbl_gallery','image','id',$id);
        $name = $this->mymodel->getValue('tbl_gallery','title','id',$id);
        $img =  $name.'/'.$image;
        if(!empty($image)){
            $imagepath = './uploads/'.$img;
            @unlink($imagepath);
            rmdir('./uploads/'.$name);
        }
        if($this->mymodel->delete("tbl_gallery", 'id', $id)){
            $this->session->set_flashdata('success_message', 'Gallery Deleted successfully.');
            redirect("admin/listgallaries");
        }
    }

    function editgallery($id){
        if(!$this->ion_auth->logged_in() ){
            redirect('admin/login', 'refresh');
        }
        if ($this->input->post('btnDo') == 'Edit' ){
            $image = '';
            $title = $this->mymodel->getValue('tbl_gallery','title','id',$id);
            $status = $this->input->post('status');
            $folder_file = $title;
            $target = 'uploads';
            $path        =  './uploads/'.$folder_file.'/';
            if(!is_dir($path)):
                mkdir($path);
                chmod($path, 0755);
            endif;

            if($_FILES['images']['size'] != 0){
                //$this->callback_image_upload('father_image');
                $imgSize = getimagesize($_FILES["images"]['tmp_name']);
                if($imgSize[0] > 2048 || $imgSize[1] > 2048){
                    $message = "Image height or width is larger than 2048px.";
                    $this->session->set_flashdata('error_message', $message);
                    redirect("admin/editgallery/");
                }
                $thumb = array('dest' => $target . '/' . $folder_file, 'size' => array('w' => '', 'h' => ''), 'ratio' => true);
                $result = upload_image('images', $target, $thumb, $folder_file);
                if (isset($result['fullname'])) {
                    $image =  $result['fullname'];
                }
            }
            if($image!=''){
                $gallery = array(
                    'image' => $image,
                    'status'  => $status,

                );
            }
            else{
                $gallery = array(
                    'status'  => $status,
                );
            }
            if($this->mymodel->edit("tbl_gallery", $gallery, 'id', $id)){
                $this->session->set_flashdata('success_message', 'Article edited successfully.');
                redirect("admin/editgallery/".$id);
            }
        }
        $this->data['galleryValues'] = $this->mymodel->get('tbl_gallery', '*','id ='.$id);
        $this->_render_page('editgallery',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function toggleGalleryStatus($id, $stat){
        $reurl = 'admin/listgallaries';
        if($stat=='1'){
            $additional_data = array(
                'status' => "0"
            );
        }
        else{
            $additional_data = array(
                'status' => "1"
            );
        }
        if($this->mymodel->edit("tbl_gallery", $additional_data, 'id', $id)){
            redirect($reurl);
            die();
        }
    }

    function checkgallery(){
        if(!$this->ion_auth->logged_in() ){
            redirect('admin/login', 'refresh');
        }
        $title = $_POST['title'];
        $count = $this->mymodel->getCount('LCASE(title)','tbl_gallery','title =LCASE("'.$title.'")');
        if($count>0){
            echo '1';
            die();
        }
        else{
            echo '0';
            die();
        }

    }

    function listphoto($id){
        if(!$this->ion_auth->logged_in() ){
            redirect('admin/login', 'refresh');
        }

        $this->data['galleryValues'] = $this->mymodel->get('tbl_gallery', '*','id ='.$id);
        $this->data['imageValues'] = $this->mymodel->get('tbl_gallery_image', '*','gallery_id ='.$id);
        $this->data['imageCount'] = $this->mymodel->getcount('*','tbl_gallery_image','gallery_id ='.$id);
        $this->_render_page('listphoto',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function addphotos($id){
        if(!$this->ion_auth->logged_in() ){
            redirect('admin/login', 'refresh');
        }
        if ($this->input->post('btnDo') == 'Add' ){
            $status = $this->input->post('status');
            $title = $this->mymodel->getValue('tbl_gallery','title','id',$id);
            $folder_file = $title;
            $target = 'uploads/';
            $path        =  './uploads/'.$folder_file.'/';


            if($_FILES['images']['size'][0] != 0){
                $files1 = $_FILES['images'];
                $cpt = count($_FILES['images']['name']);
                for($i=0; $i<$cpt; $i++){
                        echo '<br>'.$i.'<br>';
                    $imgSize[$i] = getimagesize($files1['tmp_name'][$i]);

                    if($imgSize[$i][0] > 2048 || $imgSize[$i][1] > 2048){
                        $message = "Image height or width is larger than 2048px.";
                        $this->session->set_flashdata('error_message', $message);
                        redirect("admin/addphotos/".$id);
                    }
                    $thumb = array('dest' => $target . '/' . $folder_file, 'size' => array('w' => '', 'h' => ''), 'ratio' => true);
                    $_FILES['images']['name']     = $files1['name'][$i];
                    $_FILES['images']['type']     = $files1['type'][$i];
                    $_FILES['images']['tmp_name'] = $files1['tmp_name'][$i];
                    $_FILES['images']['error']    = $files1['error'][$i];
                    $_FILES['images']['size']     = $files1['size'][$i];

                    $result = upload_image('images', $target, $thumb, $folder_file);

                    if (isset($result['file_name'])) {

                        $data = array('upload_data' => $this->upload->data());
                        //echo 'success';
                        $imagesup = array(
                            'gallery_id' => $id,
                            'image' =>$result['fullname'],
                            'status'=>$status,
                            'created_date' => date("Y-m-d")
                        );
                        $this->mymodel->add('tbl_gallery_image',$imagesup);


                    }
                    else {
                        $message = "Error in uploading.";
                        $this->session->set_flashdata('error_message', $message);
                        redirect("admin/addphotos/".$id);
                    }
                }
                $message = "Images Uploaded successfully.";
                $this->session->set_flashdata('success_message', $message);
                redirect("admin/listphoto/".$id);

            }
        }
        $this->data['galleryValues'] = $this->mymodel->get('tbl_gallery', '*','id ='.$id);
        $this->_render_page('addphotos',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function togglePhotoStatus($id, $stat, $idd){

        $reurl = 'admin/listphoto/'.$idd;
        if($stat=='1'){
            $additional_data = array(
                'status' => "0"
            );
        }
        else{
            $additional_data = array(
                'status' => "1"
            );
        }
        if($this->mymodel->edit("tbl_gallery_image", $additional_data, 'id', $id)){
            redirect($reurl);
            die();
        }
    }

    function deletephotos($id,$idd){
       echo $image = $this->mymodel->getValue('tbl_gallery_image','image','id',$id);
        echo $gallery_id =$this->mymodel->getValue('tbl_gallery_image','gallery_id','id',$id);
        echo $gallery =$this->mymodel->getValue('tbl_gallery','title','id',$gallery_id);
        echo $img =  $gallery.'/'.$image;

        if(!empty($image)){
            $imagepath = './uploads/'.$img;
            @unlink($imagepath);
        }
        if($this->mymodel->delete("tbl_gallery_image", 'id', $id)){
            $this->session->set_flashdata('success_message', 'Image Deleted successfully.');
            redirect("admin/listphoto/".$idd);
        }
    }

    function login()
      {
          if($this->ion_auth->logged_in() ){
              redirect('admin', 'refresh');
          }
          //$this->data['title'] = "Login";

          //validate form input
          $this->form_validation->set_rules('identity', 'Email Address', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');

          if ($this->form_validation->run() == TRUE) {
              // check for "remember me"
              $remember = (bool)$this->input->post('remember');
              //echo $remember;die();
              if($remember=='1'){
                  //echo 'remember me';
                  $year = time() + 31536000;
                  setcookie('identity', $this->input->post('identity'), $year);
              }elseif($remember!='1'){
                  if(isset($_COOKIE['identity'])) {
                      $past = time() - 100;
                      setcookie('identity', 'gone', $past);
                  }
                  //  echo 'dont remember me';
              }

              if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'),$remember)) {
                  //if the login is successful
                  //redirect them back to the home page
                  $this->session->set_flashdata('message', $this->ion_auth->messages());
                  redirect('admin/index', 'refresh');
              } else {
                  // if the login was un-successful
                  // redirect them back to the login page
                  $this->session->set_flashdata('message', $this->ion_auth->errors());
                  redirect('admin/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
              }
          } else {
              //$this->load->view('include/header.php');
              // the user is not logging in so display the login page
              // set the flash data error message if there is one
              $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

              $this->data['identity'] = array('name' => 'identity',
                  'class' => 'form-control',
                  'id' => 'identity',
                  'type' => 'text',
                  'placeholder' => 'Email Address',
                  'value' => (isset($_COOKIE['identity'])?$_COOKIE['identity']:$this->form_validation->set_value('identity')),
              );
              $this->data['password'] = array('name' => 'password',
                  'class' => 'form-control',
                  'id' => 'password',
                  'type' => 'password',
                  'placeholder' => 'password'
              );


              $this->_render_page('admin/login', $this->data);
              $this->load->view('includes/adminlogin');
              $this->load->view('includes/footer');
          }
      }

    // log the user out
    function logout()
      {
          $this->data['title'] = "Logout";

          // log the user out
          $logout = $this->ion_auth->logout();

          // redirect them to the login page
          $this->session->set_flashdata('message', $this->ion_auth->messages());
          redirect('admin/login', 'refresh');
      }

    function editprofile(){
        if(!$this->ion_auth->logged_in() ){
            redirect('admin/login', 'refresh');
        }
        $currentUser = $this->session->userdata('user_id');
        $this->form_validation->set_rules('fname', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('lname', $this->lang->line('create_user_validation_lname_label'), 'required');
        if($this->input->post('password')){
            $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
        }
        if ($this->form_validation->run() == true) {
            $userInfo = array(
              'first_name'  =>  $this->input->post('fname'),
              'last_name'  =>  $this->input->post('lname'),
            );
            if($this->input->post('password')){
                $password = array(
                    'password'  =>  $this->input->post('password')
                );
                $Info = array_merge($userInfo,$password);
            }
            else{
                $Info = $userInfo;
            }
            if ($this->ion_auth->update($currentUser, $Info)) {
                $message = lang('user_user', '') . " " . lang('updated_successfully', '');
                $this->session->set_flashdata('success_message', $message);
                redirect("admin/editprofile/");
            }

        }



        $this->data['userData'] = $this->mymodel->get('users','*','id='.$currentUser);
        $this->_render_page('edit_profile', $this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    // forgot password
    function forgot_password()
      {
          $this->data['title'] = 'forget_password';
          // setting validation rules by checking wheather identity is username or email
          if ($this->config->item('identity', 'ion_auth') != 'email') {
              $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
          } else {
              $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
          }


          if ($this->form_validation->run() == false) {
              $this->data['type'] = $this->config->item('identity', 'ion_auth');
              // setup the input
              $this->data['identity'] = array('name' => 'identity', 'class' => 'form-control',
                  'id' => 'identity', 'type' => 'email'
              );

              if ($this->config->item('identity', 'ion_auth') != 'email') {
                  $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
              } else {
                  $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
              }

              // set any errors and display the form
              $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
              $this->_render_page('auth/forgot_password', $this->data);
          } else {
              $identity_column = $this->config->item('identity', 'ion_auth');
              $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

              if (empty($identity)) {

                  if ($this->config->item('identity', 'ion_auth') != 'email') {
                      $this->ion_auth->set_error('forgot_password_identity_not_found');
                  } else {
                      $this->ion_auth->set_error('forgot_password_email_not_found');
                  }

                  $this->session->set_flashdata('message', $this->ion_auth->errors());
                  redirect("auth/forgot_password", 'refresh');
              }

              // run the forgotten password method to email an activation code to the user
              $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

              if ($forgotten) {
                  // if there were no errors
                  $this->session->set_flashdata('message', $this->ion_auth->messages());
                  redirect("auth/forgot_password", 'refresh'); //we should display a confirmation page here instead of the login page
              } else {
                  $this->session->set_flashdata('message', $this->ion_auth->errors());
                  redirect("auth/forgot_password", 'refresh');
              }
          }
      }

    // reset password - final step for forgotten password
    public function reset_password($code = NULL)
      {
          if (!$code) {
              show_404();
          }

          $user = $this->ion_auth->forgotten_password_check($code);

          if ($user) {
              // if the code is valid then display the password reset form

              $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
              $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

              if ($this->form_validation->run() == false) {
                  // display the form

                  // set the flash data error message if there is one
                  $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                  $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                  $this->data['new_password'] = array(
                      'name' => 'new',
                      'id' => 'new',
                      'type' => 'password',
                      'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                  );
                  $this->data['new_password_confirm'] = array(
                      'name' => 'new_confirm',
                      'id' => 'new_confirm',
                      'type' => 'password',
                      'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                  );
                  $this->data['user_id'] = array(
                      'name' => 'user_id',
                      'id' => 'user_id',
                      'type' => 'hidden',
                      'value' => $user->id,
                  );
                  $this->data['csrf'] = $this->_get_csrf_nonce();
                  $this->data['code'] = $code;

                  // render
                  $this->_render_page('auth/reset_password', $this->data);
              } else {
                  // do we have a valid request?
                  if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

                      // something fishy might be up
                      $this->ion_auth->clear_forgotten_password_code($code);

                      show_error($this->lang->line('error_csrf'));

                  } else {
                      // finally change the password
                      $identity = $user->{$this->config->item('identity', 'ion_auth')};

                      $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                      if ($change) {
                          // if the password was successfully changed
                          $this->session->set_flashdata('message', $this->ion_auth->messages());
                          redirect("auth/login", 'refresh');
                      } else {
                          $this->session->set_flashdata('message', $this->ion_auth->errors());
                          redirect('auth/reset_password/' . $code, 'refresh');
                      }
                  }
              }
          } else {
              // if the code is invalid then send them back to the forgot password page
              $this->session->set_flashdata('message', $this->ion_auth->errors());
              redirect("auth/forgot_password", 'refresh');
          }
      }

    //rendering page
    function _render_page($view, $data = null, $returnhtml = false)//I think this makes more sense
      {
        $this->load->view('includes/header');
        if($this->ion_auth->logged_in() && $this->ion_auth->is_admin()){
          $this->load->view('includes/sub_header');
           $this->load->view('includes/sidebar');
        }


        $this->viewdata = (empty($data)) ? $this->data: $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml) return $view_html;//This will return html on 3rd argument being true

      }

    function register(){
        //$this->ion_auth->register($username, $password, $email, $additional_data, $group)
          $this->ion_auth->register('binaya', '12345678', 'binaya619@gmail.com', array( 'first_name' => 'binaya', 'last_name' => 'shrestha' ), array('1') );
      }


}
