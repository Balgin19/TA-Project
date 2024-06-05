@extends('layouts.master')

@section('content')

<div class="pagetitle">
    <h1 class="mb-0 d-inline">Edit Program</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Menu</a></li>
            <li class="breadcrumb-item"><a href="/rencaran">Rencana Anggaran</a></li>   
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-24">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <!-- Form for editing -->
                    <form action="{{ route('rencaran.update', $rencanaProker->id_rencana) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="programInput" class="form-label">Program</label>
                            <input name="uraian" type="text" class="form-control" id="programInput" aria-describedby="emailHelp" placeholder="Program" value="{{ $rencanaProker->proker->uraian }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="bagianSelect" class="form-label">Bagian</label>
                            <select name="bagian" class="form-select" id="bagianSelect">
                                <option value="ADM" {{ $rencanaProker->bagian == 'ADM' ? 'selected' : '' }}>Administrasi dan Keuangan</option>
                                <option value="MK" {{ $rencanaProker->bagian == 'MK' ? 'selected' : '' }}>Manajer Kualitas</option>
                                <option value="BPD" {{ $rencanaProker->bagian == 'BPD' ? 'selected' : '' }}>Bidang Pelayanan Darah</option>
                                <option value="BPM" {{ $rencanaProker->bagian == 'BPM' ? 'selected' : '' }}>Bidang Pengawasan Mutu</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="volumeInput" class="form-label">Volume</label>
                            <input name="volume" type="text" class="form-control" id="volumeInput" aria-describedby="emailHelp" placeholder="Volume" value="{{ $rencanaProker->volume }}">
                        </div>

                        <div class="mb-3">
                            <label for="jenisSelect" class="form-label">Jenis</label>
                            <select name="jenis" class="form-select" id="jenisSelect">
                                <option {{ $rencanaProker->jenis == 'Kali' ? 'selected' : '' }}>Kali</option>
                                <option {{ $rencanaProker->jenis == 'Dus' ? 'selected' : '' }}>Dus</option>
                                <option {{ $rencanaProker->jenis == 'Box' ? 'selected' : '' }}>Box</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jumlahInput" class="form-label">Jumlah</label>
                            <input name="jumlah" type="text" class="form-control" id="jumlahInput" aria-describedby="emailHelp" placeholder="Jumlah" value="{{ $rencanaProker->jumlah }}">
                        </div>

                        <div class="mb-3">
                            <label for="hargaInput" class="form-label">Harga Satuan</label>
                            <input name="harga_satuan" type="text" class="form-control" id="hargaInput" aria-describedby="emailHelp" placeholder="Harga Satuan" value="{{ $rencanaProker->harga_satuan }}">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
