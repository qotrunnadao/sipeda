@extends('dosen.layouts.main')
@section('content')
@section('icon', 'account-multiple')
@section('title', 'Data Konsultasi')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM </th>
                                <th> Jumlah Konsultasi </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani</td>
                                <td> H1D018033</td>
                                <td>
                                    6
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= url('') ?>/TA/dosen/detailkonsultasi" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-information"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani</td>
                                <td> H1D018033</td>
                                <td>
                                    6
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= url('') ?>/TA/dosen/detailkonsultasi" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-information"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani</td>
                                <td> H1D018033</td>
                                <td>
                                    6
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= url('') ?>/TA/dosen/detailkonsultasi" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-information"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
