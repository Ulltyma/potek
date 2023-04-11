<?= $this->session->flashdata('pesan'); ?>
<div class="card">
	<div class="card-header">
		<a href="<?= base_url('admin/kelola_obat/tambah') ?>" class="btn btn-primary bExpired_Datetn-sm"><i class="fas fa-plus"></i> Tambah obat</a>
	</div>
	<!-- /.card-header -->
  <div class="card-body table-responsive">
		<table id="example4" class="table table-bordered table-hover">
			<thead>
				<tr class="text-center">
					<th>NO</th>
					<th>Kode Obat</th>
					<th>Nama Obat</th>
					<th>Expired Date</th>
					<th>Jumlah</th>
				    <th>Harga</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php $no="1";
			foreach ($obat as $ssw) : ?>
				<tbody>
					<tr class="text-center odd">
						<td><?= $no ?></td>
						<td><?= $ssw->Kode_Obat ?></td>
						<td><?= $ssw->Nama_Obat ?></td>
						<td><?= $ssw->Expired_Date ?></td>
						<td><?= $ssw->Jumlah ?></td>
						<td><?= $ssw->Harga ?></td>
						<td>
							<button data-toggle="modal" data-target="#edit<?= $ssw->Id_Obat ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
							<a href="<?= base_url('admin/kelola_obat/delete/' . $ssw->Id_Obat) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')"><i class="fas fa-trash"></i></a>
						</td>
					</tr>
				</tbody>
				<div class="modal fade" id="edit<?= $ssw->Id_Obat?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form action="<?= base_url('admin/kelola_obat/edit/' . $ssw->Id_Obat) ?>" method="POST">
        <div class="form-group">
          <label>Kode obat</label>
          <input type="text" name="Kode_Obat" class="form-control" value="<?= $ssw->Kode_Obat ?>">
          <?= form_error('Kode_Obat', '<div class="text-small text-danger"></div>'); ?>
        </div>  
         <div class="form-group">
          <label>Nama Obat</label>
          <input type="text" name="Nama_Obat" class="form-control" value="<?= $ssw->Nama_Obat ?>">
          <?= form_error('Nama_Obat', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Expired_Date</label>
          <input type="date" name="Expired_Date" class="form-control" value="<?= $ssw->Expired_Date?>">
          <?= form_error('Expired_Date', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Jumlah</label>
          <input type="number" name="Jumlah" class="form-control" value="<?= $ssw->Jumlah?>">
          <?= form_error('Jumlah', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Harga</label>
          <input type="number" name="Harga" class="form-control" value="<?= $ssw->Harga?>">
          <?= form_error('Harga', '<div class="text-small text-danger"></div>'); ?>
         </div> 
        <div class="modal-footer">
         <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
         <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button> 
       </form>
     </div>
    </div>
<?php endforeach ?>
	</table>
	</div>
</div>


