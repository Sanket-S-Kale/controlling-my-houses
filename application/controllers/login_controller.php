<?php

	class login_controller extends CI_Controller{

		public function index(){
            $this->load->view('login');
        }

			public function view($page = 'login'){
				if(!file_exists(APPPATH.'views/'.$page.'.php')){
							show_404();//code isgniter function 
							// echo ".$page";
				}
				// $data['title'] = ucfirst($page);//capital letterz
 			 
 				$this->load->helper('url');
				// $this->load->view('templates/header');
				$this->load->view($page);
				// $this->load->view('templates/footer');


			}	

			public function view2($page = 'login', $data){
			if(!file_exists(APPPATH.'views/'.$page.'.php')){
							show_404();//code isgniter function 
							// echo ".$page";
			}
			$value['message'] = $data;		 
 			$this->load->helper('url');
			// $this->load->view('templates/header');
			$this->load->view($page,$value);
			// $this->load->view('templates/footer');


		}


			public function validateFields(){
				
			// echo "inside validate";
			// $this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			$username =      $this->input->post("username");
			$password =		 $this->input->post("password");
			
			// echo $username. "username ";
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');//|matches[passconf]|min_length[8]|alpha_numeric|callback_password_check');
			
			if($this->form_validation->run()){
				echo "true";
				$this->load->model('Login_model');
				$data['posts'] = $this->Login_model->validateUser($username, $password);
				// print_r($data);

				extract($data);

				
				if(count($posts)>0){
						$role_id=$posts[0]->role_id;
						$user_id=$posts[0]->user_id;
						$user_name=$posts[0]->user_name;
						$email=$posts[0]->email;
						$fname=$posts[0]->fname;
						$lname=$posts[0]->lname;
						$created_date=$posts[0]->created_data;

						$this->load->library('session');
						$newdata = array(
							'role_id' => $role_id,
							'user_id' => $user_id,
							'user_name' => $user_name,
							'email' => $email,
							'fname' => $fname,
							'lname' => $lname,
							'created_date' => $created_date);
						
						$this->session->set_userdata($newdata);
						
						// $this->load->view('templates/header');
						if($role_id==1){
							redirect('cmh/users');	
						}else if($role_id==2){
							redirect('home/index/0');
						}else{
							redirect(base_url().'/handleExpenses/index/0');
						}
						// $this->load->view('templates/footer');

				}else{
					$message = 'username or password incorrect';
					$this->view2('login',$message);
				}
							
			}else{
				// echo "false";
				$this->view2('login','');
			}
		}

		public function password_check($str)
			{
   				if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
     				return TRUE;
   				}
   			return FALSE;
			}


		public function logout(){
			$this->load->view('login');
		}

}