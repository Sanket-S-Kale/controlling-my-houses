<?php
class report extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database('default', true);
    }
    public function getAllHouses(){
        $query = "SELECT h.house_name, h.initial_cost, COALESCE(SUM(e.amount), 0) as 'sum' FROM cmh.house h LEFT JOIN expenses e ON h.house_id = e.house_id GROUP by h.house_id ";
        $result = $this->db->query($query);
        return $result;
    }

    public function getById($id){
        $query = "SELECT t.type_name, SUM(e.amount) as 'amount' from expenses e LEFT JOIN expense_types t ON e.type_id = t.type_id WHERE e.house_id = ".$id." GROUP BY t.type_name";
        $result = $this->db->query($query);
        return $result;
    }

    public function getPayById($id){
        $query = "SELECT t.type_name, SUM(e.amount) as 'amount' from payments e LEFT JOIN payment_types t ON e.type_id = t.type_id WHERE e.house_id = ".$id." GROUP BY t.type_name";
        $result = $this->db->query($query);
        return $result;
    }
}
?>
