@extends('layouts.master')

@section('content')

<div class="pagetitle">
    <h1 style="display: inline-block;">Permintaan Pembayaran</h1>
    <a style="float: right;" href="{{ route('spp.tambah') }}" class="btn btn-primary btn-sm">Buat Permintaan</a>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
            <li class="breadcrumb-item">Permintaan Pembayaran</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <!-- Table with stripped rows -->
                    <table class="table table-bordered">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col" style="width: 5%;">No</th>
                                <th scope="col" style="width: 12%;">Tanggal</th>
                                <th scope="col" style="width: 15%;">Nomor Surat</th>
                                <th scope="col" style="width: 10%;">Bagian</th>
                                <th scope="col" style="width: 30%;">Status</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            @php $i = 1 @endphp <!-- Inisialisasi variabel nomor -->
                            @foreach($spp as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td><a href="{{ route('spp.show', $item->id) }}">{{ $item->nomor_spp }}</a></td>
                                <td>{{ $item->bagian }}</td>
                                <td>
                                    @if ($item->approve_kepala)
                                    <span class="badge rounded-pill bg-success">Disetujui</span>
                                    @else
                                    <span class="badge rounded-pill bg-warning">Menunggu</span>
                                    @endif
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

@stop
