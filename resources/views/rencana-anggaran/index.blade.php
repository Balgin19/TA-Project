@extends('layouts.master')

@section('content')

<div class="pagetitle">
    <h1 style="display: inline-block;">Rencana Anggaran</h1>
    <button type="button" style="float: right;" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#largeModal">Tambah Rencana</button>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
            <li class="breadcrumb-item">Rencana Anggaran</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-24">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <!-- Table with stripped rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Program Kerja</th>
                                <th style="text-align: center;">Volume</th>
                                <th style="text-align: center;">Jenis</th>
                                <th style="text-align: center;">Jumlah</th>
                                <th style="text-align: center;">Harga</th>
                                <th style="text-align: center;">Total</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp <!-- Inisialisasi variabel nomor -->
                            @foreach ($rencanaProker as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td style="width: 30%" >{{ $item->proker->uraian }}</td>
                                <td style="text-align: center;">{{ $item->volume }}</td>
                                <td style="text-align: center;">{{ $item->jenis }}</td>
                                <td style="text-align: center;">{{ $item->jumlah }}</td>
                                <td style="text-align: center;">Rp.{{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                                <td style="text-align: center;">Rp.{{ number_format($item->jumlah*$item->harga_satuan, 0, ',', '.') }}</td>
                                <td style="text-align: center;">
                                    <a href="{{ route('rencaran.edit', $item->id_rencana) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="{{ route('rencaran.delete', $item->id_rencana) }}" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                       
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rencana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rencaran.create')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="programSelect" class="form-label">Program</label>
                        <select name="id_proker" class="form-select" id="programSelect">
                            @foreach ($uraianProkers as $idProker => $uraian)
                            <option value="{{ $idProker }}">{{ $uraian }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="bagianSelect" class="form-label">Bagian</label>
                        <select name="bagian" class="form-select" id="bagianSelect">
                            <option value="ADM">Administrasi dan Keuangan</option>
                            <option value="MK">Manajer Kualitas</option>
                            <option value="BPD">Bidang Pelayanan Darah</option>
                            <option value="BPM">Bidang Pengawasan Mutu</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="volumeInput" class="form-label">Volume</label>
                        <input name="volume" type="text" class="form-control" id="volumeInput" placeholder="Volume">
                    </div>

                    <div class="mb-3">
                        <label for="jenisSelect" class="form-label">Jenis</label>
                        <select name="jenis" class="form-select" id="jenisSelect">
                            <option>Kali</option>
                            <option>Dus</option>
                            <option>Box</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jumlahInput" class="form-label">Jumlah</label>
                        <input name="jumlah" type="text" class="form-control" id="jumlahInput" placeholder="Jumlah">
                    </div>

                    <div class="mb-3">
                        <label for="hargaInput" class="form-label">Harga Satuan</label>
                        <input name="harga_satuan" type="text" class="form-control" id="hargaInput" placeholder="Harga Satuan">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Tambahkan</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- End Large Modal-->

@stop
