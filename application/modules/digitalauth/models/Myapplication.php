<?php
/**
 * Created by PhpStorm.
 * User: Binaya
 * Date: 6/1/2017
 * Time: 2:50 PM
 */
class Myapplication extends CI_Model
{
    private $table_topbanner = 'tbl_post';

    public function __construct() {
        parent::__construct();
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

}