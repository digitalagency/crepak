<?php

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 6/13/2017
 * Time: 10:08 AM
 */
include_once (dirname(__FILE__) . "/Dacadmin.php");
class Gallery extends Dacadmin
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
            redirect('dacadmin/login', 'refresh');
        }
        if ($this->input->post('btnDo') == 'Add' ){
            $status = $this->input->post('status');
            $folder_file = $this->input->post('foldername');
            $target = 'uploads/';
            $path        =  './uploads/'.$folder_file.'/';
            $thumb_path = './uploads/' . $folder_file . '/thumbnail/';
            if (!is_dir($path)):
                mkdir($path);
                chmod($path, 0755);
            endif;
            if (!is_dir($thumb_path)):
                mkdir($thumb_path);
                chmod($thumb_path, 0755);
            endif;

            if($_FILES['images']['size'][0] != 0){
                $files1 = $_FILES['images'];
                $cpt = count($_FILES['images']['name']);
                for($i=0; $i<$cpt; $i++){
                    echo '<br>'.$i.'<br>';
                    $imgSize[$i] = getimagesize($files1['tmp_name'][$i]);

                    if($imgSize[$i][0] > 2048 || $imgSize[$i][1] > 2048){
                        $message = "Image height or width is larger than 2048px.";
                        $this->session->set_flashdata('error_message', $message);
                        redirect("dacadmin/addphotos/".$id);
                    }
                    $thumb = array('dest' => $target . '/' . $folder_file, 'size' => array('w' => '300', 'h' => '300'), 'ratio' => true);
                    $_FILES['images']['name']     = $files1['name'][$i];
                    $_FILES['images']['type']     = $files1['type'][$i];
                    $_FILES['images']['tmp_name'] = $files1['tmp_name'][$i];
                    $_FILES['images']['error']    = $files1['error'][$i];
                    $_FILES['images']['size']     = $files1['size'][$i];

                    $result = upload_image('images', $target, $thumb, $folder_file);

                    if (isset($result['file_name'])) {

                        $data = array('upload_data' => $this->upload->data());
                        //echo 'success';
                        $imagesup = array(
                            'post_id' => $id,
                            'image' =>$result['fullname'],
                            'status'=>$status,
                            'created_date' => date("Y-m-d")
                        );
                        $this->mygallery->add($imagesup);


                    }
                    else {
                        $message = "Error in uploading.";
                        $this->session->set_flashdata('error_message', $message);
                        redirect("dacadmin/gallery/addimage/".$id);
                    }
                }
                $message = "Images Uploaded successfully.";
                $this->session->set_flashdata('success_message', $message);
                redirect("dacadmin/gallery/addimage/".$id);

            }
        }

        $this->data['galleryValues'] = $this->mygallery->getPostByValue('*','id ='.$id);
        $this->_render_page('gallery/addphotos',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }
    function listimages($id = ''){
        if(!$this->ion_auth->logged_in() ){
            redirect('dacadmin/login', 'refresh');
        }

        $this->data['galleryValues'] = $this->mygallery->getPostByValue('*','id ='.$id);
        $this->data['imageValues'] = $this->mygallery->getAllImagesById( '*','post_id ='.$id);
        $this->data['imageCount'] = $this->mygallery->getcount('*','post_id ='.$id);
        $this->_render_page('gallery/listphoto',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function toggleImageStatus($id, $stat, $idd){
        $reurl = 'dacadmin/gallery/listimages/'.$idd;
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
        if($this->mygallery->edit($additional_data, 'id', $id)){
            redirect($reurl);
            die();
        }
    }

    function deleteimage($id, $idd){

         $image = $this->mygallery->getImageValue('image','id',$id);

         $post_id =$this->mygallery->getImageValue('post_id','id',$id);

         $foldername =$this->mygallery->getPostValue('slug','id',$post_id);

         $img =  $foldername.'/'.$image;
          $thumb = $foldername.'/thumbnail/'.$image;

        if(!empty($image)){
            $imagepath = './uploads/'.$img;
            $thumbpath = './uploads/'.$thumb;
            @unlink($imagepath);
            @unlink($thumbpath);
        }

        if($this->mygallery->deleteImage('id', $id)){
            $this->session->set_flashdata('success_message', 'Image Deleted successfully.');
            redirect("dacadmin/gallery/listimages/".$idd);
        }

    }

}