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
        redirect('digitalauth/pages/listpages', 'refresh');

    }

    function addbanner(){
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

            $related_stories = $this->input->post('stories');
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
                    redirect("digitalauth/application/addapplication/");
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
                    redirect("digitalauth/application/addapplication/");
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
                    'post_meta_value' => serialize($related_product)
                );

                $this->mybanner->addRelated($relatedproduct, 'tbl_postmeta');
            }

            $this->session->set_flashdata('success_message', 'Banner added successfully.');
            redirect("digitalauth/banner/addbanner");


        }


        $this->data['allproducts'] = $this->mybanner->getValuesbyPostType('product');
        $this->_render_page('banner/addbanner',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function listbanners(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        $this->data['banners'] = $this->mybanner->getAllBanners();
        $this->_render_page('banner/listbanner',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function editbanner($id=''){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        $this->_render_page('banner/editbanner',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }


    function deletebanner($id=''){
        $image = $this->mybanner->getValue('featured_img','id',$id);
        if(!empty($image)){
            $imagepath = './uploads/applications/'.$image;
            $imagepath_thumb = './uploads/applications/thumbnail/'.$image;
            @unlink($imagepath);
            @unlink($imagepath_thumb);
        }
        $image_cn = $this->mybanner->getValue('featured_img_cn','id',$id);
        if(!empty($image)){
            $imagepath_cn = './uploads/applications/'.$image_cn;
            $imagepath_cn_thumb = './uploads/applications/thumbnail/'.$image_cn;
            @unlink($imagepath_cn);
            @unlink($imagepath_cn_thumb);
        }
        $this->mybanner->deleteRelated('post_id',$id,'tbl_postmeta');

        if($this->mybanner->delete('id', $id)){
            $this->session->set_flashdata('success_message', 'Application Deleted successfully.');
            redirect("digitalauth/application/listapplications");
        }
    }

    function checkbanner(){

        $title = $_POST['title'];
        $count = $this->mybanner->getCount('LCASE(title)','title =LCASE("'.$title.'") AND post_type= "banners"');
        if($count>0){
            echo json_encode(array('status'=>1)) ;
            die();
        }
        else{
           echo json_encode(array('status'=>0)) ;
            die();
        }


    }
}