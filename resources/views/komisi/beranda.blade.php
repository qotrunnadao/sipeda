@extends('layouts.main')
@section('content')
@section('icon', 'home')
@section('title', 'Beranda Komisi')
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Jurusan <b>{{$dosen_id->jurusan->namaJurusan }}</b> Pelaksanaan Tugas Akhir <i class="mdi mdi-clock-fast mdi-24px float-right"></i>
                </h5>
                <h2>{{$Mahasiswa->count()}}</h2>
            </div>
        </div>
    </div>
    {{-- {{ dd($dosen) }} --}}
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Jurusan <b>{{$dosen_id->jurusan->namaJurusan }}</b> Selesai Tugas Akhir<i class="mdi mdi-checkbox-multiple-marked-outline mdi-24px float-right"></i>
                </h5>
                <h2>{{$Mahasiswa->Where('status_id', '>=', '10')->count()}}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3"> Jumlah Dosen Jurusan <b>{{$dosen_id->jurusan->namaJurusan }}</b><i class="mdi mdi-account-multiple-outline mdi-24px float-right"></i>
                </h5>
                <h2>{{$dosen->count()}}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-warning card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Bimbingan <b>{{$dosen_id->nama }}</b> Pelaksanaan Tugas Akhir<i class="mdi mdi-clock-fast mdi-24px float-right"></i>
                </h5>
                <h2>{{ $dosen_id->TA1->where('status_id', '>=', '4')->count() + $dosen_id->TA2->where('status_id', '>=', '4')->count() }}</h2>
            </div>
        </div>
    </div>
    {{-- {{ dd($dosen->TA1->where('status_id', '>=', '4')) }} --}}
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-primary card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Bimbingan <b>{{$dosen_id->nama }}</b> Selesai Tugas Akhir<i class="mdi mdi-checkbox-multiple-marked-outline mdi-24px float-right"></i>
                </h5>
                <h2>{{ $dosen_id->TA1->where('status_id', '>=', '10')->count() + $dosen_id->TA2->where('status_id', '>=', '10')->count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-dark card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Total Mahasiswa Bimbingan <b>{{$dosen_id->nama }}</b><i class="mdi mdi-tag-multiple mdi-24px float-right"></i>
                </h5>
                <h2>{{ $dosen_id->TA1->where('status_id', '>=', '4')->count() + $dosen_id->TA2->where('status_id', '>=', '4')->count() }}</h2>
            </div>
        </div>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5">Rekap Data Dosen Pembimbing</h5>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <th> # </th>
                                <th> Nama Dosen</th>
                                <th>total</th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($dosen as $value )

                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                {{-- <td class="text-center"> {{ $value->Dosen1->jurusan_id == auth()->user()->load('Dosen')->Dosen->jurusan_id ? $value->Dosen1->nama : '' }} {{ $value->Dosen2->jurusan_id == auth()->user()->load('Dosen')->dosen->jurusan_id ? $value->Dosen2->nama : '' }}</td> --}}
                                <td class="text-center">
                                    {{$value->nama}}
                                </td>
                                <td class="text-center">
                                    {{ $value->TA2->where('status_id', '>=', '4')->count() + $value->TA1->where('status_id', '>=', '4')->count()}}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#detail" data-id='{{ $value->id }}' data-pembimbing1='{{ $value->TA1->where('status_id', '>=', '4')->count() }}' data-pembimbing2='{{ $value->TA2->where('status_id', '>=', '4')->count() }}'
                                        data-pelaksanaan='{{ $value->TA2->where('status_id', '>=', '4')->count() }}' data-selesai='{{ $value->TA1->where('status_id', '>=', '4')->count() }}' data-total='{{ $value->TA1->where('status_id', '>=', '4')->count() + $value->TA2->where('status_id', '>=', '4')->count() }}'><i class="mdi mdi-information"></i></a>
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

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5">Rekap Pelaksanaan Studi Akhir</h5>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <th> # </th>
                                <th> Nama </th>
                                <th> Status Tugas Akhir </th>
                                <th> Status Pendadaran </th>
                                <th> Status Yudisium </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani </td>
                                <td>
                                    <div class="badge badge-primary badge-pill">Selesai</div>
                                </td>
                                <td>
                                    <div class="badge badge-primary badge-pill">Selesai</div>
                                </td>
                                <td>
                                    <div class="badge badge-success badge-pill">menunggu persetujuan</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Total Mahasiswa Bimbingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <div class="form-group">
                    <label for="exampleInputEmail3">Dosen Pembimbing 1</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="pembimbing1" id="pembimbing1" value="" readonly />
                    </div>
                </div>
                 <div class="form-group">
                    <label for="exampleInputEmail3">Dosen Pembimbing 2</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="pembimbing2" id="pembimbing2" value="" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Mahasiswa Bimbingan Proses Pelaksanaan</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="pelaksanaan" id="pelaksanaan" value="" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Mahasiswa Bimbingan Selesai Tugas Akhir</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="selesai" id="selesai" value="" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Total Keseluruhan Mahasiswa Bimbingan</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="total" id="total" value="" readonly />
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@section('javascripts')
<script>
    $('#detail').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var pembimbing1 = button.data('pembimbing1') // Extract info from data-* attributes
    var pembimbing2 = button.data('pembimbing2') // Extract info from data-* attributes
    var pelaksanaan = button.data('pelaksanaan') // Extract info from data-* attributes
    var selesai = button.data('selesai') // Extract info from data-* attributes
    var total = button.data('total') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find(".modal-body input[name='pembimbing1']").val(pembimbing1)
    modal.find(".modal-body input[name='pembimbing2']").val(pembimbing2)
    modal.find(".modal-body input[name='pelaksanaan']").val(pelaksanaan)
    modal.find(".modal-body input[name='selesai']").val(selesai)
    modal.find(".modal-body input[name='total']").val(total)
    modal.find(".modal-body form").attr("action")

    })
</script>
@endsection
