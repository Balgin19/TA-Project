@extends('layouts.master')

@section('content')

    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="font-weight: bold; font-size: 24px;">Rencana Anggaran</h3>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal"data-target="#exampleModal"><b class="btn btn-success">Tambah Rencana</b></button>
                                </div>
                                    
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th> <!-- Tambah kolom untuk nomor -->
                                            <th>Program Kerja</th>
                                            <th>Volume</th>
                                            <th>Jenis</th>
                                            <th>Jumlah</th>
                                            <th style="text-align: center;">Harga</th>
                                            <th style="text-align: center;">Total</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @php $i = 1 @endphp <!-- Inisialisasi variabel nomor -->
                                        @foreach ($rencanaProker as $item)
                                          
                                        <tr>
                                            <td >{{ $i++ }}</td> <!-- Tampilkan nomor -->
                                            <td>{{ $item->proker->uraian }}</td> <!-- Tampilkan uraian dari proker yang terkait -->
                                            <td style="text-align: center;">{{ $item->volume }}</td>
                                            <td style="text-align: center;">{{ $item->jenis }}</td>
                                            <td style="text-align: center;">{{ $item->jumlah }}</td>
                                            <td style="text-align: center;">Rp.{{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                                            <td style="text-align: center;">Rp.{{ number_format($item->jumlah*$item->harga_satuan, 0, ',', '.') }}</td>
                                            <td style="text-align: center;">
                                                <a href="/rencaran/{{ $item->id_rencana }}/edit" class="btn btn-warning btn-xs">Edit</a>
                                                <a href="/rencaran/{{ $item->id_rencana }}/delete" class="btn btn-danger btn-xs">Delete</a>
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

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Rencana</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
      
            <form action="/rencaran/create" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="exampleInputEmail1">Program</label>
                <select name="id_proker" class="form-control" id="exampleInputEmail1">
                    @foreach ($uraianProkers as $idProker => $uraian)
                        <option value="{{ $idProker }}">{{ $uraian }}</option>
                    @endforeach
                </select>
            </div>
  
    
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Bagian</label>
                    <select name="id_bagian" class="form-control" id="exampleFormControlSelect1">
                        <option value="ADM">Administrasi dan Keuangan</option>
                            <option value="MK">Manajer Kualitas</option>
                            <option value="BPD">Bidang Pelayanan Darah</option>
                            <option value="BPM">Bidang Pengawasan Mutu</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Volume</label>
                    <input name="volume" type="text" class="form-control" id="exampleInputEmail1"
                      aria-describedby="emailHelp" placeholder="Volume">
                </div>
    
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis</label>
                    <select name="jenis" class="form-control" id="exampleFormControlSelect1">
                      <option>Kali</option>
                      <option>Dus</option>
                      <option>Box</option>
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah</label>
                    <input name="jumlah" type="text" class="form-control" id="exampleInputEmail1"
                      aria-describedby="emailHelp" placeholder="Jumlah">
                </div>
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Harga Satuan</label>
                    <input name="harga_satuan" type="text" class="form-control" id="exampleInputEmail1"
                      aria-describedby="emailHelp" placeholder="Harga Satuan">
                </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
    </div>

@stop

