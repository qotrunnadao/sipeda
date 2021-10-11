@extends('admin.layouts.main')
@section('title', 'SK Kelulusan')
@section ('icon', 'folder-upload')
@section('content')
<div class="row">
	<div class="col-12 grid-margin stretch-card">
		<div class="card">
			<div>
				<button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4" data-toggle="modal" data-target="#tambahdata"> <i class="mdi mdi-plus"></i> Tambah</button>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th> # </th>
								<th> Nama </th>
								<th> NIM </th>
								<th> Jurusan </th>
								<th> SK Kelulusan </th>
								<th> Aksi </th>
							</tr>
						</thead>
						<tbody>
							@php ($no = 1)
							@foreach ($sk as $value )
							<tr>
								<td> {{ $no++ }} </td>
								<td> {{ $namaMahasiswa }} </td>
								<td> {{ $nim }} </td>
								<td> {{ $namaJurusan }}</td>
								<td>
									{{ $value->fileSK }}
								</td>
								<td>
									<div class="btn-group">
										<form action="#" method="GET">
											<button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
										</form>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Tambah SK -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload SK</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="forms-sample" action="{{route('sk.store')}}" method="post">
					@csrf
					<div class="form-group">
						<label for="exampleInputEmail3">ID Yudisium</label>
						<div class="input-group">
							<input type="text" class="form-control" name="yudisium_id" />
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail3">Nama Mahasiswa</label>
						<div class="input-group">
							<input type="text" class="form-control" name="name" />
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail3">NIM</label>
						<div class="input-group">
							<input type="text" class="form-control" name="nim" />
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail3">Jurusan</label>
						<div class="input-group">
							<select type="text" class="form-control" id="jurusan" name="jurusan">
								<option value="" selected disabled>PILIH</option>
								@foreach ($jurusan as $value)
								<option value="{{ $value->id }}">{{ $value->namaJurusan }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail3">Upload SK</label>
						<div class="input-group">
							<input type="file" class="form-control" name="fileSK" />
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
