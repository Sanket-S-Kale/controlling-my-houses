<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class cmh extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->model("user");
        $this->load->model("report");
        $this->load->model("role");
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function login(){

    }

    public function users(){
        $res = $this->user->getAll();
        $data['users'] = $res;
        $data['title'] = 'CMH-List of Users';
        $this->load->view('ListUsers',$data);
    }

    public function addUser(){
        $this->form_validation->set_error_delimiters('<span class="errormsg">', '</span>');
        $this->form_validation->set_rules('fname','First Name','trim|required');
        $this->form_validation->set_rules('lname','Last Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('uname','Username','trim|required|min_length[3]');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[pass]');
        $data['roles'] = $this->role->getAll();
        $data['isAdd'] = TRUE;
        if($this->form_validation->run() ==  FALSE){
            $user = array();
            $user['id'] = '';
            $user['email'] = '';
            $user['uname'] = '';
            $user['fname'] = '';
            $user['lname'] = '';
            $user['role'] = '2';
            $data['user'] = $user;
            $this->load->library('form_validation');
            $data['title'] = 'CMH-Add User';
            $this->load->view('addUser',$data);
        } else{
            $fname = xss_clean($this->input->post('fname'),FALSE);
            $lname = xss_clean($this->input->post('lname'),FALSE);
            $email = xss_clean($this->input->post('email'),FALSE);
            $username = xss_clean($this->input->post('uname'),FALSE);
            $password = xss_clean($this->input->post('pass'),FALSE);
            $roleId = xss_clean($this->input->post('role'),FALSE);

            $insData = array(
                'user_name' => $username,
                'email' => $email,
                'fname' => $fname,
                'lname' => $lname,
                'password' => $password,
                'role_id' => $roleId
                );
            $this->user->insert($insData);
            redirect("cmh/users");
        }
    }

    public function EditUser($args){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="errormsg">', '</span>');

        //retrieving

        $data['roles'] = $this->role->getAll();

        $data['isAdd'] = FALSE;

        $this->form_validation->set_rules('fname','First Name','trim|required');
        $this->form_validation->set_rules('lname','Last Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('uname','Username','trim|required|min_length[3]');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[pass]');

        if($this->form_validation->run() ==  FALSE){
            $user = $this->user->getById($args[0]);
            $data['user'] = $user;
            $this->load->library('form_validation');
            $data['title'] = 'CMH-Edit User';
            $this->load->view('addUser',$data);
        } else{
            $id = xss_clean($this->input->post('id'),FALSE);
            $fname = xss_clean($this->input->post('fname'),FALSE);
            $lname = xss_clean($this->input->post('lname'),FALSE);
            $email = xss_clean($this->input->post('email'),FALSE);
            $username = xss_clean($this->input->post('uname'),FALSE);
            $password = xss_clean($this->input->post('pass'),FALSE);
            $roleId = xss_clean($this->input->post('role'),FALSE);

            $insData = array(
                'user_id' => $id,
                'user_name' => $username,
                'email' => $email,
                'fname' => $fname,
                'lname' => $lname,
                'password' => $password,
                'role_id' => $roleId
                );
            //echo print_r($insData);
            $this->user->update($insData);
            $this->session->set_flashdata('success','User Updated!');
            redirect("cmh/users");
        }
    }

    public function DeleteUser($args){
        $id = $args[0];
        $this->db->where('user_id', $id);
        $result = $this->db->get('users');
        $data["userData"] = $result->result();
        
        if($data["userData"][0]->role_id == "1" || $data["userData"][0]->role_id == 1){ //for admin
            $this->session->set_flashdata('warning','You cant delete admin!');
            redirect("cmh/users");
        }else if($data["userData"][0]->role_id == "2" || $data["userData"][0]->role_id == 2){ //for owner
            $this->db->where('owner_id', $id);
            $query = $this->db->get('house');
            if($query->num_rows()>0){
                $this->session->set_flashdata('warning','Please delete the houses associated with this user first!');
                redirect("cmh/users");
            }else{
                $this->user->delete($id);
                $this->session->set_flashdata('success','User Deleted!');
                redirect("cmh/users");
            }
        }else if($data["userData"][0]->role_id == "3" || $data["userData"][0]->role_id == 3){
            $this->db->where('accountant_id', $id);
            $query = $this->db->get('house');
            if($query->num_rows()>0){
                $this->session->set_flashdata('warning','This accountant is associated with one or more houses and can\'t be deleted!');
                redirect("cmh/users");
            }else{
                $this->user->delete($id);
                $this->session->set_flashdata('success','User Deleted!');
                redirect("cmh/users");
            }
        }
    }

    public function reports(){
        #todo read houses and pass on
        $this->db->where('is_active', 1);
        $result = $this->db->get('house');
        $data["houses"] = $result->result();
        
        $data['grid'] = $this->report->getAllHouses();
        $data['title'] = 'CMH-Reports';
        
        $this->load->view('viewReports',$data);
    }

    public function getChartData($args){
        $id = $args[0];
        $res = array();
        $details = $this->report->getById($id);
        if($details->num_rows() > 0){
            $sum = 0;
            foreach($details->result() as $row){
                $sum = $sum + floatval($row->amount);
            }
            foreach($details->result() as $row){
                $amt = floatval($row->amount);
                $y = (($amt/$sum)*100);
                $x = array(
                    "y" => $y,
                    "label" => $row->type_name
                    );
                array_push($res, $x);
            }
        } else{
            $x = array(
                "y" => "100",
                "label" => "No Expenses"
                );
            array_push($res,$x);
        }
        echo json_encode($res);
    }

    public function getPaymentData($args){
        $id = $args[0];
        $res = array();
        $details = $this->report->getPayById($id);
        if($details->num_rows() > 0){
            $sum = 0;
            foreach($details->result() as $row){
                $sum = $sum + floatval($row->amount);
            }
            foreach($details->result() as $row){
                $amt = floatval($row->amount);
                $y = (($amt/$sum)*100);
                $x = array(
                    "y" => $y,
                    "label" => $row->type_name
                    );
                array_push($res, $x);
            }
        } else{
            $x = array(
                "y" => "100",
                "label" => "No Payment"
                );
            array_push($res,$x);
        }
        echo json_encode($res);
    }
}
?>
