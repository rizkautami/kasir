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
                            <div class="col-6 text-right"> <a href="#modalCreate" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>    </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($data_barang as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->namabarang }}</td>
                                        <td>{{ $row->nama_jenis }}</td>
                                        <td>{{ $row->stok }} pcs</td>
                                        <td>Rp. {{ number_format($row->harga) }}</td>
                                        <td>
                                            <a href="#modalEdit{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>    
                                            <a href="#modalHapus{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
            </div>
            <form method="POST" action="barang/store">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="namabarang" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <select class="form-control" name="id_jenis" required>
                            <option value="" hidden>--Pilih Jenis Barang--</option>
                            @foreach($data_jenis as $b)
                            <option value="{{$b->id}}">{{$b->nama_jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="stok" placeholder="Stok" required>
                        <div class="input-group-append"><span class="input-group-text">pcs</span></div>
                    </div>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <div class="input-group mb-3">
                            <div class="input-group-append"><span class="input-group-text">Rp</span></div>
                            <input type="number" class="form-control" name="harga" placeholder="Harga" required>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($data_barang as $d)
<div class="modal fade" id="modalEdit{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
            </div>
            <form method="POST" action="barang/update/{{$d->id}}">
            @csrf
            <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="namabarang" value="{{$d->namabarang}}" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <select class="form-control" name="id_jenis" required>
                            <option value="" hidden>--Pilih Jenis Barang--</option>
                            @foreach($data_jenis as $b)
                            <option value="{{$b->id}}">{{$b->nama_jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label>Stok</label><br>
                        <input type="number" class="form-control" name="stok" value="{{$d->stok}}" placeholder="Stok" required>
                        <div class="input-group-append"><span class="input-group-text">pcs</span></div>
                    </div>
                    <div class="input-group mb-3">
                        <label>Harga</label><br>
                        <div class="input-group-append"><span class="input-group-text">Rp</span></div>
                        <input type="number" class="form-control" name="harga" value="{{$d->harga}}" placeholder="Harga" required>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach($data_barang as $c)
<div class="modal fade" id="modalHapus{{$c->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data User</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
            </div>
            <form method="GET" action="barang/destroy/{{$c->id}}">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Apakah Anda yakin ingin menghapus data ini?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection