<?php
    class HandlePayments extends CI_Controller {
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

            $this->load->model('HandlePayments_model');
            $data["housePayments"] = $this->HandlePayments_model->getPayments($data["house_id"]);

            $this->load->view('handlePayments.php', $data);
        }

        public function deletePayment(){
            $id =$this->uri->segment(3);

            $this->load->model('HandlePayments_model');
            $this->HandlePayments_model->deletePayment($id);

            redirect(base_url().'/handlePayments/index/0');
        }

        public function addEditPayments(){
            $data["pay_id"] =$this->uri->segment(3);

            //get payment types
            $this->db->where('is_active', 1);
            $result = $this->db->get('payment_types');
            $data["paymentTypes"] = $result->result();

            if($data["pay_id"] == 0 || $data["pay_id"] == "0"){
                $data["house_id"] =$this->uri->segment(4);
                $this->load->view('addEditPayments.php', $data);
            }else{
                $this->db->where('pay_id', $data["pay_id"]);
                $result = $this->db->get('payments');
                $data["paymentData"] = $result->result();
                $data["house_id"] = $data["paymentData"][0]->house_id;
                $this->load->view('addEditPayments.php', $data);
            }
        }

        public function savePayment(){
            $this->form_validation->set_rules('expenseType', 'Payment Type', 'required');
            $this->form_validation->set_rules('expenseInfo', 'Payment Details', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');

            $error = FALSE;
            $data["house_id"] = $_POST['house_id'];
            $data["pay_id"] = $_POST['pay_id'];

            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('error','All fields are mandatory!');
                redirect(base_url().'handlePayments/addEditPayments/'.$data["pay_id"]."/".$data["house_id"]);
            }else{
                $data = array(
                    'pay_id' => $this->input->post('pay_id'),
                    'house_id' => $this->input->post('house_id'),
                    'type_id' => $this->input->post('expenseType'),
                    'payment_info' => $this->input->post('expenseInfo'),
                    'amount' => $this->input->post('amount')
                );
                $this->load->model('HandlePayments_model');
                $this->HandlePayments_model->savePayment($data);
                redirect(base_url().'handlePayments/index/0');
            }
        }
    }   
?>