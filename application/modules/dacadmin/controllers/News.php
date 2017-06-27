<?php

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 6/1/2017
 * Time: 2:49 PM
 */
include_once (dirname(__FILE__) . "/Dacadmin.php");
class News extends Dacadmin
{
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('mynews');

    }

    /*News Category*/

    function addnews(){
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
            if($this->input->post('category')!=''){
                $post_parent = $this->input->post('category');
            }
            else{
                $post_parent = '0';
            }


            $folder_file = 'news';
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
                    redirect("digitalauth/news/addnews/");
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
                    redirect("digitalauth/news/addnews/");
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
                'post_type'     =>  'news',
                'post_parent'     =>  $post_parent
            );


            if($this->mynews->add($article)){
                $this->session->set_flashdata('success_message', 'News added successfully.');
                redirect("digitalauth/news/addnews");
            }


        }

        $this->data['allcategories'] = $this->mynews->getAllNewsCategories();
        $this->_render_page('news/addnews',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function listnews(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }

        $this->data['allnews'] = $this->mynews->getAllNews();
        $this->_render_page('news/listnews',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function editnews($id=''){
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

                $folder_file = 'news';
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
                        redirect("digitalauth/news/editnews/".$id);
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
                        redirect("digitalauth/news/editnews/".$id);
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

                if($this->mynews->edit($article, 'id', $id)){
                    $this->session->set_flashdata('success_message', 'News edited successfully.');
                    redirect("digitalauth/news/editnews/".$id);
                }
            }
        }

        $this->data['allnews'] = $this->mynews->getAllNewsCategories();
        $this->data['newsValues'] = $this->mynews->getNewsByValue('*','id ='.$id);
        $this->_render_page('news/editnews',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function deletenews($id){

        $image = $this->mynews->getValue('featured_img','id',$id);
        if(!empty($image)){
            $imagepath = './uploads/news/'.$image;
            $imagepath_thumb = './uploads/news/thumbnail/'.$image;
            @unlink($imagepath);
            @unlink($imagepath_thumb);
        }
        $image_cn = $this->mynews->getValue('featured_img_cn','id',$id);
        if(!empty($image)){
            $imagepath_cn = './uploads/news/'.$image_cn;
            $imagepath_cn_thumb = './uploads/news/thumbnail/'.$image_cn;
            @unlink($imagepath_cn);
            @unlink($imagepath_cn_thumb);
        }
        if($this->mynews->delete('id', $id)){
            $this->session->set_flashdata('success_message', 'News Deleted successfully.');
            redirect("digitalauth/news/listnews");
        }
    }

    function checknews(){
        $title = $_POST['title'];
        $count = $this->mynews->getCount('LCASE(title)','title =LCASE("'.$title.'") AND post_type= "news"');
        if($count>0){
            echo '1';
            die();
        }
        else{
            echo '0';
            die();
        }
    }


    function togglenewsStatus($id, $stat){
        $reurl = 'digitalauth/news/listnews';
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
        if($this->mynews->edit( $additional_data, 'id', $id)){
            redirect($reurl);
            die();
        }
    }

    /*News Category*/

    function addnewscategory(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        $this->form_validation->set_rules('title', $this->lang->line(''), 'required');
        if ($this->form_validation->run() == TRUE) {
            $title = $this->input->post('title');
            $title_cn = $this->input->post('title_cn');
            $slug = $this->input->post('slug');

            $newscategory = array(
                'title'         =>  $title,
                'title_cn'      =>  $title_cn,
                'slug'          =>  $slug,
                'status'        =>  '1',
                'post_date'     =>  date("Y-m-d  H:i:s"),
                'post_type'     =>  'newscategory'
            );

            if($this->mynews->add($newscategory)){
                $this->session->set_flashdata('success_message', 'News Category added successfully.');
                redirect("digitalauth/news/addnewscategory");
            }




        }
        $this->_render_page('news/addcategory',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function categories(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }

        $this->data['newscateogry'] = $this->mynews->getAllNewsCategories();
        $this->_render_page('news/categories',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function editnewscategory($id=''){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        if ($this->input->post('btnDo') == 'Edit' ) {
            $this->form_validation->set_rules('title', $this->lang->line(''), 'required');
            if ($this->form_validation->run() == TRUE) {
                $title = $this->input->post('title');
                $title_cn = $this->input->post('title_cn');
                $slug = $this->input->post('slug');

                $newscategory = array(
                    'title' => $title,
                    'title_cn' => $title_cn,
                    'slug' => $slug,
                    'status' => '1',
                    'post_date' => date("Y-m-d  H:i:s"),
                    'post_type' => 'newscategory'
                );

                if($this->mynews->edit($newscategory, 'id', $id)){
                    $this->session->set_flashdata('success_message', 'News Category edited successfully.');
                    redirect("digitalauth/news/editnewscategory/".$id);
                }
            }
        }
        $this->data['categoryValues'] = $this->mynews->getCategoryByValue('*','id ='.$id);
        $this->_render_page('news/editcategory',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function deletnewscategory($id){

        if($this->mynews->delete('id', $id)){
            $this->session->set_flashdata('success_message', 'News Category Deleted successfully.');
            redirect("digitalauth/news/categories");
        }
    }

    function checknewscategory(){
        $title = $_POST['title'];
        $count = $this->mynews->getCount('LCASE(title)','title =LCASE("'.$title.'") AND post_type= "newscategory"');
        if($count>0){
            echo '1';
            die();
        }
        else{
            echo '0';
            die();
        }
    }

}