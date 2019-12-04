<?php
class M_order extends CI_Model{

	function get_histori($kopel){
		$hsl=$this->db->query("SELECT * FROM tbl_invoice WHERE inv_plg_id='$kopel' ORDER BY DATE(inv_tanggal) DESC");
		return $hsl;
	}
	function get_all_histori(){
		$hsl=$this->db->query("SELECT * FROM tbl_invoice ORDER BY DATE(inv_tanggal) DESC");
		return $hsl;
	}

	function get_tatal_pelanggan(){
		$hsl=$this->db->query("SELECT COUNT(plg_id) AS tot_pelanggan FROM tbl_pelanggan");
		return $hsl;
	}

	function get_total_porsi_terjual_bulan_ini(){
		$hsl=$this->db->query("SELECT SUM(detail_porsi) AS total_porsi FROM tbl_invoice JOIN tbl_detail ON inv_no=detail_inv_no WHERE MONTH(inv_tanggal)=MONTH(CURDATE())");
		return $hsl;
	}
	function get_total_porsi_terjual_bulan_lalu(){
		$hsl=$this->db->query("SELECT SUM(detail_porsi) AS total_porsi FROM tbl_invoice JOIN tbl_detail ON inv_no=detail_inv_no WHERE MONTH(inv_tanggal)=MONTH(CURDATE())-1");
		return $hsl;
	}

	function get_total_penjualan_bulan_lalu(){
		$hsl=$this->db->query("SELECT SUM(inv_total) AS total_penjualan FROM tbl_invoice WHERE MONTH(inv_tanggal)=MONTH(CURDATE())-1");
		return $hsl;
	}
	function get_total_penjualan_bulan_lalu_2(){
		$hsl=$this->db->query("SELECT SUM(inv_total) AS total_penjualan FROM tbl_invoice WHERE MONTH(inv_tanggal)=MONTH(CURDATE())-2");
		return $hsl;
	}

	function get_total_penjualan_sekarang(){
		$hsl=$this->db->query("SELECT SUM(inv_total) AS total_penjualan FROM tbl_invoice WHERE MONTH(inv_tanggal)=MONTH(CURDATE())");
		return $hsl;
	}


	function get_grafik_penjualan(){
		$query=$this->db->query("SELECT DATE_FORMAT(inv_tanggal,'%d') AS tanggal,SUM(inv_total) AS total FROM tbl_invoice WHERE DATE_FORMAT(inv_tanggal,'%M %Y')=DATE_FORMAT(CURDATE(),'%M %Y') GROUP BY DAY(inv_tanggal)");

		if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
	}

	function get_all_rekening(){
		$hsl=$this->db->query("select * from tbl_rekening");
		return $hsl;
	}

	function get_all_order(){
		$hsl=$this->db->query("SELECT inv_no,DATE_FORMAT(inv_tanggal,'%d %M %Y') AS inv_tanggal,inv_plg_id,inv_plg_nama,inv_bayar,inv_kembali FROM tbl_invoice ORDER BY DATE(inv_tanggal) DESC");
		return $hsl;
	}

	function get_invoice(){
		$q = $this->db->query("SELECT MAX(RIGHT(inv_no,6)) AS kd_max FROM tbl_invoice where date(inv_tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "INV".date('dmy').$kd;
	}
	function order_produk($no_invoice,$total){
		$kopel=$this->session->userdata('kopel');
		$napel=$this->session->userdata('nama_pel');
        $diskon = $items['menu_a_diskon']/100*$items['subtotal'];
        $potongan = $this->cart->total()-$diskon;
		$this->db->query("INSERT INTO tbl_invoice (inv_no,inv_plg_id,inv_plg_nama,inv_total) VALUES ('$no_invoice','$kopel','$napel','$total')");
			foreach ($this->cart->contents() as $item) {
			if(empty($items['menu_a_diskon'])){
			$data=array(
				'detail_menu_id'	 =>	$item['id'],
				'detail_menu_nama'   =>	$item['name'],
				'detail_harjul'		 =>	$item['price'],
				'detail_porsi'  	 =>	$item['qty'],
				'detail_diskon_id'   =>	$item['id_diskon'],
				'detail_nama_diskon' =>	$item['menu_nama_diskon'],
				'detail_a_diskon'  	 =>	$item['menu_a_diskon'],
				'detail_subtotal'    =>	$item['subtotal'],
				'detail_inv_no' 	 =>	$no_invoice
			);
			}else{
				$data=array(
				'detail_menu_id'	 =>	$item['id'],
				'detail_menu_nama'   =>	$item['name'],
				'detail_harjul'		 =>	$diskon,
				'detail_porsi'  	 =>	$item['qty'],
				'detail_diskon_id'   =>	$item['id_diskon'],
				'detail_nama_diskon' =>	$item['menu_nama_diskon'],
				'detail_a_diskon'  	 =>	$item['menu_a_diskon'],
				'detail_subtotal'    =>	$potongan,
				'detail_inv_no' 	 =>	$no_invoice
			);
			}

			$this->db->insert('tbl_detail',$data);
		 	}

		 	foreach ($this->cart->contents() as $item) {
		 	$id = $item['id'];
		 	$qty = $item['qty'];
		 	$qty_awal = $item['qty_awal'];
		 	$qty_ku = $qty_awal-$qty;
		 	
			$this->db->query("UPDATE tbl_menu set menu_qty=$qty_ku where menu_id='$id'");
		}
		return true;
	}

	function set_pembayaran($no_invoice,$bayar,$kembali){
		$hsl=$this->db->query("UPDATE tbl_invoice SET inv_bayar='$bayar', inv_kembali='$kembali' WHERE inv_no='$no_invoice'");
		return $hsl;
	}

	function get_checkout($no_invoice){
		$hsl=$this->db->query("SELECT inv_no,DATE_FORMAT(inv_tanggal,'%d/%m/%Y') AS tanggal,inv_plg_nama,inv_total,inv_bayar,inv_kembali,detail_menu_id,detail_menu_nama,detail_harjul,detail_porsi,detail_subtotal FROM tbl_invoice JOIN tbl_detail ON inv_no=detail_inv_no WHERE inv_no='$no_invoice'");
		return $hsl;
	}

	function hapus_order($kode){
		$this->db->trans_start();
            $this->db->query("delete from tbl_detail where detail_inv_no='$kode'");
            $this->db->query("delete from tbl_invoice where inv_no='$kode'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}


}