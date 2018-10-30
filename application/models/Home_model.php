<?php 
   class Home_model extends CI_Model {
        function __construct() { 
             parent::__construct(); 
        }
        
        public function deleteHouse($id){
            $this->db->trans_begin();
            $sql = "update house set is_active = 0 where house_id = $id";
            $this->db->query($sql);

            $sql = "update expenses set is_deleted = 1 where house_id = $id";
            $this->db->query($sql);

            $sql = "update payments set is_deleted = 1 where house_id = $id";
            $this->db->query($sql);

            if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata('error','Some error occurred while deleting the house!');
                $this->db->trans_rollback();
            }
            else
            {
                $this->session->set_flashdata('success','House deleted Successfully!');
                $this->db->trans_commit();
            }
        }

        public function saveHouse($data){
            $owner_id = $data["owner_id"];
            $house_id = $data["house_id"];
            $street = $data["street"];
            $initial_cost = $data["amount"];
            $house_name = $data["house_name"];
            $city = $data["city"];
            $state = $data["state"];
            $zip_code = $data["zip_code"];
            $accountant_id = $data["accountant_id"];
            $date = date('Y-m-d');

            if($data["house_id"] == 0 || $data["house_id"] == "0"){
                $sql = "insert into house (house_id, owner_id, accountant_id, house_name, street, city, state, zip_code, initial_cost, created_by, created_date, modified_by, modified_date, is_active) values (DEFAULT, $owner_id, $accountant_id, '$house_name', '$street', '$city', '$state', '$zip_code', $initial_cost, 1, STR_TO_DATE('$date', '%Y-%m-%d'), 1, STR_TO_DATE('$date', '%Y-%m-%d'), 1)";
            }else{
                $sql = "update house set street = '$street', house_name = '$house_name', city = '$city', state = '$state', zip_code = '$zip_code', owner_id = $owner_id, accountant_id = $accountant_id, initial_cost = $initial_cost, modified_by = 1, modified_date = STR_TO_DATE('$date', '%Y-%m-%d') where house_id = $house_id";
            }

            $this->db->trans_begin();
            $this->db->query($sql);

            if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata('error','Some error occurred while saving house!');
                $this->db->trans_rollback();
            }
            else
            {
                $this->session->set_flashdata('success','House saved Successfully!');
                $this->db->trans_commit();
            }
        }
   } 
?> 