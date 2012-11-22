<?php


	class Venta_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
			$this->load->helper('string');
		}

		public function nuevaVenta($cantidad,$tipo)
		{
			$key = random_string('alnum', 11);
			$ssuser = $this->session->userdata('id_ubeater');

			$query = "SQL";
			
			if($this->db->query($query))
				return true;
			else
				return false;
		}
	}


?>