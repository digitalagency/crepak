<?php

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 6/22/2017
 * Time: 12:05 PM
 */
include_once (dirname(__FILE__) . "/Dacadmin.php");
class Banner extends Dacadmin
{
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('mybanner');

    }

    function index(){
        redirect('dacadmin/pages/listpages', 'refresh');

    }

    function addbanner(){
        if(!$this->ion_auth->logged_in() ){
            redirect('dacadmin/login', 'refresh');
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

            $related_product = $this->input->post('products');

            $folder_file = 'banners';
            $target = 'uploads';
            $path = './uploads/' . $folder_file . '/';
            $thumb_path = './uploads/' . $folder_file . '/thumbnail/';
            if (!is_dir($path)):
                mkdir($path);
                chmod($path, 0755);
            endif;
            if (!is_dir($thumb_path)):
                mkdir($thumb_path);
                chmod($thumb_path, 0755);
            endif;

            if ($_FILES['images']['size'] != 0) {
                //$this->callback_image_upload('father_image');
                $imgSize = getimagesize($_FILES["images"]['tmp_name']);
                if ($imgSize[0] > 2048 || $imgSize[1] > 2048) {
                    $message = "Image height or width is larger than 2048px.";
                    $this->session->set_flashdata('error_message', $message);
                    redirect("dacadmin/application/addapplication/");
                }
                $thumb = array('dest' => $target . '/' . $folder_file, 'size' => array('w' => '300', 'h' => '300'), 'ratio' => true);
                $result = upload_image('images', $target, $thumb, $folder_file);
                if (isset($result['fullname'])) {
                    $image = $result['fullname'];
                }


            }

            if ($_FILES['images_cn']['size'] != 0) {
                //$this->callback_image_upload('father_image');
                $imgSize = getimagesize($_FILES["images_cn"]['tmp_name']);
                if ($imgSize[0] > 2048 || $imgSize[1] > 2048) {
                    $message = "Image height or width is larger than 2048px.";
                    $this->session->set_flashdata('error_message', $message);
                    redirect("dacadmin/application/addapplication/");
                }
                $thumb = array('dest' => $target . '/' . $folder_file, 'size' => array('w' => '300', 'h' => '300'), 'ratio' => true);
                $result = upload_image('images_cn', $target, $thumb, $folder_file);
                if (isset($result['fullname'])) {
                    $image_cn = $result['fullname'];
                }


            }


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
                'status' => $status,
                'post_date' => date("Y-m-d  H:i:s"),
                'post_type' => 'banners'
            );

            $lastId = $this->mybanner->getLastId($article);

            if (isset($related_product)) {

                $relatedproduct = array(
                    'post_id' => $lastId,
                    'post_meta_key' => 'related_product',
                    'post_meta_value' => $related_product
                );

                $this->mybanner->addRelated($relatedproduct, 'tbl_postmeta');
            }

            $this->session->set_flashdata('success_message', 'Banner added successfully.');
            redirect("dacadmin/banner/addbanner");


        }


        $this->data['allproducts'] = $this->mybanner->getValuesbyPostType('product');
        $this->_render_page('banner/addbanner',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function listbanners(){
        if(!$this->ion_auth->logged_in() ){
            redirect('dacadmin/login', 'refresh');
        }
        $this->data['banners'] = $this->mybanner->getAllBanners();
        $this->_render_page('banner/listbanner',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function editbanner($id=''){
        if(!$this->ion_auth->logged_in() ){
            redirect('dacadmin/login', 'refresh');
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

                $related_product = $this->input->post('products');

                $folder_file = 'banners';
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
                        redirect("dacadmin/banner/editbanner/".$id);
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
                        redirect("dacadmin/banner/editbanner/".$id);
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
                    );
                }



                if (isset($related_product)) {
                    $relatedProductcount = $this->mybanner->getRelatedCount('tbl_postmeta', '*', 'post_id =' . $id . ' AND post_meta_key= "related_product"');
                    if ($relatedProductcount > 0) {
                        $relatedPrd = $this->mybanner->getBannerrelated('tbl_postmeta', '*', 'post_id =' . $id . ' and post_meta_key = "related_product"');
                        foreach ($relatedPrd as $prod) {
                            $relatedId = $prod->id;
                        }

                        $relatedproduct = array(
                            'post_meta_value' => $related_product
                        );
                        $this->mybanner->editRelated(' tbl_postmeta', $relatedproduct, 'id', $relatedId);
                    } else {
                        $relatedproduct = array(
                            'post_id' => $id,
                            'post_meta_key' => 'related_product',
                            'post_meta_value' => $related_product
                        );

                        $this->mybanner->addRelated($relatedproduct, 'tbl_postmeta');
                    }
                }

                if($this->mybanner->edit($article, 'id', $id)){
                    $this->session->set_flashdata('success_message', 'Application edited successfully.');
                    redirect("dacadmin/banner/editbanner/".$id);
                }
            }
        }

        $this->data['bannersValue'] = $this->mybanner->getBannersByValue('*','id ='.$id);
        $this->data['allproducts'] = $this->mybanner->getValuesbyPostType('product');
        $this->data['relatedproduct'] = $this->mybanner->getBannerrelated('tbl_postmeta','*','post_id ='.$id.' and post_meta_key = "related_product"');
        $this->_render_page('banner/editbanner',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }


    function deletebanner($id=''){
        $image = $this->mybanner->getValue('featured_img','id',$id);
        if(!empty($image)){
            $imagepath = './uploads/banners/'.$image;
            $imagepath_thumb = './uploads/banners/thumbnail/'.$image;
            @unlink($imagepath);
            @unlink($imagepath_thumb);
        }
        $image_cn = $this->mybanner->getValue('featured_img_cn','id',$id);
        if(!empty($image)){
            $imagepath_cn = './uploads/banners/'.$image_cn;
            $imagepath_cn_thumb = './uploads/banners/thumbnail/'.$image_cn;
            @unlink($imagepath_cn);
            @unlink($imagepath_cn_thumb);
        }
        $this->mybanner->deleteRelated('post_id',$id,'tbl_postmeta');

        if($this->mybanner->delete('id', $id)){
            $this->session->set_flashdata('success_message', 'Banner Deleted successfully.');
            redirect("dacadmin/banner/listbanners");
        }
    }

    function checkbanner(){

        $title = $_POST['title'];
        $count = $this->mybanner->getCount('LCASE(title)','title =LCASE("'.$title.'") AND post_type= "banners"');
        if($count>0){
            echo '1' ;
            die();
        }
        else{
           echo '0' ;
            die();
        }


    }

    function toggleBannerStatus($id, $stat){
        $reurl = 'dacadmin/banner/listbanners';
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
        if($this->mybanner->edit( $additional_data, 'id', $id)){
            redirect($reurl);
            die();
        }
    }
}