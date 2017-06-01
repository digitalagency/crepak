<?php

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 6/1/2017
 * Time: 1:26 PM
 */
include_once (dirname(__FILE__) . "/Digitalauth.php");
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

    function index(){
        echo 'hello';

    }
    function addapplication(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        $this->_render_page('application/addapplication',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function listapplications(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        $this->_render_page('application/listapplication',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

}