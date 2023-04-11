<section class="content">  
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-primary">
					<div class="inner">
						<h2>Data User</h2>

					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="kelola_user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<h2>Data Obat</h2>
					</div>
					<div class="icon"> 
						<i class="ion ion-bag"></i>
					</div>
					<a href="kelola_obat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-cyan">
					<div class="inner">
						<h2>Kelola Laporan</h2>

					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="kelola_laporan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				</div>
			</div>
		</div>
		<h3 style="text-align:left;">Log Activity</h3>
		<?= $this->session->flashdata('pesan'); ?>
		<div class="card-body table-responsive">
		<?php if ($logs) : ?>
			<table class="table">
				<thead class="thead-dark">
					<tr>
        <th scope="col">No</th>
         <th scope="col">Nama</th>
         <th scope="col">Aktivitas</th>
         <th scope="col">Waktu</th>
         <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($logs as $log) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $log->Nama_User ?></td>
          <td><?= $log->Aktifitas ?></td>
          <td><?= $log->Waktu ?></td>
		<td><a href="<?= base_url('admin/dashboard/delete/' . $log->Id_Log) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')"><i class="fas fa-trash"></i></a></td>
        </tr>
	  </div>
      <?php endforeach ?>
    </tbody>
  </table>
<?php else : ?>
  <p>Data log tidak ditemukan.</p>
<?php endif ?>
</div>