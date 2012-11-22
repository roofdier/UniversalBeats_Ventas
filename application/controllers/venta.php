<?php

	class Venta extends CI_Controller
	{
		public function index()
		{
			if(!isset($_POST["q"]) || empty($_POST["q"]) || !isset($_POST["t"]) || empty($_POST["t"]))
			{
				echo 0;
				exit();
			}

			$this->load->library('session');
			$this->load->helper('string');
			$this->load->model('venta_model');

			if($this->venta_model->nuevaVenta($_POST['q'],$_POST['t']))
				echo 1;
			else
				echo 0;

			$this->db->close();
		}
	}

?>