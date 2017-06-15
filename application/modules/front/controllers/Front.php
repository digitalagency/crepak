<?php

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 6/15/2017
 * Time: 3:39 PM
 */
class Front extends CI_Controller
{
    public $data;
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        //$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }
    function index()
    {
        $this->_render_page('index');
        $this->load->view('includes/footer');

    }

    function contact()
    {
        $this->_render_page('contact');
        $this->load->view('includes/footer');

    }

    function news($slug = '')
    {

        if(!empty($slug)){
            $this->_render_page('news-detail');
        }
        else{
            $this->_render_page('news');

        }
        $this->load->view('includes/footer');

    }

    function product($slug = '')
    {
        if(!empty($slug)){
            $this->_render_page('product-detail');
        }
        else{
            $this->_render_page('product');
        }

        $this->load->view('includes/footer');

    }


    function _render_page($view, $data = null, $returnhtml = false)//I think this makes more sense
    {
        $this->load->view('includes/header');
        $this->viewdata = (empty($data)) ? $this->data: $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml) return $view_html;//This will return html on 3rd argument being true

    }
}