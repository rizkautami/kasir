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
                @foreach($data_diskon as $d)
                    <form method="POST" action="/setdiskon/update/{{ $d->id }}">
                    @csrf
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">{{ $title }}</h4>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Belanja</label><br>
                                <div class="input-group mb-3">
                                    <div class="input-group-append"><span class="input-group-text">Rp</span></div>
                                    <input type="number" class="form-control" name="total_belanja" value="{{$d->total_belanja}}" placeholder="total belanja" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Diskon</label><br>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="diskon" value="{{ $d->diskon }}" placeholder="diskon" required>
                                    <div class="input-group-append"><span class="input-group-text">%</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes </button>
                    </div>
                    </form>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class= "modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Diskon</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
            </div>
            <form method="POST" action="jenisbarang/store">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <input type="text" class="form-control" name="nama_jenis" placeholder="Jenis Barang" required>
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
@endsection