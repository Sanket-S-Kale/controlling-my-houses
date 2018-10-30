<?php
class user extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database('default', true);
    }
    public function getAll(){
        $query = "SELECT u.user_id, u.user_name, u.email, u.fname, u.lname, r.role_name FROM users u LEFT JOIN roles r ON u.role_id = r.role_id";
        $result = $this->db->query($query);
        return $result;
    }

    public function getById($id){
        $user = array();
        $query = "SELECT * FROM users WHERE user_id = ".$id;
        $result = $this->db->query($query);
        if($result->num_rows() > 0){
            foreach($result->result() as $row){
                $user['id'] = $row->user_id;
                $user['email'] = $row->email;
                $user['uname'] = $row->user_name;
                $user['fname'] = $row->fname;
                $user['lname'] = $row->lname;
                $user['role'] = $row->role_id;
            }
        }
        return $user;
    }

    public function insert($data){
        $this->db->insert('users',$data);
        //$id = $this->db->insert_id();
    }

    public function update($data){
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('users', array(
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role_id' => $data['role_id']
            ));
    }

    public function delete($id){
        $query = "DELETE FROM users WHERE user_id = ".$id;
        $this->db->query($query);
    }
}
?>
