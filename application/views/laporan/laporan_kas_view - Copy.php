<?php
function format_rupiah($angka){
	$rupiah=number_format($angka,0,',','.');
	return "Rp. ".$rupiah;
}
function format_rupiah_tanpa_rp($angka){
	$rupiah=number_format($angka,0,',','.');
	return $rupiah;
}
?>
<!-- Content Header (Page header) -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
		
        <div class="box-header">
			<h4><?php echo $this->template_view->nama_menu('nama_menu'); ?></h4>
			<h5><?php echo $this->template_view->nama_menu('judul_menu'); ?></h5>
			<hr>
				
				
			<div class="row">
				<form method="get" class="form-horizontal">
				<div class="col-sm-8 col-md-offset-3">
					
					<p  >Laporan terakhir disampaikan oleh <?php echo $this->dataAkhir->NAMA_KARYAWAN  ?> pada <strong><?php echo $this->dataAkhir->TGL_EMAIL_INDO  ?></strong> </p>
				</div>
				<div class="col-sm-8 col-md-offset-3">
					<span class="btn btn-success" onclick="kirim_lap_kas()"><i class="fa fa-mail"></i> Kirim Laporan Kas ke Owner</span>
					<img src="<?php echo base_url();?>assets/img/loading.gif" id="loading" style="display:none">
					<br>
					<p id="pesan_error" style="display:none" class="text-warning" ></p>
				</div>
				
				</form>
				
			</div>
				<hr>
	
    </div>
  </div>
</section>
<!-- /.content -->
  
