<?php
class M_menu extends CI_Model{

	public function get_all_menu(){
		return $this->db->get('tbl_menu');
	}

	public function get_menu_id($kode_menu){
		$data = array(
			'menu_id' => $kode_menu, 
		);
		return $this->db->get_where('tbl_menu' ,$data);
	}
	public function get_limit(){
		return $this->db->get_where('tbl_menu','menu_qty <= 10');
	}
	public function get_limit_max(){
		$hsl=$this->db->query("SELECT * FROM tbl_menu WHERE menu_qty BETWEEN 300 AND 10000 AND menu_id_diskon ='0'");
		return $hsl;	
	}
	public function get_no_diskon(){
		$hsl=$this->db->query("SELECT * FROM tbl_menu WHERE menu_id_diskon = '0'");
		return $hsl;	
	}

	public function simpan_menu($nama,$harga,$kategori,$kat_nama,$qty,$gambar){
		$data = array(
			'menu_nama' => $nama, 
			'menu_harga_baru' => $harga,
			'menu_kategori_id' =>  $kategori,
			'menu_kategori_nama' => $kat_nama,
			'menu_qty' => $qty,
			'menu_gambar' =>  $gambar
		);
		return $this->db->insert('tbl_menu', $data);
	}

	//UPDATE MENU DENGAN diskon //
	public function update_menu_diskon($kode_menu,$kode_diskon,$nama_diskon,$a_diskon){
		$hsl=$this->db->query("UPDATE tbl_menu set menu_id_diskon ='$kode_diskon', menu_nama_diskon ='$nama_diskon', menu_a_diskon ='$a_diskon' where menu_id='$kode_menu'");
		return $hsl;
	}
	//UPDATE MENU DENGAN qty //
	public function update_menu_qty($kode_menu,$add_qty){
		$hsl=$this->db->query("UPDATE tbl_menu set menu_qty ='$add_qty' where menu_id='$kode_menu'");
		return $hsl;
	}

	public function update_menu($kode_menu,$nama,$harga_lama,$harga,$kategori,$kat_nama){
		$hsl=$this->db->query("UPDATE tbl_menu set menu_nama='$nama',menu_harga_lama='$harga_lama',menu_harga_baru='$harga',menu_kategori_id='$kategori',menu_kategori_nama='$kat_nama' where menu_id='$kode_menu'");
		return $hsl;
	}
	public function update_menu_gambar($kode_menu,$nama,$harga_lama,$harga,$kategori,$kat_nama,$gambar){
		$hsl=$this->db->query("UPDATE tbl_menu set menu_nama='$nama',menu_harga_lama='$harga_lama',menu_harga_baru='$harga',menu_kategori_id='$kategori',menu_kategori_nama='$kat_nama',menu_gambar='$gambar' WHERE menu_id='$kode_menu'");
		return $hsl;
	}
	//END UPDATE MENU TANPA GAMBAR//

	public function hapus_menu($kode){
		$hsl=$this->db->query("DELETE FROM tbl_menu where menu_id='$kode'");
		return $hsl;
	}


	//MODEL UNTUK MOBILE
	public function all(){
		$hsl=$this->db->query("SELECT * from tbl_menu");
		return $hsl;
	}
	public function hot_promo(){
		$hsl=$this->db->query("SELECT * FROM tbl_menu WHERE (menu_harga_lama-menu_harga_baru)>=0 ORDER BY (menu_harga_lama-menu_harga_baru) DESC");
		return $hsl;
	}
	public function makanan(){
		$hsl=$this->db->query("SELECT * FROM tbl_menu WHERE menu_kategori_id='1' ORDER BY menu_id DESC");
		return $hsl;
	}
	public function minuman(){
		$hsl=$this->db->query("SELECT * FROM tbl_menu WHERE menu_kategori_id='2' ORDER BY menu_id DESC");
		return $hsl;
	}
	public function diskon(){
		$hsl=$this->db->query("SELECT * FROM tbl_menu WHERE menu_a_diskon <> 0 ORDER BY menu_id_diskon DESC");
		return $hsl;
	}

	public function detail_menu($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_menu where menu_id='$kode'");
		return $hsl;	
	}


	//END MODEL UNTUK MOBILE

}