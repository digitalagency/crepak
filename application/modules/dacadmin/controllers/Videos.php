<?php

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 6/28/2017
 * Time: 12:46 PM
 */
include_once (dirname(__FILE__) . "/Dacadmin.php");
class Videos extends Dacadmin
{
    public $data;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('myvideos');

    }

    function index(){
        redirect('dacadmin/videos/listvideos', 'refresh');

    }

    function addvideo(){
        if(!$this->ion_auth->logged_in() ){
            redirect('dacadmin/login', 'refresh');
        }
        $this->form_validation->set_rules('title', $this->lang->line(''), 'required');
        if ($this->form_validation->run() == TRUE) {

            $title = $this->input->post('title');
            $title_cn = $this->input->post('title_cn');
            $slug = $this->input->post('slug');
            $content = $this->input->post('content');
            $content_cn = $this->input->post('content_cn');
            $excrept = $this->input->post('excrept');
            $excrept_cn = $this->input->post('excrept_cn');
            $status = $this->input->post('status');

            $video = $this->input->post('video');
            $video_cn = $this->input->post('video_cn');


            $article = array(
                'title' => $title,
                'title_cn' => $title_cn,
                'slug' => $slug,
                'content' => $content,
                'content_cn' => $content_cn,
                'excrept' => $excrept,
                'excrept_cn' => $excrept_cn,
                'status' => $status,
                'post_date' => date("Y-m-d  H:i:s"),
                'post_type' => 'videos'
            );

            $lastId = $this->myvideos->getLastId($article);

            if (!empty($video)) {

                $relatedvideo = array(
                    'post_id' => $lastId,
                    'post_meta_key' => 'video',
                    'post_meta_value' => $video
                );

                $this->myvideos->addRelated($relatedvideo, 'tbl_postmeta');
            }

            if (!empty($video_cn)) {

                $relatedvideo_cn = array(
                    'post_id' => $lastId,
                    'post_meta_key' => 'video_cn',
                    'post_meta_value' => $video_cn
                );

                $this->myvideos->addRelated($relatedvideo_cn, 'tbl_postmeta');
            }


            $this->session->set_flashdata('success_message', 'Video added successfully.');
            redirect("dacadmin/videos/addvideo");


        }

        $this->_render_page('videos/addvideo',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function listvideos(){
        if(!$this->ion_auth->logged_in() ){
            redirect('dacadmin/login', 'refresh');
        }
        $this->data['videos'] = $this->myvideos->getAllVideos();
        $this->_render_page('videos/listvideos',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function editvideo($id=''){
        if(!$this->ion_auth->logged_in() ){
            redirect('dacadmin/login', 'refresh');
        }

        if ($this->input->post('btnDo') == 'Edit' ) {

            $this->form_validation->set_rules('title', $this->lang->line(''), 'required');
            if ($this->form_validation->run() == TRUE) {

                $title = $this->input->post('title');
                $title_cn = $this->input->post('title_cn');
                $slug = $this->input->post('slug');
                $content = $this->input->post('content');
                $content_cn = $this->input->post('content_cn');
                $excrept = $this->input->post('excrept');
                $excrept_cn = $this->input->post('excrept_cn');
                $status = $this->input->post('status');

                $video = $this->input->post('video');

                $video_cn = $this->input->post('video_cn');


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
                    );


                $relatedVideocount = $this->myvideos->getRelatedCount('tbl_postmeta','*','post_id ='.$id.' AND post_meta_key= "video"');
                if($relatedVideocount>0){
                    $relatedVid = $this->myvideos->getVideorelated('tbl_postmeta','*','post_id ='.$id.' and post_meta_key = "video"');
                    foreach($relatedVid as $vid){
                        $relatedId = $vid->id;
                    }

                    $relatedVideo = array(
                        'post_meta_value' => $video
                    );
                    $this->myvideos->editRelated(' tbl_postmeta',$relatedVideo, 'id', $relatedId);
                }
                else{
                    $relatedVideo = array(
                        'post_id' => $id,
                        'post_meta_key' => 'video',
                        'post_meta_value' => $video
                    );

                    $this->myvideos->addRelated($relatedVideo, 'tbl_postmeta');
                }

                $relatedVideCnocount = $this->myvideos->getRelatedCount('tbl_postmeta','*','post_id ='.$id.' AND post_meta_key= "video_cn"');
                if($relatedVideCnocount>0){
                    $relatedVidCn = $this->myvideos->getVideorelated('tbl_postmeta','*','post_id ='.$id.' and post_meta_key = "video_cn"');
                    foreach($relatedVidCn as $vidcn){
                        $relatedcnId = $vidcn->id;
                    }

                    $relatedVideocn = array(
                        'post_meta_value' => $video_cn
                    );
                    $this->myvideos->editRelated(' tbl_postmeta',$relatedVideocn, 'id', $relatedcnId);
                }
                else{
                    $relatedVideocn = array(
                        'post_id' => $id,
                        'post_meta_key' => 'video_cn',
                        'post_meta_value' => $video_cn
                    );

                    $this->myvideos->addRelated($relatedVideocn, 'tbl_postmeta');
                }


                if($this->myvideos->edit($article, 'id', $id)){
                    $this->session->set_flashdata('success_message', 'Application edited successfully.');
                    redirect("dacadmin/videos/editvideo/".$id);
                }
            }
        }


        $this->data['videosValue'] = $this->myvideos->getVideoByValue('*','id ='.$id);
        $this->data['relatedlink'] = $this->myvideos->getVideorelated('tbl_postmeta','*','post_id ='.$id.' and post_meta_key = "video"');
        $this->data['relatedlink_cn'] = $this->myvideos->getVideorelated('tbl_postmeta','*','post_id ='.$id.' and post_meta_key = "video_cn"');
        $this->_render_page('videos/editvideo',$this->data);
        $this->load->view('includes/adminscript');
        $this->load->view('includes/footer');
    }

    function deletevideo($id=''){

        $this->myvideos->deleteRelated('post_id',$id,'tbl_postmeta');

        if($this->myvideos->delete('id', $id)){
            $this->session->set_flashdata('success_message', 'Video Deleted successfully.');
            redirect("dacadmin/videos/listvideos");
        }
    }

    function checkvideos(){
        $title = $_POST['title'];
        $count = $this->myvideos->getCount('LCASE(title)','title =LCASE("'.$title.'") AND post_type= "videos"');
        if($count>0){
            echo '1' ;
            die();
        }
        else{
            echo '0' ;
            die();
        }
    }

    function toggleVideoStatus($id, $stat){
        $reurl = 'dacadmin/videos/listvideos';
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
        if($this->myvideos->edit( $additional_data, 'id', $id)){
            redirect($reurl);
            die();
        }
    }
}