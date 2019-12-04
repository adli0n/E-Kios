<?php $no=1; $b=$data->row_array(); ?>
<div class="container mt-3">
	<div class="row">
		<div class="col-12">
			<h3 class="display-4"><img src="<?=base_url().'assets/img/logo/werls-logo.png' ?>" style="height: 60px;width: auto"></h3><br>
		</div>
		<div class="col-6">
			<p class="mt--4">Jagasatru, Jl.Badak No 23 - Cirebon <br>
			Telp (0231) 486591</p>
		</div>
		<div class="col-6">
			<p class="mt--4 float-right">
				No Invoice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $b['inv_no'] ?><br>
				Tanggal Invoice&nbsp;: <?= $b['tanggal'] ?><br>
				Nama Sales&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $b['inv_plg_nama'] ?><br>
			</p>
		</div>

		<div class="table-responsive">
			<table class="table table-borderd">
				<tr>
					<td>NO</td>
					<td>Produk</td>
					<td>harga</td>
					<td>QTY</td>
					<td>Sub Total</td>
				</tr>
			<?php foreach ($data->result_array() as $a) {
                $menu=$a['detail_menu_nama'];
                $harga=$a['detail_harjul'];
                $porsi=$a['detail_porsi'];
                $subtotal=$a['detail_subtotal'];
              ?>
				<tr>
					<td><?=$no++ ?></td>
					<td><?=$menu ?></td>
					<td>Rp.<?php echo number_format($harga) ?>,-</td>
					<td><?=$porsi ?></td>
					<td>Rp.<?php echo number_format($subtotal) ?>,-</td>
				</tr>
			<?php } ?>
			</table>
		</div>
		<div class="col-6 mt-5">
			<p class="mt--4">
			Keterangan: <br>
				- Barang yang sudah dibeli tidak boleh di tukar/ dikembalikan,<br>
			      &nbsp;&nbsp;kecuali ada perjanjian terlebih dahulu <br>
			    - Garansi Produk Maksimal 3 hari (syarat & ketentuan berlaku)</p>
		</div>
		<div class="col-6 mt-5">
			<p class="mt--4 float-right">
				Total Keseluruhan&nbsp;  : Rp.<?php echo number_format($b['inv_total']) ?>,-<br>
				Pembayaran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.<?php echo number_format($b['inv_bayar']) ?>,-<br>
				Kembalian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.<?php echo number_format($b['inv_kembali']) ?>,-<br>
			</p>

		</div>
	</div>

</div>
<script type="text/javascript">
	window.print()
</script>
<script type="text/javascript">
	window.close()
</script>