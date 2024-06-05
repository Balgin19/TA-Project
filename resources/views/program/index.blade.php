@extends('layouts.master')

@section('content')

<div class="pagetitle">
    <h1 style="display: inline-block;">Program</h1>
    <button type="button" style="float: right;" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Program</button>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
            <li class="breadcrumb-item">Program</li>
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
                                <th scope="col">No</th>
                                <th scope="col">Nama Program</th>
                                <th scope="col" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp <!-- Inisialisasi variabel nomor -->
                            @foreach ($program as $p)
                            @if ($p->level == 3)
                            <tr>
                                <td scope="col">{{ $i++ }}</td>
                                <td scope="col">{{ $p->uraian }}</td>
                                <td scope="col" style="text-align: center;">
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $p->id_proker }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <a href="{{ route('program.delete', $p->id_proker) }}" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('program.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="uraian" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tuliskan Program..."></textarea>
                       
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach ($program as $p)
<div class="modal fade" id="editModal{{ $p->id_proker }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('program.update', $p->id_proker) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <textarea name="uraian" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{ $p->uraian }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@stop
