<?php

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 6/1/2017
 * Time: 1:26 PM
 */
include_once(dirname(__FILE__) . "/Digitalauth.php");

class Application extends Digitalauth
{
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('myapplication');

    }

    function index()
    {
        echo 'hello';

    }

    function addapplication()
    {
        if (!$this->ion_auth->logged_in()) {
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

            $folder_file = 'applications';
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
                'post_type' => 'application'
            );

            $lastId = $this->myapplication->getLastId($article);

            if (isset($related_stories)) {

                $relatedstory = array(
                    'post_id' => $lastId,
                    'post_meta_key' => 'related_story',
                    'post_meta_value' => serialize($related_stories)
                );
                $this->myapplication->addRelated($relatedstory, 'tbl_postmeta');

            }
            if (isset($related_product)) {

                $relatedproduct = array(
                    'post_id' => $lastId,
                    'post_meta_key' => 'related_product',
                    'post_meta_value' => serialize($related_product)
                );

                $this->myapplication->addRelated($relatedproduct, 'tbl_postmeta');
            }

            $this->session->set_flashdata('success_message', 'Application added successfully.');
            redirect("digitalauth/application/addapplication");


        }


        $this->data['allstories'] = $this->myapplication->getValuesbyPostType('story');
        $this->data['allproducts'] = $this->myapplication->getValuesbyPostType('product');
        $this->_render_page('application/addapplication', $this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function listapplications()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('digitalauth/login', 'refresh');
        }


        $this->data['applications'] = $this->myapplication->getAllApplications();
        $this->_render_page('application/listapplication', $this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function editapplication($id=''){
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

                $related_stories = $this->input->post('stories');
                $related_product = $this->input->post('products');

                $folder_file = 'applications';
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
                        redirect("digitalauth/application/editapplication/".$id);
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
                        redirect("digitalauth/application/editapplication/".$id);
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




                    $relatedstorycount = $this->myapplication->getRelatedCount('tbl_postmeta','*','post_id ='.$id.' AND post_meta_key= "related_story"');
                    if($relatedstorycount>0){
                        $relatedstr = $this->myapplication->getApplicationrelated('tbl_postmeta','*','post_id ='.$id.' and post_meta_key = "related_story"');
                        foreach($relatedstr as $prod){
                            $relatedId = $prod->id;
                        }

                        //$relatedId = $this->myapplication->getRelatedValue('tbl_postmeta','id','post_id',$id);
                        $relatedstory = array(
                            'post_meta_value' => serialize($related_stories)
                        );
                        $this->myapplication->editRelated(' tbl_postmeta',$relatedstory, 'id', $relatedId);
                    }
                    else{
                        $relatedstory = array(
                            'post_id' => $id,
                            'post_meta_key' => 'related_story',
                            'post_meta_value' => serialize($related_stories)
                        );

                        $this->myapplication->addRelated($relatedstory, 'tbl_postmeta');
                    }




                    $relatedProductcount = $this->myapplication->getRelatedCount('tbl_postmeta','*','post_id ='.$id.' AND post_meta_key= "related_product"');
                    if($relatedProductcount>0){
                        $relatedPrd = $this->myapplication->getApplicationrelated('tbl_postmeta','*','post_id ='.$id.' and post_meta_key = "related_product"');
                        foreach($relatedPrd as $prod){
                            $relatedId = $prod->id;
                        }

                        $relatedproduct = array(
                            'post_meta_value' => serialize($related_product)
                        );
                        $this->myapplication->editRelated(' tbl_postmeta',$relatedproduct, 'id', $relatedId);
                    }
                    else{
                        $relatedproduct = array(
                            'post_id' => $id,
                            'post_meta_key' => 'related_product',
                            'post_meta_value' => serialize($related_product)
                        );

                        $this->myapplication->addRelated($relatedproduct, 'tbl_postmeta');
                    }


                if($this->myapplication->edit($article, 'id', $id)){
                    $this->session->set_flashdata('success_message', 'Application edited successfully.');
                    redirect("digitalauth/application/editapplication/".$id);
                }
            }
        }

        //get all application values and application related values
        $this->data['applicationValues'] = $this->myapplication->getApplicationByValue('*','id ='.$id);
        $this->data['relatedstory'] = $this->myapplication->getApplicationrelated('tbl_postmeta','*','post_id ='.$id.' and post_meta_key = "related_story"');
        $this->data['relatedproduct'] = $this->myapplication->getApplicationrelated('tbl_postmeta','*','post_id ='.$id.' and post_meta_key = "related_product"');

        //get all stories and products
        $this->data['allstories'] = $this->myapplication->getValuesbyPostType('story');
        $this->data['allproducts'] = $this->myapplication->getValuesbyPostType('product');

        $this->_render_page('application/editapplication',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }


    function deleteapplication($id=''){
        $image = $this->myapplication->getValue('featured_img','id',$id);
        if(!empty($image)){
            $imagepath = './uploads/applications/'.$image;
            $imagepath_thumb = './uploads/applications/thumbnail/'.$image;
            @unlink($imagepath);
            @unlink($imagepath_thumb);
        }
        $image_cn = $this->myapplication->getValue('featured_img_cn','id',$id);
        if(!empty($image)){
            $imagepath_cn = './uploads/applications/'.$image_cn;
            $imagepath_cn_thumb = './uploads/applications/thumbnail/'.$image_cn;
            @unlink($imagepath_cn);
            @unlink($imagepath_cn_thumb);
        }
        $this->myapplication->deleteRelated('post_id',$id,'tbl_postmeta');

        if($this->myapplication->delete('id', $id)){
            $this->session->set_flashdata('success_message', 'Application Deleted successfully.');
            redirect("digitalauth/application/listapplications");
        }
    }

    function checkapplication(){
        $title = $_POST['title'];
        $count = $this->myapplication->getCount('LCASE(title)','title =LCASE("'.$title.'") AND post_type= "application"');
        if($count>0){
            echo '1';
            die();
        }
        else{
            echo '0';
            die();
        }


    }

    function toggleApplicationStatus($id, $stat){
        $reurl = 'digitalauth/application/listapplications';
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
        if($this->myapplication->edit( $additional_data, 'id', $id)){
            redirect($reurl);
            die();
        }
    }
}