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
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Pesanan</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Alamat Lain</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Pesanan Alamat Lain</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover">
											<thead>
												<tr class="text-center">
													<th style="width: 1%">No</th>
													<th style="width: 1%">ID</th>
													<th style="width: 1%">ID Akun</th>
													<th style="width: 15%">Nama</th>
													<th style="width: 15%">Alamat</th>
													<th style="width: 15%">Teknisi</th>
													<th style="width: 10%">Tanggal Datang</th>
													<th style="width: 9%">Keterangan</th>
													<th style="width: 5%">Status</th>
													<th style="width: 5%">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												@foreach($pesananlain as $data)
												<tr class="text-center">
													<td>{{$i++}}</td>
													<td>{{ $data->id }}</td>
													<td>{{ $data->akun_id }}</td>
													<td>{{ $data->nama }}</td>
													<td>{{ $data->alamat }}</td>
													<td>{{ $data->relasiteknisi->nama_teknisi }}</td>
													<td>{{ $data->tanggal_datang }}</td>
													<td>{{ $data->keterangan }}</td>
													<td>{{ $data->status }}</td>
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

												<!-- Modal Edit Pesanan -->
												<div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header no-bd">
																<h5 class="modal-title">
																	<span class="fw-mediumbold">Edit Pesanan Alamat Lain</span>
																</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="/data-pesananlain/{{ $data->id }}" method="POST">
																@method('put')
																@csrf
																<div class="modal-body">
																	<!-- Form edit -->
																	<div class="form-edit">
																		<div class="row">
																			<div class="col-sm-12">
																				<div class="form-floating mb-3">
																					<input class="form-control" type="number" name="harga" placeholder="Harga" value="{{$data->harga}}">
																					<label for="floatingInput" name="harga">Harga</label>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-sm-12">
																				<div class="form-floating mb-3">
																					<select class="form-select" aria-label="Default select example" name="status">
																						<option value="" disabled>Status</option>
																						<option value="Dipesan" {{ $data->status == "Dipesan" ? "selected" : "" }}>Dipesan</option>
																						<option value="Diproses" {{ $data->status == "Diproses" ? "selected" : "" }}>Diproses</option>
																						<option value="Selesai" {{ $data->status == "Selesai" ? "selected" : "" }}>Selesai</option>
																						<option value="Dibatalkan" {{ $data->status == "Dibatalkan" ? "selected" : "" }}>Dibatalkan</option>
																					</select>
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
												<!-- End Modal Edit Pesanan -->

												<!-- Modal Detail Pesanan-->
												<div class="modal fade" id="detail{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header no-bd">
																<h5 class="modal-title">
																	<span class="fw-mediumbold">Detail Alamat Pesanan Lain</span>
																</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>ID Pesanan Lain</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->id }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>ID Akun</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->akun_id }}</p>
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
																		<p>Nama</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->nama }}</p>
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
																		<p>Provinsi</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->provinsi }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Kota</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->kota }}</p>
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
																		<p>Teknisi</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->relasiteknisi->nama_teknisi }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Tanggal Datang</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->tanggal_datang }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Waktu Datang</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->relasiwaktu->waktu_datang }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Keterangan</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->keterangan }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Jumlah AC</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->jumlah_ac }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Harga</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ rupiah($data->harga) }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Status</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->status }}</p>
																	</div>
																</div>
																<div class="row mb-3 d-flex justify-content-center">
																	<div class="col-4">
																		<p>Ulasan</p>
																	</div>
																	<div class="col-7">
																		<p>: {{ $data->ulasan ? ($data->ulasan ? : '(Ulasan belum diberikan)') : '( Ulasan belum diberikan)' }}</p>
																	</div>
																</div>
																<div class="modal-footer d-flex justify-content-center">
																	<a href="/surat-tugas/{{ $data->id }}" target="_blank" class="btn btn-dark">PDF</a>
																</div>
															</div>
														</div>
													</div>
													<!-- End Modal Detail Pesanan -->
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

	<!--   Core JS Files   -->
	@include('admin2.includes.script')
	<!-- End JS Files -->

</body>

</html>