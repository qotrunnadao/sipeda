@extends('layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data User')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> Email </th>
                                <th> no Induk </th>
                                <th> Level ID</th>
                                <th> Nama Level </th>
                                {{-- <th> Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($user as $value)
                            <tr>
                                <td> {{ $no++ }}</td>
                                <td> {{ $value->email }}</td>
                                <td> {{ $value->noInduk }}</td>
                                <td> {{ $value->level_id }}</td>
                                <td> {{ $value->level->namaLevel }}</td>
                                {{-- <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                </td> --}}
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
