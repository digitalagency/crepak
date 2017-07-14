<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


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
	function hello(){

		$this->_render_page('welcome_message');
		$this->load->view('includes/footer');
	}

	function test(){

		$this->_render_page('welcome_message');
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
