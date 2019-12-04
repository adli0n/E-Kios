<?php
class M_kategori extends CI_Model{

	public function get(){
		return $this->db->get('tbl_kategori');
	}

	public function get_where($kategori){
		$data = array(
			'kategori_id' => $kategori,
		);
		return $this->db->get_where('tbl_kategori', $data);
	}

	public function insert($kategori){
		$data = array(
			'kategori_nama' => $kategori,
		);
		return $this->db->insert('tbl_kategori', $data);
	}

	public function delete($kode){
		$data = array(
			'kategori_id' => $kode,
		);
		return $this->db->delete('tbl_kategori', $data);
	}


}