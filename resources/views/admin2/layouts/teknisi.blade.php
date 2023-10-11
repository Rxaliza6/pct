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
								<a href="#">Teknisi</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Teknisi</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Teknisi</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah">
											<i class="fa-solid fa-circle-plus" style="color: #ffffff;"></i>
											Tambah Data
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover">
											<thead>
												<tr class="text-center">
													<th style="width: 1%">No</th>
													<th style="width: 1%">ID</th>
													<th style="width: 10%">Nama</th>
													<th style="width: 15%">Alamat</th>
													<th style="width: 10%">Jenis Kelamin</th>
													<th style="width: 3%">No Hp</th>
													<th style="width: 10%">Foto</th>
													<th style="width: 8%">Domisili</th>
													<th style="width: 5%">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												@foreach($teknisi as $data)
												<tr class="text-center">
													<td>{{$i++}}</td>
													<td>{{ $data->id }}</td>
													<td>{{ $data->nama_teknisi }}</td>
													<td>{{ $data->alamat }}</td>
													<td>{{ $data->jenis_kelamin }}</td>
													<td>{{ $data->no_hp }}</td>
													<td><img src="{{ asset('fototeknisi/'.$data->foto) }}" alt="" style="width: 100px; height: 133px; object-fit: cover;" class="my-2 rounded-3 shadow-lg"></td>
													<td>{{ $data->relasikecamatan->kecamatan }}</td>
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
																	<span class="fw-mediumbold">Edit Teknisi</span> 
																</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="/data-teknisi/{{ $data->id }}" method="POST" enctype="multipart/form-data">
																@method('put')
																@csrf
																<div class="modal-body">
																	<!-- Form edit -->
																	<div class="form-edit">
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-floating mb-3">
																					<input class="form-control" type="text" name="nama_teknisi" placeholder="nama" value="{{$data->nama_teknisi}}" required>
																					<label for="floatingInput" name="nama_teknisi">Nama</label>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-floating mb-3">
																					<input class="form-control" type="text" name="jenis_kelamin" placeholder="Jenis Kelamin" value="{{$data->jenis_kelamin}}" required>
																					<label for="floatingInput" name="jenis_kelamin">Jenis Kelamin</label>
																				</div>
																			</div>
																			<div class="col-sm-12">
																				<div class="form-floating mb-3">
																					<input class="form-control" type="text" name="alamat" placeholder="Alamat" value="{{$data->alamat}}" required>
																					<label for="floatingInput" name="alamat">Alamat</label>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-floating mb-3">
																					<input class="form-control" type="text" name="no_hp" placeholder="No HP" value="{{$data->no_hp}}" required>
																					<label for="floatingInput" name="no_hp">No HP</label>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-floating mb-3">
																					<input class="form-control" type="text" name="tpt_lhr" placeholder="Tempat Lahir" value="{{$data->tpt_lhr}}" required>
																					<label for="floatingInput" name="tpt_lhr">Tempat Lahir</label>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-floating mb-3">
																					<input class="form-control" type="text" name="tgl_lhr" placeholder="Tanggal Lahir" value="{{$data->tgl_lhr}}" required>
																					<label for="floatingInput" name="tgl_lhr">Tanggal Lahir</label>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<select class="form-select" aria-label="Default select example" name="kecamatan_id">
																					<option value="" disabled selected>Pilih Kecamatan</option>
																					@foreach ($kecamatans as $kecamatanss)
																					<option value="{{ $kecamatanss->id }}" {{ $kecamatanss->id == $data->kecamatan_id ? "selected" : "" }}>{{ $kecamatanss->kecamatan }}</option>
																					@endforeach
																				</select>
																			</div>
																			<div class="col-sm-6">
																				{{-- <label for="formFile" class="form-label">Foto Teknisi</label> --}}
																				<input class="form-control" type="file" name="foto" style="height: 38px;">
																				<p class="text-danger" style="font-size: 10px;">*harus beresolusi 150 x 150 pixel</p>
																			</div>
																			<div class="col-md-6">
																				<select class="form-select" aria-label="Default select example" name="bidang" required>
																					<option value="" disabled selected>Pilih Bidang</option>
																					<option value="Pencucian Ac" {{ $data->bidang == 'Pencucian Ac' ? '' : 'selected' }}>Pencucian Ac</option>
																					<option value="Service Ac" {{ $data->bidang == 'Service Ac' ? '' : 'selected' }}>Service Ac</option>
																				</select>
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
																	<span class="fw-mediumbold">Detail Teknisi</span>
																</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<h4 class="title text-center mb-5"><img class="rounded-2 shadow-lg" src="{{ asset('fototeknisi/' . $data->foto) }}" alt=""
																	style="width: 200px; height: 267px;"></h4>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>ID Akun</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->id }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Nama</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->nama_teknisi }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Alamat</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->alamat }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Jenis Kelamin</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->jenis_kelamin }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>No HP</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->no_hp }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Tempat Lahir</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->tpt_lhr }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Tanggal Lahir</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->tgl_lhr }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Kecamatan</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->relasikecamatan->kecamatan }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Bidang</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->bidang }}</p>
																	</div>
																</div>
																<div class="modal-footer d-flex justify-content-center">
																	<form action="/data-teknisi/{{ $data->id }}" method="POST">
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
						<span class="fw-mediumbold">Tambah Teknisi</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="/data-teknisi/tambah" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<div class="form-tambah">
							<!-- Form Tambah -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-floating mb-3">
										<input class="form-control" type="text" name="nama_teknisi" placeholder="Nama" required>
										<label for="floatingInput" name="nama_teknisi">Nama</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating mb-3">
										<input class="form-control" type="text" name="jenis_kelamin" placeholder="Jenis Kelamin" required>
										<label for="floatingInput" name="jenis_kelamin">Jenis Kelamin</label>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-floating mb-3">
										<input class="form-control" type="text" name="alamat" placeholder="Alamat" required>
										<label for="floatingInput" name="alamat">Alamat</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating mb-3">
										<input class="form-control" type="text" name="no_hp" placeholder="No HP" required>
										<label for="floatingInput" name="no_hp">No HP</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating mb-3">
										<input class="form-control" type="text" name="tpt_lhr" placeholder="Tempat Lahir" required>
										<label for="floatingInput" name="tpt_lhr">Tempat Lahir</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-floating mb-3">
										<input class="form-control" type="date" name="tgl_lhr" placeholder="Tanggal Lahir" required>
										<label for="floatingInput" name="tgl_lhr">Tanggal Lahir</label>
									</div>
								</div>
								<div class="col-md-6">
									<select class="form-select" aria-label="Default select example" name="kecamatan_id">
										<option value="">Pilih Kecamatan</option>
										@foreach ($kecamatan as $kecamatan)
										<option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-sm-6">
									{{-- <label for="formFile" class="form-label">Foto Teknisi</label> --}}
									<input class="form-control" type="file" name="foto" style="height: 38px;" required>
									<p class="text-danger">*harus beresolusi 150 x 150 pixel</p>
								</div>
								<div class="col-md-6">
									<select class="form-select" aria-label="Default select example" name="bidang" required>
										<option value="" disabled selected>Pilih Bidang</option>
										<option value="Pencucian Ac">Pencucian Ac</option>
										<option value="Service Ac">Service Ac</option>
									</select>
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
	<!-- End Modal -->

	<!--   Core JS Files   -->
	@include('admin2.includes.script')
	<!-- End JS Files -->

</body>

</html>