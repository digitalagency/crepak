<?php


class Mygallery extends CI_Model
{
    private $table_post = 'tbl_post';
    private $tbl_images = 'tbl_images';

    public function __construct() {
        parent::__construct();
    }
    //parent post values
    function getPostByValue($fields,$where=''){
        //echo $where;
        $this->db->select($fields);
        $this->db->from($this->table_post);
        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();
        $result = $query->result() ;
        return $result;
    }
    //get single value of Post
    function getPostValue($reqvalue,$fieldname,$fieldvalue){
        $this->db->where($fieldname,$fieldvalue);
        $query=$this->db->get($this->table_post);
        $result=$query->row()->$reqvalue;
        return $result;
    }


    //gallery values
    //save page
    function add($data){
        $this->db->insert($this->tbl_images, $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }

        return FALSE;
    }

    function getAllImagesById($fields,$where=''){

        //echo $where;
        $this->db->select($fields);
        $this->db->from($this->tbl_images);
        //$this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result = $query->result() ;
        return $result;
    }

    //get single value of Image
    function getImageValue($reqvalue,$fieldname,$fieldvalue){
        $this->db->where($fieldname,$fieldvalue);
        $query=$this->db->get($this->tbl_images);
        $result=$query->row()->$reqvalue;
        return $result;
    }

    function edit($data,$fieldID,$ID){

        $this->db->where($fieldID,$ID);
        $this->db->update($this->tbl_images, $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }

        return FALSE;
    }

    function getCount($fields,$where="1=1")
    {

        $this->db->select($fields);
        $this->db->from($this->tbl_images);
        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return false;
        }


    }

    //delete image
    function deleteImage($fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($this->tbl_images);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }

        return FALSE;
    }

}