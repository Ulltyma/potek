<?= $this->session->flashdata('pesan'); ?>
<div class="card">
	<div class="card-header">
		<a href="<?= base_url('admin/kelola_user/tambah') ?>" class="btn btn-primary bTelepontn-sm"><i class="fas fa-plus"></i> Tambah user</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body table-responsive">
    <table id="example4" class="table  table-bordered table-hover">
			<thead>
				<tr class="text-center">
					<th>NO</th>
					<th>Nama user</th>
					<th>Alamat</th>
					<th>Telepon</th>
					<th>Username</th>
				<th>Password</th>
					<th>Tipe User</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php $no="1";
			foreach ($user as $ssw) : ?>
				<tbody>
					<tr class="text-center odd">
						<td><?= $no ?></td>
						<td><?= $ssw->Nama_User ?></td>
						<td><?= $ssw->Alamat ?></td>
						<td><?= $ssw->Telepon ?></td>
						<td><?= $ssw->Username ?></td>
						<td><?= $ssw->Password ?></td>
						<td><?= $ssw->Tipe_User ?></td>
						<td>
							<button data-toggle="modal" data-target="#edit<?= $ssw->Id_User ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
							<a href="<?= base_url('admin/kelola_user/delete/' . $ssw->Id_User) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')"><i class="fas fa-trash"></i></a>
						</td>
					</tr>
				</tbody>
				<div class="modal fade" id="edit<?= $ssw->Id_User?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form action="<?= base_url('admin/kelola_user/edit/' . $ssw->Id_User) ?>" method="POST">
        <div class="form-group">
          <label>Nama user</label>
          <input type="text" name="Nama_User" class="form-control" value="<?= $ssw->Nama_User ?>">
          <?= form_error('Nama_User', '<div class="text-small text-danger"></div>'); ?>
        </div>  
         <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="Alamat" class="form-control" value="<?= $ssw->Alamat ?>">
          <?= form_error('Alamat', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Telepon</label>
          <input type="text" name="Telepon" class="form-control" value="<?= $ssw->Telepon?>">
          <?= form_error('Telepon', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Username</label>
          <input type="text" name="Username" class="form-control" value="<?= $ssw->Username?>">
          <?= form_error('Username', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Password</label>
          <input type="text" name="Password" class="form-control" value="<?= $ssw->Password?>">
          <?= form_error('Password', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Tipe User</label>
          <select name="Tipe_User" class="form-control" value="<?= $ssw->Tipe_User?>">
         		<option>admin</option>
         		<option>apoteker</option>
         		<option>kasir</option>
         	</select>
          <?= form_error('Tipe_User', '<div class="text-small text-danger"></div>'); ?>
         </div> 
        <div class="modal-footer">
         <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
         <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button> 
       </form>
     </div>
    </div>
    <?php endforeach ?>
  </div>
	</table>
	</div>
</div>


