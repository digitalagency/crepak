<?php

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 5/30/2017
 * Time: 4:54 PM
 */
include_once (dirname(__FILE__) . "/Digitalauth.php");
class Category extends Digitalauth
{
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('mycategory');

    }

    function index(){
        echo 'hello';

    }

    function addcategory(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }

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


            $folder_file = 'categories';
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
                    redirect("digitalauth/pages/addpage/");
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
                    redirect("digitalauth/pages/addpage/");
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
                'post_type'     =>  'category'
            );


            if($this->mycategory->add($article)){
                $this->session->set_flashdata('success_message', 'Category added successfully.');
                redirect("digitalauth/category/addcategory");
            }


        }


        $this->_render_page('category/addcategory',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function listcategories(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }

        $this->data['articles'] = $this->mycategory->getAllCategories();
        $this->_render_page('category/listcategory',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function editcategory($id=''){
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

                $folder_file = 'categories';
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
                        redirect("digitalauth/editpage/".$id);
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
                        redirect("digitalauth/editpage/".$id);
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
                        'post_update' => date("Y-m-d"),
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
                        'post_update' => date("Y-m-d"),
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
                        'post_update' => date("Y-m-d"),
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
                        'post_update' => date("Y-m-d"),
                    );
                }
                /*echo '<pre>';
                    print_r($article);
                echo '<pre>';
                die();*/
                if($this->mycategory->edit($article, 'id', $id)){
                    $this->session->set_flashdata('success_message', 'Category edited successfully.');
                    redirect("digitalauth/category/editcategory/".$id);
                }
            }
        }


        $this->data['categoryValues'] = $this->mycategory->getCategoryByValue('*','id ='.$id);
        $this->_render_page('category/editcategory',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function deletecategory($id){

        $image = $this->mycategory->getValue('featured_img','id',$id);
        if(!empty($image)){
            $imagepath = './uploads/categories/'.$image;
            $imagepath_thumb = './uploads/categories/thumbnail/'.$image;
            @unlink($imagepath);
            @unlink($imagepath_thumb);
        }
        $image_cn = $this->mycategory->getValue('featured_img_cn','id',$id);
        if(!empty($image)){
            $imagepath_cn = './uploads/categories/'.$image_cn;
            $imagepath_cn_thumb = './uploads/categories/thumbnail/'.$image_cn;
            @unlink($imagepath_cn);
            @unlink($imagepath_cn_thumb);
        }
        if($this->mycategory->delete('id', $id)){
            $this->session->set_flashdata('success_message', 'Category Deleted successfully.');
            redirect("digitalauth/category/listcategories");
        }
    }

    function checkcategory(){
         $title = $_POST['title'];
        $count = $this->mycategory->getCount('LCASE(title)','title =LCASE("'.$title.'") AND post_type= "category"');
        if($count>0){
            echo '1';
            die();
        }
        else{
            echo '0';
            die();
        }


    }

    function toggleCategoryStatus($id, $stat){
        $reurl = 'digitalauth/category/listcategories';
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
        if($this->mycategory->edit( $additional_data, 'id', $id)){
            redirect($reurl);
            die();
        }
    }

}