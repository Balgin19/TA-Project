@extends('layouts.master')

@section('content')

    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="font-weight: bold; font-size: 24px;">Program</h3>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal"data-target="#exampleModal"><b class="btn btn-success">Tambah Program</b></button>
                                </div>       
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Program</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1 @endphp <!-- Inisialisasi variabel nomor -->
                                        @foreach ($program as $p)
                                            @if ($p->level == 3)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $p->uraian }}</td>
                                                    <td style="text-align: center;">
                                                        <!-- Trigger modal untuk setiap item -->
                                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $p->id_proker }}">Edit</button>
                                                        <a href="/program/{{ $p->id_proker }}/delete" class="btn btn-danger btn-sm">Delete</a>
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
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Program</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/program/create" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Program</label>
                        <input name="uraian" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Program">
                    </div>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
                </form>
        </div>
    </div>
</div>

@foreach ($program as $p)
<div class="modal fade" id="editModal{{ $p->id_proker }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $p->id_proker }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Isi modal -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/program/{{ $p->id_proker }}/update" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Program</label>
                        <input type="text" class="form-control" id="editModal" name="uraian" value="{{ $p->uraian }}">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@stop
