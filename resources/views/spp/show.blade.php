@extends('layouts.master')

@section('content')

<div class="pagetitle">
    <h1 style="display: inline-block;">Detail Permintaan Pembayaran</h1>
    <form action="{{ route('spp.delete', ['id' => $spp->id]) }}" method="POST" style="float: right;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus permintaan pembayaran ini?')">Hapus</button>
    </form>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Menu</a></li>
            <li class="breadcrumb-item"><a href="{{ route('spp') }}">Permintaan Pembayaran</a></li>
            <li class="breadcrumb-item">Detail Permintaan Pembayaran</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title text-center"></h6>
                <div class="judul">PERMINTAAN PEMBAYARAN</div>

                <div style="margin-top: 20px;"></div>   
                <table>
                    <tr>
                        <td class="label">Nomor Surat</td>
                        <td class="value">: {{ $spp->nomor_spp }}</td>
                    </tr>
                    <tr>
                        <td class="label">Bagian</td>
                        <td class="value">: {{ $spp->bagian }}</td>
                    </tr>
                    <tr>
                        <td class="label">Hari/Tanggal</td>
                        <td class="value">: {{ \Carbon\Carbon::parse($spp->tanggal)->translatedFormat('l, d F Y') }}</td>
                    </tr>
                    <tr>
                        <td class="label">Kepentingan</td>
                        <td class="value">: {{ $spp->kepentingan }}</td>
                    </tr>
                    <tr>
                        <td class="label">Status</td>
                        <td class="value">: 
                            @if ($spp->approve_kepala)
                                <span class="badge rounded-pill bg-success "></i>Disetujui</span>
                            @else
                                <span class="badge rounded-pill bg-warning"></i>Menunggu</span>
                            @endif
                        </td>
                    </tr>
                        
                </table>
                    
                <div style="margin-top: 30px;"></div>

                <table class="table table-bordered border-dark">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Uraian Kegiatan</th>
                            <th style="text-align: center;">Harga</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Biaya</th>
                            <th style="text-align: center;">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $totalBiaya = 0;
                        ?>
                        @foreach ($spp->detailSpp as $detail)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td style="max-width: 200px; overflow: auto;">{{ $detail->proker->uraian }}</td>
                                <td>Rp.{{ number_format($detail->harga, 0, ',', '.') }}</td>
                                <td style="text-align: center;">{{ $detail->jumlah }}</td>
                                <td>Rp.{{ number_format($detail->harga * $detail->jumlah, 0, ',', '.') }}</td>
                                <td style="max-width: 200px; overflow: auto;">{{ $detail->keterangan }}</td>
                            </tr>
                            <?php
                            $totalBiaya += $detail->harga * $detail->jumlah;
                            ?>
                        @endforeach
                    </tbody>
                    <tr>
                        <td colspan="4" style="text-align: center;"><strong>Total Biaya</strong></td>
                        <td><strong id="totalBiayaPlaceholder">Rp.{{ number_format($totalBiaya, 0, ',', '.') }}</strong></td>
                        <td></td>
                    </tr>
                </table>


                <div style="margin-top: 50px;"></div>

                @if (!$spp->approve_kepala)
                <form action="{{ route('spp.approve', ['id' => $spp->id]) }}" method="POST" id="approveForm">
                    @csrf
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="approveCheckbox" required>
                            <label class="form-check-label" for="approveCheckbox">
                            Centang sebelum menyetujui
                            </label>
                            <div class="invalid-feedback">
                                You must agree before approving.
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 20px;"></div>
                    <div class="col-12">
                        <button class="btn btn-success" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus permintaan pembayaran ini?')">Setujui</button>
                    </div> 
                    
                    <div style="margin-top: 20px;"></div>
                </form>
                @endif
            </div>     
        </div>
    </div>
</section>

<style>
    table {
        width: 100%;
    }
    table td {
        padding-bottom: 5px;
    }
    .label {
        font-weight: bold;
        width: 150px;
        text-align: left;
        padding-right: 10px; /* Tambahkan spasi di sini */
    }
    .value {
        padding-left: 10px; /* Tambahkan spasi di sini */
    }
    .judul {
        text-align: center;
        font-weight: bold;
    }
</style>

@stop

