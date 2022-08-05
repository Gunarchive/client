<?php
class Login_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_data($username, $password)
	{
		$data = $this->db->query("SELECT * FROM pelanggan WHERE email_pelanggan='$username' AND password_pelanggan='$password' LIMIT 1 ");
		return $data;
	}

	function execute_query($sql)
	{
		return $this->db->query($sql)->result_array();
	}

	public function register($data)
	{
		// User data array
		$this->load->helper('string');
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);
		// Insert user
		return $this->db->insert('user', $data);
	}
}
