
<!-- Content Header (Page header) -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">		
				<div class="box-header">
					<h4><?php echo $this->template_view->nama_menu('nama_menu'); ?></h4>
					<h5><?php echo $this->template_view->nama_menu('judul_menu'); ?></h5>
					<hr>			
				</div>
				<div class="box-body">
					<form class="form-horizontal" id="form_standar">
						<input type="hidden" name="ID_MESIN" value="<?php echo $this->oldData->ID_MESIN; ?>">
						
						<div class="form-group">
							<label class="control-label col-sm-2" for="email">Nama Mesin :</label>
							<div class="col-sm-4">
								<input type="input" class="form-control required" id="NAMA_MESIN" name="NAMA_MESIN" value="<?php echo $this->oldData->NAMA_MESIN; ?>">
							</div>
						</div>	
						<div class="form-group">
							<label class="control-label col-sm-2" for="email">Keterangan :</label>
							<div class="col-sm-8">
								<input type="input" class="form-control required" id="KET_MESIN" name="KET_MESIN" value="<?php echo $this->oldData->KET_MESIN; ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<img src="<?php echo base_url();?>assets/img/loading.gif" id="loading" style="display:none">
								<p id="pesan_error" style="display:none" class="text-warning" style="display:none"></p>
							</div>
						</div>			
						<div class="form-group">        
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
								<a href="<?=base_url()."".$this->uri->segment(1);?>">
									<span class="btn btn-warning"><i class="fa fa-remove"></i> Batal</span>
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
  
