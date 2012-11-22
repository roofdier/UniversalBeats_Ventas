<?php

	class Login extends CI_Controller
	{
		public function index()
		{
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model('login_model');

			if($this->session->userdata('id_ubeater'))
			{
				redirect(base_url(),'refresh');
				return;
			}
			else
			{	

				if(isset($_POST['usr']) && isset($_POST['pwd']) && !empty($_POST['usr']) && !empty($_POST['pwd']))
				{
					$usr = $_POST['usr'];
					$pwd = $_POST['pwd'];


					$iusr = $this->login_model->is_user($_POST['usr'],$_POST["pwd"]);

					if($iusr)
					{
						$this->session->set_userdata('id_ubeater',$iusr);
						redirect(base_url(),'refresh');
					}
					else
					{
						$data['logged'] = false;
						$data['failure'] = true;

						$this->load->view('pages/principal',$data);
					}

				}
				else
					redirect(base_url(),'refresh');
				return;
			}
				

			$this->load->view($page,$data);
		}


		public function logout()
		{
			$this->load->library('session');
			$this->load->helper('url');

			$this->session->sess_destroy();
			
			redirect(base_url(),'refresh');
		}

	}