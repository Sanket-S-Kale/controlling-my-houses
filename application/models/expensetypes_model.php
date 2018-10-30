<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class expensetypes_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    
    public function insert_expensetypes($addexpense)
    {
     $this->db->insert('expense_types', $addexpense);
 }

 public function fetch_expensetypes()
 {
   $this->db->where('is_active', '1');
   $query = $this->db->get('expense_types');
   if($query->num_rows() > 0){
    $expensetypes = $query->result_array();
    return $expensetypes;
}else{
    return false;
}
}


public function edit_expensetypes($typeId){

   $options1=array('type_id'=>$typeId);
   $expensetypes = $this->db->get_where('expense_types',$options1)->result_array();
   return $expensetypes;
}

public function update_expensetypes($addexpense,$expensetype){

    $this->db->where('type_id', $expensetype);
    $this->db->update('expense_types', $addexpense);
}

public function delete_expensetypes($typeId,$deleteexpense){

  $this->db->where('type_id', $typeId);
  $this->db->update('expense_types', $deleteexpense);
}




}