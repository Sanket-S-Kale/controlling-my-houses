<?php
class role extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database('default', true);
    }
    public function getAll(){
        $query = "SELECT * FROM roles";
        $result = $this->db->query($query);
        return $result;
    }

    public function getById($id){
        $query = "SELECT * FROM roles WHERE role_id = ".$id;
        $result = $this->db->query($query);
        return $result;
    }

}
?>
