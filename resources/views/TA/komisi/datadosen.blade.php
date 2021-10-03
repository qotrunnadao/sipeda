@extends('TA.layouts.main')
@section('content')
@section('icon', 'account-box')
@section('title', 'Data Dosen Pembimbing')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Dosen </th>
                                <th> NIP </th>
                                <th> Pembimbing 1 </th>
                                <th> Pembimbing 2 </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Ipung Permadi </td>
                                <td> 20108397379101</td>
                                <td> 5 </td>
                                <td> 3 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
