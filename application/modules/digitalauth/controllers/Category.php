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

        $this->_render_page('category/addcategory',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function listcategories(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        $this->_render_page('category/listcategory',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function editcategory(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        $this->_render_page('category/editcategory',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

}