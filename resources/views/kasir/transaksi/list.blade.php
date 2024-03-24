@extends('layout.layout')
@section('content')

<div class="content-body">
     <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{$title }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{$title }}</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><h4 class="card-title">{{ $title }}</h4></div>
                            <div class="col-6 text-right"><a href="/transaksi/create" target="blank" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a></div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Transaksi</th>
                                        <th>Tgl Transaksi</th>
                                        <th>Total Bayar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($data_transaksi as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->no_transaksi }}</td>
                                        <td>{{ date('d/m/y',strtotime($row->tgl_transaksi)) }}</td>
                                        <td>Rp. {{ number_format($row->total_bayar) }}</td>
                                        <td>
                                            <a href="#" target="blank" class="btn btn-xs btn-primary"><i class="fa fa-print"></i> Cetak</a>    
                                            
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
    </div>
</div>
@endsection