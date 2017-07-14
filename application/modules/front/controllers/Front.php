<?php

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

    /*
     * function to switch language,
     * language value stored in session
     */
    function switchlang()
    {
        $langauge = $_POST['language'];
        $this->session->set_userdata("lang", $langauge);
        die();
    }

    function index()
    {

        $data['title'] = $this->config->item('site_title', 'ion_auth');
        $data['allbanners'] = $this->mymodel->get('tbl_post', '*', 'post_type = "banners" and status = 1');
        $data['videos'] = $this->mymodel->get('tbl_post', '*', 'status = 1 and post_type = "videos" order by id desc limit 1');
        $data['allapplications'] = $this->mymodel->get('tbl_post', '*', 'post_type = "applications" and status = 1');
        $data['allnews'] = $this->mymodel->get('tbl_post', '*', 'status = 1 and post_type = "news" order by id desc limit 4');
        $this->_render_page('index', $data);
        $this->load->view('includes/footer');
    }

    function contact()
    {
        $data['title'] = 'Contact | ' . $this->config->item('site_title', 'ion_auth');
        $this->_render_page('contact', $data);
        $this->load->view('includes/footer');
    }

    /*
     * functions created as per post types
     */
    function pages($slug = '')
    {
        $lang = $this->session->userdata('lang');
        if (!empty($slug)) {
            $data['slug'] = $slug;
            $post_id = $this->mymodel->getValue('tbl_post', 'id', 'slug', $slug);
            if ($lang == 'cn') {
                $post_title = $this->mymodel->getValue('tbl_post', 'title_cn', 'slug', $slug);
                $data['title'] = $post_title . ' | ' . $this->config->item('site_title', 'ion_auth');
            } else {
                $post_title = $this->mymodel->getValue('tbl_post', 'title', 'slug', $slug);
                $data['title'] = $post_title . ' | ' . $this->config->item('site_title', 'ion_auth');
            }

            $data['pageDetail'] = $this->mymodel->get('tbl_post', '*', 'slug ="' . $slug . '" and post_type ="pages"');
            $this->_render_page('pages-detail', $data);
        } else {
            $data['title'] = 'Pages | ' . $this->config->item('site_title', 'ion_auth');
            $this->_render_page('404', $data);
        }
        $this->load->view('includes/footer');
    }

    function news($slug = '')
    {
        $lang = $this->session->userdata('lang');
        if (!empty($slug)) {
            if ($lang == 'cn') {
                $post_title = $this->mymodel->getValue('tbl_post', 'title_cn', 'slug', $slug);
                $data['title'] = $post_title . ' | ' . $this->config->item('site_title', 'ion_auth');
            } else {
                $post_title = $this->mymodel->getValue('tbl_post', 'title', 'slug', $slug);
                $data['title'] = $post_title . ' | ' . $this->config->item('site_title', 'ion_auth');
            }

            $data['newsDetail'] = $this->mymodel->get('tbl_post','*','post_type = "news" and slug = "'.$slug.'"');
            $data['newscategory'] = $this->mymodel->get('tbl_post', '*', 'post_type = "newscategory" and status = 1');
            $this->_render_page('news-detail', $data);
        }
        else {
            $data['title'] = 'News | ' . $this->config->item('site_title', 'ion_auth');
            $data['newscategory'] = $this->mymodel->get('tbl_post', '*', 'post_type = "newscategory" and status = 1');
            $this->_render_page('news', $data);
        }
        $this->load->view('includes/footer');
    }

    function product($slug = '')
    {
        $lang = $this->session->userdata('lang');
        if (!empty($slug)) {
            if ($lang == 'cn') {
                $post_title = $this->mymodel->getValue('tbl_post', 'title_cn', 'slug', $slug);
                $data['title'] = $post_title . ' | ' . $this->config->item('site_title', 'ion_auth');
            } else {
                $post_title = $this->mymodel->getValue('tbl_post', 'title', 'slug', $slug);
                $data['title'] = $post_title . ' | ' . $this->config->item('site_title', 'ion_auth');
            }

            $this->_render_page('product-detail', $data);
        } else {
            $data['title'] = 'Products | ' . $this->config->item('site_title', 'ion_auth');
            $this->_render_page('product', $data);
        }
        $this->load->view('includes/footer');
    }

    function category($slug = '')
    {
        $lang = $this->session->userdata('lang');

        if (!empty($slug)) {
            if ($lang == 'cn') {
                $post_title = $this->mymodel->getValue('tbl_post', 'title_cn', 'slug', $slug);
                $data['title'] = $post_title . ' | ' . $this->config->item('site_title', 'ion_auth');
            } else {
                $post_title = $this->mymodel->getValue('tbl_post', 'title', 'slug', $slug);
                $data['title'] = $post_title . ' | ' . $this->config->item('site_title', 'ion_auth');
            }

            $this->_render_page('category-details', $data);
        }
        else {
            $data['title'] = 'Categories | ' . $this->config->item('site_title', 'ion_auth');
            $this->_render_page('category-listing', $data);
        }
        $this->load->view('includes/footer');
    }

    function applications($slug = '')
    {
        $lang = $this->session->userdata('lang');

        if (!empty($slug)) {
            if ($lang == 'cn') {
                $post_title = $this->mymodel->getValue('tbl_post', 'title_cn', 'slug', $slug);
                $data['title'] = $post_title . ' | ' . $this->config->item('site_title', 'ion_auth');
            } else {
                $post_title = $this->mymodel->getValue('tbl_post', 'title', 'slug', $slug);
                $data['title'] = $post_title . ' | ' . $this->config->item('site_title', 'ion_auth');
            }

            //detal
            $appId = $this->mymodel->getValue('tbl_post', 'id', 'slug', $slug);
            $data['applicationdetail'] = $this->mymodel->get('tbl_post','*','post_type = "applications" and slug = "'.$slug.'"');
            $data['apprelatedstory'] =  $this->mymodel->get('tbl_postmeta','*','post_meta_key = "related_story" and post_id = '.$appId);
            $data['apprelatedproduct'] =  $this->mymodel->get('tbl_postmeta','*','post_meta_key = "related_product" and post_id = '.$appId);
            $data['galcount'] = $this->mymodel->getCount('*','tbl_images','post_id = '.$appId);
            if($data['galcount']>0)
            {
              $data['galleryImg'] = $this->mymodel->get('tbl_images','*','post_id = '.$appId.' and status = 1');
            }

            $data['relatedApplications'] = $this->mymodel->get('tbl_post', '*', 'post_type = "applications" and status = 1 and slug !="'.$slug.'"');

            $this->_render_page('applications-detail', $data);
        }
        else {
            $data['title'] = 'Application | ' . $this->config->item('site_title', 'ion_auth');
            $data['allapplications'] = $this->mymodel->get('tbl_post', '*', 'post_type = "applications" and status = 1');
            $this->_render_page('applications', $data);
        }
        $this->load->view('includes/footer');
    }

    function story($slug = ''){

    }

    function _render_page($view, $data = null, $returnhtml = false)//I think this makes more sense
    {
        // $data['menus'] = 'menus come here';
        $lang = $this->session->userdata('lang');
        if ($lang == 'cn') {
            $this->lang->load('ion_auth_lang', 'chinese');
            $this->lang->load('additional_lang', 'chinese');
        } elseif ($lang == 'en') {
            $this->lang->load('ion_auth_lang', 'english');
            $this->lang->load('additional_lang', 'english');
        } else {
            $this->lang->load('ion_auth_lang', 'english');
            $this->lang->load('additional_lang', 'english');
        }
        $data['language'] = $lang;
        $data['menus'] = $this->mymodel->get('tbl_menu', '*', 'status = 1 and parent_id = "0" order by menu_order asc');
        $this->load->view('includes/header', $data);
        $this->viewdata = (empty($data)) ? $this->data : $data;
        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);
        if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
    }
}