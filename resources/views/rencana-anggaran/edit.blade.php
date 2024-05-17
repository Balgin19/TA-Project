@extends('layouts.master')


@section('content')
    
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="font-weight: bold; font-size: 24px;">Edit Rencana</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/rencaran/{{ $rencanaProker->id_rencana }}/update" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Program</label>
                                    <input name="uraian" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Program" value="{{ $rencanaProker->proker->uraian }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Bagian</label>
                                    <select name="id_bagian" class="form-control" id="exampleFormControlSelect1">
                                        <option value="ADM" {{ $rencanaProker->id_bagian == 'ADM' ? 'selected' : '' }}>Administrasi dan Keuangan</option>
                                        <option value="MK" {{ $rencanaProker->id_bagian == 'MK' ? 'selected' : '' }}>Manajer Kualitas</option>
                                        <option value="BPD" {{ $rencanaProker->id_bagian == 'BPD' ? 'selected' : '' }}>Bidang Pelayanan Darah</option>
                                        <option value="BPM" {{ $rencanaProker->id_bagian == 'BPM' ? 'selected' : '' }}>Bidang Pengawasan Mutu</option>
                                    </select>
                                </div>
                                
                        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Volume</label>
                                    <input name="volume" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Volume" value="{{ $rencanaProker->volume }}">
                                </div>
                        
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis</label>
                                    <select name="jenis" class="form-control" id="exampleFormControlSelect1">
                                        <option {{ $rencanaProker->jenis == 'Kali' ? 'selected' : '' }}>Kali</option>
                                        <option {{ $rencanaProker->jenis == 'Dus' ? 'selected' : '' }}>Dus</option>
                                        <option {{ $rencanaProker->jenis == 'Box' ? 'selected' : '' }}>Box</option>
                                    </select>
                                </div>
                                
                        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jumlah</label>
                                    <input name="jumlah" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Jumlah" value="{{ $rencanaProker->jumlah }}">
                                </div>
                        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga Satuan</label>
                                    <input name="harga_satuan" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placehol   der="Harga Satuan" value="{{ $rencanaProker->harga_satuan }}">
                                </div>
                        
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

