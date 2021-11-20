@extends('layouts.main')
@section('content')
@section('icon', 'trophy')
@section('title', 'Data Nilai TA')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div>
                    {{-- <button type="button" class="btn btn-sm btn-gradient-primary float-right"> <i class="mdi mdi-upload"></i> Unggah SIA</button> --}}
                    @if(auth()->user()->level_id !== 2)
                    <button type="button" class="btn btn-sm btn-gradient-primary float-right" data-toggle="modal" data-target="#tambahdata"> <i class="mdi mdi-plus"></i> Tambah</button>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center"> No. </th>
                                <th class="text-center"> Nama Mahasiswa </th>
                                <th class="text-center"> NIM </th>
                                <th class="text-center"> Jurusan </th>
                                <th class="text-center"> Nilai Angka </th>
                                <th class="text-center"> Nilai Huruf </th>
                                <th class="text-center"> Status Nilai</th>
                                <th class="text-center"> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($nilai as $value )
                            {{-- {{ dd($value->ta_id) }} --}}
                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td class="text-center"> {{ $value->TA->mahasiswa->nama}} </td>
                                <td class="text-center"> {{ $value->TA->mahasiswa->nim }}</td>
                                <td class="text-center"> {{ $value->TA->mahasiswa->jurusan->namaJurusan }}</td>
                                <td class="text-center"> {{ $value->nilaiAngka }}</td>
                                <td class="text-center"> {{ $value->NilaiHuruf->nilaiHuruf }} </td>
                                <td class="text-center">
                                    @if($value->statusnilai_id == 1)
                                    <span class="badge badge-warning">Menunggu</span>
                                </td>
                                @elseif($value->statusnilai_id == 2)
                                <span class="badge badge-success">Upload SIA</span></td>
                                @else
                                <span class="badge badge-primary">Verifikasi Bapendik</span></td>
                                @endif</td>

                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-nilaiangka='{{ $value->nilaiAngka }}' data-nilai_huruf_id='{{ $value->NilaiHuruf->id }}' data-ket='{{ $value->ket }}' data-statusnilai_id='{{ $value->statusnilai_id }}'><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('nilaita.delete', $value->id) }}" method="GET">
                                            @method('DELETE')
                                            @csrf
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

<!-- Tambah Jurusan -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="creatData" method="POST" action="{{ route('nilaita.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Jurusan</label>
                        <div class="input-group">
                            <select type="text" class="form-control" id="jurusan" name="jurusan">
                                <option selected disabled>Pilih Jurusan </option>
                                @foreach ($jurusan as $value)
                                <option value="{{ $value->id }} ">{{ $value->namaJurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3"> NIM</label>
                        <div class="input-group">
                            <select type="text" class="form-control" id="nim" name="nim">
                                <option value="" selected disabled>Pilih NIM </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Mahasiswa</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" id="name" value="" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nilai Angka</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nilaiAngka" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nilai Huruf</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="nilai_huruf_id">
                                <option value="">PILIH Nilai Huruf</option>
                                @foreach ($NilaiHuruf as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->nilaiHuruf ? 'selected' : '' }}>{{ $value->nilaiHuruf }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Keterangan</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control" placeholder="" name="ket"></textarea>
                        </div>
                        <p class="text-muted"> * tidak wajib di isi</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Status Nilai</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="statusnilai_id">
                                <option value="">PILIH</option>
                                @foreach ($statusnilai as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->status ? 'selected' : '' }}>{{ $value->status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSubmit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--edit Jurusan -->
<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Nilai Tugas Akhir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="editData" method="POST" action="">
                    @method('PUT')
                    @csrf
                    {{-- <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="{{ $nilai->ta_id }}"> --}}
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nilai Angka</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nilaiangka" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nilai Huruf</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="nilai_huruf_id">
                                <option value="">PILIH Nilai Huruf</option>
                                @foreach ($NilaiHuruf as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->nilaiHuruf ? 'selected' : '' }}>{{ $value->nilaiHuruf }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Keterangan</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control" placeholder="" name="ket"></textarea>
                        </div>
                        <p class="text-muted"> * tidak wajib di isi</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Status Nilai</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="statusnilai_id">
                                <option value="">PILIH</option>
                                @foreach ($statusnilai as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->status ? 'selected' : '' }}>{{ $value->status }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSubmit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

    $("#creatData").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
<script>
    $(document).ready(function () {

    $("#editData").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
@endsection
@section('javascripts')
<script>
    $('#editdata').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var statusnilai_id = button.data('statusnilai_id')
    var nilaiangka = button.data('nilaiangka')
    var nilai_huruf_id = button.data('nilai_huruf_id')
    var ket = button.data('ket')

    var modal = $(this)

    modal.find(".modal-body input[name='nilaiangka']").val(nilaiangka)
    modal.find(".modal-body select[name='nilai_huruf_id']").val(nilai_huruf_id)
    modal.find(".modal-body textarea[name='ket']").val(ket)
    modal.find(".modal-body select[name='statusnilai_id']").val(statusnilai_id)
    modal.find(".modal-body form").attr("action",'/tugas-akhir/nilaita/update/'+id)

    })
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('#jurusan').on('change', function (event) {

        $("#nim").find('option').not(':first').remove();
        $("#name").val('');
        var id = $(this).val();

        $.ajax({
           type:'POST',
           url:"{{ route('nilaita.nim') }}",
           data:{id:id},
           success:function(data){
               console.log(data)
               var nim = document.getElementById('nim')
                for (var i = 0; i < data.length; i++) {
                // POPULATE SELECT ELEMENT WITH JSON.
                    nim.innerHTML = nim.innerHTML +
                        '<option value="' + data[i]['mahasiswa']['id'] + '" data-id="'+data[i]['id']+ '" data-nama="'+data[i]['mahasiswa']['nama']+'">' + data[i]['mahasiswa']['nim'] + '</option>';

                }
           }
        });


    })
    $('#nim').on('change', function (event) {

    var kel = $(this).val();
    var id = $(this).find(':selected').data('id');
    var name = $(this).find(':selected').data('nama');

    $('#ta_id').val(id);
    $('#name').val(name);
    // $('#keluhan').val(kel);

})

</script>
@endsection
