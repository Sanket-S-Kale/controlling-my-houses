<?php
    class Home extends CI_Controller {
        function __construct() {   
            parent::__construct();
            $this->load->library('form_validation');
        }

        public function index(){
            $loggedInId = $this->session->userdata('user_id');
            $array = array(
                'is_active'=>1,
                'owner_id'=>$loggedInId
            );
            $this->db->where($array);

            $query = $this->db->get("house"); 
            $data['houses'] = $query->result();

            $this->load->view('home.php', $data);
        }

        public function deleteHouse(){
            $id =$this->uri->segment(3);

            $this->load->model('Home_model');
            $this->Home_model->deleteHouse($id);

            redirect(base_url().'home');
        }

        public function addEditHouse(){
            $data["house_id"] =$this->uri->segment(3);

            $this->db->where('role_id', 3);
            $result = $this->db->get('users');
            $data["accountants"] = $result->result();

            if($data["house_id"] == 0 || $data["house_id"] == "0"){
                $this->load->view('addEditHouse.php', $data);
            }else{
                $this->db->where('house_id', $data["house_id"]);
                $result = $this->db->get('house');
                $data["houseData"] = $result->result();
                $this->load->view('addEditHouse.php', $data);
            }
        }

        public function saveHouse(){
            $this->form_validation->set_rules('houseName', 'House Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('zip', 'Zip code', 'required');
            $this->form_validation->set_rules('amount', 'Initial Cost', 'required|numeric');

            $data["house_id"] = $_POST['house_id'];

            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('error','All fields are mandatory!');
                redirect(base_url().'home/addEditHouse/'.$data["house_id"]);
            }else{
                $data = array(
                    'owner_id' => $this->session->userdata('user_id'),
                    'street' => $this->input->post('address'),
                    'house_id' => $this->input->post('house_id'),
                    'house_name' => $this->input->post('houseName'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'zip_code' => $this->input->post('zip'),
                    'accountant_id' => $this->input->post('accountant'),
                    'amount' => $this->input->post('amount')
                );
                $this->load->model('Home_model');
                $this->Home_model->saveHouse($data);
                redirect(base_url().'home');
            }
        }
    }
?>