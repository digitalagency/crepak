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


    //gallery values

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

}