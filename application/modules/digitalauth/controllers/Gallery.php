<?php

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 6/13/2017
 * Time: 10:08 AM
 */
include_once (dirname(__FILE__) . "/Digitalauth.php");
class Gallery extends Digitalauth
{
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('mygallery');

    }

    function addimage($id = ''){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        $this->data['galleryValues'] = $this->mygallery->getPostByValue('*','id ='.$id);
        $this->_render_page('gallery/addphotos',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }
    function listimages($id = ''){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }

        $this->data['galleryValues'] = $this->mygallery->getPostByValue('*','id ='.$id);
        $this->data['imageValues'] = $this->mygallery->getAllImagesById( '*','post_id ='.$id);
        $this->data['imageCount'] = $this->mygallery->getcount('*','post_id ='.$id);
        $this->_render_page('gallery/listphoto',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function toggleImageStatus($id, $stat, $idd){

    }

    function deleteimage($id, $idd){

    }

}