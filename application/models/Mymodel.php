<?php
  class Mymodel extends CI_Model {

    function __construct() {
            parent::__construct();
        }
// get perticular value
    function getValue($table,$reqvalue,$fieldname,$fieldvalue){
      $this->db->where($fieldname,$fieldvalue);
          $query=$this->db->get($table);
          $result=$query->row()->$reqvalue;
          return $result;
    }
    // get all value

    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){

        //echo $where;
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }

        $query = $this->db->get();
        $result = !$one ? $query->result($array) : $query->row() ;
        return $result;
    }


    //add to database
    function add($table,$data){
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }

        return FALSE;
    }

    //edit
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
        {
            return TRUE;
        }

        return FALSE;
    }

    //delete
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }

        return FALSE;
    }

    //get count
    function getCount($fields,$tablename,$where="1=1")
    {
        $this->db->select($fields);
        $this->db->from($tablename);
        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return false;
        }


    }
}

 ?>
