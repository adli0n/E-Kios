<?php
class M_diskon extends CI_Model{
	
	function get_diskon(){
		$hsl=$this->db->query("SELECT * FROM tbl_diskon");
		return $hsl;	
	}

	function get_diskon_id($kode_diskon){
		$hsl=$this->db->query("SELECT * FROM tbl_diskon WHERE diskon_id = '$kode_diskon'");
		return $hsl;	
	}

	function add_diskon($nama_diskon,$a_diskon,$tgl_mulai,$tgl_exp){
		$hsl=$this->db->query("INSERT INTO tbl_diskon VALUES ('','$nama_diskon','$a_diskon','$tgl_mulai','$tgl_exp')");
		return $hsl;
	}
	function upd_diskon($kode_diskon,$nama_diskon,$a_diskon,$tgl_mulai,$tgl_exp){
		$hsl=$this->db->query("UPDATE tbl_diskon SET nama_diskon='$nama_diskon', a_diskon='$a_diskon', mulai_diskon='$tgl_mulai', exp_diskon='$tgl_exp' where diskon_id='$kode_diskon' ");
		return $hsl;
	}
	function dell_diskon($kode_diskon){
		$hsl=$this->db->query("delete from tbl_diskon where diskon_id='$kode_diskon'");
		return $hsl;
	}

	function expired_diskon(){
		$date = date('Y-m-d');
		$hsl = $this->db->query("select * from tbl_diskon where exp_diskon='$date' ");
		return $hsl;
	}

	function upd_expired_diskon($kode_diskon){
		$hsl = $this->db->query("UPDATE tbl_menu SET menu_id_diskon = 0, menu_nama_diskon='', menu_a_diskon=0 where menu_id_diskon='$kode_diskon' ");
		return $hsl;
	}
	function dell_expired_diskon($kode_diskon){
		$hsl = $this->db->query("DELETE FROM tbl_diskon where diskon_id ='$kode_diskon' ");
		return $hsl;
	}
	

}