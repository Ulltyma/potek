<form action="<?= base_url('admin/kelola_user/tambah_aksi') ?>" method="POST">
	<div class="form-group">
          <label>Nama user</label>
          <input type="text" name="Nama_User" class="form-control">
          <?= form_error('Nama_User', '<div class="text-small text-danger"></div>'); ?>
        </div>  
         <div class="form-group">
          <label>Alamat</label>
        <textarea type="text" name="Alamat" class="form-control"></textarea>
          <?= form_error('Alamat', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Telepon</label>
          <input type="number" name="Telepon" class="form-control">
          <?= form_error('Telepon', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Username</label>
          <input type="text" name="Username" class="form-control" >
          <?= form_error('Username', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Password</label>
          <input type="text" name="Password" class="form-control" >
          <?= form_error('Password', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
         	<label>Tipe User</label>
         	<select name="Tipe_User" class="form-control">
         		<option>admin</option>
         		<option>apoteker</option>
         		<option>kasir</option>
         	</select>
          <?= form_error('Tipe_User', '<div class="text-small text-danger"></div>'); ?>
         </div> 
	<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
	<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
</form>