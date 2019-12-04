<?php  
class M_auth extends CI_Model
{
	public function is_admin($email,$password)
	{
		return $this->db->get_where('tbl_users', 
			array(
				'email_users' 	 => $email,
				'password_users' => $password,
				'level_users'	 => 'admin' 
			)
		);
	}

	public function is_casier($email,$password)
	{
		return $this->db->get_where('tbl_users', 
			array(
				'email_users' 	 => $email,
				'password_users' => $password,
				'level_users'	 => 'casier' 
			)
		);
	}

	public function set_status($users_id)
	{
		$data = array(
			'status_users' => '1', 
		);

		$this->db->where('id_users', $users_id);
		return $this->db->update('tbl_users', $data);

	}
	public function reset_status($users_id)
	{
		$data = array(
			'status_users' => '0', 
		);

		$this->db->where('id_users', $users_id);
		return $this->db->update('tbl_users', $data);

	}
}