<?php 
   class HandleExpenses_Model extends CI_Model {
        function __construct() { 
            parent::__construct(); 
        }

        public function getExpenses($house_id){
            $sql = "SELECT h.house_name, e.exp_id, e.amount, e.expense_info, e.created_date, et.type_name FROM `house` as h, expenses as e, expense_types as et where h.house_id = $house_id and h.house_id = e.house_id and e.type_id = et.type_id and e.is_deleted = 0 and et.is_active = 1;";
            
            $result = $this->db->query($sql);
            return $result->result();
        }

        public function deleteExpense($id){
            $this->db->trans_begin();
            $sql = "update expenses set is_deleted = 1 where exp_id = $id";
            $this->db->query($sql);

            if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata('error','Some error occurred while deleting expense!');
                $this->db->trans_rollback();
            }
            else
            {
                $this->session->set_flashdata('success','Expense deleted Successfully!');
                $this->db->trans_commit();
            }
        }

        public function saveExpense($data){
            $type_id = $data["type_id"];
            $house_id = $data["house_id"];
            $expense_info = $data["expense_info"];
            $amount = $data["amount"];
            $exp_id = $data["exp_id"];
            $date = date('Y-m-d');
            $loggedInId = $this->session->userdata('user_id');
            if($data["exp_id"] == 0 || $data["exp_id"] == "0"){
                $sql = "insert into expenses (exp_id, type_id, house_id, expense_info, amount, created_by, created_date, modified_by, modified_date, is_deleted) values (DEFAULT, $type_id, $house_id, '$expense_info', $amount, $loggedInId, STR_TO_DATE('$date', '%Y-%m-%d'), $loggedInId, STR_TO_DATE('$date', '%Y-%m-%d'), 0)";
            }else{
                $sql = "update expenses set type_id = $type_id, expense_info = '$expense_info', amount = $amount, modified_by = $loggedInId, modified_date = STR_TO_DATE('$date', '%Y-%m-%d') where exp_id = $exp_id";
            }

            $this->db->trans_begin();
            $this->db->query($sql);

            if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata('error','Some error occurred while saving expense!');
                $this->db->trans_rollback();
            }
            else
            {
                $this->session->set_flashdata('success','Expense saved Successfully!');
                $this->db->trans_commit();
            }
        }

    }
?>