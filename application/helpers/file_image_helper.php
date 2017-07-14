<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

function upload_image($image,$target,$thumb= array('dest' => '','size' => array('w' => 257, 'h' =>218), 'ratio' => false), $folder_file)
{

	$CI = &get_instance();
	initialize_upload($target);




	if($CI->upload->do_upload($image))
	{
			if(!is_dir($thumb['dest']))
		{
			mkdir($thumb['dest']);
			chmod($thumb['dest'], 0777);
		}
		$data = $CI->upload->data();
		// $image = $folder_file.'_'.$data['file_name'];
		$image = rand(0,100000).$data['file_name'];

		$data['fullname']=$image;
		$image_path = $data['full_path'];
		$image_name = $data['raw_name'];
		$image_ext = $data['file_ext'];
		$destination=$image;
		$data['thumb_dest']=$thumb['dest'].'/'.$destination;
		create_image($image_path,$thumb['dest'].'/'.$destination,  $thumb['ratio']);
		create_thumb($image_path,$thumb['dest'].'/thumbnail/'.$destination, $thumb['size'], $thumb['ratio']);
		unlink('uploads/'.$data['file_name']);
		return $data;

	}
	else
	{
		$CI->session->set_flashdata('message', $CI->upload->display_errors());

		return false;
		//return $CI->upload->display_errors();
	}

}

function initialize_upload($path,$max_size = '20480', $max_width = '2048', $max_height='2048')
{
	$CI = &get_instance();
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|jpeg|png|JPG|JPEG|PNG|GIF|pdf|pptx';
	$config['max_size']	= $max_size;
	$config['max_width']  = $max_width;
	$config['max_height']  = $max_height;


	$CI->load->library('upload', $config);

}

function create_thumb($src, $dest, $size, $ratio = false)
{
	$CI = &get_instance();

	$config['image_library'] = 'gd2';
	$config['source_image'] = $src;
	$config['new_image']    = $dest;
	$config['create_thumb'] = TRUE;
	if($ratio)
		$config['maintain_ratio'] = TRUE;
	else
		$config['maintain_ratio'] = FALSE;

	$config['thumb_marker'] = '';

	$config['width'] = $size['w'];
	$config['height'] = $size['h'];

	$CI->load->library('Image_lib');
	$CI->image_lib->initialize($config);

	$CI->image_lib->resize();

}

function create_image($src, $dest,  $ratio = false)
{

	$CI = &get_instance();

	$config1['image_library'] = 'gd2';
	$config1['source_image'] = $src;
	$config1['new_image']    = $dest;
	$config1['create_thumb'] = TRUE;
	if($ratio)
		$config1['maintain_ratio'] = TRUE;
	else
		$config1['maintain_ratio'] = FALSE;

	$config1['thumb_marker'] = '';

	$config1['width'] = '';
	$config1['height'] = '';

	$CI->load->library('Image_lib');
	$CI->image_lib->initialize($config1);

	$CI->image_lib->resize();

}


function file_upload($files,$target){

	$CI = &get_instance();
	//initialize_upload($target);
	 $new_name = rand(0,100000).$_FILES[$files]['name'];

	$config['upload_path'] = $target;
	$config['overwrite'] = TRUE;
	$config['allowed_types'] = 'gif|jpg|jpeg|png|JPG|JPEG|PNG|GIF|pdf|pptx';
	//$config['encrypt_name'] = TRUE;

	$config['file_name'] = $new_name;


	$CI->load->library('upload', $config);
	$CI->upload->initialize($config);

	if (!$CI->upload->do_upload($files))
	{
		$CI->session->set_flashdata('message', $CI->upload->display_errors());

		return false;
	}
	else{
		$data = $CI->upload->data();
		return $data;
	}


}

?>
