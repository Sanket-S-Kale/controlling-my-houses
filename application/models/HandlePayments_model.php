<?php 
   class HandlePayments_Model extends CI_Model {
        function __construct() { 
            parent::__construct(); 
        }

        public function getPayments($house_id){
            $sql = "SELECT h.house_name, e.pay_id, e.amount, e.payment_info, e.created_date, et.type_name FROM `house` as h, payments as e, payment_types as et where h.house_id = $house_id and h.house_id = e.house_id and e.type_id = et.type_id and e.is_deleted = 0 and et.is_active = 1;";
            
            $result = $this->db->query($sql);
            return $result->result();
        }

        public function deletePayment($id){
            $this->db->trans_begin();
            $sql = "update payments set is_deleted = 1 where pay_id = $id";
            $this->db->query($sql);

            if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata('error','Some error occurred while deleting Payment!');
                $this->db->trans_rollback();
            }
            else
            {
                $this->session->set_flashdata('success','Payment deleted Successfully!');
                $this->db->trans_commit();
            }
        }

        public function savePayment($data){
            $loggedInId = $this->session->userdata('user_id');
            $type_id = $data["type_id"];
            $house_id = $data["house_id"];
            $payment_info = $data["payment_info"];
            $amount = $data["amount"];
            $pay_id = $data["pay_id"];
            $date = date('Y-m-d');
            if($data["pay_id"] == 0 || $data["pay_id"] == "0"){
                $sql = "insert into payments (pay_id, type_id, house_id, payment_info, amount, created_by, created_date, modified_by, modified_date, is_deleted) values (DEFAULT, $type_id, $house_id, '$payment_info', $amount, $loggedInId, STR_TO_DATE('$date', '%Y-%m-%d'), $loggedInId, STR_TO_DATE('$date', '%Y-%m-%d'), 0)";
            }else{
                $sql = "update payments set type_id = $type_id, payment_info = '$payment_info', amount = $amount, modified_by = $loggedInId, modified_date = STR_TO_DATE('$date', '%Y-%m-%d') where pay_id = $pay_id";
            }

            $this->db->trans_begin();
            $this->db->query($sql);

            if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata('error','Some error occurred while saving Payment!');
                $this->db->trans_rollback();
            }
            else
            {
                $this->session->set_flashdata('success','Payment saved Successfully!');
                $this->db->trans_commit();
            }
        }

    }
?>