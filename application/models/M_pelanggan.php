<?php
class M_pelanggan extends CI_Model{

	function get_grafik_pelanggan(){
		$query=$this->db->query("SELECT DATE_FORMAT(plg_register,'%M') AS bulan,COUNT(plg_id) AS total FROM tbl_pelanggan WHERE YEAR(plg_register)=YEAR(CURDATE()) GROUP BY MONTH(plg_register)");

		if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
	}

	function get_pelanggan_login($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_pelanggan where plg_id='$kode'");
		return $hsl;
	}

	function get_all(){
		$hsl=$this->db->query("select * from tbl_pelanggan");
		return $hsl;
	}

	function cek_login($u,$p){
		$hsl=$this->db->query("SELECT * FROM tbl_pelanggan WHERE plg_email='$u' AND plg_password=md5('$p')");
		return $hsl;
	}
	function cek_admin($u,$p){
		$hsl=$this->db->query("SELECT * FROM tbl_pelanggan WHERE plg_email='$u' AND plg_password=md5('$p') AND plg_level='Admin'");
		return $hsl;
	}
	function cek_kasir($u,$p){
		$hsl=$this->db->query("SELECT * FROM tbl_pelanggan WHERE plg_email='$u' AND plg_password=md5('$p') AND plg_level='Kasir'");
		return $hsl;
	}
	function simpan_pelanggan_dengan_gambar($nama,$jenkel,$kontak,$email,$pass,$gambar){
		$hsl=$this->db->query("INSERT INTO tbl_pelanggan (plg_nama,plg_jenkel,plg_notelp,plg_email,plg_photo,plg_password,plg_level) VALUES ('$nama','$jenkel','$kontak','$email','$gambar',md5('$pass'),'admin')");
		return $hsl;
	}
	function update_pelanggan_dengan_gambar($kode,$nama,$jenkel,$kontak,$email,$pass,$gambar,$level){
		$hsl=$this->db->query("UPDATE tbl_pelanggan SET plg_nama='$nama',plg_jenkel='$jenkel',plg_notelp='$kontak',plg_email='$email',plg_photo='$gambar',plg_password='$pass',plg_level='$level' WHERE plg_id='$kode' ");
		return $hsl;
	}
	function update_pelanggan_tanpa_gambar($kode,$nama,$jenkel,$kontak,$email,$pass,$level){
		$hsl=$this->db->query("UPDATE tbl_pelanggan SET plg_nama='$nama',plg_jenkel='$jenkel',plg_notelp='$kontak',plg_email='$email',plg_password='$pass',plg_level='$level' WHERE plg_id='$kode' ");
		return $hsl;
	}
	function update_1($kode,$nama,$jenkel,$kontak,$email,$pass,$gambar){
		$hsl=$this->db->query("UPDATE tbl_pelanggan SET plg_nama='$nama',plg_jenkel='$jenkel',plg_notelp='$kontak',plg_email='$email',plg_photo='$gambar',plg_password='$pass' WHERE plg_id='$kode' ");
		return $hsl;
	}
	function update_2($kode,$nama,$jenkel,$kontak,$email,$pass){
		$hsl=$this->db->query("UPDATE tbl_pelanggan SET plg_nama='$nama',plg_jenkel='$jenkel',plg_notelp='$kontak',plg_email='$email',plg_password='$pass' WHERE plg_id='$kode' ");
		return $hsl;
	}
	function hapus_pelanggan($kode){
		$hsl=$this->db->query("delete from tbl_pelanggan where plg_id='$kode'");
		return $hsl;
	}

	function get_all_pelanggan_terbaru(){
		$hsl=$this->db->query("select * from tbl_pelanggan order by plg_id desc");
		return $hsl;
	}

}