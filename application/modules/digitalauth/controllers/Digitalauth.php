<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Digitalauth extends MX_Controller {
    public $data;
    function __construct()
      {
          parent::__construct();
          $this->load->database();
          $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
           $this->lang->load('auth');
      }

    function index()
      {
        if(!$this->ion_auth->logged_in() ){
          redirect('digitalauth/login', 'refresh');
        }

        else{
            $this->data['menucount'] = $this->mymodel->getcount('*','tbl_menu');
            $this->data['pagecount'] = $this->mymodel->getcount('*','tbl_post','post_type = "pages"');
            $this->data['categorycount'] = $this->mymodel->getcount('*','tbl_post','post_type = "category"');
            $this->data['productcount'] = $this->mymodel->getcount('*','tbl_post','post_type = "product"');

          $this->_render_page('index');
        }
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');

      }


    function addmenu(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        $this->form_validation->set_rules('title', $this->lang->line(''), 'required');
        if ($this->form_validation->run() == TRUE) {

            $title = $this->input->post('title');
            $title_cn = $this->input->post('title_cn');
            $page_link = $this->input->post('page_link');
            $parentmenu = $this->input->post('parentmenu');
            $status = $this->input->post('status');
            if(!empty($parentmenu)){
                $parent_menu = $parentmenu;
            }else{
                $parent_menu = '0';
            }
            $menu_order = $this->input->post('menu_order');
            $menu = array(
                'title'   => $title,
                'title_cn'   => $title_cn,
                'parent_id'    => $parent_menu,
                'page_link'   => $page_link,
                'status' => $status,
                'menu_order'    => $menu_order,
                'created_date' => date("Y-m-d"),
            );
            if($this->mymodel->add('tbl_menu',$menu)){
                $this->session->set_flashdata('success_message', 'Menu added successfully.');
                redirect("digitalauth/addmenu");
            }

        }
        $this->data['ParentMenu']  = $this->mymodel->get('tbl_menu', '*','parent_id =0');
        $this->data['parentcount'] = $this->mymodel->getcount('*','tbl_menu','parent_id =0');
        $this->data['posttype']     = $this->mymodel->get('tbl_post','Distinct(post_type)','status = "1" order by post_type asc');
        //$this->data['ArticleList']  = $this->mymodel->get('tbl_post', '*','status = "1" order by post_type asc');

        $this->_render_page('addmenu',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function listmenus(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        $this->data['menus'] = $this->mymodel->get('tbl_menu', '*');
        $this->_render_page('listmenus',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function editmenu($id){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        if ($this->input->post('btnDo') == 'Edit' ) {
            $this->form_validation->set_rules('title', $this->lang->line(''), 'required');
            if ($this->form_validation->run() == TRUE) {
                $title = $this->input->post('title');
                $title_cn = $this->input->post('title_cn');
                $page_link = $this->input->post('page_link');
                $parentmenu = $this->input->post('parentmenu');
                $status = $this->input->post('status');
                if(!empty($parentmenu)){
                    $parent_menu = $parentmenu;
                }else{
                    $parent_menu = '0';
                }
                $menu_order = $this->input->post('menu_order');

                $menu = array(
                    'title'   => $title,
                    'title_cn'   => $title_cn,
                    'parent_id'    => $parent_menu,
                    'page_link'   => $page_link,
                    'status' => $status,
                    'menu_order'    => $menu_order,
                    'created_date' => date("Y-m-d"),
                );
                if($this->mymodel->edit("tbl_menu", $menu, 'id', $id)){
                    $this->session->set_flashdata('success_message', 'Article edited successfully.');
                    redirect("digitalauth/editmenu/".$id);
                }

            }
        }
        $this->data['ParentMenu']   = $this->mymodel->get('tbl_menu', '*','parent_id =0');
        $this->data['parentcount']  = $this->mymodel->getcount('*','tbl_menu','parent_id =0');
        $this->data['posttype']     = $this->mymodel->get('tbl_post','Distinct(post_type)','status = "1" order by post_type asc');

        $this->data['MenuValue']    = $this->mymodel->get('tbl_menu','*','id ='.$id);

        $this->_render_page('editmenu',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function deletemenu($id){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        if($this->mymodel->delete("tbl_menu", 'id', $id)){
            $this->session->set_flashdata('success_message', 'Menu Deleted successfully.');
            redirect("digitalauth/listmenus");
        }
    }

    function checkmenu(){
        $title = $_POST['title'];
        $count = $this->mymodel->getCount('LCASE(title)','tbl_menu','title =LCASE("'.$title.'")');
        if($count>0){
            echo '1';
            die();
        }
        else{
            echo '0';
            die();
        }

    }

    function toggleMenuStatus($id, $stat){
        $reurl = 'digitalauth/listmenus';
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
        if($this->mymodel->edit("tbl_menu", $additional_data, 'id', $id)){
            redirect($reurl);
            die();
        }
    }


    function download($filename){
         $name = $filename;
        $this->load->helper('download');
        $path = base_url().'uploads/pfiles/'.$filename;
        $pth    =   file_get_contents($path);
        //$nme    =   "sample_file.pdf";
        force_download($name, $pth);


        /*if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }

        // get the file mime type using the file extension
        $this->load->helper('file');

        $mime = get_mime_by_extension($path);

        // Build the headers to push out the file properly.
        header('Pragma: public');     // required
        header('Expires: 0');         // no cache
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($path)).' GMT');
        header('Cache-Control: private',false);
        header('Content-Type: '.$mime);  // Add the mime type from Code igniter.
        header('Content-Disposition: attachment; filename="'.basename($name).'"');  // Add the file name
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: '.filesize($path)); // provide file size
        header('Connection: close');
        readfile($path); // push it out*/
        exit();
    }

    function login()
      {
          if($this->ion_auth->logged_in() ){
              redirect('digitalauth', 'refresh');
          }
          //$this->data['title'] = "Login";

          //validate form input
          $this->form_validation->set_rules('identity', 'Email Address', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');

          if ($this->form_validation->run() == TRUE) {
              // check for "remember me"
              $remember = (bool)$this->input->post('remember');
              //echo $remember;die();
              if($remember=='1'){
                  //echo 'remember me';
                  $year = time() + 31536000;
                  setcookie('identity', $this->input->post('identity'), $year);
              }elseif($remember!='1'){
                  if(isset($_COOKIE['identity'])) {
                      $past = time() - 100;
                      setcookie('identity', 'gone', $past);
                  }
                  //  echo 'dont remember me';
              }

              if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'),$remember)) {
                  //if the login is successful
                  //redirect them back to the home page
                  $this->session->set_flashdata('message', $this->ion_auth->messages());
                  redirect('digitalauth/index', 'refresh');
              } else {
                  // if the login was un-successful
                  // redirect them back to the login page
                  $this->session->set_flashdata('message', $this->ion_auth->errors());
                  redirect('digitalauth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
              }
          } else {
              //$this->load->view('include/header.php');
              // the user is not logging in so display the login page
              // set the flash data error message if there is one
              $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

              $this->data['identity'] = array('name' => 'identity',
                  'class' => 'form-control',
                  'id' => 'identity',
                  'type' => 'text',
                  'placeholder' => 'Email Address',
                  'value' => (isset($_COOKIE['identity'])?$_COOKIE['identity']:$this->form_validation->set_value('identity')),
              );
              $this->data['password'] = array('name' => 'password',
                  'class' => 'form-control',
                  'id' => 'password',
                  'type' => 'password',
                  'placeholder' => 'password'
              );


              $this->_render_page('digitalauth/login', $this->data);
              $this->load->view('includes/adminlogin');
              $this->load->view('includes/footer');
          }
      }

    // log the user out
    function logout()
      {
          $this->data['title'] = "Logout";

          // log the user out
          $logout = $this->ion_auth->logout();

          // redirect them to the login page
          $this->session->set_flashdata('message', $this->ion_auth->messages());
          redirect('digitalauth/login', 'refresh');
      }

    function editprofile(){
        if(!$this->ion_auth->logged_in() ){
            redirect('digitalauth/login', 'refresh');
        }
        $currentUser = $this->session->userdata('user_id');
        $this->form_validation->set_rules('fname', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('lname', $this->lang->line('create_user_validation_lname_label'), 'required');
        if($this->input->post('password')){
            $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
        }
        if ($this->form_validation->run() == true) {
            $userInfo = array(
              'first_name'  =>  $this->input->post('fname'),
              'last_name'  =>  $this->input->post('lname'),
            );
            if($this->input->post('password')){
                $password = array(
                    'password'  =>  $this->input->post('password')
                );
                $Info = array_merge($userInfo,$password);
            }
            else{
                $Info = $userInfo;
            }
            if ($this->ion_auth->update($currentUser, $Info)) {
                $message = lang('user_user', '') . " " . lang('updated_successfully', '');
                $this->session->set_flashdata('success_message', $message);
                redirect("digitalauth/editprofile/");
            }

        }



        $this->data['userData'] = $this->mymodel->get('users','*','id='.$currentUser);
        $this->_render_page('edit_profile', $this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    // forgot password
    function forgotpassword()
      {
          $this->data['title'] = 'forget_password';
          // setting validation rules by checking wheather identity is username or email
          if ($this->config->item('identity', 'ion_auth') != 'email') {
              $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
          } else {
              $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
          }


          if ($this->form_validation->run() == false) {
              $this->data['type'] = $this->config->item('identity', 'ion_auth');
              // setup the input
              $this->data['identity'] = array('name' => 'identity', 'class' => 'form-control',
                  'id' => 'identity', 'type' => 'email','placeholder' => 'Email',
              );

              if ($this->config->item('identity', 'ion_auth') != 'email') {
                  $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
              } else {
                  $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
              }

              // set any errors and display the form
              $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
              $this->_render_page('digitalauth/forget_password', $this->data);
          } else {
              $identity_column = $this->config->item('identity', 'ion_auth');
              $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

              if (empty($identity)) {

                  if ($this->config->item('identity', 'ion_auth') != 'email') {
                      $this->ion_auth->set_error('forgot_password_identity_not_found');
                  } else {
                      $this->ion_auth->set_error('forgot_password_email_not_found');
                  }

                  $this->session->set_flashdata('message', $this->ion_auth->errors());
                  redirect("digitalauth/forgotpassword", 'refresh');
              }

              // run the forgotten password method to email an activation code to the user
              $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

              if ($forgotten) {
                  // if there were no errors
                  $this->session->set_flashdata('message', $this->ion_auth->messages());
                  redirect("digitalauth/forgotpassword", 'refresh'); //we should display a confirmation page here instead of the login page
              } else {
                  $this->session->set_flashdata('message', $this->ion_auth->errors());
                  redirect("digitalauth/forgotpassword", 'refresh');
              }
          }
      }

    // reset password - final step for forgotten password
    public function reset_password($code = NULL)
      {
          if (!$code) {
              show_404();
          }

          $user = $this->ion_auth->forgotten_password_check($code);

          if ($user) {
              // if the code is valid then display the password reset form

              $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
              $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

              if ($this->form_validation->run() == false) {
                  // display the form

                  // set the flash data error message if there is one
                  $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                  $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                  $this->data['new_password'] = array(
                      'name' => 'new',
                      'id' => 'new',
                      'type' => 'password',
                      'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                  );
                  $this->data['new_password_confirm'] = array(
                      'name' => 'new_confirm',
                      'id' => 'new_confirm',
                      'type' => 'password',
                      'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                  );
                  $this->data['user_id'] = array(
                      'name' => 'user_id',
                      'id' => 'user_id',
                      'type' => 'hidden',
                      'value' => $user->id,
                  );
                  $this->data['csrf'] = $this->_get_csrf_nonce();
                  $this->data['code'] = $code;

                  // render
                  $this->_render_page('auth/reset_password', $this->data);
              } else {
                  // do we have a valid request?
                  if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

                      // something fishy might be up
                      $this->ion_auth->clear_forgotten_password_code($code);

                      show_error($this->lang->line('error_csrf'));

                  } else {
                      // finally change the password
                      $identity = $user->{$this->config->item('identity', 'ion_auth')};

                      $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                      if ($change) {
                          // if the password was successfully changed
                          $this->session->set_flashdata('message', $this->ion_auth->messages());
                          redirect("auth/login", 'refresh');
                      } else {
                          $this->session->set_flashdata('message', $this->ion_auth->errors());
                          redirect('auth/reset_password/' . $code, 'refresh');
                      }
                  }
              }
          } else {
              // if the code is invalid then send them back to the forgot password page
              $this->session->set_flashdata('message', $this->ion_auth->errors());
              redirect("auth/forgot_password", 'refresh');
          }
      }

    //rendering page
    function _render_page($view, $data = null, $returnhtml = false)//I think this makes more sense
      {
        $this->load->view('includes/header');
        if($this->ion_auth->logged_in() && $this->ion_auth->is_admin()){
          $this->load->view('includes/sub_header');
           $this->load->view('includes/sidebar');
        }


        $this->viewdata = (empty($data)) ? $this->data: $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml) return $view_html;//This will return html on 3rd argument being true

      }

    function register(){
        //$this->ion_auth->register($username, $password, $email, $additional_data, $group)
          $this->ion_auth->register('binaya', '12345678', 'binaya619@gmail.com', array( 'first_name' => 'binaya', 'last_name' => 'shrestha' ), array('1') );
      }


}
