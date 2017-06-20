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
    function switchlang(){
        $langauge = $_POST['language'];
        $this->session->set_userdata("lang", $langauge);

        $lang = $this->session->userdata('lang');
        $root_domain = base_url();
        $base_domain_url = 'http://' . base_url() . $lang;

        $this->config->set_item('base_url', $base_domain_url);

        echo base_url();


        die();
    }

    function index()
    {

        $data['title'] = $this->config->item('site_title', 'ion_auth');
        $this->_render_page('index', $data);
        $this->load->view('includes/footer');

    }

    function contact()
    {
        $data['title'] = 'Contact | '.$this->config->item('site_title', 'ion_auth');
        $this->_render_page('contact', $data);
        $this->load->view('includes/footer');

    }

    function news($slug = '')
    {
        $data['title'] = 'News | '.$this->config->item('site_title', 'ion_auth');

        if(!empty($slug)){
            $this->_render_page('news-detail',$data);
        }
        else{
            $this->_render_page('news',$data);

        }
        $this->load->view('includes/footer');

    }

    function product($slug = '')
    {
        $data['title'] = 'Products | '.$this->config->item('site_title', 'ion_auth');
        if(!empty($slug)){
            $this->_render_page('product-detail',$data);
        }
        else{
            $this->_render_page('product',$data);
        }

        $this->load->view('includes/footer');

    }

    function category($slug = '')
    {
        $data['title'] = 'Products | '.$this->config->item('site_title', 'ion_auth');
        if(!empty($slug)){
            $this->_render_page('product-detail',$data);
        }
        else{
            $this->_render_page('product',$data);
        }

        $this->load->view('includes/footer');

    }

    function applications($slug = ''){
        $data['title'] = 'Application | '.$this->config->item('site_title', 'ion_auth');
        if(!empty($slug)){
            $this->_render_page('product-detail',$data);
        }
        else{
            $this->_render_page('product',$data);
        }

        $this->load->view('includes/footer');
    }


    function _render_page($view, $data = null, $returnhtml = false)//I think this makes more sense
    {
       // $data['menus'] = 'menus come here';
        $lang =  $this->session->userdata('lang');
        if($lang == 'cn'){
            $this->lang->load('ion_auth_lang','chinese');
            $this->lang->load('additional_lang','chinese');
        }
        elseif($lang == 'en'){
            $this->lang->load('ion_auth_lang','english');
            $this->lang->load('additional_lang','english');
        }
        else{
            $this->lang->load('ion_auth_lang','english');
            $this->lang->load('additional_lang','english');
        }


        $data['menus']   = $this->mymodel->get('tbl_menu', '*','parent_id =0');
        $this->load->view('includes/header',$data);
        $this->viewdata = (empty($data)) ? $this->data: $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml) return $view_html;//This will return html on 3rd argument being true

    }
}