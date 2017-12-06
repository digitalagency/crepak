<?php

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 6/22/2017
 * Time: 12:28 PM
 */
class Mybanner extends CI_Model
{
    private $table_topbanner = 'tbl_post';

    public function __construct() {
        parent::__construct();
    }

    //save page
    function add($data){
        $this->db->insert($this->table_topbanner, $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }

        return FALSE;
    }
    //save data and get last inserted id
    function getLastId($data){
        $this->db->insert($this->table_topbanner, $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    //save banner related
    function addRelated($data,$meta_table){
        $this->db->insert($meta_table, $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }

        return FALSE;
    }


    //list all Banner
    public function getAllBanners(){

        $this->db->select('*');
        $this->db->from($this->table_topbanner);

        $this->db->where('post_type', "banners");
        $query = $this->db->get();
        $result = $query->result() ;
        return $result;

    }

    // show all page element by value
    function getBannersByValue($fields,$where=''){

        //echo $where;
        $this->db->select($fields);
        $this->db->from($this->table_topbanner);
        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();
        $result = $query->result() ;
        return $result;
    }

    function getBannerrelated($meta_table,$fields,$where=''){

        //echo $where;
        $this->db->select($fields);
        $this->db->from($meta_table);
        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();
        $result = $query->result() ;
        return $result;
    }

    function getBannersrelated($meta_table,$fields,$where=''){

        //echo $where;
        $this->db->select($fields);
        $this->db->from($meta_table);
        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();
        $result = $query->result() ;
        return $result;
    }

    //update
    function edit($data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($this->table_topbanner, $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }

        return FALSE;
    }

    //update related
    function editRelated($meta_table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($meta_table, $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }

        return FALSE;
    }



    //list all values by post type
    public function getValuesbyPostType($value){

        $this->db->select('*');
        $this->db->from($this->table_topbanner);

        $this->db->where('post_type', $value);
        $query = $this->db->get();
        $result = $query->result() ;
        return $result;

    }


    //get count
    function getCount($fields,$where="1=1")
    {

        $this->db->select($fields);
        $this->db->from($this->table_topbanner);
        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return false;
        }


    }


    //get single value of banner
    function getValue($reqvalue,$fieldname,$fieldvalue){
        $this->db->where($fieldname,$fieldvalue);
        $query=$this->db->get($this->table_topbanner);
        $result=$query->row()->$reqvalue;
        return $result;
    }

    //get single related value of banner
    function getRelatedValued($meta_table,$reqvalue,$fieldname,$fieldvalue){
        $this->db->where($fieldname,$fieldvalue);
        $query=$this->db->get($meta_table);
        $result=$query->row()->$reqvalue;
        return $result;
    }


    //delete banner
    function delete($fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($this->table_topbanner);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }

        return FALSE;
    }
    //delete banner related datas
    function deleteRelated($fieldID,$ID,$meta_table){
        $this->db->where($fieldID,$ID);
        $this->db->delete($meta_table);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }

        return FALSE;
    }


    //get banner related value's count
    function getRelatedCount($meta_table,$fields,$where="1=1")
    {

        $this->db->select($fields);
        $this->db->from($meta_table);
        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return false;
        }


    }

}