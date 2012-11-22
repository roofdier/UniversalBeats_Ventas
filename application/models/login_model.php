<?php


	class Login_Model extends CI_Model{

		public function __construct()
		{
			$this->load->database();
		}

		public function is_user($usr,$pwd)
		{
			$qry = "SELECT id_usuario FROM usuarios WHERE usuario='$usr' AND password='$pwd'";
			$rst = $this->db->query($qry);

			if($rst->num_rows()>0)
				return $rst->row();
			else
				return false;
		}

	}

?>