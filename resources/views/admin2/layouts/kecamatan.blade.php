<!-- Header -->
@include('admin2.includes.header')
<!-- End Header -->

<body>
@include('sweetalert::alert')
	<div class="wrapper">
		<div class="main-header">

			<!-- Logo Header -->
			@include('admin2.includes.logoheader')
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			@include('admin2.includes.navbar')
			<!-- End Navbar -->

		</div>

		<!-- Sidebar -->
   	 	@include('admin2.includes.sidebar')
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Administrator</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="admin-dashboard">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Kecamatan</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Kecamatan</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Kecamatan</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah">
										<i class="fa-solid fa-circle-plus" style="color: #ffffff;"></i>
											Tambah Data
										</button>
									</div>
								</div>
								<div class="card-body"> 
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr class="text-center">
													<th style="width: 1%">No</th>
													<th style="width: 1%">ID</th>
													<th style="width: 10%">Kecamatan</th>
													<th style="width: 5%">Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?php $i=1;?>
											@foreach($kecamatan as $data)
												<tr class="text-center">
													<td>{{$i++}}</td>
													<td>{{ $data->id }}</td>
													<td>{{ $data->kecamatan }}</td>
													<td>
														<!-- Tombol -->
														<div class="form-button-action">
															<!-- Tombol Edit -->
															<button type="button" class="btn btn-link btn-lg" data-toggle="modal" data-target="#edit{{ $data->id }}">
																<i class="fa-solid fa-pencil" style="color: #094dc3;"></i>
															</button>
															<!-- Tombol Detail -->
															<button type="button" data-toggle="modal" data-target="#detail{{ $data->id }}" class="btn btn-link btn-danger">
																<i class="fa-solid fa-calendar-week" style="color: #068827;"></i>
															</button>
														</div>
													</td>
												</tr>

												<!-- Moda Edit -->
												<div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header no-bd">
																<h5 class="modal-title">
																	<span class="fw-mediumbold">Edit Kecamatan</span> 
																</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="/data-kecamatan/{{ $data->id }}" method="POST">
																@method('put')
																@csrf
																<div class="modal-body">
																	<!-- Form edit -->
																	<div class="form-edit">
																		<div class="row">
																			<div class="col-sm-12">
																				<div class="form-floating mb-3">
																					<input class="form-control" type="text" name="kecamatan" placeholder="Kecamatan" value="{{$data->kecamatan}}" required>
																					<label for="floatingInput" name="kecamatan">Kecamatan</label>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer d-flex justify-content-center">
																	<input type="submit" value="Ubah" class="btn btn-primary">
																</div>
															</form>
														</div>
													</div>
												</div>
												<!-- End Modal Edit -->

												<!-- Modal Detail -->
												<div class="modal fade" id="detail{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
														<div class="modal-content">
														<div class="modal-header no-bd">
															<h5 class="modal-title">
															<span class="fw-mediumbold">Detail Kecamatan</span> 
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="row mb-3 d-flex justify-content-center">
																<div class="col-4">
																	<p>Kecamatan</p>
																</div>
																<div class="col-7">
																	<p>: {{ $data->kecamatan }}</p>
																</div>
															</div>
															<div class="modal-footer d-flex justify-content-center">
																<form action="/data-kecamatan/{{ $data->id }}" method="POST">
																	@csrf
																	@method('delete')
																	<input type="submit" class="btn btn-primary" value="Hapus">
																</form>
															</div>
														</div>
													</div>
												</div>
												<!-- End Modal Detail -->
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Footer -->
			@include('admin2.includes.footer')
			<!-- End Footer -->
		</div>
	</div>



  <!-- Modal Tambah -->
  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header no-bd">
          <h5 class="modal-title">
            <span class="fw-mediumbold">Tambah Kecamatan</span> 
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
		<form action="/data-kecamatan/tambah" method="POST">
			@csrf
			<div class="modal-body">
				<div class="form-tambah">
					<!-- Form Tambah -->
						<div class="row">
							<div class="col-sm-12">
								<div class="form-floating mb-3">
									<input class="form-control" type="text" name="kecamatan" placeholder="Kecamatan" required>
									<label for="floatingInput" name="kecamatan">Kecamatan</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<input type="submit" value="Tambah" class="btn btn-primary">
				</div>
			</div>
		</form>
    </div>
  </div>
  <!-- End Modal Tambah -->

	<!--   Core JS Files   -->
  @include('admin2.includes.script')
	<!-- End JS Files -->

</body>
</html>