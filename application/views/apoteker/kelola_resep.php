<?= $this->session->flashdata('pesan'); ?>
<div class="card">
	<div class="card-header">
		<a href="<?= base_url('apoteker/kelola_resep/tambah') ?>" class="btn btn-primary bNama_Doktertn-sm"><i class="fas fa-plus"></i> Tambah resep</a>
	</div>
	<!-- /.card-header -->
  <div class="card-body table-responsive">
		<table id="example4" class="table table-bordered table-hover">
			<thead>
				<tr class="text-center">
					<th>NO</th>
					<th>No Resep</th>
					<th>Tanggal Resep</th>
					<th>Nama Dokter</th>
					<th>Nama Pasien</th>
				    <th>Nama Obat</th>
				    <th>Jumlah Dibeli</th>
				    <th>Id Pasien</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php $no="1";
			foreach ($resep as $ssw) : ?>
				<tbody>
					<tr class="text-center odd">
						<td><?= $no ?></td>
						<td><?= $ssw->No_Resep ?></td>
						<td><?= $ssw->Tgl_Resep ?></td>
						<td><?= $ssw->Nama_Dokter ?></td>
						<td><?= $ssw->Nama_Pasien ?></td>
						<td><?= $ssw->Nama_ObatDibeli ?></td>
						<td><?= $ssw->Jumlah_ObatDibeli ?></td>
						<td><?= $ssw->Id_Pasien ?></td>
						<td>
							<button data-toggle="modal" data-target="#edit<?= $ssw->Id_Resep ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
							<a href="<?= base_url('apoteker/kelola_resep/delete/' . $ssw->Id_Resep) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')"><i class="fas fa-trash"></i></a>
						</td>
					</tr>
				</tbody>
				<div class="modal fade" id="edit<?= $ssw->Id_Resep?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Resep</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form action="<?= base_url('apoteker/kelola_resep/edit/' . $ssw->Id_Resep) ?>" method="POST">
        <div class="form-group">
          <label>Kode resep</label>
          <input type="text" name="No_Resep" class="form-control" value="<?= $ssw->No_Resep ?>">
          <?= form_error('No_Resep', '<div class="text-small text-danger"></div>'); ?>
        </div>  
         <div class="form-group">
          <label>Tanggal Resep</label>
          <input type="date" name="Tgl_Resep" class="form-control" value="<?= $ssw->Tgl_Resep ?>">
          <?= form_error('Tgl_Resep', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Nama Dokter</label>
          <input type="text" name="Nama_Dokter" class="form-control" value="<?= $ssw->Nama_Dokter?>">
          <?= form_error('Nama_Dokter', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Nama Pasien</label>
          <input type="text" name="Nama_Pasien" class="form-control" value="<?= $ssw->Nama_Pasien?>">
          <?= form_error('Nama_Pasien', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Nama Obat</label>
          <input type="text" name="Nama_ObatDibeli" class="form-control" value="<?= $ssw->Nama_ObatDibeli?>">
          <?= form_error('Nama_ObatDibeli', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Jumlah Dibeli</label>
          <input type="number" name="Jumlah_ObatDibeli" class="form-control" value="<?= $ssw->Jumlah_ObatDibeli?>">
          <?= form_error('Jumlah_ObatDibeli', '<div class="text-small text-danger"></div>'); ?>
         </div> 
         <div class="form-group">
          <label>Id Pasien</label>
          <input type="number" name="Id_Pasien" class="form-control" value="<?= $ssw->Id_Pasien?>">
          <?= form_error('Id_Pasien', '<div class="text-small text-danger"></div>'); ?>
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


