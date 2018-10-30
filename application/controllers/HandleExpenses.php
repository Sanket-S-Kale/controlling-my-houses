<?php
    class HandleExpenses extends CI_Controller {
        function __construct() {   
            parent::__construct();
            $this->load->library('form_validation');
         }

        public function index(){
            $this->db->where('is_active', 1);
            $query = $this->db->get("house"); 
            $data['houses'] = $query->result(); 

            $data["house_id"] =$this->uri->segment(3);

            if($data["house_id"]==0 || $data["house_id"] == "0"){
                $data["house_id"] = $data["houses"][0]->house_id;
                $data["house_name"] = $data["houses"][0]->house_name;
            }else{
                foreach ($data["houses"] as $h) {
                    if($h->house_id == $data["house_id"]){
                        $data["house_name"] = $h->house_name;
                    }
                };
            };

            $this->load->model('HandleExpenses_model');
            $data["houseExpenses"] = $this->HandleExpenses_model->getExpenses($data["house_id"]);

            $this->load->view('handleExpenses.php', $data);
        }

        public function deleteExpense(){
            $id =$this->uri->segment(3);

            $this->load->model('HandleExpenses_model');
            $this->HandleExpenses_model->deleteExpense($id);

            redirect(base_url().'/handleExpenses/index/0');
        }

        public function addEditExpenses(){
            $data["exp_id"] =$this->uri->segment(3);

            //get expense types
            $this->db->where('is_active', 1);
            $result = $this->db->get('expense_types');
            $data["expenseTypes"] = $result->result();

            if($data["exp_id"] == 0 || $data["exp_id"] == "0"){
                $data["house_id"] =$this->uri->segment(4);
                $this->load->view('addEditExpenses.php', $data);
            }else{
                $this->db->where('exp_id', $data["exp_id"]);
                $result = $this->db->get('expenses');
                $data["expenseData"] = $result->result();
                $data["house_id"] = $data["expenseData"][0]->house_id;
                $this->load->view('addEditExpenses.php', $data);
            }
        }

        public function saveExpense(){
            $this->form_validation->set_rules('expenseType', 'Expense Type', 'required');
            $this->form_validation->set_rules('expenseInfo', 'Expense Details', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');

            $error = FALSE;
            $data["house_id"] = $_POST['house_id'];
            $data["exp_id"] = $_POST['exp_id'];

            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('error','All fields are mandatory!');
                redirect(base_url().'handleExpenses/addEditExpenses/'.$data["exp_id"]."/".$data["house_id"]);
            }else{
                $data = array(
                    'exp_id' => $this->input->post('exp_id'),
                    'house_id' => $this->input->post('house_id'),
                    'type_id' => $this->input->post('expenseType'),
                    'expense_info' => $this->input->post('expenseInfo'),
                    'amount' => $this->input->post('amount')
                );
                $this->load->model('HandleExpenses_model');
                $this->HandleExpenses_model->saveExpense($data);
                redirect(base_url().'handleExpenses/index/0');
            }
        }
    }   
?>