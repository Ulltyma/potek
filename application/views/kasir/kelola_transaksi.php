    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-6">
          <div class="card card-primary card-outline">
            <div class="card-body">
              <div class="row">
                <div class="col-5">
                  <div class="from-group">
                    <label>Nama Obat</label>
                    <label class="form-control form-control-lg">PR1</label>
                  </div>
                </div>  
                <div class="col-6">
                  <div class="from-group">
                    <label>Tanggal</label>
                    <label class="form-control form-control-lg"><?= date('d M Y')?></label>
                  </div>
                </div>  
                <div class="col-5">
                  <div class="from-group">
                    <label>Jam</label>
                    <label class="form-control form-control-lg"><?= date('13:00:00')?></label>
                  </div>
                </div>  
                <div class="col-6">
                  <div class="from-group">
                    <label>Kasir</label>
                    <label class="form-control form-control-lg">kasir</label>
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="card-title m-0"></h5>
            </div>
            <div class="card-body bg-black color-palette text-right ">
              <h1 class="dispaly-4 text-green">Rp. 2,000,000,-</h1>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <div class="card-body">
              <div class="row">
                <div class="div col-12">
                  <div class="row">
                    <div class="col-3 input-group">
                      <input nama="" class="form-control" placeholder="Kode Obat" >
                      <span class="input-group-append">
                        <button class="btn-primary btn-flat btn-responsive">
                          <i class="fas fa-search"></i>
                        </button>
                      </span>
                    </div>
                      <div class="col-2">
                        <input nama="" class="form-control" placeholder="Kode Obat" >
                      </div>
                      <div class="col-2">
                        <input nama="" class="form-control" placeholder="Kode Obat" >
                      </div>
                      <div class="col-3">
                        <button class="btn btn-flat btn-primary"><i class="fas fa-cart-plus"></i></button>
                        <button class="btn btn-flat btn-warning"><i class="fas fa-sync"></i></button>
                        <button class="btn btn-flat btn-success"><i class="fas fa-cash-register"></i> Bayar</button>
                      </div>
                    </div>
</div>
                  
                </div>
              </div>
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
				<tbody>
					<tr class="text-center">
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td>
                            <a class="btn btn-flat btn-danger btn-sm"><i class="fas fa-times"></i></a>
                        </td>
					</tr>
				<tbody>
					<tr class="text-center">
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td>1</td>
						<td>
                            <a class="btn btn-flat btn-danger btn-sm"><i class="fas fa-times"></i></a>
                        </td>
					</tr>
				</tbody>
                   </table>
                  </div>
            </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>