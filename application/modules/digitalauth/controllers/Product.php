<?php

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 5/30/2017
 * Time: 4:54 PM
 */
include_once (dirname(__FILE__) . "/Digitalauth.php");
class Product extends Digitalauth
{
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('mycategory');
        $this->load->model('myproduct');

    }

    function index(){
        redirect('digitalauth/product/listproducts', 'refresh');
    }

    function addproduct(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }

        $this->form_validation->set_rules('title', $this->lang->line(''), 'required');

        if ($this->form_validation->run() == TRUE) {
            $image = '';
            $image_cn = '';
            $pfile = '';
            $pfile_cn = '';
            $title = $this->input->post('title');
            $title_cn = $this->input->post('title_cn');
            $slug = $this->input->post('slug');
            $content = $this->input->post('content');
            $content_cn = $this->input->post('content_cn');
            $excrept = $this->input->post('excrept');
            $excrept_cn = $this->input->post('excrept_cn');
            $status = $this->input->post('status');
            if($this->input->post('category')!=''){
                $post_parent = $this->input->post('category');
            }
            else{
                $post_parent = '0';
            }




            $folder_file = 'products';
            $target = 'uploads';
            $path        =  './uploads/'.$folder_file.'/';
            $thumb_path  =  './uploads/'.$folder_file.'/thumbnail/';
            if(!is_dir($path)):
                mkdir($path);
                chmod($path, 0755);
            endif;
            if(!is_dir($thumb_path)):
                mkdir($thumb_path);
                chmod($thumb_path, 0755);
            endif;

            if($_FILES['images']['size'] != 0){
                //$this->callback_image_upload('father_image');
                $imgSize = getimagesize($_FILES["images"]['tmp_name']);
                if($imgSize[0] > 2048 || $imgSize[1] > 2048){
                    $message = "Image height or width is larger than 2048px.";
                    $this->session->set_flashdata('error_message', $message);
                    redirect("digitalauth/product/addproduct/");
                }
                $thumb = array('dest' => $target . '/' . $folder_file, 'size' => array('w' => '300', 'h' => '300'), 'ratio' => true);
                $result = upload_image('images', $target, $thumb, $folder_file);
                if (isset($result['fullname'])) {
                    $image =  $result['fullname'];
                }


            }

            if($_FILES['images_cn']['size'] != 0){
                //$this->callback_image_upload('father_image');
                $imgSize = getimagesize($_FILES["images_cn"]['tmp_name']);
                if($imgSize[0] > 2048 || $imgSize[1] > 2048){
                    $message = "Image height or width is larger than 2048px.";
                    $this->session->set_flashdata('error_message', $message);
                    redirect("digitalauth/product/addproduct/");
                }
                $thumb = array('dest' => $target . '/' . $folder_file, 'size' => array('w' => '300', 'h' => '300'), 'ratio' => true);
                $result = upload_image('images_cn', $target, $thumb, $folder_file);
                if (isset($result['fullname'])) {
                    $image_cn =  $result['fullname'];
                }


            }


            $article = array(
                'title'         =>  $title,
                'title_cn'      =>  $title_cn,
                'slug'          =>  $slug,
                'content'       =>  $content,
                'content_cn'    =>  $content_cn,
                'excrept'       =>  $excrept,
                'excrept_cn'    =>  $excrept_cn,
                'featured_img'  =>  $image,
                'featured_img_cn'=> $image_cn,
                'status'        =>  $status,
                'post_date'     =>  date("Y-m-d  H:i:s"),
                'post_type'     =>  'product',
                'post_parent'     =>  $post_parent
            );

            $lastId = $this->myproduct->getLastId($article);

            $folder_pfile = 'pfiles';
            $target = 'uploads';
            $pfilepath        =  './uploads/'.$folder_pfile.'/';
            //$thumb_path  =  './uploads/'.$folder_file.'/thumbnail/';
            if(!is_dir($pfilepath)):
                mkdir($pfilepath);
                chmod($pfilepath, 0755);
            endif;

            if ($_FILES['pfile']['size']!=0) {

               // $thumb = array('dest' => $target . '/' . $folder_pfile, 'size' => array('w' => '', 'h' => ''), 'ratio' => true);
                $thumb =  $target . '/' . $folder_pfile;
                $result = upload_file('pfile', $thumb);
                if (isset($result['file_name'])) {
                     $pfile =  $result['file_name'];
                }
                $uploadfile = array (
                    'post_id'   => $lastId,
                    'post_meta_key' => 'product_file',
                    'post_meta_value'   => $pfile
                );
                $this->myproduct->addRelated($uploadfile,'tbl_postmeta');
            }



            if ($_FILES['pfile_cn']['size']!=0) {
                $thumb =  $target . '/' . $folder_pfile;
                $result = upload_file('pfile_cn', $thumb);
                if (isset($result['file_name'])) {
                    $pfile_cn =  $result['file_name'];
                }
                $uploadfile_cn = array (
                    'post_id'   => $lastId,
                    'post_meta_key' => 'product_file_cn',
                    'post_meta_value'   => $pfile_cn
                );
                $this->myproduct->addRelated($uploadfile_cn,'tbl_postmeta');
            }


            //if($this->myproduct->add($article)){
                $this->session->set_flashdata('success_message', 'Product added successfully.');
                redirect("digitalauth/product/addproduct");
            //}


        }

        $this->data['allcategories'] = $this->mycategory->getAllCategories();
        $this->_render_page('product/addproduct',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function listproducts(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }

        $this->data['articles'] = $this->myproduct->getAllProducts();
        $this->_render_page('product/listproduct',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function editproduct($id=''){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        if ($this->input->post('btnDo') == 'Edit' ) {

            $this->form_validation->set_rules('title', $this->lang->line(''), 'required');
            if ($this->form_validation->run() == TRUE) {
                $image = '';
                $image_cn = '';
                $title = $this->input->post('title');
                $title_cn = $this->input->post('title_cn');
                $slug = $this->input->post('slug');
                $content = $this->input->post('content');
                $content_cn = $this->input->post('content_cn');
                $excrept = $this->input->post('excrept');
                $excrept_cn = $this->input->post('excrept_cn');
                $status = $this->input->post('status');
                if($this->input->post('category')!=''){
                    $post_parent = $this->input->post('category');
                }
                else{
                    $post_parent = '0';
                }

                $folder_file = 'products';
                $target = 'uploads';
                $path        =  './uploads/'.$folder_file.'/';
                $thumb_path  =  './uploads/'.$folder_file.'/thumbnail/';
                if(!is_dir($path)):
                    mkdir($path);
                    chmod($path, 0755);
                endif;
                if(!is_dir($thumb_path)):
                    mkdir($thumb_path);
                    chmod($thumb_path, 0755);
                endif;

                if($_FILES['images']['size'] != 0){
                    //$this->callback_image_upload('father_image');
                    $imgSize = getimagesize($_FILES["images"]['tmp_name']);
                    if($imgSize[0] > 2048 || $imgSize[1] > 2048){
                        $message = "Image height or width is larger than 2048px.";
                        $this->session->set_flashdata('error_message', $message);
                        redirect("digitalauth/product/editproduct/".$id);
                    }
                    $thumb = array('dest' => $target . '/' . $folder_file, 'size' => array('w' => '300', 'h' => '300'), 'ratio' => true);
                    $result = upload_image('images', $target, $thumb, $folder_file);
                    if (isset($result['fullname'])) {
                        $image =  $result['fullname'];
                    }
                }
                if($_FILES['images_cn']['size'] != 0){
                    //$this->callback_image_upload('father_image');
                    $imgSize = getimagesize($_FILES["images_cn"]['tmp_name']);
                    if($imgSize[0] > 2048 || $imgSize[1] > 2048){
                        $message = "Image height or width is larger than 2048px.";
                        $this->session->set_flashdata('error_message', $message);
                        redirect("digitalauth/product/editproduct/".$id);
                    }
                    $thumb = array('dest' => $target . '/' . $folder_file, 'size' => array('w' => '300', 'h' => '300'), 'ratio' => true);
                    $result = upload_image('images_cn', $target, $thumb, $folder_file);
                    if (isset($result['fullname'])) {
                        $image_cn =  $result['fullname'];
                    }
                }

                if($image!='' && $image_cn ==''){
                    $article = array(
                        'title' => $title,
                        'title_cn' => $title_cn,
                        'slug' => $slug,
                        'content' => $content,
                        'content_cn' => $content_cn,
                        'excrept' => $excrept,
                        'excrept_cn' => $excrept_cn,
                        'featured_img' => $image,
                        'status'  => $status,
                        'post_update' => date("Y-m-d  H:i:s"),
                        'post_parent'     =>  $post_parent
                    );
                }
                elseif($image_cn!='' && $image ==''){
                    $article = array(
                        'title' => $title,
                        'title_cn' => $title_cn,
                        'slug' => $slug,
                        'content' => $content,
                        'content_cn' => $content_cn,
                        'excrept' => $excrept,
                        'excrept_cn' => $excrept_cn,
                        'featured_img_cn' => $image_cn,
                        'status'  => $status,
                        'post_update' => date("Y-m-d  H:i:s"),
                        'post_parent'     =>  $post_parent
                    );
                }
                elseif($image!='' && $image_cn!=''){
                    $article = array(
                        'title' => $title,
                        'title_cn' => $title_cn,
                        'slug' => $slug,
                        'content' => $content,
                        'content_cn' => $content_cn,
                        'excrept' => $excrept,
                        'excrept_cn' => $excrept_cn,
                        'featured_img' => $image,
                        'featured_img_cn' => $image_cn,
                        'status'  => $status,
                        'post_update' => date("Y-m-d  H:i:s"),
                        'post_parent'     =>  $post_parent
                    );
                }
                else{
                    $article = array(
                        'title' => $title,
                        'title_cn' => $title_cn,
                        'slug' => $slug,
                        'content' => $content,
                        'content_cn' => $content_cn,
                        'excrept' => $excrept,
                        'excrept_cn' => $excrept_cn,
                        'status'  => $status,
                        'post_update' => date("Y-m-d  H:i:s"),
                        'post_parent'     =>  $post_parent
                    );
                }

                $folder_pfile = 'pfiles';
                $target = 'uploads';
                $pfilepath        =  './uploads/'.$folder_pfile.'/';
                //$thumb_path  =  './uploads/'.$folder_file.'/thumbnail/';
                if(!is_dir($pfilepath)):
                    mkdir($pfilepath);
                    chmod($pfilepath, 0755);
                endif;

                if ($_FILES['pfile']['size']!=0) {

                    // $thumb = array('dest' => $target . '/' . $folder_pfile, 'size' => array('w' => '', 'h' => ''), 'ratio' => true);
                    $thumb =  $target . '/' . $folder_pfile;
                    $result = upload_file('pfile', $thumb);
                    if (isset($result['file_name'])) {
                        $pfile =  $result['file_name'];
                    }

                    $prodfilecount = $this->myproduct->getfileCount('tbl_postmeta','*','post_id ='.$id.' AND post_meta_key= "product_file"');
                    if($prodfilecount>0){
                        $relatedstr = $this->myapplication->getProductrelated('tbl_postmeta','*','post_id ='.$id.' and post_meta_key = "product_file"');
                        foreach($relatedstr as $prod){
                            $relatedId = $prod->id;
                        }
                        $uploadfile = array(
                            'post_meta_value'   => $pfile
                        );
                        $this->myproduct->editRelated(' tbl_postmeta',$uploadfile, 'id', $relatedId);

                    }else{
                        $uploadfile = array (
                            'post_id'   => $id,
                            'post_meta_key' => 'product_file',
                            'post_meta_value'   => $pfile
                        );
                        $this->myproduct->addRelated($uploadfile,'tbl_postmeta');
                    }

                }
                if ($_FILES['pfile_cn']['size']!=0) {
                    $thumb =  $target . '/' . $folder_pfile;
                    $result = upload_file('pfile_cn', $thumb);
                    if (isset($result['file_name'])) {
                        $pfile_cn =  $result['file_name'];
                    }

                    $prodfile_cn_count = $this->myproduct->getfileCount('tbl_postmeta','*','post_id ='.$id.' AND post_meta_key= "product_file_cn"');
                    if($prodfile_cn_count>0){
                        $relatedstr = $this->myproduct->getProductrelated('tbl_postmeta','*','post_id ='.$id.' and post_meta_key = "product_file_cn"');
                        foreach($relatedstr as $prod){
                            $relatedId = $prod->id;
                        }
                        $uploadfile = array(
                            'post_meta_value'   => $pfile_cn
                        );
                        $this->myproduct->editRelated(' tbl_postmeta',$uploadfile, 'id', $relatedId);

                    }
                    else{
                        $uploadfile_cn = array (
                            'post_id'   => $id,
                            'post_meta_key' => 'product_file_cn',
                            'post_meta_value'   => $pfile_cn
                        );
                        $this->myproduct->addRelated($uploadfile_cn,'tbl_postmeta');
                    }

                }


                if($this->myproduct->edit($article, 'id', $id)){
                    $this->session->set_flashdata('success_message', 'Product edited successfully.');
                    redirect("digitalauth/product/editproduct/".$id);
                }
            }
        }

        $this->data['allcategories'] = $this->mycategory->getAllCategories();
        $this->data['productValues'] = $this->myproduct->getProductByValue('*','id ='.$id);
        $this->data['prodfile'] = $this->myproduct->getProductrelated('tbl_postmeta','*','post_id ='.$id.' and post_meta_key = "product_file"');
        $this->data['prodfile_cn'] = $this->myproduct->getProductrelated('tbl_postmeta','*','post_id ='.$id.' and post_meta_key = "product_file_cn"');



        $this->_render_page('product/editproduct',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function deleteproduct($id){

        $image = $this->myproduct->getValue('featured_img','id',$id);
        if(!empty($image)){
            $imagepath = './uploads/products/'.$image;
            $imagepath_thumb = './uploads/products/thumbnail/'.$image;
            @unlink($imagepath);
            @unlink($imagepath_thumb);
        }
        $image_cn = $this->myproduct->getValue('featured_img_cn','id',$id);
        if(!empty($image)){
            $imagepath_cn = './uploads/products/'.$image_cn;
            $imagepath_cn_thumb = './uploads/products/thumbnail/'.$image_cn;
            @unlink($imagepath_cn);
            @unlink($imagepath_cn_thumb);
        }
        $this->myproduct->deleteRelated('post_id',$id,'tbl_postmeta');
        if($this->myproduct->delete('id', $id)){
            $this->session->set_flashdata('success_message', 'Product Deleted successfully.');
            redirect("digitalauth/product/listproduct");
        }
    }

    function checkproduct(){
         $title = $_POST['title'];
        $count = $this->myproduct->getCount('LCASE(title)','title =LCASE("'.$title.'") AND post_type= "product"');
        if($count>0){
            echo '1';
            die();
        }
        else{
            echo '0';
            die();
        }


    }

    function toggleproductStatus($id, $stat){
        $reurl = 'digitalauth/product/listproducts';
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
        if($this->myproduct->edit( $additional_data, 'id', $id)){
            redirect($reurl);
            die();
        }
    }



}