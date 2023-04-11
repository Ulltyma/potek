<form action="<?= base_url('apoteker/kelola_resep/tambah_aksi') ?>" method="POST">
	<div class="form-group">
          <label>No Resep</label>
          <input type="text" name="No_Resep" class="form-control">
          <?= form_error('No_Resep', '<div class="text-small text-danger"></div>'); ?>
        </div>  
         <div class="form-group">
          <label>Tanggal Resep</label>
        <input type="date" name="Tgl_Resep" class="form-control">
          <?= form_error('Tgl_Resep', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Nama Dokter</label>
          <input type="text" name="Nama_Dokter" class="form-control">
          <?= form_error('Nama_Dokter', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Nama Pasien</label>
          <input type="text" name="Nama_Pasien" class="form-control" >
          <?= form_error('Nama_Pasien', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Nama Obat</label>
          <input type="text" name="Nama_ObatDibeli" class="form-control" >
          <?= form_error('Nama_ObatDibeli', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Jumlah Dibeli</label>
          <input type="number" name="Jumlah_ObatDibeli" class="form-control" >
          <?= form_error('Jumlah_ObatDibeli', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Id Pasien</label>
          <input type="number" name="Id_Pasien" class="form-control" >
          <?= form_error('Id_Pasien', '<div class="text-small text-danger"></div>'); ?>
         </div> 
	<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
	<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
</form>