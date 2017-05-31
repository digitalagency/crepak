<?php

/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 5/31/2017
 * Time: 2:55 PM
 */
class Myproduct extends CI_Model
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

    //list all pages
    public function getAllProducts(){

        $this->db->select('*');
        $this->db->from($this->table_topbanner);

        $this->db->where('post_type', "product");
        $query = $this->db->get();
        $result = $query->result() ;
        return $result;

    }

    // show all page element by value
    function getProductByValue($fields,$where=''){

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

    //get single value of page
    function getValue($reqvalue,$fieldname,$fieldvalue){
        $this->db->where($fieldname,$fieldvalue);
        $query=$this->db->get($this->table_topbanner);
        $result=$query->row()->$reqvalue;
        return $result;
    }

    //delete page
    function delete($fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($this->table_topbanner);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }

        return FALSE;
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


    function getProductCategory($id){


        $this->db->select('*');
        $this->db->from($this->table_topbanner);

        $this->db->where('id', $id);
        $query = $this->db->get();
        $results = $query->result() ;
         foreach($results as $result){
            echo  $result->title.' / '.$result->title_cn;
         }
    }

}