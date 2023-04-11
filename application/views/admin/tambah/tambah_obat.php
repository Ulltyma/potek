<form action="<?= base_url('admin/kelola_obat/tambah_aksi') ?>" method="POST">
	<div class="form-group">
          <label>Kode Obat</label>
          <input type="text" name="Kode_Obat" class="form-control">
          <?= form_error('Kode_Obat', '<div class="text-small text-danger"></div>'); ?>
        </div>  
         <div class="form-group">
          <label>Nama Obat</label>
        <textarea type="text" name="Nama_Obat" class="form-control"></textarea>
          <?= form_error('Nama_Obat', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Expired Date</label>
          <input type="date" name="Expired_Date" class="form-control">
          <?= form_error('Expired_Date', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Jumlah</label>
          <input type="number" name="Jumlah" class="form-control" >
          <?= form_error('Jumlah', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Harga</label>
          <input type="number" name="Harga" class="form-control" >
          <?= form_error('Harga', '<div class="text-small text-danger"></div>'); ?>
         </div> 
	<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
	<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
</form>