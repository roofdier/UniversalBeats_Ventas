<?php

	class Principal extends CI_Controller
	{

		public function index()
		{
			
			$this->load->library('session');
			

			if($this->session->userdata('id_ubeater'))
			{
				$data['logged'] = true;
				$data['title'] = 'Ventas';
			}
			else
			{
				$data['logged'] = false;
				$data['title'] = 'Iniciar Sesion';
			}
				

			$this->load->view('pages/principal.php',$data);
		}

		
	}

?>