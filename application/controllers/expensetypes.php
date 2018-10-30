<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class expensetypes extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('utility');
        $this->load->helper('security');
       $this->load->library(array('form_validation','session')); // load form lidation libaray & session library
        $this->load->helper(array('url','html','form'));  // load url,html,form helpers optional
        $this->load->model('expensetypes_model');
    }

    public function addExpenseTypes()
    {

      $this->load->view('addexpensetypes_view');

  }

  public function putExpenseTypes()
  {
      $this->form_validation->set_rules('expenseType', 'Expense Type', 'required|max_length[50]');
      $this->form_validation->set_rules('description', 'Expense Description', 'required|max_length[50]');
  //$this->expensetypes_model->insertExpenseTypes();

      if ($this->form_validation->run() == FALSE) {
         $this->load->view('addexpensetypes_view');
     }else{
         $this->session->set_flashdata('item', 'form submitted successfully');
         $expensetype= $this->input->post("expenseType");
         $description= $this->input->post("description");
         $date=date('Y-m-d');
         /****************************************************************hard coded */
         $createdby=$this->session->userdata('user_id');
         $modifiedby=$this->session->userdata('user_id');

         $addexpense = array(
            'type_name' => $expensetype ,
            'description'=>$description,
            'created_by'=>$createdby,
            'modified_by'=>$modifiedby,
            'is_active'=>'1',
            'created_date'=>$date,
            'modified_date'=>$date
        );

         $this->expensetypes_model->insert_expensetypes($addexpense);
         $this->load->view('addexpensetypes_view');

     }
 }

 public function getExpenseTypes()
 {
         //$this->load->view('expensetypes_view');
    $data['expense_types']= $this->expensetypes_model->fetch_expensetypes();
    $this->load->view('expensetypes_view',$data);
    
}

public function editExpenseTypes(){
    $typeId =$this->uri->segment(3);
    $data['expense_types']=$this->expensetypes_model->edit_expensetypes($typeId);
    $this->load->view('editexpensetypes_view',$data);
}


public function updateExpenseTypes(){
    $this->form_validation->set_rules('expenseType', 'Expense Type', 'required|max_length[50]');
    $this->form_validation->set_rules('description', 'Expense Description', 'required|max_length[100]');
  //$this->expensetypes_model->insertExpenseTypes();

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('editexpensetypes_view');
    }else{
     $this->session->set_flashdata('item', 'form submitted successfully');
     $expensetype= $this->input->post("expenseType");
     $description= $this->input->post("description");

     /****************************************************************hard coded */
        $modifiedby=$this->session->userdata('user_id');
    $type_id = $this->input->post("type_id");
     $addexpense = array(
        'type_id' => $this->input->post("type_id"),
        'type_name' => $expensetype,
        'description'=>$description,
        'modified_by'=>$modifiedby,
        'modified_date'=> date('Y-m-d')
    );

     $this->expensetypes_model->update_expensetypes($addexpense,$type_id);
     $this->load->view('editexpensetypes_view');

 }


}

public function deleteExpenseTypes(){
   $typeId =$this->uri->segment(3);
   /****************************************************************hard coded */
   $modifiedby=$this->session->userdata('user_id');;



   $deleteexpense = array(
    'type_id' => $typeId,
    'modified_by'=>$modifiedby,
    'is_active'=>'0'
);
   $data['expense_types']=$this->expensetypes_model->delete_expensetypes($typeId,$deleteexpense);
   $data['expense_types']= $this->expensetypes_model->fetch_expensetypes();
   $this->load->view('expensetypes_view',$data);

}







}

?>